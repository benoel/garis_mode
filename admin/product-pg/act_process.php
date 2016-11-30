<?php 
session_start();
if (isset($_POST['save'])) {

	include '../../conn.php';

	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];
	$category = $_POST['category'];
	$tag = $_POST['tag'];
	$created = $_POST['created'];
	$img_name = $_FILES['img']['name'];
	$img_tmp_name = $_FILES['img']['tmp_name'];
	$admin = $_SESSION['admin'];
	$now = date("Y-m-d H:i:s");
	// $img_type = $_FILES['img']['type'];
	// $img_size = $_FILES['img']['size'];
	// echo '<script>window.location.replace("http://localhost/garmod/admin/index.php?con=product");</script>';
	// die();

	if ($id != '' || $id != NULL) {
		# code...
		if ($img_name != ''){
			$location = "../../asset/img/upload/";
			if (move_uploaded_file($img_tmp_name, $location.$img_name)) {
				$update = mysql_query("UPDATE products set name = '$name', price = '$price', stock = '$stock', picture = '$img_name', category = '$category', tag = '$tag', updated_by = '$admin', updated = '$now' WHERE product_id = '$id'");
				if ($update) {
					$_SESSION['msg'] = 'Product is update';
					unlink($img_tmp_name);
					header('location: ../index.php?con=product');
					// echo '<script>window.location.replace("http://localhost/garmod/admin/index.php?con=product");</script>';
				}else{
					$_SESSION['msg'] = 'Fail to Update';
					echo '<script>window.history.back();</script>';
				}
			}
		}else{
			$update = mysql_query("UPDATE products set name = '$name', price = '$price', stock = '$stock', category = '$category', tag = '$tag', updated_by = '$admin', updated = '$now' WHERE product_id = '$id'");
			if ($update) {
				$_SESSION['msg'] = 'Product is update';
				header('location: ../index.php?con=product');
				// echo '<script>window.location.replace("http://localhost/garmod/admin/index.php?con=product");</script>';
			}else{
				$_SESSION['msg'] = 'Fail to Update';
				echo '<script>window.history.back();</script>';
			}
		}	
	}else{
		if (isset($img_name)){
			$location = "../../asset/img/upload/";
			$img_path = "../../asset/img/$img_name";
			if (move_uploaded_file($img_tmp_name, $location.$img_name)) {

				$insert = mysql_query("INSERT INTO products (name, price, stock, picture, category, tag, created, created_by) VALUES ('$name', '$price', '$stock', '$img_name', '$category', '$tag', '$now', '$admin')");
				if ($insert) {
					$_SESSION['msg'] = 'New product has added';
					unlink($img_path);
					header('location: ../index.php?con=product');
					// echo '<script>window.location.replace("http://localhost/garmod/admin/index.php?con=product");</script>';
				}else{
					$_SESSION['msg'] = 'New product failed to added';
					echo '<script>window.history.back();</script>';
				}
			}
		}
	}
}elseif (isset($_GET['id'])) {
	# code...
	$id = $_GET['id'];

	include '../../conn.php';
	$query = mysql_query("SELECT picture from products where product_id = $id");
	$data = mysql_fetch_assoc($query);
	unlink('../../asset/img/upload/'.$data['picture']);

	$delete = mysql_query("DELETE FROM products WHERE product_id = $id ");
	if ($delete) {
		$_SESSION['msg'] = 'Action success';
		header('location: ../index.php?con=product');
		// echo '<script>window.location.replace("http://localhost/garmod/admin/index.php?con=product");</script>';
	}else{
		$_SESSION['msg'] = 'Action Failed';
		echo '<script>window.history.back();</script>';
	}

}else{
	$_SESSION['msg'] = 'Action Failed';
	echo '<script>window.history.back();</script>';
}

?>