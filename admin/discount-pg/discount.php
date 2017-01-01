<?php if ($_GET['act'] == ''){ ?>
<div class="container">
	<br>
	<a class="btn waves-effect waves-light grey darken-4" href="index.php?con=admin&act=process">Add New Discount</a>
	<table id="data-table-simple" class="responsive-table display" cellspacing="0">
		<thead>
			<tr>
				<th>Discount</th>
				<th>Description</th>
				<th>Limit</th>
				<th>Status</th>
				<th>Created By</th>
				<th>Created</th>
				<th>Non Active / Active</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include '../conn.php';
			$query_disc = mysql_query("SELECT * from discount");
			while ($data = mysql_fetch_assoc($query_disc)) {
				$user_id = $data['created_by'];
				$query_admin = mysql_query("SELECT * from users where user_id = '$user_id'");
				$dtadmin = mysql_fetch_assoc($query_admin);
				?>
				<tr>
					<td><?php echo $data['discount']; ?></td>
					<td><?php echo $data['desc']; ?></td>
					<td><?php echo $data['limit']; ?></td>
					<td><?php echo $data['status'] == '1' ? 'active' : 'Non Active'; ?></td>
					<td><?php echo $dtadmin['username']; ?></td>
					<td><?php echo $data['created']; ?></td>
					<td>
						<?php  
						if ($data['status'] == '1') { ?>
						<div class="switch">
							<label>
								<input value="<?php echo $data['discount_id'] ?>" type="checkbox" checked>
								<span class="lever"></span>
							</label>
						</div>
						<?php }else{ ?>
						<div class="switch">
							<label>
								<input value="<?php echo $data['discount_id'] ?>" type="checkbox">
								<span class="lever"></span>
							</label>
						</div>
						<?php } ?>
					</td>
					<?php } ?> 
				</tr>
			</tbody>
		</table>
	</div>
	<?php }elseif(($_GET['act'] == 'process') && ($_GET['id'] != '') || ($_GET['act'] == 'process') && ($_GET['id'] == NULL) ){ 
		include 'form_admin.php';
	}
	?>

	

