<?php session_start(); 
include '../conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>
		Garis Mode
	</title>
	<link rel="stylesheet" href="../asset/css/materialize.min.css">
	<link rel="stylesheet" href="../asset/css/fonts.css">
	<link rel="stylesheet" href="../asset/css/style.css">
	<script src="../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../asset/js/materialize.min.js"></script>
	<script src="../asset/js/myjs.js"></script>
</head>
<body>
	<div class="msg-container">
		<div id="msg" class="<?php echo ($_SESSION["msg"] != '') ? 'actv' : '' ; ?> msg card-panel">
			<?php echo ($_SESSION["msg"] != '') ? $_SESSION["msg"] : '' ; ?>
		</div>
	</div>
	<div class="header">
		<nav class="white">
			<div class="nav-wrapper">
				<div class="container">	
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons grey-text text-darken-4">menu</i></a>
					<ul class="left hide-on-med-and-down">
						<li><a class="grey-text text-darken-4" href="../index.php"><img style="padding: 4px;" width="63" src="../asset/img/logo-garmod.png" alt="../index.php"></a></li>
						<li><a class="grey-text text-darken-4" href="../index.php?category=men">Men</a></li>
						<li><a class="grey-text text-darken-4" href="../index.php?category=women">Women</a></li>
					</ul>
					<ul class="right">
						<?php 
						if (!isset($_SESSION['myses'])) { ?>
						<li><a class="grey-text text-darken-4" href="../login"><i class="material-icons left">account_circle</i> Login</a></li>
						<?php }else{ ?>
						<li><a class="dropdown-button grey-text text-darken-4" href="#!" data-activates="dropdown1"><i class="material-icons left">account_circle</i> Hello, <?php echo $_SESSION['myses']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
						<?php } ?>
						<ul id="dropdown1" class="dropdown-content">
							<li><a class="grey-text text-darken-4" href="?act=status_order">Status Order</a></li>
							<!-- <li><a class="grey-text text-darken-4" href="#!">Confirmation Payment</a></li> -->
							<li class="divider"></li>
							<li><a class="grey-text text-darken-4" href="../logout">Logout</a></li>
						</ul>
						<li><a class="grey-text text-darken-4" href="?act=cart"><i class="material-icons left">shopping_cart</i> Cart (
							<?php
							$ses = $_SESSION['myses'];
							$query_user = mysql_query("SELECT * FROM users WHERE username = '$ses'");
							$user = mysql_fetch_assoc($query_user);
							$user_id = $user['user_id'];
							$query = mysql_query("SELECT * FROM carts WHERE user_id = '$user_id'");
							if (mysql_num_rows($query) == 0) {
								echo "0";
							}else{
								echo mysql_num_rows($query);
							}
							?>
							)</a></li>
						</ul>
						<ul class="side-nav" id="mobile-demo">
							<li><a href="index.php">Home</a></li>
							<li><a href="">Men</a></li>
							<li><a href="">Women</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<a class="btn-floating btn-large waves-effect waves-light blue-grey lighten-2" id="back" href="#"><i class="material-icons">keyboard_backspace</i></a>
			<nav class="bread">
				<div class="nav-wrapper grey darken-4">
					<div class="col s12 container">
						<ul>
							<li>
								<?php  
								if ($_GET['act'] == 'checkout') {
									# code...
									echo "Checkout";
								}elseif ($_GET['act'] == 'confirmation') {
									# code...
									echo "Confirmation";
								}elseif ($_GET['act'] == 'detail_product') {
									# code...
									echo "Detail Product";
								}elseif($_GET['act'] == 'status_order'){
									echo "Status Order";
								}else{
									echo "Cart";
								}
								?>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div class="body-content">
			<?php  
			if ($_GET['act'] == 'checkout') {
				include 'checkout/checkout.php';
			}elseif ($_GET['act'] == 'confirmation') {
				include 'confirmation/confirmation_payment.php';
			}elseif ($_GET['act'] == 'detail_product') {
				include 'detail_product/detail-product.php';
			}elseif($_GET['act'] == 'status_order'){
				include 'status_order/status_order.php';
			}else{
				include 'cart/cart.php';
			}
			?>
		</div>



		<footer class="page-footer">
			<div class="footer-copyright white">
				<div class="container grey-text text-darken-4 right-align">
					© 2016 Copyright Garis Mode
				</div>
			</div>
		</footer>


	</body>
	</html>