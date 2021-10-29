<?php include_once("pages/shared/sidebar.php"); ?>
<?php
if ($_REQUEST['mode'] == 'update' || $_REQUEST['mode'] == 'add') {
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Add/Update Merit Lists <?=strtoupper($_REQUEST['type']);?></h1>
            <?php echo getBredcrum(array('merit_lists.htm?1' . $pager => 'Merit Lists '.strtoupper($_REQUEST['type']), '#' => 'Add/Update')); ?>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12"><?= showMsg(); ?></div>
                <div class="col-md-12">
                    <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="col-sm-8 col-sm-offset-1">
                                    <?= formText('Title', 'ml_title', $data['ml_title']) ?>
                                    <?= formText('Slug/Url', 'ml_slug', $data['ml_slug']) ?> 
                                    <?= formText('List Heading', 'ml_subtitle', $data['ml_subtitle']) ?>                                   
                                    <div class="form-group">
                                        <label for="field">Merit List</label>
                                        <textarea class="form-control" name="ml_detail" id="ml_detail" rows="15"><?= stripslashes($data['ml_detail']); ?></textarea>
                                    </div>                               
                                    <div class="form-group">
                                        <label for="field">Information Green</label>
                                        <textarea class="form-control" name="ml_info_green" id="ml_info_green" rows="3"><?= stripslashes($data['ml_info_green']); ?></textarea>
                                    </div>      
                                    <?= formText('Informatino Red', 'ml_info_red', $data['ml_info_red']) ?>
                                    <div class="form-group">
                                        <label for="field">Status</label>
                                        <select name="ml_status" id="ml_status" class="form-control">
                                            <option value="1" <?= ($data['ml_status'] == '1' ? 'selected="selected"' : ''); ?>>Active</option>
                                            <option value="0" <?= ($data['ml_status'] == '0' ? 'selected="selected"' : ''); ?>>Inactive</option>
                                        </select>
                                    </div>                      
                                    <div class="form-group">
                                        <button type="submit" name="submit1" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Save</button>
                                        &nbsp; <a href="<?= $apath; ?>merit_lists.htm?1<?=$pager?>" class=" btn btn-default btn-lg"> <i class="fa fa-arrow-left"></i> Cancel</a>
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
            <h1>Manage Merit Lists <?=strtoupper($_REQUEST['type']);?></h1>
            <?php echo getBredcrum(array('#' => 'Merit Lists '.strtoupper($_REQUEST['type']))); ?>
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
                                    <a href="<?= $apath; ?>merit_lists.htm?mode=add<?=$pager;?>" id="sample_editable_1_new" class="btn btn-primary" style="margin-right:10px;">Add New <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body table-responsive">
                            <form name="updateForm" id="updateForm" action="" method="post">
                                <table width="100%" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th width="8%" class="text-center">Order No</th>
                                            <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'ml_status\']').attr('checked', this.checked);" title="Select All"> Status</th>
                                            <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'ml_delete\']').attr('checked', this.checked);" title="Select All"> Delete</th>
                                            <th width="10%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $paging = getPaging('tbl_merit_lists', "WHERE ml_type='".$_REQUEST['type']."' ORDER BY ml_order ASC", 20, $_REQUEST['page'], '?1'.$pager, $_GET['pager']);
                                        $pagination = $paging[1];
                                        if ($rml_pages = getList($paging[0])) {
                                            while ($row = fetch($rml_pages)) {
                                                $ml_id = $row['ml_id'];
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?= stripslashes($row['ml_title']); ?></td>
                                                    <td class="text-center"><input id="orderid<?= $ml_id ?>" type="text" name="orderid<?= $ml_id ?>" value="<?= $row['ml_order'] ?>" class="form-control" size="3" /></td>
                                                    <td class="text-center"><input name="ml_status[]" id="ml_status<?= $ml_id ?>" type="checkbox" value="<?= $ml_id ?>" /> <?= getStatus($row['ml_status']); ?></td>
                                                    <td class="text-center"><input name="ml_delete[]" id="ml_delete<?= $ml_id ?>" type="checkbox" value="<?= $ml_id ?>" /></td>
                                                    <td class="text-center">
                                                        <a href="<?= $apath; ?>merit_lists.htm?mode=update&code=<?= $row['ml_id'] ?><?= $pager; ?>" class="btn btn-primary "><i class="fa fa-pencil"></i> Edit</a>
                                                    </td>
                                                </tr>
                                                <?
                                            }
                                            ?><tr><td colspan="10"><div class="text-center"><?= $pagination; ?></div></td></tr><?
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
<?php }
?>