<?phpif (isset($_POST['submit1'])) {    $vals = $_POST;    unset($vals['submit1']);    if ($_REQUEST['mode'] == 'add') {        global $conn;        $s1_max_orderid = "select max(slider_order) as orderid from tbl_slider where 1 ";        $q1_max_orderid = $conn->query($s1_max_orderid) or die($s1_max_orderid);        $r1_max_orderid = $q1_max_orderid->fetch_array();        $vals['slider_order'] = intval($r1_max_orderid["orderid"]) + 1;        if ($img_rs = uploadImageThumb($_FILES["slider_image"], "../uploads/slider/", 1920, 1920)) {            $vals['slider_image'] = $img_rs[0];            $vals['slider_thumb'] = $img_rs[1];        }        saveRecord("tbl_slider", $vals);        $_SESSION['successMsg'] = 'Slider has been saved successfully !';    } else if ($_REQUEST['mode'] == 'update') {        if ($img_rs = uploadImageThumb($_FILES["slider_image"], "../uploads/slider/", 1920, 1920)) {            $vals['slider_image'] = $img_rs[0];            $vals['slider_thumb'] = $img_rs[1];        }        updateRecord("tbl_slider", $vals, " `slider_id` = '" . $_REQUEST["code"] . "' ");        $_SESSION['successMsg'] = 'Slider has been updated successfully !';    }}if (!empty($_REQUEST['code']))    $data = getTable('tbl_slider', "slider_id = '" . $_REQUEST["code"] . "'");if (isset($_POST['slider_delete']))    deleteRows("tbl_slider", "slider_id", $_POST['slider_delete']);if (isset($_POST['slider_status']))    updateRows("tbl_slider", "slider_status", "slider_id", $_POST['slider_status']);if (isset($_POST)) {    global $conn;    $query_rs_pages = "SELECT * FROM tbl_slider WHERE 1 ORDER BY slider_order ASC";    $rs_pages = $conn->query($query_rs_pages) or die(mysqli_error());    while ($row_rs_pages = $rs_pages->fetch_array()) {        if (isset($_REQUEST["orderid" . $row_rs_pages["slider_id"] . ""])) {            $s35 = "update tbl_slider set slider_order = '" . $_REQUEST["orderid" . $row_rs_pages["slider_id"] . ""] . "' where slider_id = '" . $row_rs_pages["slider_id"] . "' ";            $q35 = $conn->query($s35) or die($s35);            $_SESSION['successMsg'] = 'Changings has been saved successfully !';        }    }}$pager = '&pager=' . $_REQUEST['pager'];?>