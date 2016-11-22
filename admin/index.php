<?php session_start(); 
if (empty($_SESSION['admin'])) {
	header('location: ../index.php');
}
?>
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
	<link rel="stylesheet" href="asset/css/style-admin.css">
	<script src="../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../asset/js/materialize.min.js"></script>
	<script src="asset/js/myjs.js"></script>
</head>
<body>
	<div class="msg-container">
		<div id="msg" class="<?php echo ($_SESSION["msg"] != '') ? 'actv' : '' ; ?> msg card-panel">
			<?php echo ($_SESSION["msg"] != '') ? $_SESSION["msg"] : '' ; ?>
		</div>
	</div>
	
	<div class="wrapper">
		<ul class="side-nav fixed" id="sideNav">
			<li class="center-align"><img class="responsive-img" width="118" style="margin-top: 20px;" src="../asset/img/logo-garmod.png" alt=""></li>
			<div class="divider"></div>
			<li><a href="?con=admin">Admin</a></li>
			<li><a href="?con=product">Product</a></li>
			<li><a href="?con=user">Users</a></li>
			<li><a href="?con=confirmation">Confirmation ( <div style="display: inline-block;" id="confirm_count">0</div> )</a></li>
			<li><a href="?con=expired">Expired ( <div style="display: inline-block;" id="expired_count">0</div> )</a></li>
			<li><a href="../logout">Logout</a></li>
		</ul>

		<div class="main-content">
			<div class="card-panel grey darken-4 white-text">
				<div class="right white-text center-align" id="date_time_display" style="font-size: 15px;"></div>
				<a href="#" data-activates="sideNav" class="button-collapse hide-on-med-and-up"><i class="material-icons">menu</i></a>
				<h1>
					<?php 
					if ($_GET['con'] == 'confirmation') {
						echo "Confirmation";
					}elseif ($_GET['con'] == 'product') {
						echo "Product";
					}elseif ($_GET['con'] == 'user') {
						echo "User";
					}elseif ($_GET['con'] == 'expired') {
						echo "Expired Orders";
					}else {
						echo "Admin";
					} 
					?>
				</h1>
			</div>

			<?php
			if ($_GET['con'] == 'confirmation') {
				include 'confirmation-pg/confirmation.php';
			}elseif ($_GET['con'] == 'product') {
				include 'product-pg/product.php';
			}elseif ($_GET['con'] == 'user') {
				include 'user-pg/user.php';
			}elseif ($_GET['con'] == 'expired') {
				include 'expired-pg/expired.php';
			}else{
				include 'admin-pg/admin.php';
			}


			?>


		</div>
	</div>
	<div class="footer">
		<footer class="page-footer">
			<div class="footer-copyright white">
				<div class="container grey-text text-darken-4 right-align">
					© 2016 Copyright Garis Mode
				</div>
			</div>
		</footer>

	</div>


</body>
</html>