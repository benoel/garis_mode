<?php  
session_start(); 
include '../conn.php';
if (isset($_POST['update_profile'])) {
	# code...
	$user_id = $_POST['user_id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$query_update = mysql_query("UPDATE users set name = '$name', address = '$address', phone = '$phone', email = '$email' where user_id = '$user_id'");
	if ($query_update) {
		# code...
		header('location: index.php');
	}

}

if (isset($_POST['change_pass'])) {
	# code...
	$new_pass = md5($_POST['new_pass']);
	$conf_pass = md5($_POST['conf_pass']);
	$old_pass = md5($_POST['old_pass']);

	if ($new_pass != $conf_pass) {
		# code...
		$_SESSION['msg'] = 'Your password does not match!';
		echo '<script>window.history.back();</script>';
	}else{
		$ses = $_SESSION['myses'];
		$query_user = mysql_query("SELECT * FROM users WHERE username = '$ses'");
		$user = mysql_fetch_assoc($query_user);
		$user_id = $user['user_id'];
		if ($old_pass != $user['password']) {
			# code...
			$_SESSION['msg'] = 'Your password does not match!';
			echo '<script>window.history.back();</script>';
		}else{
			$update_password = mysql_query("UPDATE users set password = '$new_pass' where user_id = '$user_id'");
			if ($update_password) {
				# code...
				$_SESSION['msg'] = 'Password has change!';
				header('location: index.php');
			}else{
				$_SESSION['msg'] = 'Something wrong has happened, Please Refresh!';
				echo '<script>window.history.back();</script>';
			}
		}

		
	}

}

?>