<?php  
if ($_GET['id']) {
	# code...
	include '../../conn.php';
	$id = $_GET['id'];
	$query_conf = mysql_query("SELECT * from confirmations where confirmation_id = '$id'");
	$data_conf = mysql_fetch_assoc($query_conf);
	$no_invoice = $data_conf['no_invoice'];
	// die();
	$query_order = mysql_query("SELECT * from orders where no_invoice = '$no_invoice'");
	$data_order = mysql_fetch_assoc($query_order);
	$order_id = $data_order['order_id'];

	$query_orderdetail = mysql_query("SELECT * FROM orderdetails a left join products b on a.product_id = b.product_id WHERE order_id = '$order_id'");
	?>
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<table>
					<tbody>
						<tr>
							<td>Name</td>
							<td>: <?php echo $data_order['name']; ?></td>
						</tr>
						<tr>
							<td>Addres</td>
							<td>: <?php echo $data_order['delivery_address']; ?></td>
						</tr>
						<tr>
							<td>Addres 2</td>
							<td>: <?php echo ($data_order['delivery_address_2'] != '') ? $data_order['delivery_address_2'] : '-' ; ?></td>
						</tr>
						<tr>
							<td>City</td>
							<td>: <?php echo $data_order['city']; ?></td>
						</tr>
						<tr>
							<td>Postal/ZIP Code</td>
							<td>: <?php echo $data_order['zip_code']; ?></td>
						</tr>
						<tr>
							<td>Transfer To</td>
							<td>: <?php echo $data_order['transfer_to']; ?></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>: <?php echo $data_order['phone']; ?></td>
						</tr>
						<tr>
							<td>SUBTOTAL</td>
							<td>: Rp. <?php echo $data_order['grand_total']; ?></td>
						</tr>
						<tr>
							<td>Expired Date</td>
							<td>: <?php $a = date_create($dt_order['order_date']);
								echo $date = date_format($a, "d M Y");?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="divider"></div>
		<div class="row">
			<?php while ($data = mysql_fetch_assoc($query_orderdetail)) { ?>
			<div class="col m3 l3 s12">
				<div class="modal-product center-align">
					<img class="responsive-img" src="../asset/img/upload/<?php echo $data['picture'] ?>" alt="">
					<div style="font-weight: 500; font-size: 20px;"><?php echo $data['name'] ?></div>
					<div style="font-weight: 400; font-size: 18px;">Order: <?php echo $data['qty'] ?> Pcs</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="modal-footer">
		
	</div>
	<?php
}
?>