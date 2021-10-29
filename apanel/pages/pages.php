<?php include_once("pages/shared/sidebar.php"); ?>
<?php
if ($_REQUEST['mode'] == 'update' || $_REQUEST['mode'] == 'add') {
    require_once("lib/fckeditor/fckeditor.php");
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Add/Update Page</h1>
            <?php echo getBredcrum(array('pages.htm?1' . $pager => 'Pages', '#' => 'Add/Update')); ?>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12"><?= showMsg(); ?></div>
                <div class="col-md-12">
                    <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="col-sm-8 col-sm-offset-1">
                                    <? if (!empty($_REQUEST['code'])) { ?>
                                        <div class="form-group">
                                            <label>Page Name/Slug</label>
                                            <input type="text" name="page_name" id="page_name" value="<?php echo $data['page_name']; ?>" required="required" class="form-control" />
                                        </div>
                                    <? } ?>
                                    <div class="form-group">
                                        <label for="field">Page Title</label>
                                        <input type="text" name="page_title" id="page_title" value="<?= stripslashes($data['page_title']); ?>" required="required" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="field">Page Meta Title</label>
                                        <input type="text" name="page_meta_title" id="page_meta_title" value="<?= stripslashes($data['page_meta_title']); ?>" required="required" class="form-control" />
                                    </div>
                                    <?= formText('Custom Link', 'page_link', $data['page_link']); ?>
                                    <div class="form-group">
                                        <label for="field">Show in Menu</label>
                                        <select name="page_menu" id="page_menu" class="form-control">
                                            <option value="0" <?= ($data['page_menu'] == '0' ? 'selected="selected"' : ''); ?>>No</option>
                                            <option value="1" <?= ($data['page_menu'] == '1' ? 'selected="selected"' : ''); ?>>Yes</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="page_parent_box" style="display:<?= ($data['page_menu'] == '1' ? '' : 'none'); ?>">
                                        <label for="field">Parent Page</label>
                                        <select name="page_parent" id="page_parent" class="form-control">
                                            <option value="0">No Parent</option>
                                            <?php
                                                $res = getMenuPages();
                                                if (count($res) > 0) {
                                                    foreach ($res as $rs) {
                                                        if ($rs['page_id'] != $_REQUEST['code']) {
                                                            ?><option value="<?= $rs['page_id']; ?>" <?= ($data['page_parent'] == $rs['page_id'] ? 'selected="selected"' : ''); ?>><?= str($rs['page_title']); ?></option><?
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="field">Page Detail</label>
                                        <!-- <textarea cols="80" id="ckeditors1" name="page_detail" rows="15"><?= $data['page_detail'] ?></textarea> -->
                                        <?php
                                            $oFCKeditor = new FCKeditor('page_detail');
                                            $oFCKeditor->BasePath = "lib/fckeditor/";
                                            $oFCKeditor->Height = 500;
                                            $oFCKeditor->Value = stripslashes($data['page_detail']);
                                            $oFCKeditor->Create();
                                            ?>
                                    </div>
                                    <hr />
                                    <?= formText('File 1 Name', 'page_file_name', $data['page_file_name']) ?>
                                    <?= formDownloadFile(' ', 'page_file', $data['page_file']) ?>
                                    <?= formText('File 2 Name', 'page_file2_name', $data['page_file2_name']) ?>
                                    <?= formDownloadFile(' ', 'page_file2', $data['page_file2']) ?>
                                    <?= formText('File 3 Name', 'page_file3_name', $data['page_file3_name']) ?>
                                    <?= formDownloadFile(' ', 'page_file3', $data['page_file3']) ?>
                                    <?= formText('File 4 Name', 'page_file4_name', $data['page_file4_name']) ?>
                                    <?= formDownloadFile(' ', 'page_file4', $data['page_file4']) ?>
                                    <?= formText('File 5 Name', 'page_file5_name', $data['page_file5_name']) ?>
                                    <?= formDownloadFile(' ', 'page_file5', $data['page_file5']) ?>
                                    <?= formText('File 6 Name', 'page_file6_name', $data['page_file6_name']) ?>
                                    <?= formDownloadFile(' ', 'page_file6', $data['page_file6']) ?>
                                    <hr />
                                    <?= formImageFile('Banner Image', 'page_image', $data['page_image'], '1320px x 260px', 'pages') ?>
                                    <div class="row">
                                        <h3>Meta Tags</h3>
                                        <hr />
                                    </div>
                                    <div class="form-group">
                                        <label for="field">Meta Description</label>
                                        <textarea class="form-control" name="page_meta_desc" id="page_meta_desc" rows="2"><?= str($data['page_meta_desc']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="field">Meta Keywords</label>
                                        <textarea class="form-control" name="page_meta_keywords" id="page_meta_keywords" rows="2"><?= str($data['page_meta_keywords']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit1" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Save</button>
                                        &nbsp; <a href="<?= $apath; ?>pages.htm" class=" btn btn-default btn-lg"> <i class="fa fa-arrow-left"></i> Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
<?php
} else {
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Manage Pages</h1>
            <?php echo getBredcrum(array('#' => 'Manage Pages')); ?>
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
                                    <a href="<?= $apath; ?>pages.htm?mode=add" id="sample_editable_1_new" class="btn btn-primary" style="margin-right:20px;">Add New <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="box-body table-responsive datatable">
                            <form name="updateForm" id="updateForm" action="" method="post">
                                <table width="100%" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="20%">Page Name/Slug</th>
                                            <th>Page Title</th>
                                            <th width="15%">Parent Page</th>
                                            <th width="8%" class="text-center">Order No</th>
                                            <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'project_label\']').attr('checked', this.checked);" title="Select All"> Featured</th>
                                            <th width="10%" class="text-center">Status</th>
                                            <th width="18%" class="text-center">Action</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $srNo = "";
                                            $paging = getPaging('tbl_pages', "WHERE 1 ORDER BY page_order ASC", 20, $_REQUEST['page'], '?', $_GET['pager']);
                                            $pagination = $paging[1];
                                            if ($rf_pages = getList($paging[0])) {
                                                while ($row = fetch($rf_pages)) {
                                                    $page_id = $row['page_id'];
                                                    $SrNo++;
                                                    ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $SrNo ?></td>
                                                    <td><?= stripslashes($row['page_name']); ?></td>
                                                    <td><?= stripslashes($row['page_title']); ?></td>
                                                    <td><?= getMenuParentName($row['page_parent']); ?></td>
                                                    <td class="text-center"><input id="orderid<?= $page_id ?>" type="text" name="orderid<?= $page_id ?>" value="<?= $row['page_order'] ?>" class="form-control" size="3" /></td>
                                                    <td class="text-center"><input name="page_label[]" id="page_label<?= $page_id ?>" type="checkbox" value="<?= $page_id ?>" /> <?= getYesNoStatus($row['page_label']); ?></td>
                                                    <td class="text-center"><input name="page_status[]" id="page_status<?= $ij ?>" type="checkbox" value="<?= $page_id ?>" /> <?= getStatus($row['page_status']); ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= $apath; ?>pages.htm?mode=update&code=<?= $row['page_id'] ?><?= $pager; ?>" class="btn btn-primary "><i class="fa fa-pencil"></i> Edit</a> &nbsp;
                                                        <a href="<?= $apath; ?>pages.htm?mode=delete&code=<?= $row['page_id'] ?><?= $pager; ?>" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this page?');"><i class="fa fa-minus-circle"></i> Delete</a>
                                                    </td>
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
<? } ?>
<script>
    $(document).ready(function() {
        $(document).on('change', '#page_menu', function() {
            var $this = $(this).val();
            if ($this == '1') {
                $('#page_parent_box').show();
            } else {
                $('#page_parent_box').hide();
            }
        });

        $(document).on('click', '.fileDeleteBtn', function() {
            var $this = $(this);
            var $name = $(this).data('file-name');
            $this.parent().append('<input type="hidden" name="' + $name + '" value="" >');
            $this.parents().children('.fileDownloadBtn').hide();
            $this.hide();
        });
    });
</script>
<script src="<?= $apath ?>lib/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditors1');
</script>