<?php
// error_reporting(E_ALL);
$ja_id = intval($_REQUEST['ja_id']);
$isView = 'download';

$file_name = 'job_application_form.pdf';

if ($ex = getList("SELECT * FROM job_applications WHERE ja_id='$ja_id' ")) {
    $row = fetch_assoc($ex);
    $file_name = date('Y_m_d_His') . '_' . $ja_id . '.pdf';
    $rs = unserialize($row['ja_data']);
}

$image_name = 'assets/img/no_pic.png';
if (isset($rs['image_name']) && !empty($rs['image_name'])) {
    $image_name = "uploads/job_appliations/" . $rs['image_name'];
}

$out = '
<div class="container" style="background-image:url(\'' . $path . 'assets/img/water7.png\');background-position: center center;background-size: 150%;background-repeat: no-repeat;">
    <div class="row">
        <div class="row">
            <h2 style="text-align:center;">ABBOTTABAD INTERNATIONAL MEDICAL INSTITUTE</h2>
            <h4 style="text-align:center;">Phone No. '.$site_phone.'</h4>
        </div>
        <div class="row">
            <table width="100%">
                <tr>
                    <td width="80%" colspan="2">
                        <div class="form-group mb-none"><label>Application for the post of:</label>
                            <strong>' . $rs['field_1'] . '</strong>
                        </div>
                    </td>
                    <td width="20%" rowspan="4" style="text-align: center;">
                        <img src="' . $path . ($image_name) . '" style="width:120px;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group mb-none"><label>Name:</label><strong>' . $rs['field_0'] . '</strong></div>
                    </td>
                </tr>
                <tr>
                    <td width="50%">
                        <div class="form-group mb-none"><label>Phone #:</label>
                            <strong>' . $rs['field_2'] . '</strong>
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-none"><label>Fax #:</label><strong>' . $rs['field_3'] . '</strong></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group mb-none"><label>Address:</label><strong>' . $rs['field_4'] . '</strong></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group mb-none"><label>Present Position held: (last post held in case of retired candidates)</label>
                            <strong>' . $rs['field_5'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>Exact Salary / scale & other emoluments: </label>
                            <strong>' . $rs['field_6'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>The reason for your leaving the present / last job: </label>
                            <strong>' . $rs['field_7'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group mb-none"><label>Domicile:</label>
                            <strong>' . $rs['field_8'] . '</strong>
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-none"><label>Place of Birth:</label>
                            <strong>' . $rs['field_9'] . '</strong>
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-none"><label>NIC No:</label>
                            <strong>' . $rs['field_10'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>Father’s or Husband Name:</label>
                            <strong>' . $rs['field_11'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>Father’s Husband’s occupation & present position with address:</label>
                            <strong>' . $rs['field_12'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>Details of family members (living with you) their name & ages:</label>
                            <strong>' . $rs['field_13'] . '</strong>
                            <strong>' . $rs['field_14'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>QUALIFICATIONS:</label></div>
                        <table class="table table-bordered" width="100%" style="background: none;">
                            <tr>
                                <td width="20%">
                                    <div class="form-group mb-none"><label style="text-align:center;">&nbsp;</label></div>
                                </td>
                                <td width="30%">
                                    <div class="form-group mb-none"><label style="text-align:center;">Academic:</label></div>
                                </td>
                                <td width="30%">
                                    <div class="form-group mb-none"><label style="text-align:center;">Examination:</label></div>
                                </td>
                                <td width="20%">
                                    <div class="form-group mb-none"><label style="text-align:center;">Marks:</label></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center;font-weight: bold;vertical-align: middle;">Primary</td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_151'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_152'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_153'] . '</strong>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center;font-weight: bold;vertical-align: middle;">Higher School</td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_161'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_162'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_163'] . '</strong>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center;font-weight: bold;vertical-align: middle;">Higher Secondary</td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_171'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_172'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_173'] . '</strong>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center;font-weight: bold;vertical-align: middle;">B.Sc / B.A</td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_181'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_182'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_183'] . '</strong>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center;font-weight: bold;vertical-align: middle;">M.Sc / M.A / Ph.D</td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_191'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_192'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_193'] . '</strong>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center;font-weight: bold;vertical-align: middle;">Other</td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_201'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_201'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-none">
                                        <strong>' . $rs['field_201'] . '</strong>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>Details of experience / Employment records:</label>
                            <strong>' . $rs['field_20'] . '</strong>
                            <strong>' . $rs['field_21'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>Your Hobbies:</label>
                            <strong>' . $rs['field_22'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>Any sport of extra curriculum activities:</label>
                            <strong>' . $rs['field_23'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>Any extra ordinary achievement:</label>
                            <strong>' . $rs['field_24'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>How much salary and other emoluments do you expect?:</label>
                            <strong>' . $rs['field_25'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>When can you join duty :</label>
                            <strong>' . $rs['field_26'] . '</strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="form-group mb-none"><label>Name and address of two references who know you well:</label>
                            <strong>' . $rs['field_27'] . '</strong>
                            <strong>' . $rs['field_28'] . '</strong>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>';

$html = $out;


require_once './lib/mpdf/mpdf.php';

$footer = '<div style="clear:both;"></div>
                <div style="bottom:-15;width:100%;margin-top:5px;border-top:1px solid #888;padding-top:10px;letter-spacing:1px;color:#333;">
                    <div style="text-align:center;font-size:11px!important;line-height:12px;">aimi.com.pk</div>
                    <div style="clear:both;"></div>
                </div>';

$mpdf = new mPDF('c', 'A4', '', 'Arial', 15, 15, 16, 16, 9, 9);

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
// LOAD a stylesheet
$stylesheet = file_get_contents($path . 'assets/pdf.css');

$mpdf->WriteHTML($stylesheet, 1);    // The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->SetHTMLFooter($footer);
$mpdf->WriteHTML($html, 2);

$out_type = ($isView == 'view') ? 'I' : 'D';
$mpdf->Output($file_name, $out_type); // F = Move to Directory, I = View, D = Download
exit;
?>