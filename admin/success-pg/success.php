<div class="container">
	<br>
	<table id="data-table-simple">
		<thead>
			<tr>
				<th>No. Order</th>
				<th>Name</th>
				<th>Submit Date</th>
				<th>Detail</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include '../conn.php';
			$query_confirmation_user = mysql_query("SELECT * FROM confirmations LEFT JOIN users on confirmations.user_id = users.user_id LEFT JOIN orders on confirmations.no_invoice = orders.no_invoice where confirmations.status = 'accepted'");
			if (mysql_num_rows($query_confirmation_user) > 0) {
				while ($dt_conf_user = mysql_fetch_assoc($query_confirmation_user)) {
					$a = date_create($dt_conf_user['order_date']);
					$date = date_format($a, "d M Y");
					?>
					<tr>
						<td><?php echo $dt_conf_user['no_invoice'] ?></td>
						<td><?php echo $dt_conf_user['name'] ?></td>
						<td><?php echo $date ?></td>
						<td>
							<a class="btn waves-effect waves-light grey darken-4" title="view details this order" data="<?php echo $dt_conf_user['confirmation_id'] ?>" href="#modal1"><i class="material-icons white-text">visibility</i></a>
						</td>
					</tr>
					<?php } 
				}else{ ?>
				<tr>
					<td colspan="4" class="center-align">No confirmation!</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<!-- Modal Structure -->
		<div id="modal1" class="modal">
			<div class="modal-content">

			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
			</div>
		</div>

	</div>

	<script>
		$("a[href='#modal1']").click(function(e){
			e.preventDefault();
			var id = $(this).attr('data');
			$('.modal').openModal();
			$.ajax({
				url : 'success-pg/data.php',
				type: 'get',
				data: 'id='+id,
				success: function(data){
					$(".modal-content").html(data);
				}
			})
		})
	</script>