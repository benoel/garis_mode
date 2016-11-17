<?php 
session_start();
if (isset($_POST['login'])) {
	
	# code...
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	include '../conn.php';

	$admin = mysql_query("SELECT * FROM admins WHERE username = '$username' AND password = '$password'");
	$user = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

	if (mysql_num_rows($user) > 0) {
		# code...
		$dt_user = mysql_fetch_assoc($user);
		if ($dt_user['active'] == 0) {
			# code...
			$_SESSION['msg'] = 'Your account has been blocked by administrator!';
			echo '<script>window.history.back();</script>';
		}else{
			$_SESSION['myses'] = $username;
			if (isset($_COOKIE['cart'])) {
				$cookie = $_COOKIE['cart'];
			}

			if ($cookie == '') {
				header('location: ../index.php');
			}else{
				header("location: ../action/index.php?act=detail_product");
			}
		}
	}elseif(mysql_num_rows($admin) > 0) {
		# code...
		$dt_admin = mysql_fetch_assoc($admin);
		if ($dt_admin['active'] == 0) {
			# code...
			$_SESSION['msg'] = 'Your account has been blocked by administrator!';
			echo '<script>window.history.back();</script>';
		}else{
			header('location: ../admin');
		// echo '<script>window.location.replace("http://localhost/garmod/admin");</script>';
			$_SESSION['admin'] = $username;
		}
	}else{
		$_SESSION["msg"] = "Ups, Check your username and password again..";
		// echo $_SESSION["msg"];
		echo '<script>window.history.back();</script>';
		// echo "oke";
	}

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
		$query_user = mysql_query("SELECT * from users where username = '$username'");
		$query_admin = mysql_query("SELECT * from admins where username = '$username'");
		if ((mysql_num_rows($query_user) > 0) || (mysql_num_rows($query_admin) > 0)) {
			# code...
			$_SESSION['msg'] = 'That username has already taken, sorry!';
			echo '<script>window.history.back();</script>';
		}else{
			$insert = mysql_query("INSERT into users (username, password, name, address, phone, email, active) values ('$username', '$password', '$full_name', '$address', '$phone', '$email', '1') ");
			if ($insert) {

				$_SESSION['msg'] = 'Success, Please Login!';
					// echo '<script>window.history.back();</script>';
				echo '<script>window.location.replace("http://localhost/garmod/login");</script>';
			}
		}

	}

	


}
?>