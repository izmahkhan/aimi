<?php

$list_type = 'merit_bds';
$list_title = 'Merit List BDS';
$list_short = 'Merit List BDS';
$list_page = 'list_merit_bds.htm';

function deleteMeritList($table, $field, $ary)
{
    global $conn;
    if (isset($ary) && count($ary) > 0) {
        foreach ($ary as $delete_data) {
            $s = "delete FROM tbl_results where list_id = '" . $delete_data . "' ";
            $q = $conn->query($s) or die($s);

            $s1 = "delete FROM " . $table . " where " . $field . " = '" . $delete_data . "' ";
            $q1 = $conn->query($s1) or die($s1);

            $_SESSION['successMsg'] = 'Recoreds has been deleted successfully !';
        }
    }
}

if (isset($_POST['submit1'])) {
    $vals = $_POST;
    unset($vals['submit1']);
    $vals['list_slug'] = toSlugUrl($vals['list_title']);
    $vals['list_type'] = $list_type;

    if ($_REQUEST['mode'] == 'add') {
        global $conn;
        $s1_max_orderid = "select max(list_order) as orderid from tbl_listings where list_type='$list_type' ";
        $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);
        $r1_max_orderid = $q1_max_orderid->fetch_array();
        $vals['list_order'] = intval($r1_max_orderid["orderid"]) + 1;



        $error = false;
        if ($upfile = uploadMeritFile($_FILES["list_image"], "../uploads/media/")) {
            $filename = "../uploads/media/" . $upfile;
            $file = fopen($filename, "r");
            $records = 0;
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                // if (intval($emapData[0]) > 0) {
                // $rollno =  trim($emapData[1]);
                // $rollno =  str_replace('MBBs', '', $rollno);
                // $rollno =  str_replace('bds', '', $rollno);
                // $rollno =  str_replace('-', '', $rollno);
                // $rollno =  str_replace(' ', '', $rollno);
                // $rollno =  trim($rollno);

                $r_data = serialize($emapData);
                $new_record = array(
                    'list_id' => '999999999',
                    'r_type' => 'bds',
                    'r_data' => $r_data,
                    'r_status' => '1',
                    'r_date' => $vals['list_desc']
                );
                saveRecord("tbl_results", $new_record);
                $records++;
                // }

                $_SESSION['successMsg'] = $records . ' recoreds updated successfully !';
            }
            fclose($file);
        }

        saveRecord("tbl_listings", $vals);
        $new_insert_id = $conn->insert_id;
        updateRecord("tbl_results", array('list_id' => $new_insert_id), " list_id='999999999' ");
        $_SESSION['successMsg'] = $list_short . ' has been saved successfully !';
    } else if ($_REQUEST['mode'] == 'update') {

        // if ($img_rs = uploadMeritFile($_FILES["list_image"], "../uploads/media/")) {
        //     $vals['list_image'] = $img_rs;
        // }


        updateRecord("tbl_listings", $vals, " `list_id` = '" . $_REQUEST["code"] . "' ");
        $_SESSION['successMsg'] = $list_short . ' has been updated successfully !';
    }
}


if (!empty($_REQUEST['code']))
    $data = getTable('tbl_listings', "list_id = '" . $_REQUEST["code"] . "'");

if (isset($_POST['list_delete']))
    deleteMeritList("tbl_listings", "list_id", $_POST['list_delete']);

if (isset($_POST['list_status']))
    updateRows("tbl_listings", "list_status", "list_id", $_POST['list_status']);

if (isset($_POST['list_label']))
    updateRows("tbl_listings", "list_label", "list_id", $_POST['list_label']);

if (isset($_POST)) {
    global $conn;
    $query_rs_pages = "SELECT * FROM tbl_listings WHERE list_type='$list_type' ORDER BY list_order ASC";
    $rs_pages = $conn->query($query_rs_pages) or die('mysql error:');
    while ($row_rs_pages = $rs_pages->fetch_array()) {
        if (isset($_REQUEST["orderid" . $row_rs_pages["list_id"] . ""])) {
            $s35 = "update tbl_listings set list_order = '" . $_REQUEST["orderid" . $row_rs_pages["list_id"] . ""] . "' where list_id = '" . $row_rs_pages["list_id"] . "' ";
            $q35 = $conn->query($s35) or die($s35);
            $_SESSION['successMsg'] = 'Changings has been saved successfully !';
        }
    }
}
$pager = '&pager=' . $_REQUEST['pager'];
