<?php 
session_start();
if (isset($_POST['save'])) {

	include '../../conn.php';

	$id = $_POST['id'];
	$username = $_POST['username'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	if ($_POST['password'] != '') {
		$password = md5($_POST['password']);
	}else{
		$password = '';
	}
	if ($_POST['con_password'] != '') {
		$con_password = md5($_POST['con_password']);
	}else{
		$con_password = '';
	}
	$old_password = md5($_POST['old_password']);
	$role = $_POST['role'];
	// $img_type = $_FILES['img']['type'];
	// $img_size = $_FILES['img']['size'];
	// echo '<script>window.location.replace("http://localhost/garmod/admin/index.php?con=product");</script>';
	// $imgupload = 'product-pg/upload/'.$img_name;
	// die();

	if ($id != '' || $id != NULL) {
		$query_admin = mysql_query("SELECT * FROM users where user_id = '$id'");
		$dt_admin = mysql_fetch_assoc($query_admin);
		if ($old_password != $dt_admin['password']) {
			# code...
			// echo "beda";
			$_SESSION['msg'] = 'Password does not match';
			echo '<script>window.history.back();</script>';
		}else{
			// echo "sama";
			// die();
			if($password != '' && $con_password != ''){
				// echo "ada password";
				// die();
				if($password == $con_password){
					if ($email != '') {
						# code...
						$cekemail = mysql_query("SELECT * FROM users where email = '$email'");
						if (mysql_num_rows($cekemail) > 0) {
						# code...
							$_SESSION['msg'] = 'That email has already taken!';
							echo '<script>window.history.back();</script>';
						}else{
							$update = mysql_query("UPDATE users set password = '$password', name = '$name', address = '$address', phone = '$phone', email = '$email' WHERE user_id = '$id'");
							if ($update) {
								$_SESSION['admin'] = '';
								$_SESSION['msg'] = 'Your Profile is update, please Login again!';
								header('location: ../../login');
							}else{
								$_SESSION['msg'] = 'Your Profile does not update';
								echo '<script>window.history.back();</script>';
							}
						}
					}else{
						$update = mysql_query("UPDATE users set password = '$password', name = '$name', address = '$address', phone = '$phone' WHERE user_id = '$id'");
						if ($update) {
							$_SESSION['admin'] = '';
							$_SESSION['msg'] = 'Your Profile is update, please Login again!';
							header('location: ../../login');
						}else{
							$_SESSION['msg'] = 'Your Profile does not update';
							echo '<script>window.history.back();</script>';
						}
					}
				}else{
					$_SESSION['msg'] = 'New password does not match with confirm password';
					echo '<script>window.history.back();</script>';
				}

				//////
			}else{
				// echo "tidak ada password";
				// die();
				$cekemail = mysql_query("SELECT * FROM users where email = '$email'");
				if ($email != '') {
					# code...
					if (mysql_num_rows($cekemail) > 0) {
						# code...
						$_SESSION['msg'] = 'That email has already taken!';
						echo '<script>window.history.back();</script>';
					}else{
						$update = mysql_query("UPDATE users set name = '$name', address = '$address', phone = '$phone', email = '$email' WHERE user_id = '$id'");
						if ($update) {
							$_SESSION['msg'] = 'Your Profile is update';
							header('location: ../index.php?con=admin');;
						}else{
							$_SESSION['msg'] = 'Your Profile does not update';
							echo '<script>window.history.back();</script>';
						}
					}
				}else{
					$update = mysql_query("UPDATE users set name = '$name', address = '$address', phone = '$phone' WHERE user_id = '$id'");
					if ($update) {
						$_SESSION['msg'] = 'Your Profile is update';
						header('location: ../index.php?con=admin');;
					}else{
						$_SESSION['msg'] = 'Your Profile does not update';
						echo '<script>window.history.back();</script>';
					}
				}
			}
		}	
	}else{
		// if (isset($img_name)){
		// 	// $location = "../../asset/img/upload/";
		// 	$location = "upload/";
		// 	if (move_uploaded_file($img_tmp_name, $location.$img_name)) {
		if ($password != $con_password) {
			# code...
			$_SESSION['msg'] = 'Password does not match';
			echo '<script>window.history.back();</script>';
		}else{
			$cekemail = mysql_query("SELECT * FROM users where email = '$email'");
			if (mysql_num_rows($cekemail) > 0) {
				# code...
				$_SESSION['msg'] = 'That email has already taken!';
				echo '<script>window.history.back();</script>';
			}else{
				$insert = mysql_query("INSERT INTO users (username, password, name, address, phone, email, role, active) VALUES ('$username', '$password', '$name', '$address', '$phone', '$email', '$role', '1')");
				if ($insert) {
					$_SESSION["msg"] = 'New admin has created';
					header('location: ../index.php?con=admin');
			// echo '<script>window.location.replace("http://localhost/garmod/admin/index.php?con=admin");</script>';
				}else{
					$_SESSION['msg'] = 'failed to create new admin';
					echo '<script>window.history.back();</script>';
				}
			}
		}
	}
}else{
	echo '<script>window.history.back();</script>';
}

?>