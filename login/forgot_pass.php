<?php
session_start();
include '../conn.php';
if (isset($_POST['submit'])) {
	# code...
	$email_user = $_POST['email'];
	$query_user = mysql_query("SELECT * from users where email = '$email_user'");
	if (mysql_num_rows($query_user) > 0) {
		$dt_user = mysql_fetch_assoc($query_user);
		$server = 'http://jakcode.com'; //define SERVER IP
		$email_content = '
		<br><br>
		<b>Dear, '.$dt_user['name'].'</b>
		<br><br>
		You recently requested to reset your password for your GARIS MODE account. Click the button below to reset it.
		<br><br>
		<h3><a class="btn waves-effect waves-light grey darken-4" href="'.$server.'/garismode/login/index.php?act=change_pass&auth_user='.$dt_user['username'].'&lp='.$dt_user['password'].'" >Reset Your Password</a></h3>
		<br><br>
		if you did not request a password reset, please ignore and delete this email or reply to let us know. This password reset is valid as long as you save it.
			<br><br>
		Regards,
		<br>
		<h3><b><a href="'.$server.'/garismode">GARIS MODE</a></b></h3>

		';

		date_default_timezone_set('Etc/UTC');
		require '../phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'srv20.niagahoster.com';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth = true;
		$mail->Username = "admin-no-reply@jakcode.com";
		$mail->Password = "BenzhA14";
		$mail->setFrom('admin-no-reply@jakcode.com', 'GARIS MODE');

//Set who the message is to be sent to
		$mail->addAddress($email_user, $dt_user['name']);

		$mail->Subject = 'Forgot Password';
		$mail->isHTML(true);

		$mail->msgHTML($email_content);

		$mail->AltBody = 'This is a plain-text message body';

		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			// $_SESSION['msg'] = 'Password Not Sent!';
			// echo '<script>window.history.back();</script>';
		} else {
			header('location: index.php?act=sending_pass');
		}
	}else{
		header('location: index.php?act=sending_pass');
	}
}
