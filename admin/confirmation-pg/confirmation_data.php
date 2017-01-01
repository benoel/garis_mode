<?php  

include '../../conn.php';
$query_confirmation_user = mysql_query("SELECT * FROM confirmations LEFT JOIN users on confirmations.user_id = users.user_id LEFT JOIN orders on confirmations.no_invoice = orders.no_invoice where confirmations.status = 'waiting'");
if (mysql_num_rows($query_confirmation_user) > 0) {
	while ($dt_conf_user = mysql_fetch_assoc($query_confirmation_user)) {
		$a = date_create($dt_conf_user['order_date']);
		$date = date_format($a, "d M Y");
		?>
		<tr>
			<td><?php echo $dt_conf_user['no_invoice'] ?></td>
			<td><?php echo $dt_conf_user['name'] ?></td>
			<td><?php echo $dt_conf_user['bankname'] ?></td>
			<td><?php echo $dt_conf_user['accname'] ?></td>
			<td><?php echo $dt_conf_user['noacc'] ?></td>
			<td><?php echo $dt_conf_user['message'] ?></td>
			<td class="<?php echo ($dt_conf_user['status'] == 'waiting')? 'yellow-text text-accent-4' : 'green-text text-accent-4' ?>"><?php echo $dt_conf_user['status']  ?></td>
			<td><?php echo 'to '.$dt_conf_user['transfer_to'].' - Rp. '.$dt_conf_user['grand_total'] ?></td>
			<td><?php echo $date ?></td>
			<td>
				<?php  
				if ($dt_conf_user['status'] == 'waiting') {	?>
				<a class="btn waves-effect waves-light grey darken-4" title="Click for accepting this payment" href="confirmation-pg/confirmation_process_acc.php?conf_id=<?php echo $dt_conf_user[confirmation_id] ?>"><i class="material-icons white-text">warning</i></a>
				<?php }else{ ?>
				<a class="btn waves-effect waves-light grey darken-4" style="cursor: pointer;" title="Accepted"><i class="material-icons white-text">thumb_up</i></a>
				<?php } ?>
			</td>
			<td>
				<a class="btn waves-effect waves-light grey darken-4" title="view details this order" data="<?php echo $dt_conf_user['confirmation_id'] ?>" href="#modal1"><i class="material-icons white-text">visibility</i></a>
			</td>
			<td>
				<a class="btn waves-effect waves-light grey darken-4" title="view upload pict this order" data="<?php echo $dt_conf_user['confirmation_id'] ?>" href="#upload"><i class="material-icons white-text">credit_card</i></a>
			</td>
		</tr>
		<?php } 
	}else{ ?>
	<tr>
		<td colspan="12" class="center-align">No confirmation!</td>
	</tr>
	<?php } ?>

	<script>
		$("a[href='#modal1']").click(function(e){
			e.preventDefault();
			var id = $(this).attr('data');
			$('.modal').openModal();
			$.ajax({
				url : 'confirmation-pg/data_conf.php',
				type: 'get',
				data: 'id='+id,
				success: function(data){
					$(".modal-content").html(data);
				}
			})
		})
		$("a[href='#upload']").click(function(e){
			e.preventDefault();
			var id = $(this).attr('data');
			$('.modal').openModal();
			$.ajax({
				url : 'confirmation-pg/pict.php',
				type: 'get',
				data: 'id='+id,
				success: function(data){
					$(".modal-content").html(data);
				}
			})
		})
	</script>