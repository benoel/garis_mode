<div class="container">
	<br>
	<table id="data-table-simple" class="responsive-table display" cellspacing="0">
		<thead>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Addres</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Last Login</th>
				<th>Created</th>
				<?php  
				include ('../conn.php');
				$admin_id = $_SESSION['admin'];
				$query_admin = mysql_query("SELECT * from users where user_id = '$admin_id'");
				$dt_admin = mysql_fetch_assoc($query_admin);
				?>
				<?php if ($dt_admin['role'] == 3): ?>
					<th>Non Active / Active</th>
				<?php endif ?>
			</tr>
		</tr>
	</thead>
	<tbody>
		<?php 
		include ('../conn.php');

		$query = mysql_query("select * from users where role = '1'");

		while ($data = mysql_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['address']; ?></td>
				<td><?php echo $data['phone']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['last_login']; ?></td>
				<td><?php echo $data['created']; ?></td>
				<?php  
				include ('../conn.php');
				$admin_id = $_SESSION['admin'];
				$query_admin = mysql_query("SELECT * from users where user_id = '$admin_id'");
				$dt_admin = mysql_fetch_assoc($query_admin);
				?>
				<?php if ($dt_admin['role'] == 3): ?>
					<td>
						<?php 
						if ($data['active'] == 1) {?>
						<div class="switch">
							<label>
								<input value="<?php echo $data['user_id'] ?>" type="checkbox" checked>
								<span class="lever"></span>
							</label>
						</div>
						<!-- <a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Non Active This User" href="user-pg/act_process.php?id=<?php echo $data['user_id'] ?>"><i class="material-icons">sentiment_satisfied</i></a> -->
						<?php }else{ ?>
						<!-- <a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Active This User" href="user-pg/act_process.php?id=<?php echo $data['user_id'] ?>"><i class="material-icons">sentiment_very_dissatisfied</i></a> -->
						<div class="switch">
							<label>
								
								<input value="<?php echo $data['user_id'] ?>" type="checkbox">
								<span class="lever"></span>

							</label>
						</div>	
						<?php } ?>
					</td>
				<?php endif ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script>
	$('input[type="checkbox"]').change(function() {
		var data = $(this).val();
		// alert(data);
		$.ajax({
			url: 'user-pg/act_process.php',
			type: 'get',
			data: 'id=' + data,
			success: function(a){
				window.location.reload();
			}
		});
	});
</script>
