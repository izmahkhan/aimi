<?phpif (isset($_POST['formOne'])) {    $vals = $_POST;    unset($vals['formOne']);    $new_vals['site_contact_data'] = serialize($vals);    updateRecord("tbl_siteadmin", $new_vals, " `site_id`= '1' ");    $_SESSION['successMsg'] = 'Changing has been updated successfully !';}$rs = getField("tbl_siteadmin", " `site_id`= '1' ", "site_contact_data");$data = unserialize(stripslashes($rs));?><?php include_once("pages/shared/sidebar.php"); ?><div class="content-wrapper">    <section class="content-header">        <h1>Site Settings</h1>        <?php echo getBredcrum(array('#' => 'Site Settings')); ?>    </section>    <section class="content">        <div class="row">            <div class="col-md-12"><?= showMsg(); ?></div>            <div class="col-md-12">                <form action="" id="form1" method="post" class="form-horizontal">                    <input type="hidden" name="formOne" id="formOne" value="posted" />                    <div class="box box-info">                        <div class="box-body">                            <div class="col-md-12">                                <div class="col-md-12">                                    <div class="col-md-6">                                        <div class="col-md-12">                                            <div class="row"><h2>Contact Information</h2><hr /></div>                                            <?= formTextIcon('Email', 'site_email', $data['site_email'], 'envelope') ?>                                            <?= formTextIcon('Phone', 'site_phone', $data['site_phone'], 'phone') ?>                                            <?= formTextIcon('Fax', 'site_fax', $data['site_fax'], 'fax') ?>                                            <?= formTextIcon('Address', 'site_address', $data['site_address'], 'map-marker') ?>                                            <?= formTextIcon('Website', 'site_website', $data['site_website'], 'globe') ?>                                        </div>                                    </div>                                    <div class="col-md-6">                                        <div class="col-md-12">                                            <div class="row"><h3>Enquiry Email's</h3><hr /></div>                                            <?= formTextIcon('Contact Form To', 'site_contact_email', $data['site_contact_email'], 'envelope') ?>                                            <?= formTextArea('Auto Response Message', 'site_contact_auto_reply', $data['site_contact_auto_reply'], 4) ?>                                        </div>                                              <div class="col-md-12">                                                                              <?= formTextArea('Map Embed Code', 'site_contact_map', $data['site_contact_map'], 6) ?>                                        </div>                                    </div>                                </div>                                <hr>                                <div class="col-md-12">                                    <div class="col-md-12 text-center">                                        <div class="form-group">                                            <button type="submit" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Update</button>                                            &nbsp; <a href="<?= $apath; ?>" class=" btn btn-default btn-lg"> <i class="fa fa-arrow-left"></i> Cancel</a>                                        </div>                                    </div>                                </div>                                <div class="clearfix"></div>                            </div>                        </div>                    </div>                </form>            </div>        </div>    </section></div>