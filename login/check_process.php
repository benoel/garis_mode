<?php 
session_start();
include '../conn.php';
if (isset($_POST['login'])) {
	
	# code...
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$user = mysql_query("SELECT * FROM users WHERE (username = '$username' or email = '$username') AND password = '$password'");
	if (mysql_num_rows($user) > 0) {
		# code...
		$dt_user = mysql_fetch_assoc($user);
		if ($dt_user['active'] == 0) {
			# code...
			$_SESSION['msg'] = 'Your account has been blocked by administrator!';
			echo '<script>window.history.back();</script>';
		}else{
			if ($dt_user['role'] == 1) {
				# code...
				$user = mysql_query("SELECT * from users where username = '$username' or email = '$username'");
				$user_dt = mysql_fetch_assoc($user);
				$_SESSION['myses'] = $user_dt['username'];
				if (isset($_COOKIE['cart'])) {
					$cookie = $_COOKIE['cart'];
				}
				if ($cookie == '') {
					$update_login = mysql_query("UPDATE users set last_login = now() where username = '$username' or email = '$username'");
					header('location: ../product.php');
				}else{
					$update_login = mysql_query("UPDATE users set last_login = now() where username = '$username' or email = '$username'");
					header("location: ../action/index.php?act=detail_product");
				}
			}else{
				$update_login = mysql_query("UPDATE users set last_login = now() where username = '$username' or email = '$username'");
				header('location: ../admin');
				$_SESSION['admin'] = $dt_user['user_id'];
			}
			
		}
	}else{
		$_SESSION["msg"] = "Ups, Check your username and password again..";
		echo '<script>window.history.back();</script>';
	}
	// 	// echo $_SESSION["msg"];
	// 	echo '<script>window.history.back();</script>';
	// elseif(mysql_num_rows($admin) > 0) {
	// 	# code...
	// 	$dt_admin = mysql_fetch_assoc($admin);
	// 	if ($dt_admin['active'] == 0) {
	// 		# code...
	// 		$_SESSION['msg'] = 'Your account has been blocked by administrator!';
	// 		echo '<script>window.history.back();</script>';
	// 	}else{
	// 		header('location: ../admin');
	// 	// echo '<script>window.location.replace("http://localhost/garmod/admin");</script>';
	// 		$_SESSION['admin'] = $username;
	// 	}
	// }else{
	// 	$_SESSION["msg"] = "Ups, Check your username and password again..";
	// 	// echo $_SESSION["msg"];
	// 	echo '<script>window.history.back();</script>';
	// 	// echo "oke";
	// }

}

if (isset($_POST['register'])) {
	# code...
	$username = $_POST['username'];
	$full_name = $_POST['full_name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$conf_password = md5($_POST['conf_password']);

	include '../conn.php';

	if($password != $conf_password){
		$_SESSION['msg'] = 'Password does not match';
		echo '<script>window.history.back();</script>';
	}else{
		$query_user = mysql_query("SELECT * from users where username = '$username' and email = '$email'");
		if (mysql_num_rows($query_user) > 0) {
			# code...
			$_SESSION['msg'] = 'That username and email has already taken, sorry!';
			echo '<script>window.history.back();</script>';
		}else{
			$insert = mysql_query("INSERT into users (username, password, name, address, phone, email, role, active) values ('$username', '$password', '$full_name', '$address', '$phone', '$email', '1', '1') ");
			if ($insert) {

				$_SESSION['msg'] = 'Success, Please login back!';
				header('location: index.php');
					// echo '<script>window.history.back();</script>';
				// echo '<script>window.location.replace("http://localhost/garmod/login");</script>';
			}
		}

	}
}

if (isset($_POST['change_pass'])) {
	# code...
	$password = md5($_POST['password']);
	$cfpassword = md5($_POST['cfpassword']);
	if ($password != $cfpassword) {
		# code...
		$_SESSION['msg'] = 'Password Does not match';
		echo '<script>window.history.back();</script>';
	}else{
		$username = $_POST['auth_user'];
		$update_user = mysql_query("UPDATE users set password = '$password' where username = '$username'");
		if ($update_user) {
		# code...
			$_SESSION['msg'] = 'Successfully change your password';
			header('location: index.php');
		}
	}
	
}
?>