<?php 
session_start();
if (isset($_POST['submit'])) {
	# code...
	include '../../conn.php';

	$ses = $_SESSION['myses'];
	$query_user = mysql_query("SELECT * FROM users WHERE username = '$ses'");
	$user = mysql_fetch_assoc($query_user);
	$user_id = $user['user_id'];

	$noorder = $_POST['noorder'];
	$bankname = $_POST['bankname'];
	$accname = $_POST['accname'];
	$noacc = $_POST['noacc'];
	$message = $_POST['message'];
	$pict = $_FILES['pict']['name'];
	
	$pict_tmp_name = $_FILES['pict']['tmp_name'];
	$status = 'waiting';

	$query_order = mysql_query("select * from orders where no_invoice = '$noorder' and user_id = '$user_id'");

	if (mysql_num_rows($query_order) > 0) {
		# code...
		if ($pict != ''){
			$location = "../../asset/img/conf/";
			if (move_uploaded_file($pict_tmp_name, $location.$pict)) {
				$insert = mysql_query("INSERT INTO confirmations (user_id, no_invoice, bankname, accname, noacc, message, pict, status) VALUES ('$user_id', '$noorder', '$bankname', '$accname', '$noacc', '$message', '$pict', '$status') ");
				if ($insert) {
					$_SESSION['msg'] = 'Confirm Success';
					header('location: ../?act=status_order');
					// echo '<script>window.location.replace("http://localhost/garmod/");</script>';
				}else{
					$_SESSION['msg'] = 'Confirm Failed';
					echo '<script>window.history.back();</script>';
				}
			}
		}else{
				//tidak ada image
			$insert = mysql_query("INSERT INTO confirmations (user_id, no_invoice, bankname, accname, noacc, message, status) VALUES ('$user_id', '$noorder', '$bankname', '$accname', '$noacc', '$message', '$status') ");
			if ($insert) {
				$_SESSION['msg'] = 'Confirm Success';
				header('location: ../?act=status_order');
				// echo '<script>window.location.replace("http://localhost/garmod/");</script>';
			}else{
				$_SESSION['msg'] = 'Confirm Failed';
				echo '<script>window.history.back();</script>';
			}
		}
	}else{
		//tidak ada no order...
		$_SESSION['msg'] = 'Something wrong in your input box!!';
		echo '<script>window.history.back();</script>';
	}
}


?>