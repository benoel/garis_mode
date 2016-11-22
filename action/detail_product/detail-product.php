
<div class="container">
	<div class="row">
		<?php 
		include '../conn.php';
		if ($_GET['id'] || isset($_COOKIE['cart'])) {
					# code...
			if ($_GET['id']) {
						# code...
				$id = $_GET['id'];
			}else{
				$id = $_COOKIE['cart'];
			}

			include '../conn.php';
			$query = mysql_query("SELECT * FROM products WHERE product_id = $id");
			$data = mysql_fetch_assoc($query);
		}
		?>
		<div class="col s12 m6 l6">
			<img class="detail-img responsive-img materialboxed" src="../asset/img/upload/<?php echo $data['picture'] ?>" alt="">
		</div>
		<div class="col s12 m6 l6">
			<form action="detail_product/cart-php.php" method="POST">
				<h4><?php echo $data['name']; ?></h4>
				<div class="divider"></div>
				<div class="price-det" style="font-weight: 500; font-size: 30px;">
					Rp <?php echo $data['price'] ?>
				</div>
				<div class="av-stock">
					Available Stock : <?php echo $data['stock'] ?>
				</div>
				<br>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="hidden" name="id" value="<?php echo $data['product_id'] ?> ">
						<input type="text" name="qty" autocomplete="off" id="order" required>
						<label for="order">BUY (pcs)</label>
					</div>
				</div>
				<button id="cart-btn" class="btn waves-effect waves-light grey darken-4" type="submit" name="cart">ADD TO CART</button>
			</form>
		</div>
	</div>
</div>

