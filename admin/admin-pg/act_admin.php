<?php 
session_start();
include '../../conn.php';
if ($_GET['act'] == 'nonactive' && $_GET['id']) {
	# code...
	$admin_id = $_GET['id'];
	$query_nonactive = mysql_query("UPDATE admins set active = 0 where admin_id = '$admin_id'");
	if ($query_nonactive) {
		# code...
		$_SESSION['msg'] = 'Action Success';
		echo '<script>window.history.back();</script>';
	}else{
		$_SESSION['msg'] = 'Action Failed';
		echo '<script>window.history.back();</script>';
	}
}elseif ($_GET['act'] == 'active' && $_GET['id']) {
	# code...
	$admin_id = $_GET['id'];
	$query_active = mysql_query("UPDATE admins set active = 1 where admin_id = '$admin_id'");
	if ($query_active) {
		# code...
		$_SESSION['msg'] = 'Action Success';
		echo '<script>window.history.back();</script>';
	}else{
		$_SESSION['msg'] = 'Action Failed';
		echo '<script>window.history.back();</script>';
	}
}elseif ($_GET['act'] == 'reg_admin' && $_GET['id']) {
	# code...
	$admin_id = $_GET['id'];
	$query_reg_admin = mysql_query("UPDATE admins set level = 0 where admin_id = '$admin_id'");
	if ($query_reg_admin) {
		# code...
		$_SESSION['msg'] = 'Action Success';
		echo '<script>window.history.back();</script>';
	}else{
		$_SESSION['msg'] = 'Action Failed';
		echo '<script>window.history.back();</script>';
	}
}elseif ($_GET['act'] == 'sup_admin' && $_GET['id']) {
	# code...
	$admin_id = $_GET['id'];
	$query_sup_admin = mysql_query("UPDATE admins set level = 1 where admin_id = '$admin_id'");
	if ($query_sup_admin) {
		# code...
		$_SESSION['msg'] = 'Action Success';
		echo '<script>window.history.back();</script>';
	}else{
		$_SESSION['msg'] = 'Action Failed';
		echo '<script>window.history.back();</script>';
	}
}

?>