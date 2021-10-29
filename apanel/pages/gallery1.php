<?php include_once("pages/shared/sidebar.php"); ?>
<?php
if ($_REQUEST['mode'] == 'update' || $_REQUEST['mode'] == 'add') {
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Add/Update Gallery - ACLS - BLS WorkShop</h1>
            <?php echo getBredcrum(array('gallery1.htm?1' . $pager => 'Gallery - ACLS - BLS WorkShop', '#' => 'Add/Update')); ?>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12"><?= showMsg(); ?></div>
                <div class="col-md-12">
                    <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="col-sm-8 col-sm-offset-1">
                                    <!-- <div class="form-group">
                                        <label for="field">Heading</label>
                                        <textarea class="form-control" name="gal_title" id="gal_title" rows="2"><?= stripslashes($data['gal_title']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="field">Description</label>
                                        <textarea class="form-control" name="gal_desc" id="gal_desc" rows="6"><?= stripslashes($data['gal_desc']); ?></textarea>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="field"><?= $label; ?></label>
                                        <div class="" style="border: 1px solid #e7e7e7;border-radius:3px;padding:5px;">
                                            <div class="col-md-6">
                                                <label for="field">Upload Images</label>
                                                <input type="file" name="img_files[]" multiple />
                                            </div>
                                            <div class="col-md-6">
                                                <p style="padding:10px;">
                                                    <em>Best Resolution:</em> <strong>1024px x 728px</strong><br>
                                                    <em>Allowed Formats:</em> <strong>JPG, JPEG, PNG, GIF</strong>
                                                </p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit1" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Save</button>
                                        &nbsp; <a href="<?= $apath; ?>gallery1.htm" class=" btn btn-default btn-lg"> <i class="fa fa-arrow-left"></i> Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
<?
} else {
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Manage Gallery - ACLS - BLS WorkShop</h1>
            <?php echo getBredcrum(array('#' => 'Gallery - ACLS - BLS WorkShop')); ?>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12"><?= showMsg(); ?></div>
                <div class="col-xs-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">&nbsp;</h3>
                            <div class="box-tools row">
                                <div class="col-md-6 pull-right text-right">
                                    <a href="javascript:document.getElementById('updateForm').submit();" class="btn btn-primary" onclick="return confirm('Are you sure you want to update records?');">Update <i class="fa fa-arrow-up"></i></a> &nbsp;
                                    <a href="<?= $apath; ?>gallery1.htm?mode=add" id="sample_editable_1_new" class="btn btn-primary" style="margin-right:10px;">Add New <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body table-responsive">
                            <form name="updateForm" id="updateForm" action="" method="post">
                                <table width="100%" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th width="8%" class="text-center">Order No</th>
                                            <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'gal_status\']').attr('checked', this.checked);" title="Select All"> Status</th>
                                            <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'gal_delete\']').attr('checked', this.checked);" title="Select All"> Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $paging = getPaging('tbl_gallery', "WHERE gal_type='acls' ORDER BY gal_order ASC", 20, $_REQUEST['page'], '?', $_GET['pager']);
                                            $pagination = $paging[1];
                                            if ($rgal_pages = getList($paging[0])) {
                                                while ($row = fetch($rgal_pages)) {
                                                    $gal_id = $row['gal_id'];
                                                    ?>
                                                <tr class="odd gradeX">
                                                    <td><img src="<?= getImageSrc("../uploads/gallery/" . $row['gal_image']); ?>" style="max-height:80px;max-width:150px;" /></td>
                                                    <td class="text-center"><input id="orderid<?= $gal_id ?>" type="text" name="orderid<?= $gal_id ?>" value="<?= $row['gal_order'] ?>" class="form-control" size="3" /></td>
                                                    <td class="text-center"><input name="gal_status[]" id="gal_status<?= $gal_id ?>" type="checkbox" value="<?= $gal_id ?>" /> <?= getStatus($row['gal_status']); ?></td>
                                                    <td class="text-center"><input name="gal_delete[]" id="gal_delete<?= $gal_id ?>" type="checkbox" value="<?= $gal_id ?>" /></td>
                                                </tr>
                                            <?
                                                    }
                                                    ?><tr>
                                                <td colspan="10">
                                                    <div class="text-center"><?= $pagination; ?></div>
                                                </td>
                                            </tr><?
                                                        } else {
                                                            ?>
                                            <tr>
                                                <td colspan="7" align="center">No Record Found</td>
                                            </tr>
                                        <? } ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<? }
?>