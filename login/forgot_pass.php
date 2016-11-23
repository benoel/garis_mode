<?php
session_start();
include '../conn.php';
if (isset($_POST['submit'])) {
	# code...
	$email_user = $_POST['email'];
	$query_user = mysql_query("SELECT * from users where email = '$email_user'");
	if (mysql_num_rows($query_user) > 0) {
		# code...
		$dt_user = mysql_fetch_assoc($query_user);
		$server = $_SERVER['SERVER_ADDR'];
		$email_content = '
		<br><br>
		<b>Dear, '.$dt_user['name'].'</b>
		<br><br>
		We see you lost your password, if we are not wrong please click link below to change your last password.
		<br><br>
		<h3><a href="'.$server.'/garmod/login/index.php?act=change_pass&auth_user='.$dt_user['username'].'&lp='.$dt_user['password'].'" >Change Password</a></h3>
		<br><br>
		if this email weird, it means someone is trying to open your account, just change it as soon as possible.
			<br><br>
		Regards,
		<br>
		<h1><b><a href="'.$server.'/garmod">GARIS MODE</a></b></h1>

		';

		date_default_timezone_set('Etc/UTC');
		require '../phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "ibnu.a.azis@gmail.com";
		$mail->Password = "benoel04";
		$mail->setFrom('ibnu.a.azzis@gmail.com', 'GARIS MODE');

//Set who the message is to be sent to
		$mail->addAddress($email_user, $dt_user['name']);

		$mail->Subject = 'Forgot Password';
		$mail->isHTML(true);

		$mail->msgHTML($email_content);

		$mail->AltBody = 'This is a plain-text message body';

		if (!$mail->send()) {
			$_SESSION['msg'] = 'Your account has been blocked by administrator!';
			echo '<script>window.history.back();</script>';
		} else {
			header('location: index.php?act=sending_pass');
		}
	}else{
		header('location: index.php?act=sending_pass');
	}
}
