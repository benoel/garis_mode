<div class="container">
	<br>
	<table>
		<thead>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Addres</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Active</th>
				<th>Last Login</th>
				<th>Created</th>
				<th>Action</th>
			</tr>
		</tr>
	</thead>
	<tbody>
		<?php 
		include ('../conn.php');

		$query = mysql_query("select * from users");

		while ($data = mysql_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['addres']; ?></td>
				<td><?php echo $data['phone']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo ($data['active'] == 1)? "active" : "off" ; ?></td>
				<td><?php echo $data['last_login']; ?></td>
				<td><?php echo $data['created']; ?></td>
				<td>
					<?php 
					if ($data['active'] == 1) {?>
					<a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Non Active This User" href="user-pg/act_process.php?id=<?php echo $data['user_id'] ?>"><i class="material-icons">sentiment_satisfied</i></a>
					<?php }else{ ?>
					<a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Active This User" href="user-pg/act_process.php?id=<?php echo $data['user_id'] ?>"><i class="material-icons">sentiment_very_dissatisfied</i></a>	
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
