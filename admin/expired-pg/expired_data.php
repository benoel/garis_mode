<?php  
include '../../conn.php';
$now = date("Y-m-d H:i:s");
$query_order_expired = mysql_query("SELECT * FROM orders where status = 'waiting' and '$now' >= expired_date");
if (mysql_num_rows($query_order_expired) > 0) {
	while ($dt_order = mysql_fetch_assoc($query_order_expired)) {
		$a = date_create($dt_order['order_date']);
		$date = date_format($a, "d M Y");
		$user_id = $dt_order['user_id'];
		?>
		<tr>
			<td><?php echo $dt_order['no_invoice'] ?></td>
			<td><?php echo $dt_order['name'] ?></td>
			<td class="<?php echo ($dt_order['status'] == 'waiting')? 'yellow-text text-accent-4' : 'red-text text-accent-4' ?>"><?php echo $dt_order['status']  ?></td>
			<td><?php echo 'Rp. '.$dt_order['grand_total'] ?></td>
			<td><?php echo $date; ?></td>
			<td>
				<?php
				$query_user = mysql_query("SELECT name from users where user_id = '$user_id'");
				$dt_user = mysql_fetch_assoc($query_user);
				echo $dt_user['name'];
				?>
			</td>
			<td>
				<?php  
				if ($dt_order['status'] == 'waiting') {	?>
				<a class="btn waves-effect waves-light grey darken-4" title="Click for cancel this order" href="expired-pg/expired-process.php?order=<?php echo $dt_order['order_id'] ?>"><i class="material-icons white-text">close</i></a> <!-- <a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="View Details" data="<?php echo $dt_order[confirmation_id] ?>" href="#modal1"><i class="material-icons">visibility</i></a> -->
				<?php } ?>
			</td>
		</tr>
		<?php }
	}else{?>
	<tr>
		<td colspan="7" class="center-align">No Expired Order!</td>
	</tr>
	<?php } ?>