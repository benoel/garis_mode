<div class="container">
	<div class="divider"></div>
	<div class="row">
		<div class="col s12 m8 l8">
			<?php
			include '../conn.php';
			$ses = $_SESSION['myses'];
			$query_user = mysql_query("SELECT * FROM users WHERE username = '$ses'");
			$user = mysql_fetch_assoc($query_user);
			$user_id = $user['user_id'];
			$query = mysql_query("select * from carts inner join products on carts.product_id = products.product_id where carts.user_id = '$user_id'");
			if ($user_id == '') {
				# code...
				echo "<h1 style='padding: 50px;' class='center-align'>You Don't Have Any Product in Your Cart Yet :( </h1>";

			}else{

				$total_query = mysql_query("SELECT SUM(total_price) as total_price FROM carts where user_id = $user_id");

				$total_price = mysql_fetch_assoc($total_query);

				if (mysql_num_rows($query) > 0) {
					while ($data = mysql_fetch_assoc($query)) {?>

					<div class="row">
						<div class="col s4 m4">
							<img width="150" src="../asset/img/upload/<?php echo $data['picture'] ?>" alt="">
						</div>
						<div class="col s7 m7">
							<h5><strong><?php echo $data['name']; ?></strong></h5>
							<table>
								<thead>
									<tr>
										<th>Price</th>
										<th>Qty</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $data['price']; ?></td>
										<td><?php echo $data['qty']; ?></td>
										<td><?php echo $data['total_price']; ?></td>
									</tr>
								</tbody>
							</table>
							<a class="btn waves-effect waves-light white grey-text text-darken-4" href="cart/cart_process.php?id=<?php echo $data['cart_id'] ?>">Delete From Cart</a>
						</div>
					</div>
					<div class="divider"></div>
					<?php } 
				}else{
					echo "

					<h1 style='padding: 50px;' class='center-align'>You Don't Have Any Product in Your Cart Yet :( </h1>

					";
				}
			} ?>
		</div>
		<div class="col s12 m4 l4">
			<div class="row">
				<div class="col s6">
					<div class="total">
						Total Price : 
					</div>
				</div>
				<div class="col s6">
					<div class="tot-price">
						Rp. <?php echo $total_price['total_price']; ?>	
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="ppn">
						Discount : 
					</div>
				</div>
				<div class="col s6">
					<div class="tot-ppn">
						<?php 
						if ($total_price['total_price'] >= 300000) {
									# code...
							$disount = $total_price['total_price'] * 10/100;
							echo 'Rp. '. $disount;
						}else{
							$disount = 0;
							echo "Rp 0";
						}
						?>
					</div>
				</div>
			</div>
			<div class="divider"></div>
			<div class="row">
				<div class="col s6">
					<div class="grand-total-text">
						GRAND TOTAL :
					</div>
				</div>
				<div class="col s6">
					<div class="grand-total">
						<?php 
						echo 'Rp. '. $grand_total = $total_price['total_price'] - $disount; 
						?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<a href="?act=checkout" class="btn waves-effect waves-light grey darken-4 block">CheckOut</a>
				</div>
				<div class="col s6">
					<a href="../index.php" class="btn waves-effect waves-light grey darken-4 block">home</a>
				</div>

			</div>
		</div>
	</div>
</div>
