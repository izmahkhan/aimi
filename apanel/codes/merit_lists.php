<?php

$_REQUEST['type'] = empty($_REQUEST['type']) ? 'mbbs' : $_REQUEST['type'];

if (isset($_POST['submit1'])) {
    $vals = $_POST;
    unset($vals['submit1']);
    $vals['ml_type'] = $_REQUEST['type'];
    if ($_REQUEST['mode'] == 'add') {
        global $conn;
        $s1_max_orderid = "select max(ml_order) as orderid from tbl_merit_lists where ml_type='" . $_REQUEST['type'] . "' ";
        $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);
        $r1_max_orderid = $q1_max_orderid->fetch_array();
        $vals['ml_order'] = intval($r1_max_orderid["orderid"]) + 1;
        $vals['ml_created_at'] = date('Y-m-d');

        saveRecord("tbl_merit_lists", $vals);
        $_SESSION['successMsg'] = 'Slider has been saved successfully !';
    } else if ($_REQUEST['mode'] == 'update') {

        updateRecord("tbl_merit_lists", $vals, " `ml_id` = '" . $_REQUEST["code"] . "' ");
        $_SESSION['successMsg'] = 'Slider has been updated successfully !';
    }
}

if (!empty($_REQUEST['code']))
    $data = getTable('tbl_merit_lists', "ml_id = '" . $_REQUEST["code"] . "'");

if (isset($_POST['ml_delete']))
    deleteRows("tbl_merit_lists", "ml_id", $_POST['ml_delete']);

if (isset($_POST['ml_status']))
    updateRows("tbl_merit_lists", "ml_status", "ml_id", $_POST['ml_status']);

if (isset($_POST)) {
    global $conn;
    $query_rs_pages = "SELECT * FROM tbl_merit_lists WHERE ml_type='" . $_REQUEST['type'] . "' ORDER BY ml_order ASC";
    $rs_pages = $conn->query($query_rs_pages) or die('Sql error:');
    while ($row_rs_pages = $rs_pages->fetch_array()) {
        if (isset($_REQUEST["orderid" . $row_rs_pages["ml_id"] . ""])) {
            $s35 = "update tbl_merit_lists set ml_order = '" . $_REQUEST["orderid" . $row_rs_pages["ml_id"] . ""] . "' where ml_id = '" . $row_rs_pages["ml_id"] . "' ";
            $q35 = $conn->query($s35) or die($s35);
            $_SESSION['successMsg'] = 'Changings has been saved successfully !';
        }
    }
}

$pager = '&type=' . $_REQUEST['type'] . '&pager=' . $_REQUEST['pager'];
