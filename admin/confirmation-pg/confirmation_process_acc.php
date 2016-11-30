<?php  
session_start();
if ($_GET['conf_id']) {
	# code...
	$conf_id = $_GET['conf_id'];
	include '../../conn.php';
	$admin_id = $_SESSION['admin'];

	$query_conf = mysql_query("SELECT * FROM confirmations where confirmation_id = '$conf_id'");
	$data_conf = mysql_fetch_assoc($query_conf);
	$no_invoice = $data_conf['no_invoice'];

	$update = mysql_query("UPDATE confirmations SET status = 'accepted' WHERE confirmation_id = '$conf_id'");
	$update_order = mysql_query("UPDATE orders SET status = 'accepted', sign_by = '$admin_id' WHERE no_invoice = '$no_invoice'");


	if ($update && $update_order) {
		# code...
		$_SESSION['msg'] = 'Action Success';
		echo '<script>window.history.back();</script>';
	}else{
		$_SESSION['msg'] = 'Action Failed';
		echo '<script>window.history.back();</script>';
	}
}

?>