<?php

$list_type = 'waiting_bds';
$list_title = 'Waiting List BDS';
$list_short = 'Waiting List BDS';
$list_page = 'list_waiting_bds.htm';

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

        if ($img_rs = uploadMeritFile($_FILES["list_image"], "../uploads/media/")) {
            $vals['list_image'] = $img_rs;
        }

        saveRecord("tbl_listings", $vals);
        $_SESSION['successMsg'] = $list_short . ' has been saved successfully !';
    } else if ($_REQUEST['mode'] == 'update') {

        if ($img_rs = uploadMeritFile($_FILES["list_image"], "../uploads/media/")) {
            $vals['list_image'] = $img_rs;
        }


        updateRecord("tbl_listings", $vals, " `list_id` = '" . $_REQUEST["code"] . "' ");
        $_SESSION['successMsg'] = $list_short . ' has been updated successfully !';
    }
}


if (!empty($_REQUEST['code']))
    $data = getTable('tbl_listings', "list_id = '" . $_REQUEST["code"] . "'");

if (isset($_POST['list_delete']))
    deleteRows("tbl_listings", "list_id", $_POST['list_delete']);

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
?>