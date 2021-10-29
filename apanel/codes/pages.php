<?php

if (isset($_POST['submit1'])) {
    $vals = $_POST;
    unset($vals['submit1']);
    $vals['page_name'] = str_replace(" ", "-", strtolower(trim($vals['page_name']))) . "";
    $vals['page_modify_date'] = date("Y-m-d H:i:s");

    if ($img_rs = uploadImageThumb($_FILES["page_image"], "../uploads/pages/", 1320, 200)) {
        $vals['page_image'] = $img_rs[0];
        $vals['page_thumb'] = $img_rs[1];
    }

    if ($img_rs = uploadFile($_FILES["page_file"], "../uploads/files/")) {
        $vals['page_file'] = $img_rs;
    }

    if ($img_rs = uploadFile($_FILES["page_file2"], "../uploads/files/")) {
        $vals['page_file2'] = $img_rs;
    }

    if ($img_rs = uploadFile($_FILES["page_file3"], "../uploads/files/")) {
        $vals['page_file3'] = $img_rs;
    }

    if ($img_rs = uploadFile($_FILES["page_file4"], "../uploads/files/")) {
        $vals['page_file4'] = $img_rs;
    }

    if ($img_rs = uploadFile($_FILES["page_file5"], "../uploads/files/")) {
        $vals['page_file5'] = $img_rs;
    }

    if ($img_rs = uploadFile($_FILES["page_file6"], "../uploads/files/")) {
        $vals['page_file6'] = $img_rs;
    }

    
    $vals['page_link'] = toSlugUrl($vals['page_link']);

    if ($_REQUEST['mode'] == 'add') {

        $s1_max_orderid = "select max(page_order) as orderid from tbl_pages where 1";
        $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);
        $r1_max_orderid = $q1_max_orderid->fetch_array();
        $vals['page_order'] = intval($r1_max_orderid["orderid"]) + 1;

        $vals['page_date'] = date('Y-m-d h:i:s');
        $vals['page_name'] = toSlugUrl($vals['page_title']);
        saveRecord("tbl_pages", $vals);
        $_SESSION['successMsg'] = 'Page has been saved successfully !';
    } else if ($_REQUEST['mode'] == 'update') {
        updateRecord("tbl_pages", $vals, " `page_id` = '" . $_REQUEST["code"] . "' ");
        $_SESSION['successMsg'] = 'Page has been updated successfully !';
    }
}

if (!empty($_REQUEST['code']))
    $data = getTable('tbl_pages', "page_id = '" . $_REQUEST["code"] . "'");

if (isset($_REQUEST['mode']))
    deleteRow("tbl_pages", $_REQUEST["mode"], "page_id = '" . $_REQUEST["code"] . "'");

if (isset($_POST['page_label']))
    updateRows("tbl_pages", "page_label", "page_id", $_POST['page_label']);

if (isset($_POST['page_status']))
    updateRows("tbl_pages", "page_status", "page_id", $_POST['page_status']);

if (isset($_POST)) {
    global $conn;

    $query_rs_pages = "SELECT * FROM tbl_pages WHERE  1 ORDER BY page_order ASC";
    $rs_pages = $conn->query($query_rs_pages) or die(mysqli_error());
    while ($row_rs_pages = $rs_pages->fetch_array()) {
        if (isset($_REQUEST["orderid" . $row_rs_pages["page_id"] . ""])) {
            $s35 = "update tbl_pages set page_order = '" . $_REQUEST["orderid" . $row_rs_pages["page_id"] . ""] . "' where page_id = '" . $row_rs_pages["page_id"] . "' ";
            $q35 = $conn->query($s35) or die($s35);
            $_SESSION['successMsg'] = 'Changings has been saved successfully !';
        }
    }
}

$pager = '&pager=' . $_REQUEST['pager'];


?>