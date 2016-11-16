<?php  
if ($_GET['id']) {
	# code...
	include '../../conn.php';
	$id = $_GET['id'];
	$query_orderdetail = mysql_query("SELECT * FROM orderdetails a left join products b on a.product_id = b.product_id WHERE order_id = '$id'");
	if (mysql_num_rows($query_orderdetail) > 0) { ?>
	<h3 class="white-text center-align">Your Orders</h3>
	<?php while ($data_orderdetail = mysql_fetch_assoc($query_orderdetail)) { ?>
	<div style="display: inline-block;">
		<img style="margin: 0 5px;" width="70" src="../asset/img/upload/<?php echo $data_orderdetail['picture'] ?>" alt="">
		<div class="white-text">
			<?php echo (strlen($data_orderdetail['name']) <= 8)? $data_orderdetail['name'] : substr($data_orderdetail['name'], 0, 8).'...'; ?>
		</div>
		<div class="white-text center-align">
			<?php echo $data_orderdetail['qty'].' Pcs' ?>
		</div>
	</div>
	<?php } 
}else{
	echo "<h4 class='white-text'>Sorry we have deleted your order detail</h4>";
}  
} ?>