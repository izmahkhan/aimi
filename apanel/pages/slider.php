<?php include_once("pages/shared/sidebar.php"); ?><?phpif ($_REQUEST['mode'] == 'update' || $_REQUEST['mode'] == 'add') {    ?>    <div class="content-wrapper">        <section class="content-header">            <h1>Add/Update Slider</h1>            <?php echo getBredcrum(array('slider.htm?1' . $pager => 'Slider', '#' => 'Add/Update')); ?>        </section>        <section class="content">            <div class="row">                <div class="col-md-12"><?= showMsg(); ?></div>                <div class="col-md-12">                    <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">                        <div class="box box-info">                            <div class="box-body">                                <div class="col-sm-8 col-sm-offset-1">                                    <div class="form-group">                                        <label for="field">Heading</label>                                        <textarea class="form-control" name="slider_title" id="slider_title" rows="2"><?= stripslashes($data['slider_title']); ?></textarea>                                    </div>                                    <div class="form-group">                                        <label for="field">Description</label>                                        <textarea class="form-control" name="slider_desc" id="slider_desc" rows="6"><?= stripslashes($data['slider_desc']); ?></textarea>                                    </div>                                    <?= formImageFile('Slider Image', 'slider_image', $data['slider_image'], '1920px x 800px', 'slider') ?>                                    <div class="form-group">                                        <label for="field">Status</label>                                        <select name="slider_status" id="slider_status" class="form-control">                                            <option value="1" <?= ($data['slider_status'] == '1' ? 'selected="selected"' : ''); ?>>Active</option>                                            <option value="0" <?= ($data['slider_status'] == '0' ? 'selected="selected"' : ''); ?>>Inactive</option>                                        </select>                                    </div>                                                          <div class="form-group">                                        <button type="submit" name="submit1" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Save</button>                                        &nbsp; <a href="<?= $apath; ?>slider.htm" class=" btn btn-default btn-lg"> <i class="fa fa-arrow-left"></i> Cancel</a>                                    </div>                                </div>                                 </div>                        </div>                    </form>                </div>                    </div>        </section>    </div>    <?} else {    ?>    <div class="content-wrapper">        <section class="content-header">            <h1>Manage Slider</h1>            <?php echo getBredcrum(array('#' => 'Slider')); ?>        </section>        <section class="content">            <div class="row">                <div class="col-md-12"><?= showMsg(); ?></div>                <div class="col-xs-12">                    <div class="box box-info">                        <div class="box-header">                            <h3 class="box-title">&nbsp;</h3>                            <div class="box-tools row">                                   <div class="col-md-6 pull-right text-right">                                          <a href="javascript:document.getElementById('updateForm').submit();" class="btn btn-primary" onclick="return confirm('Are you sure you want to update records?');">Update <i class="fa fa-arrow-up"></i></a> &nbsp;                                     <a href="<?= $apath; ?>slider.htm?mode=add" id="sample_editable_1_new" class="btn btn-primary" style="margin-right:10px;">Add New <i class="fa fa-plus"></i></a>                                </div>                            </div>                        </div>                        <div class="box-body table-responsive">                            <form name="updateForm" id="updateForm" action="" method="post">                                <table width="100%" class="table table-bordered table-hover">                                    <thead>                                        <tr>                                            <th width="15%">Banner</th>                                            <th>Title</th>                                            <th width="8%" class="text-center">Order No</th>                                            <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'slider_status\']').attr('checked', this.checked);" title="Select All"> Status</th>                                            <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'slider_delete\']').attr('checked', this.checked);" title="Select All"> Delete</th>                                            <th width="10%" class="text-center">Action</th>                                        </tr>                                    </thead>                                    <tbody>                                        <?php                                        $paging = getPaging('tbl_slider', "WHERE 1 ORDER BY slider_order ASC", 20, $_REQUEST['page'], '?', $_GET['pager']);                                        $pagination = $paging[1];                                        if ($rslider_pages = getList($paging[0])) {                                            while ($row = fetch($rslider_pages)) {                                                $slider_id = $row['slider_id'];                                                ?>                                                <tr class="odd gradeX">                                                    <td><img src="<?= getImageSrc("../uploads/slider/" . $row['slider_image']); ?>" style="max-height:80px;max-width:150px;" /></td>                                                    <td><strong><?= stripslashes($row['slider_title']); ?></strong><br/><?= stripslashes($row['slider_desc']); ?></td>                                                    <td class="text-center"><input id="orderid<?= $slider_id ?>" type="text" name="orderid<?= $slider_id ?>" value="<?= $row['slider_order'] ?>" class="form-control" size="3" /></td>                                                    <td class="text-center"><input name="slider_status[]" id="slider_status<?= $slider_id ?>" type="checkbox" value="<?= $slider_id ?>" /> <?= getStatus($row['slider_status']); ?></td>                                                    <td class="text-center"><input name="slider_delete[]" id="slider_delete<?= $slider_id ?>" type="checkbox" value="<?= $slider_id ?>" /></td>                                                    <td class="text-center">                                                        <a href="<?= $apath; ?>slider.htm?mode=update&code=<?= $row['slider_id'] ?><?= $pager; ?>" class="btn btn-primary "><i class="fa fa-pencil"></i> Edit</a>                                                    </td>                                                </tr>                                                <?                                            }                                            ?><tr><td colspan="10"><div class="text-center"><?= $pagination; ?></div></td></tr><?                                        } else {                                            ?>                                            <tr>                                                <td colspan="7" align="center">No Record Found</td>                                            </tr>                                        <? } ?>                                                            </tbody>                                </table>                            </form>                        </div>                    </div>                </div>                    </div>        </section>    </div><? }?>