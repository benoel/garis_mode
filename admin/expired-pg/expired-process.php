<?php 
session_start(); 
if ($_GET['order']) {
	# code...
	$id = $_GET['order'];
	include '../../conn.php';

	$update = mysql_query("UPDATE orders set status = 'expired', sign_by = '$admin_id' where order_id = '$id'");

	if ($update) {
		# code...
		$query_orderdetail = mysql_query("SELECT * from orderdetails a left join orders b on a.order_id = b.order_id  where a.order_id = '$id'");
		while ($dt_orderdetail = mysql_fetch_assoc($query_orderdetail)) {
			# code...
			$id_product = $dt_orderdetail['product_id'];
			$qty = $dt_orderdetail['qty'];
			$q_product = mysql_query("SELECT * from products where product_id = '$id_product'");
			$dt_product = mysql_fetch_assoc($q_product);
			$balikin_qty_product = (int)$dt_product['stock'] + (int)$qty;
			$update_product = mysql_query("UPDATE products set stock = '$balikin_qty_product' where product_id = '$id_product'");
			if ($update_product) {
				# code...
				$orderdetail_id = $dt_orderdetail['order_detail_id'];
				$delete_orderdetails = mysql_query("DELETE from orderdetails where order_detail_id = '$orderdetail_id'");
			}
		}

		if ($delete_orderdetails) {
			$_SESSION['msg'] = 'Action Success';
			echo '<script>window.history.back();</script>';
		}else{
			$_SESSION['msg'] = 'Action Failed';
			echo '<script>window.history.back();</script>';
		}
	}else{
		$_SESSION['msg'] = 'Action Failed';
		echo '<script>window.history.back();</script>';
	}
}
?>