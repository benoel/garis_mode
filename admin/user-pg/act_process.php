<?php 
session_start();
if (isset($_GET['id'])) {
	# code...
	$id = $_GET['id'];

	include '../../conn.php';
	$query = mysql_query("SELECT active from users WHERE user_id = $id");
	$data = mysql_fetch_assoc($query);

	if ($data['active'] == 1) {
		# code...
		$query = mysql_query("UPDATE users set active = 0 where user_id  = $id");
		if ($query) {
			$_SESSION['msg'] = 'Action Success';
			// header('location: ../index.php?con=user');
			// echo '<script>window.location.replace("http://localhost/garmod/admin/index.php?con=user");</script>';
		}else{
			$_SESSION['msg'] = 'Action Failed';
			// echo '<script>window.history.back();</script>';
		}
	}else{
		$query = mysql_query("UPDATE users set active = 1 where user_id  = $id");
		if ($query) {
			$_SESSION['msg'] = 'Action Success';
			// header('location: ../index.php?con=user');
			// echo '<script>window.location.replace("http://localhost/garmod/admin/index.php?con=user");</script>';
		}else{
			$_SESSION['msg'] = 'Action Failed';
			// echo '<script>window.history.back();</script>';
		}
	}
	
}
?>