<div class="container">
	<br>
	<table id="data-table-simple" class="responsive-table display">
		<thead>
			<tr>
				<th>No. Order</th>
				<th>Ordered by</th>
				<th>Deliver to</th>
				<th>Status</th>
				<th>Sign by</th>
				<th>SUB TOTAL</th>
				<th>Order Date</th>
				<!-- <th>Detail</th> -->
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
					$admin = $dt_order['sign_by'];
					$query_admin = mysql_query("SELECT * from users where user_id = '$admin'");
					$dt_admin = mysql_fetch_assoc($query_admin);
					$user = $dt_order['user_id'];
					$query_user = mysql_query("SELECT * from users where user_id = '$user'");
					$dt_user = mysql_fetch_assoc($query_user);
					?>
					<tr>
						<td><?php echo $dt_order['no_invoice'] ?></td>
						<td><?php echo $dt_user['username'] ?></td>
						<td><?php echo $dt_order['name'] ?></td>
						<td class="<?php echo $color ?>"><?php echo $dt_order['status']  ?></td>
						<td><?php echo $dt_admin['username'] ?></td>
						<td><?php echo 'Rp. '.$dt_order['grand_total'] ?></td>
						<td><?php echo $date ?></td>
						<!-- <td>
							<a class="btn waves-effect waves-light grey darken-4" title="view details this order" data="<?php echo $dt_order['order_id'] ?>" href="#modal"><i class="material-icons white-text">visibility</i></a>
						</td> -->
					</tr>
					<?php } 
				}else{ ?>
				<tr>
					<td colspan="7" class="center-align">No Order!</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<!-- <div id="modal" class="modal">
		<div class="modal-content">

		</div>
		<div class="modal-footer">
			<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
		</div>
	</div> -->
