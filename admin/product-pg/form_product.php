<div class="container">
	<h3>Add New Product</h3>
	<form action="product-pg/act_process.php" method="post" enctype="multipart/form-data">
		<?php 
		include ('../conn.php');
		if ($_GET['id'] != '') {
			# code...
			$id = $_GET['id'];
			$query = mysql_query("select * from products where product_id = $id");

			$data = mysql_fetch_assoc($query);
		}
		?>
		<input type="hidden" name="id" value="<?php echo ($data['product_id'] != '') ? $data['product_id'] : ''; ?>">
		<div class="row">
			<div class="col l6">
				<div class="row">
					<div class="input-field col l12">
						<input type="text" id="name" name="name" value="<?php echo ($data['name'] != '') ? $data['name'] : ''; ?>" autocomplete="off" required>
						<label for="name">Product Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col l12">
						<input type="text" id="price" name="price" value="<?php echo ($data['price'] != '') ? $data['price'] : ''; ?>" autocomplete="off" required>
						<label for="price">Price</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col l12">
						<input type="text" id="stock" name="stock" value="<?php echo ($data['stock'] != '') ? $data['stock'] : ''; ?>" autocomplete="off" required>
						<label for="stock">Stock</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col l12">
						<input type="text" id="category" name="category" value="<?php echo ($data['category'] != '') ? $data['category'] : ''; ?>"  required>
						<label for="category">Category</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col l12">
						<input type="text" id="tag" name="tag" value="<?php echo ($data['tag'] != '') ? $data['tag'] : ''; ?>">
						<label for="tag">Tag</label>
					</div>
				</div>
				<div class="row">
					<div class="col l12">
						<button class="btn waves-effect waves-light grey darken-4" type="submit" name="save">Save
							<i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</div>
			<div class="col l6">
				<div class="row">
					<div class="input-field col l12">
						<input type="file" id="img" onchange="readURL(this);" name="img">
						<label for="img">Upload Photo</label>
					</div>
				</div>
				<div class="row">
					<div class="col l12">
						<script type="text/javascript">
							function readURL(input) {
								if (input.files && input.files[0]) {
									var reader = new FileReader();

									reader.onload = function (e) {
										$('#blah').attr('src', e.target.result);
									}

									reader.readAsDataURL(input.files[0]);
								}
							}
						</script>
						<div class="img" style="height: 480px; width: 333px; border: 1px solid #212121; overflow: hidden; margin-top: 60px;">
							<img class="responsive-img" id="blah" src="<?php echo ($data['picture'] != '') ? '../asset/img/upload/'.$data['picture'] : NULL; ?>" alt=""/>
							<div class="img-text" style="text-align: center; margin-top: 240px;">
								No image selected
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>