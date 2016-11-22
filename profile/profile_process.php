<?php  
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

?>