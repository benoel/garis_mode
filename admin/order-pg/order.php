<div class="container">
	<br>
	<table id="data-table-simple" class="responsive-table display">
		<thead>
			<tr>
				<th>No. Order</th>
				<th>Name</th>
				<th>Status</th>
				<th>SUB TOTAL</th>
				<th>Order Date</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			include '../conn.php';
			$query_order = mysql_query("SELECT * FROM orders");
			if (mysql_num_rows($query_order) > 0) {
				while ($dt_order = mysql_fetch_assoc($query_order)) {
					$a = date_create($dt_order['order_date']);
					$date = date_format($a, "d M Y");
					if ($dt_order['status'] == 'waiting') {
					 	# code...
						$color = 'yellow-text';
					}elseif ($dt_order['status'] == 'expired') {
						# code...
						$color = 'red-text';
					}else{
						$color = 'green-text';
					}
					?>
					<tr>
						<td><?php echo $dt_order['no_invoice'] ?></td>
						<td><?php echo $dt_order['name'] ?></td>
						<td class="<?php echo $color ?>"><?php echo $dt_order['status']  ?></td>
						<td><?php echo 'Rp. '.$dt_order['grand_total'] ?></td>
						<td><?php echo $date ?></td>
					</tr>
					<?php } 
				}else{ ?>
				<tr>
					<td colspan="6" class="center-align">No Expired Order!</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>