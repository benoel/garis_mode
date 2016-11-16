<?php 
if ($_GET['id']) {
	include '../../conn.php';
	$id = $_GET['id'];
	$delete = mysql_query("DELETE FROM carts WHERE cart_id = '$id'");
	header('location: ../index.php?act=cart');
}
?>
