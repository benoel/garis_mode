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
				<th>Tag</th>
				<th>Created</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include ('../conn.php');

			$query = mysql_query("SELECT * from products");

			while ($data = mysql_fetch_assoc($query)) {
				?>
				<tr>
					<td><?php echo $data['name'] ?></td>
					<td><?php echo $data['price'] ?></td>
					<td><?php echo $data['stock'] ?></td>
					<td><?php echo $data['category'] ?></td>
					<td><?php echo $data['tag'] ?></td>
					<td><?php echo $data['created'] ?></td>
					<td>
						<a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete" href="product-pg/act_process.php?id=<?php echo $data['product_id'] ?>"><i class="material-icons">delete</i></a> &nbsp;
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
