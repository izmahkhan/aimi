<?php

$rs = array();
if (isset($_POST['job_form']) && $_POST['job_form'] == 'posted') {
    $post = $_POST;
//    $rs['ja_id'] = '1';

    if ($img_rs = uploadFile($_FILES["img_1"], "./uploads/job_appliations/")) {
        $post['image_name'] = $img_rs;
    }

    $ja_data = serialize($post);
    saveRecord('job_applications', array('ja_data' => $ja_data));
    $rs['ja_id'] = $conn->insert_id;
}
?>