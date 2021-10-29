<?php include_once("pages/shared/sidebar.php"); ?><?phpif ($_REQUEST['mode'] == 'update' || $_REQUEST['mode'] == 'add') {    require_once("lib/fckeditor/fckeditor.php");    ?>    <div class="content-wrapper">        <section class="content-header">            <h1>Add/Update <?= $list_title; ?></h1>            <?php echo getBredcrum(array($list_page . '?1' . $pager => $list_title, '#' => 'Add/Update')); ?>        </section>        <section class="content">            <div class="row">                <div class="col-md-12"><?= showMsg(); ?></div>                <div class="col-md-12">                    <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">                        <div class="box box-info">                            <div class="box-body">                                <div class="col-sm-8 col-sm-offset-1">                                    <input type="hidden" name="list_desc" id="list_desc" value="<?= $_REQUEST['type']; ?>">                                    <?= formText('Course Title', 'list_title', $data['list_title']) ?>                                    <?= formTextArea('Course Text', 'list_desc', $data['list_desc']) ?>                                    <?= formText('Course Link', 'list_link', $data['list_link']) ?><!--                                    <div class="form-group">                                        <label for="field">news Detail</label>                                        <?php                                        $oFCKeditor = new FCKeditor('list_detail');                                        $oFCKeditor->BasePath = "lib/fckeditor/";                                        $oFCKeditor->Height = 500;                                        $oFCKeditor->Value = stripslashes($data['list_detail']);                                        $oFCKeditor->Create();                                        ?>                                    </div>-->                                    <?= formImageFile('Featured Course Image', 'list_image', $data['list_image'], ' 500px x 360px','courses') ?>                                    <div class="form-group">                                        <label for="field">Status</label>                                        <select name="list_status" id="list_status" class="form-control">                                            <option value="1" <?= ($data['list_status'] == '1' ? 'selected="selected"' : ''); ?>>Active</option>                                            <option value="0" <?= ($data['list_status'] == '0' ? 'selected="selected"' : ''); ?>>Inactive</option>                                        </select>                                    </div>                                                          <div class="form-group">                                        <button type="submit" name="submit1" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Save</button>                                        &nbsp; <a href="<?= $apath . $list_page; ?>?1<?= $pager; ?>" class=" btn btn-default btn-lg"> <i class="fa fa-arrow-left"></i> Cancel</a>                                    </div>                                </div>                                 </div>                        </div>                    </form>                </div>                    </div>        </section>    </div>    <?php} else {    ?>    <div class="content-wrapper">        <section class="content-header">            <h1>Manage <?= $list_title; ?></h1>            <?php echo getBredcrum(array('#' => $list_title)); ?>        </section>        <section class="content">            <div class="row">                <div class="col-md-12"><?= showMsg(); ?></div>                <div class="col-xs-12">                    <div class="box box-info">                        <div class="box-header">                            <h3 class="box-title">&nbsp;</h3>                            <div class="box-tools row">                                   <div class="col-md-6 pull-right text-right">                                          <a href="javascript:document.getElementById('updateForm').submit();" class="btn btn-primary" onclick="return confirm('Are you sure you want to update records?');">Update <i class="fa fa-arrow-up"></i></a> &nbsp;                                     <a href="<?= $apath . $list_page; ?>?mode=add<?= $pager; ?>" id="sample_editable_1_new" class="btn btn-primary" style="margin-right:10px;">Add New <i class="fa fa-plus"></i></a>                                </div>                            </div>                        </div>                        <div class="box-body table-responsive">                            <form name="updateForm" id="updateForm" action="" method="post">                                <table width="100%" class="table table-bordered table-hover">                                    <thead>                                        <tr>                                            <th width="8%" >Image</th>                                            <th>Title</th>                                            <th width="8%" class="text-center">Order No</th>                                            <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'list_label\']').attr('checked', this.checked);" title="Select All"> Featured</th>                                            <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'list_status\']').attr('checked', this.checked);" title="Select All"> Status</th>                                            <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'list_delete\']').attr('checked', this.checked);" title="Select All"> Delete</th>                                            <th width="15%" class="text-center">Action</th>                                        </tr>                                    </thead>                                    <tbody>                                        <?php                                        $paging = getPaging('tbl_listings', "WHERE list_type='$list_type' ORDER BY list_order ASC", 20, $_REQUEST['page'], '?', $_GET['pager']);                                        $pagination = $paging[1];                                        if ($rlist_pages = getList($paging[0])) {                                            while ($row = fetch($rlist_pages)) {                                                $list_id = $row['list_id'];                                                ?>                                                <tr class="odd gradeX">                                                    <td><img src="<?= getImageSrc("../uploads/courses/" . $row['list_image']); ?>" style="max-height:50px;max-width:150px;" /></td>                                                    <td><strong><?= stripslashes($row['list_title']); ?></strong><br/><?= stripslashes($row['list_desc']); ?></td>                                                    <td class="text-center"><input id="orderid<?= $list_id ?>" type="text" name="orderid<?= $list_id ?>" value="<?= $row['list_order'] ?>" class="form-control" size="3" /></td>                                                    <td class="text-center"><input name="list_label[]" id="list_label<?= $list_id ?>" type="checkbox" value="<?= $list_id ?>" /> <?= getYesNoStatus($row['list_label']); ?></td>                                                    <td class="text-center"><input name="list_status[]" id="list_status<?= $list_id ?>" type="checkbox" value="<?= $list_id ?>" /> <?= getStatus($row['list_status']); ?></td>                                                    <td class="text-center"><input name="list_delete[]" id="list_delete<?= $list_id ?>" type="checkbox" value="<?= $list_id ?>" /></td>                                                    <td class="text-center">                                                        <a href="<?= $apath . $list_page; ?>?mode=update&code=<?= $row['list_id'] ?><?= $pager; ?>" class="btn btn-primary "><i class="fa fa-pencil"></i> Edit</a>                                                    </td>                                                </tr>                                                <?                                            }                                            ?><tr><td colspan="10"><div class="text-center"><?= $pagination; ?></div></td></tr><?                                        } else {                                            ?>                                            <tr>                                                <td colspan="7" align="center">No Record Found</td>                                            </tr>                                        <? } ?>                                                            </tbody>                                </table>                            </form>                        </div>                    </div>                </div>                    </div>        </section>    </div><? }?>