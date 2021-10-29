<?php

if (isset($_POST['submit1'])) {

    if ($_REQUEST['mode'] == 'add') {
        global $conn;
        $vals = array('gal_type' => 'community');
        
        if (count($_FILES['img_files']['name']) > 0) {

            foreach ($_FILES['img_files']['name'] as $key => $extra) {

                $s1_max_orderid = "select max(gal_order) as orderid from tbl_gallery where gal_type='community' ";
                $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);
                $r1_max_orderid = $q1_max_orderid->fetch_array();
                $vals['gal_order'] = intval($r1_max_orderid["orderid"]) + 1;

                $file = array(
                    'name' => $_FILES['img_files']['name'][$key],
                    'type' => $_FILES['img_files']['type'][$key],
                    'tmp_name' => $_FILES['img_files']['tmp_name'][$key],
                    'error' => $_FILES['img_files']['error'][$key],
                    'size' => $_FILES['img_files']['size'][$key]
                );
                if ($img_rs = uploadMultiImageThumb($file, "../uploads/gallery/", 1920, 300)) {
                    $vals['gal_image'] = $img_rs[0];
                    $vals['gal_thumb'] = $img_rs[1];
                }

                saveRecord("tbl_gallery", $vals);
                $_SESSION['successMsg'] = 'Gallery has been saved successfully !';
            }
        }
    }
}



if (!empty($_REQUEST['code']))
    $data = getTable('tbl_gallery', "gal_id = '" . $_REQUEST["code"] . "'");



if (isset($_POST['gal_delete']))
    deleteRows("tbl_gallery", "gal_id", $_POST['gal_delete']);



if (isset($_POST['gal_status']))
    updateRows("tbl_gallery", "gal_status", "gal_id", $_POST['gal_status']);



if (isset($_POST)) {
    global $conn;

    $query_rs_pages = "SELECT * FROM tbl_gallery WHERE gal_type='community' ORDER BY gal_order ASC";
    $rs_pages = $conn->query($query_rs_pages) or die(mysqli_error());
    while ($row_rs_pages = $rs_pages->fetch_array()) {

        if (isset($_REQUEST["orderid" . $row_rs_pages["gal_id"] . ""])) {

            $s35 = "update tbl_gallery set gal_order = '" . $_REQUEST["orderid" . $row_rs_pages["gal_id"] . ""] . "' where gal_id = '" . $row_rs_pages["gal_id"] . "' ";

            $q35 = $conn->query($s35) or die($s35);

            $_SESSION['successMsg'] = 'Changings has been saved successfully !';
        }
    }
}



$pager = '&pager=' . $_REQUEST['pager'];
