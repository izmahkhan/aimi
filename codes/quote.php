<?php

if (isset($_POST['quote_form']) && $_POST['quote_form'] == 'posted') {

	if (empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['message'])) {
		$errorflag = 1;
		$_SESSION['errorMsg'] = "Please fill all fields.";
	}

	if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
		$secret = '6Lf_nWwUAAAAAN_QKbYWwwf0r6DDWct52DoYzETF';
//    echo 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response'];
        //get verify response data
//        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);

	$ch = curl_init();

	curl_setopt_array($ch, [
		CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => [
			'secret' => $secret,
			'response' => $_POST['g-recaptcha-response'],
			'remoteip' => $_SERVER['REMOTE_ADDR']
		],
		CURLOPT_RETURNTRANSFER => true
	]);

	$output = curl_exec($ch);
	curl_close($ch);

	$responseData = json_decode($output);

	if ($responseData->success):
	else:
		$errorflag = 1;
		$_SESSION['errorMsg'] = "Invalid captcha.";
	endif;
else:
	$errorflag = 1;
	$_SESSION['errorMsg'] = "Invalid captcha, Please click on the reCAPTCHA box.";
endif;

if ($errorflag != 1) {

	$msg_body = "

	<style>

	.borderColor {

		background-color: #f7f7f7;

		border: 1px solid #f0f0f0;

	}

	.textWhiteHeader {

		font-family: Arial, Helvetica, sans-serif;

		font-size: 12px;

		color: #FFFFFF;

		font-weight: bold;

	}

	.mainText {

		font-family: Arial, Helvetica, sans-serif;

		font-size: 12px;

		line-height: 18px;

		color: #666;

	}

	.mainHeading {

		font-family: Arial;

		font-size: 20px;

		line-height: normal;

		color: #ED1C24;

		font-weight: bold;

		padding-left: 15px;

	}

	.footer {

		font-family: Arial, Helvetica, sans-serif;

		font-size: 12px;

		color: #000;

	}

	p {

		color: #484848;

		font-family: Arial, Helvetica, sans-serif;

		font-size: 12px;

		line-height: 18px;

		font-weight: normal;

	}

	.borderColor2 {

		background-color: #ffffff;

		border: 1px solid #f0f0f0;

		padding-top: 5px;

		padding-left: 10px;

		padding-bottom: 5px;

		padding-right: 10px;

		font-family: Arial;

		font-size: 14px;

		color: #ED1C24;

	}

	</style>

	<table  border='0' align='center' cellpadding='0' cellspacing='0' width='650'>

	<tr>

	<td ><table width='100%'  border='0' style='background:#FFFFFF;'>

	<tr>

	<td width='25%' style='background: #FFFFFF;height: 85px;padding: 5px 0px 0px 20px;' align='left' ><a href='" . $path . "' style='font-size: 24px;text-align: left;color: #fff;text-decoration: none;'><img src='" . $path . "assets/images/logo.png' height='50' alt='" . $site_name . "' /></a></td>

	<td align='left' valign='middle' style='background:#FFFFFF;font-family: Arial;font-size:14px;line-height: normal;color:#333;font-weight: bold;vertical-align:middle;text-align:right;padding-right:10px;'>" . date('d M, Y h:i A') . "</td>

	</tr>

	</table></td>

	</tr>

	<tr>

	<td height='2'><table width='100%' border='0' cellspacing='0' cellpadding='0'>

	<tr>

	<td height='2' bgcolor='#FFFFFF' class='textWhiteHeader' style='padding:5px;'></td>

	</tr>

	</table></td>

	</tr>

	<tr>

	<td>

	<table width='100%'  border='0' cellpadding='0' cellspacing='0'>

	<tr>

	<td valign='top' bgcolor='' style='padding:15px;'>

	<table width='100%' border='0' cellspacing='0' cellpadding='0'>

	<tr>

	<td>&nbsp;</td>

	</tr>

	<tr>

	<td><table width='100%' border='0' cellspacing='0' cellpadding='0'>

	<tr>

	<td style='background-color: #ffffff;border: 1px solid #f0f0f0;padding-top:5px; padding-left:10px;padding-bottom:5px;padding-right:10px;font-family: Arial;font-size: 14px;color: #333;line-height:25px;' align='center'>



	<h4 style='text-align:left;padding:0px 20px;margin-bottom:0px;'>Dear Admin,</h4>	

	<p style='text-align:left;padding:0px 20px;'>You have received the following message:</p>

	<div style='text-align:left;padding:5px 20px;'>

	<table width='100%' border='0' style='font-size:12px;'>

	<tr><td height='15'></td></tr>
	<tr>

	<td width='15%'><strong>Name</strong></td>

	<td width='85%'>" . stripslashes($_POST["name"]) . "</td>

	</tr>

	<tr>

	<td width='15%'><strong>Email</strong></td>

	<td width='85%'>" . stripslashes($_POST["email"]) . "</td>

	</tr>
	<tr>

	<td width='15%'><strong>Subject</strong></td>

	<td width='85%'>" . stripslashes($_POST["subject"]) . "</td>

	</tr>
	<tr>

	<td style='vertical-align:top;'><strong>Message</strong></td>

	<td>" . stripslashes($_POST["message"]) . "</td>

	</tr>

	</table>

	</div>		

	</td>

	</tr>

	</table></td>

	</tr>

	<tr>

	<td>&nbsp;</td>

	</tr>

	</table>

	</td>

	</tr>

	</table>

	</td>

	</tr>

	<tr>

	<td height='30' bgcolor='#FFFFFF' class='footer' style='padding-left:20px;color:#333;'>" . $site_copyright . "</td>

	</tr>

	</table>";



	 $emailto = trim($site_contact_email);
	$subject = "Contact Us : " . stripslashes($_POST["subject"]);
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html;charset=utf-8\r\n";
	$headers .= "From: No-Reply <noreply@$domain>" . "\r\n";
	$headers .= "Reply-To: No-Reply <noreply@$domain>" . "\r\n";
	$body = $msg_body;
	@mail($emailto, $subject, $body, $headers);

        // Email to user
	$msg_body = "
	Dear " . stripslashes($_POST["name"]) . "<br><br>
	" . nl2br(str($site_contact_auto_reply)) . "<br>";

	$emailto = trim($_POST["email"]);
	$subject = " Automated reply from Prime Cargo about your query";
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html;charset=utf-8\r\n";
	$headers .= "From: No-Reply <noreply@$domain>" . "\r\n";
	$headers .= "Reply-To: No-Reply <noreply@$domain>" . "\r\n";
	$body = $msg_body;
	@mail($emailto, $subject, $body, $headers);

	unset($_POST);
	$_SESSION['successMsg'] = "Your message has been sent successfully.";
}
}
?>