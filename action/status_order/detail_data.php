<?php  
if ($_GET['id']) {
	# code...
	include '../../conn.php';
	$id = $_GET['id'];
	$query_orderdetail = mysql_query("SELECT * FROM orderdetails a left join products b on a.product_id = b.product_id WHERE order_id = '$id'");
	if (mysql_num_rows($query_orderdetail) > 0) { ?>
	<h3 class="center-align">Your Orders</h3>
	<?php while ($data_orderdetail = mysql_fetch_assoc($query_orderdetail)) { ?>
	<div class="col s12 l12 center-align">
		<img class="img-responsive" src="../asset/img/upload/<?php echo $data_orderdetail['picture'] ?>" alt="">
		<div style="font-weight: 600; font-size: 20px;">
			<?php echo $data_orderdetail['name']; //(strlen($data_orderdetail['name']) <= 8)? $data_orderdetail['name'] : substr($data_orderdetail['name'], 0, 8).'...'; ?>
		</div>
		<div class="center-align">
			<?php echo $data_orderdetail['qty'].' Pcs' ?>
		</div>
	</div>
	<?php } 
}else{
	echo "<h4>Sorry we have deleted your order detail!</h4>";
}  
} ?>