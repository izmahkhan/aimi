<?php$section_type = 'home_secs';$section = 'Home Sections';if (isset($_POST['submit1'])) {    $vals = $_POST;    unset($vals['submit1']);    if ($img_rs = uploadImage($_FILES["sec_banner"], "../uploads/media/", 650)) {        $vals['sec_banner'] = $img_rs;    }    $exist = getField('tbl_texts', " `txt_type` = '$section_type'  ", 'txt_id');    if (!isset($exist) || empty($exist)) {        saveData('tbl_texts', array('txt_type' => $section_type));    }    $new_vals['txt_data'] = serialize($vals);    updateRecord("tbl_texts", $new_vals, " `txt_type` = '$section_type' ");    $_SESSION['successMsg'] = 'Changing has been updated successfully !';}$rs = getTable('tbl_texts', " `txt_type` = '$section_type' ");$data = unserialize(stripslashes($rs['txt_data']));?><?php include_once("pages/shared/sidebar.php");require_once("lib/fckeditor/fckeditor.php");?><div class="content-wrapper">    <section class="content-header">        <h1><?= $section; ?></h1>        <?php echo getBredcrum(array('#' => $section)); ?>    </section>    <section class="content">        <div class="row">            <div class="col-md-12"><?= showMsg(); ?></div>            <div class="col-md-12">                <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">                    <div class="box box-info">                        <div class="box-body">                            <div class="col-md-12">                             <div class="col-md-6">                                <div class="col-md-12">                                    <div class="row"><h2>Items over Slider</h2><hr /></div>                                    <?= formText('First Item Title', 'title1', $data['title1']) ?>                                    <?= formText('First Item Font(fa-home.etc)', 'font1', $data['font1']) ?>                                    <?= formTextArea('First Item Description', 'desc1', $data['desc1'], 3) ?>                                    <hr />                                    <?= formText('Second Item Title', 'title2', $data['title2']) ?>                                    <?= formText('Second Item Font(fa-home.etc)', 'font2', $data['font2']) ?>                                    <?= formTextArea('Second Item Description', 'desc2', $data['desc2'], 3) ?>                                    <hr />                                    <?= formText('Third Item Title', 'title3', $data['title3']) ?>                                    <?= formText('Third Item Font(fa-home.etc)', 'font3', $data['font3']) ?>                                    <?= formTextArea('Third Item Description', 'desc3', $data['desc3'], 3) ?>                                    <hr />                                </div>                            </div>                            <div class="col-md-6">                                <div class="col-md-12">                                    <div class="row"><h3>After Slider Section</h3><hr /></div>                                    <?= formText('Section Title', 'title', $data['title']) ?>                                    <?= formTextArea('First Item Description', 'desc', $data['desc'], 5) ?>                                    <?= formImageFile('Section Banner', 'sec_banner', $data['sec_banner'], '', 'media') ?>                                </div>                                <div class="col-md-12">                                    <div class="row"><h3>Middle Counter Section</h3><hr /></div>                                    <?= formText('First Item Name', 'item_name1', $data['item_name1']) ?>                                    <?= formText('First Item Number', 'item_num1', $data['item_num1']) ?>                                    <hr />                                    <?= formText('First Item Name', 'item_name2', $data['item_name2']) ?>                                    <?= formText('First Item Number', 'item_num2', $data['item_num2']) ?>                                    <hr />                                    <?= formText('First Item Name', 'item_name3', $data['item_name3']) ?>                                    <?= formText('First Item Number', 'item_num3', $data['item_num3']) ?>                                    <hr />                                    <?= formText('First Item Name', 'item_name4', $data['item_name4']) ?>                                    <?= formText('First Item Number', 'item_num4', $data['item_num4']) ?>                                    <hr />                                </div>                            </div>                        </div>                        <div class="col-md-12 text-center">                            <div class="form-group">                                <button type="submit" name="submit1" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Update</button>                            </div>                        </div>                    </div>                </div>            </div>        </form>    </div></div></section></div>