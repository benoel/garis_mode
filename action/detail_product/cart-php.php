<?php 
session_start();
if (isset($_POST['cart'])) {
	include '../../conn.php';
	$id = $_POST['id'];
	$qty = $_POST['qty'];
	$ses = $_SESSION['myses'];

	$product = mysql_query("SELECT * FROM products where product_id = '$id'");
	$data = mysql_fetch_assoc($product);

	$product_price = $data['price'];
	$total = $qty * $product_price;

	if (!isset($ses)) {
		# code...

		header('location: ../../login');
		// echo '<script>window.location.replace("http://localhost/garmod/login");</script>';
		setcookie("cart", $id);
	}else{
		setcookie("cart", "");
		$query_user = mysql_query("SELECT * FROM users WHERE username = '$ses'");
		$user = mysql_fetch_assoc($query_user);
		$user_id = $user['user_id'];

		$query_cart = mysql_query("SELECT * FROM carts where user_id = '$user_id' and product_id = '$id'");
		if (mysql_num_rows($query_cart) > 0) {
			# code...
			$_SESSION['msg'] = 'Product has been added before, check your cart!';
			echo '<script>window.history.back();</script>';
		}else{
			setcookie("cart", "");
			$insert = mysql_query("INSERT INTO carts (user_id, product_id, qty, total_price) VALUES ('$user_id', '$id', '$qty', '$total')");
			header('location: ../?act=cart');
		// echo '<script>window.location.replace("http://localhost/garmod/cart.php");</script>';
		}
	}

}

?>