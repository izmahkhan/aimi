<style>
.contact .form input {
    width: 100%;
    height: 55px;
    padding: 0 25px;
    border: 1px solid #362E65;
    border-radius: 5px;
    margin-bottom: 30px;
    background: #120D2E;
    color: #fff;
    font-size: 14px;
}

.default-big-btn {
    margin-bottom: 3%;
    background: ;
    color: #ffffff;
    padding: 15px 0;
    background: #E7B03C;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 700;
    display: inline-block;
    border: ;
    width: 162px;
    text-align: center;
    -webkit-transition: all 0.5s ease-out;
    -moz-transition: all 0.5s ease-out;
    -ms-transition: all 0.5s ease-out;
    -o-transition: all 0.5s ease-out;
    transition: all 0.5s ease-out;

    border: 1px solid;
    border-radius: 5px;
    margin-top: -7px;
}

.contact .form td {
    width: 100%;
    height: 55px;
    padding: 0 25px;
    border: 1px solid #362E65;
    border-radius: 5px;
    margin-bottom: 30px;
    background: #120D2E;
    color: #fff;
    font-size: 14px;
}

.contact-form .table tr {
    margin-bottom: 10% !important;
}
</style>

<div class="breadcrumb contact-breadcrumb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="part-txt">
                    <h1>ABBOTTABAD INTERNATIONAL MEDICAL INSTITUTE</h1>
                    <h4 class="text-white">Phone No. <?=$site_phone;?></h4><br>
                    <?php if (!isset($rs['ja_id']) || empty($rs['ja_id'])) { ?>
                    <h4 style="text-decoration: underline;" class="text-white">Admin Staff</h4>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact-us-page1-area" style="background: #ffffff;">
    <?php if (!isset($rs['ja_id']) || empty($rs['ja_id'])) { ?>
    <div class="container"
        style="background-image:url('<?= $path.'assets/img/water7.png'; ?>');background-position: center center;background-size: 150%;background-repeat: no-repeat;">
        <?php } else { ?>
        <div class="container" style="min-height:400px;">
            <?php } ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row contact">
                        <div class="contact-form1 contact-form form">
                            <?php
                                if (isset($rs['ja_id']) && !empty($rs['ja_id'])) {
                                    ?>
                            <table class="table table-bordered mb-40" width="100%">
                                <tr>
                                    <td colspan="3">
                                        <div class="form-group mb-3 text-center">
                                            Your job application has been submitted successfully!<br><br>
                                            <a href="<?= $path.('download_application_form/' . $rs['ja_id']); ?>"
                                                style="width:300px" class="default-big-btn">Download
                                                Submitted Job
                                                Application</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <?php
                                } else {
                                    ?>
                            <table class="table table-bordered" width="100%">
                                <tr>
                                    <td colspan="3">
                                        <div class="form-group mb-none text-center">
                                            <a href="<?= $path.('download_application_form'); ?>" style="width:250px"
                                                class="default-big-btn">Download
                                                Job Application Form</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <form action="" class="contact-form" enctype="multipart/form-data" method="post"
                                accept-charset="utf-8">
                                <input type="hidden" name="job_form" value="posted">
                                <table class="table table-bordered" width="100%">
                                    <tr>
                                        <td width="80%" colspan="2">
                                            <div class="form-group mb-none"><label>Application for the post of:</label>
                                                <input type="text" name="field_1" value="<?= $rs['field_1']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                            </div>
                                        </td>
                                        <td width="20%" rowspan="2" style="text-align: center;">
                                            Please Paste<br> Passport Size<br> Photograph<br><br>
                                            <input type="file" name="img_1" class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="form-group mb-none"><label>Name:</label>
                                                <input type="text" name="field_0" value="<?= $rs['field_0']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="form-group mb-none"><label>Phone #:</label>
                                                <input type="text" name="field_2" value="<?= $rs['field_2']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="form-group mb-none"><label>Fax #:</label>
                                                <input type="text" name="field_3" value="<?= $rs['field_3']; ?>"
                                                    placeholder="" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="form-group mb-none"><label>Address:</label>
                                                <input type="text" name="field_4" value="<?= $rs['field_4']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="form-group mb-none"><label>Present Position held: (last post
                                                    held in case of retired candidates)</label>
                                                <input type="text" name="field_5" value="<?= $rs['field_5']; ?>"
                                                    placeholder="" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="form-group mb-none"><label>Exact Salary / scale & other
                                                    emoluments: </label>
                                                <input type="text" name="field_6" value="<?= $rs['field_6']; ?>"
                                                    placeholder="" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="form-group mb-none"><label>The reason for your leaving the
                                                    present / last job: </label>
                                                <input type="text" name="field_7" value="<?= $rs['field_7']; ?>"
                                                    placeholder="" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group mb-none"><label>Domicile:</label>
                                                <input type="text" name="field_8" value="<?= $rs['field_8']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group mb-none"><label>Place of Birth:</label>
                                                <input type="text" name="field_9" value="<?= $rs['field_9']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group mb-none"><label>NIC No:</label>
                                                <input type="text" name="field_10" value="<?= $rs['field_10']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group mb-none"><label>Father’s or Husband Name:</label>
                                                <input type="text" name="field_11" value="<?= $rs['field_11']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="form-group mb-none"><label>Father’s Husband’s occupation &
                                                    present position with address:</label>
                                                <input type="text" name="field_12" value="<?= $rs['field_12']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="form-group mb-none"><label>Details of family members (living
                                                    with you) their name & ages:</label>
                                                <input type="text" name="field_13" value="<?= $rs['field_13']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                                <input type="text" name="field_14" value="<?= $rs['field_14']; ?>"
                                                    placeholder="" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="form-group mb-none"><label>QUALIFICATIONS:</label></div>
                                            <table class="table table-bordered" width="100%" style="background: none;">
                                                <tr>
                                                    <td>
                                                        <div class="form-group mb-none"><label>&nbsp;</label></div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none"><label>Academic:</label></div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none"><label>Examination:</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none"><label>Marks:</label></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="text-align:center;font-weight: bold;vertical-align: middle;">
                                                        Primary</td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_151"
                                                                value="<?= $rs['field_151']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_152"
                                                                value="<?= $rs['field_152']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_153"
                                                                value="<?= $rs['field_153']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="text-align:center;font-weight: bold;vertical-align: middle;">
                                                        Higher School</td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_161"
                                                                value="<?= $rs['field_161']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_162"
                                                                value="<?= $rs['field_162']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_163"
                                                                value="<?= $rs['field_163']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="text-align:center;font-weight: bold;vertical-align: middle;">
                                                        Higher Secondary</td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_171"
                                                                value="<?= $rs['field_171']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_172"
                                                                value="<?= $rs['field_172']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_173"
                                                                value="<?= $rs['field_173']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="text-align:center;font-weight: bold;vertical-align: middle;">
                                                        B.Sc / B.A</td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_181"
                                                                value="<?= $rs['field_181']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_182"
                                                                value="<?= $rs['field_182']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_183"
                                                                value="<?= $rs['field_183']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="text-align:center;font-weight: bold;vertical-align: middle;">
                                                        M.Sc / M.A / Ph.D</td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_191"
                                                                value="<?= $rs['field_191']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_192"
                                                                value="<?= $rs['field_192']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_193"
                                                                value="<?= $rs['field_193']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="text-align:center;font-weight: bold;vertical-align: middle;">
                                                        Other</td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_201"
                                                                value="<?= $rs['field_201']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_202"
                                                                value="<?= $rs['field_202']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-none">
                                                            <input type="text" name="field_203"
                                                                value="<?= $rs['field_203']; ?>" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="form-group mb-none"><label>Details of experience / Employment
                                                    records:</label>
                                                <input type="text" name="field_20" value="<?= $rs['field_20']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                                <input type="text" name="field_21" value="<?= $rs['field_21']; ?>"
                                                    placeholder="" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group mb-none"><label>Your Hobbies:</label>
                                                <input type="text" name="field_22" value="<?= $rs['field_22']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="form-group mb-none"><label>Any sport of extra curriculum
                                                    activities:</label>
                                                <input type="text" name="field_23" value="<?= $rs['field_23']; ?>"
                                                    placeholder="" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group mb-none"><label>Any extra ordinary
                                                    achievement:</label>
                                                <input type="text" name="field_24" value="<?= $rs['field_24']; ?>"
                                                    placeholder="" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group mb-none"><label>How much salary and other emoluments
                                                    do you expect?:</label>
                                                <input type="text" name="field_25" value="<?= $rs['field_25']; ?>"
                                                    placeholder="Required" class="form-control" required="">
                                            </div>
                                        </td>
                                        <td width='30%'>
                                            <div class="form-group mb-none"><label>When can you join duty :</label>
                                                <input type="text" name="field_26" value="<?= $rs['field_26']; ?>"
                                                    placeholder="Required" class="form-control" required="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="form-group mb-none"><label>Name and address of two references
                                                    who know you well:</label>
                                                <input type="text" name="field_27" value="<?= $rs['field_27']; ?>"
                                                    placeholder="Required" class="form-control" required>
                                                <input type="text" name="field_28" value="<?= $rs['field_28']; ?>"
                                                    placeholder="" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="form-group mb-none text-center mt-2">
                                                <button type="submit" class="default-big-btn"
                                                    style="width:250px;">Submit Job Application</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php @include_once ('inc_pages/shared/footer.php'); ?>