<?if (isset($_REQUEST['formOne']) && $_REQUEST['formOne'] == 'posted') {    if ($_SESSION['admin_type'] == 'SuperAdmin') {        if ($ex = getList("SELECT * FROM tbl_siteadmin WHERE site_pswd='" . doEncode($_REQUEST['admin_opswd']) . "' ")) {            if ($_REQUEST['admin_pswd'] == $_REQUEST['admin_cpswd']) {                $sql = "UPDATE 	 tbl_siteadmin 						SET 		site_pswd     	=  '" . doEncode($_REQUEST['admin_pswd']) . "'						WHERE		site_id			=  '1' ";                $ex = exQuery($sql);                $_SESSION['successMsg'] = 'Password has been updated successfully !';            } else {                $_SESSION['errorMsg'] = 'Password and its confirmation not matched !';            }        } else {            $_SESSION['errorMsg'] = 'Invalid old password, try again !';        }    }}?><?php include_once("pages/shared/sidebar.php"); ?><div class="content-wrapper">    <section class="content-header">        <h1>Change Password</h1><?php echo getBredcrum(array('#' => 'Change Password')); ?>    </section>    <section class="content">        <div class="row">            <div class="col-md-12"><?= showMsg(); ?></div>            <div class="col-md-12">                <form action="" id="form1" method="post" class="form-horizontal">                    <input type="hidden" name="formOne" id="formOne" value="posted" />                    <div class="box box-info">                        <div class="box-body">                            <div class="col-sm-8 col-sm-offset-1">                                <div class="form-group">                                    <label for="field">Old Password</label>                                    <input type="text" name="admin_opswd" id="admin_opswd" required="required" class="form-control"/>                                </div>                                <div class="form-group">                                    <label for="field">New Password</label>                                    <input type="text" name="admin_pswd" id="admin_pswd" required="required" class="form-control"/>                                </div>                                <div class="form-group">                                    <label for="field">Confirm New Password</label>                                    <input type="text" name="admin_cpswd" id="admin_cpswd" required="required" class="form-control"/>                                </div>                                <div class="form-group">                                    <button type="submit" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Update</button>                                    &nbsp; <a href="<?= $apath; ?>" class=" btn btn-default btn-lg"> <i class="fa fa-arrow-left"></i> Cancel</a>                                </div>                            </div>                        </div>                    </div>                </form>            </div>                </div>    </section></div>