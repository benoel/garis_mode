<?php if ($_GET['act'] == ''){ ?>
<div class="container">
	<br>
	<?php 
	include ('../conn.php');
	$user_admin = $_SESSION['admin'];
	$query = mysql_query("SELECT * from admins where username = '$user_admin'");
	$data_query = mysql_fetch_assoc($query); ?>
	<h4>You Login As : <?php echo $user_admin; ?></h4> <a class="btn waves-effect left waves-light grey darken-4" href="index.php?con=admin&act=process&id=<?php echo $data_query['admin_id'] ?>">Edit Your Profile</a>
	<br><br><br>
	<?php if ($data_query['level'] == 1) { ?>
	<a class="btn waves-effect waves-light grey darken-4" href="index.php?con=admin&act=process">Add New Admin</a>
	<table class="responsive-table">
		<thead>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$query_admin = mysql_query("SELECT * from admins");
			while ($data = mysql_fetch_assoc($query_admin)) {
				?>
				<tr>
					<td><?php echo $data['username']; ?></td>
					<td><?php echo $data['name']; ?></td>
					<td>
						<?php if ($data['active'] == 1 ) {?>
						<a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click For Non-Active" href="admin-pg/act_admin.php?act=nonactive&id=<?php echo $data['admin_id'] ?>"><i class="material-icons">sentiment_satisfied</i></a> &nbsp;
						<?php }else{ ?>
						<a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click For Active" href="admin-pg/act_admin.php?act=active&id=<?php echo $data['admin_id'] ?>"><i class="material-icons">sentiment_dissatisfied</i></a> &nbsp;
						<?php } ?>

						<?php
						if ($data['level'] == 1) { ?>
						<a class="tooltipped" data-position="bottom" data-delay="50	" data-tooltip="Click For Regular Admin" href="admin-pg/act_admin.php?act=reg_admin&id=<?php echo $data['admin_id'] ?>"><i class="material-icons">star_rate</i></a>
						<?php }else{ ?>
						<a class="tooltipped" data-position="bottom" data-delay="50	" data-tooltip="Click For Super Admin" href="admin-pg/act_admin.php?act=sup_admin&id=<?php echo $data['admin_id'] ?>"><i class="material-icons">perm_identity</i></a>
						<?php } ?>
					</td>
					<?php } ?> 
				</tr>
			</tbody>
		</table>
		<?php } ?>
	</div>
	<?php }elseif(($_GET['act'] == 'process') && ($_GET['id'] != '') || ($_GET['act'] == 'process') && ($_GET['id'] == NULL) ){ 
		include 'form_admin.php';
	}
	?>

