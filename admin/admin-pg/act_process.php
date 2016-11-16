<?php 
session_start();
if (isset($_POST['save'])) {

	include '../../conn.php';

	$id = $_POST['id'];
	$username = $_POST['username'];
	$name = $_POST['name'];
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
	$level = $_POST['level'];
	// $img_type = $_FILES['img']['type'];
	// $img_size = $_FILES['img']['size'];
	// echo '<script>window.location.replace("http://localhost/garmod/admin/index.php?con=product");</script>';
	// $imgupload = 'product-pg/upload/'.$img_name;
	// die();

	if ($id != '' || $id != NULL) {
		$query_admin = mysql_query("SELECT * FROM admins where admin_id = '$id'");
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
					$update = mysql_query("UPDATE admins set password = '$password', name = '$name' WHERE admin_id = '$id'");
					if ($update) {
						$_SESSION['admin'] = $username;
						$_SESSION['msg'] = 'Your Profile is update';
						header('location: ../index.php?con=admin');
					}else{
						$_SESSION['msg'] = 'Your Profile does not update';
						echo '<script>window.history.back();</script>';
					}
				}else{
					$_SESSION['msg'] = 'New password does not match with confirm password';
					echo '<script>window.history.back();</script>';
				}

				//////
			}else{
				// echo "tidak ada password";
				// die();
				$update = mysql_query("UPDATE admins set name = '$name' WHERE admin_id = '$id'");
				if ($update) {
					$_SESSION['admin'] = $username;
					$_SESSION['msg'] = 'Your Profile is update';
					header('location: ../index.php?con=admin');
				}else{
					$_SESSION['msg'] = 'Your Profile does not update';
					echo '<script>window.history.back();</script>';
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
			$insert = mysql_query("INSERT INTO admins (username, password, name, level) VALUES ('$username', '$password', '$name', '$level')");
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
}else{
	echo '<script>window.history.back();</script>';
}

?>