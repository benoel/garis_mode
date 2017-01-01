<?php if ($_GET['act'] == ''){ ?>
<div class="container">
	<br>
	<a class="btn waves-effect waves-light grey darken-4" href="index.php?con=product&act=process">Add New Product</a>
	<table id="data-table-simple" class="responsive-table display">
		<thead>
			<tr>
				<th>Procut Name</th>
				<th>Price</th>
				<th>Stock</th>
				<th>Category</th>
				<th>Created</th>
				<th>Created by</th>
				<th>Updated</th>
				<th>Updated by</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include ('../conn.php');

			$query = mysql_query("SELECT * from products");
			while ($data = mysql_fetch_assoc($query)) {
				$id_created = $data['created_by'];
				$id_updated = $data['updated_by'];
				$query_created = mysql_query("SELECT * from users where user_id = '$id_created'");
				$dt_created = mysql_fetch_assoc($query_created);
				$query_updated = mysql_query("SELECT * from users where user_id = '$id_updated'");
				$dt_updated = mysql_fetch_assoc($query_updated);
				?>
				<tr>
					<td><?php echo (strlen($data['name']) <= 15)? $data['name'] : substr($data['name'], 0, 15).'...';  ?></td>
					<td><?php echo $data['price'] ?></td>
					<td><?php echo $data['stock'] ?></td>
					<td><?php echo $data['category'] ?></td>
					<td><?php echo $data['created'] ?></td>
					<td><?php echo $dt_created['username'] ?></td>
					<td><?php echo ($data['updated'] != '')? $data['updated'] : '-'; ?></td>
					<td><?php echo ($dt_updated['username'] != '')? $dt_updated['username'] : '-'; ?></td>
					<td>
						<?php  
						include ('../conn.php');
						$admin_id = $_SESSION['admin'];
						$query_admin = mysql_query("SELECT * from users where user_id = '$admin_id'");
						$dt_admin = mysql_fetch_assoc($query_admin);
						?>
						<?php if ($dt_admin['role'] == 3): ?>
							<a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete" href="product-pg/act_process.php?id=<?php echo $data['product_id'] ?>"><i class="material-icons">delete</i></a> &nbsp;
						<?php endif ?>
						<a class="tooltipped" data-position="bottom" data-delay="50	" data-tooltip="Edit" href="index.php?con=product&act=process&id=<?php echo $data['product_id'] ?>"><i class="material-icons">edit</i></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php }elseif(($_GET['act'] == 'process') && ($_GET['id'] != '') || ($_GET['act'] == 'process') && ($_GET['id'] == NULL) ) {
		include 'form_product.php';
	}

	?>