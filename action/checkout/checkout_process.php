<?php 
session_start();

if (isset($_POST['submit'])) {
	# code...
	include '../../conn.php';
	$ses = $_SESSION['myses'];
	$query_user = mysql_query("SELECT * FROM users WHERE username = '$ses'");
	$user = mysql_fetch_assoc($query_user);
	
	function transaksi_id() {
		$dataMax = mysql_fetch_assoc(mysql_query("SELECT SUBSTR(MAX(no_invoice),-5) AS ID  FROM orders")); // ambil data maximal dari id transaksi
		$param='GRM';
            if($dataMax['ID']=='') { // bila data kosong
            	$ID = $param.'00001';
            }else {
            	$MaksID = $dataMax['ID'];
            	$MaksID++;
                if($MaksID < 10) $ID = $param."0000".$MaksID; // nilai kurang dari 10
                else if($MaksID < 100) $ID = $param."000".$MaksID; // nilai kurang dari 100
                else if($MaksID < 1000) $ID = $param."00".$MaksID; // nilai kurang dari 1000
                else if($MaksID < 10000) $ID = $param."0".$MaksID; // nilai kurang dari 10000
                else $ID = $MaksID; // lebih dari 10000
            }

            return $ID;
        }

        // mysql_query("INSERT INTO master_transaksi (NO_FAKTUR,TG,GRAND_TOTAL) VALUES (".transaksi_id().",NOW(),'515000')");
        $user_id = $user['user_id'];
        $query = mysql_query("select * from carts inner join products on carts.product_id = products.product_id where carts.user_id = '$user_id'");
        $data_cart = mysql_fetch_assoc($query);

        $total_query = mysql_query("SELECT SUM(total_price) as total_price FROM carts where user_id = $user_id");
        $total_price = mysql_fetch_assoc($total_query);
        if ($total_price['total_price'] >= 300000) {
        	$discount = $total_price['total_price'] * 10/100;
        }else{
        	$discount = 0;
        }

        $address1 = $_POST['address1'];
        $phone = $_POST['phone'];
        $name = $_POST['name'];
        $address2 = $_POST['address2'];
        $zip_code = $_POST['zip_code'];
        $city = $_POST['city'];
        $courier = $_POST['courier'];
        $service = $_POST['service'];
        $cost = $_POST['cost'];
        $grand_total = $total_price['total_price'] - $discount + $cost;
        // echo $city;
        // echo $cost;
        // die();
        $transfer_to = $_POST['transfer_to'];
        $status = "waiting";
        $user_id = $user['user_id'];
        $no_invoice = transaksi_id();
        $expired = date('Y-m-d H:i:s', time() +600);
        // $q = mysql_query("select * from orders where order_id = 27");
        // $d = mysql_fetch_assoc($q);
        // $cd = date_create($d['order_date']);
        // echo date_format($cd, "h:i:s").'<br>';
        // echo $rec = date_format($cd, "Y-m-d").'<br>';

        // die();
        $insert = mysql_query("INSERT INTO orders (no_invoice, user_id, name, transfer_to, delivery_address, delivery_address_2, city, courier, service, cost_courier, zip_code, phone, status, grand_total, expired_date) VALUES ('$no_invoice', '$user_id', '$name', '$transfer_to', '$address1', '$address2', '$city', '$courier', '$service', '$cost', '$zip_code', '$phone', '$status', '$grand_total', '$expired')");


        if ($insert) {
        # code...
        	$query_order = mysql_query("SELECT * FROM orders WHERE user_id = '$user_id' and no_invoice = '$no_invoice'");
        	$data_order = mysql_fetch_assoc($query_order);
        	$order_id = $data_order['order_id'];
        	$query_cart = mysql_query("select * from carts inner join products on carts.product_id = products.product_id where carts.user_id = '$user_id'");
        	while ( $data_cart = mysql_fetch_assoc($query_cart)) {
        		# code...
        		$product_id = $data_cart['product_id'];
        		$qty = $data_cart['qty'];
        		$total_price = $data_cart['total_price'];
        		$insert_order_detail = mysql_query("INSERT INTO orderdetails (order_id, product_id, qty, total_price) VALUES ('$order_id', '$product_id', '$qty', '$total_price')");
        	}
        	if ($insert_order_detail) {
        		# code...
        		$query_cart = mysql_query("select * from carts inner join products on carts.product_id = products.product_id where carts.user_id = '$user_id'");
        		while ($data_cart = mysql_fetch_assoc($query_cart)) {
        			$tot_qty = $data_cart['stock'] - $data_cart['qty'];
        			$prd_id = $data_cart['product_id'];
        			$update_product = mysql_query("UPDATE products set stock = '$tot_qty' where product_id = '$prd_id' ");
        		}
        		if ($update_product) {
        			# code...
        			$delete_cart = mysql_query("DELETE FROM carts where user_id = '$user_id' ");

        			if ($delete_cart) {
        				# code...
                        $_SESSION['msg'] = 'Product has move to your order!';
                        header('location: ../index.php?act=status_order');
        				// echo '<script>window.location.replace("http://localhost/garmod/status_order.php");</script>'; 
                    }

        			// echo "sukses";
                }
        		// echo 'sukses';
            }
        	// echo 'sukses';
        }else{
            $_SESSION['msg'] = 'There is something wrong!!';
            echo '<script>window.history.back();</script>';
        }
    }

    ?>