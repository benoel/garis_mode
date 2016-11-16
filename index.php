<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>
		Garis Mode
	</title>
	<link rel="stylesheet" href="asset/css/materialize.min.css">
	<link rel="stylesheet" href="asset/css/fonts.css">
	<link rel="stylesheet" href="asset/css/animate.css">
	<link rel="stylesheet" href="asset/css/style.css">
	<script src="asset/js/jquery-3.1.1.min.js"></script>
	<script src="asset/js/materialize-pagination.min.js"></script>
	<!-- <script src="asset/js/jquery-ias.min.js"></script> -->
	<script src="asset/js/materialize.min.js"></script>
	<script src="asset/js/myjs.js"></script>
	<!-- <link href="https://fonts.googleapis.com/css?family=Damion|Patrick+Hand" rel="stylesheet"> -->
</head>
<body>
	<div class="cover">
		<div class="row">
			<div class="col m8 center-align">
				<img class="logo center-align animated fadeInLeft responsive-img" src="asset/img/logo-garmod.png" alt="">
				<!-- <div class="logo-text animated fadeInRight">
					GARIS MODE
				</div>-->
				<div class="animated fadeInRight">
					<img width="700" src="asset/img/garmod-text.png" alt="">
				</div> 
				<div class="moto animated fadeInUp">
					Choose Your Mode
				</div>
			</div>
			<div style="background-color: #F5F3F4; height: 100%;" class="col m4">
				<img class="background" src="asset/img/cover.jpg" alt="">
			</div>
		</div>
	</div>
	
	<div class="header">
		<nav class="grey darken-4">
			<div class="nav-wrapper">
				<div class="container">	
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul class="left hide-on-med-and-down">
						<li><a class="grey-text text-darken-4" href="index.php"><img style="padding: 4px;" width="63" src="asset/img/logo-garmod.png" alt=""></a></li>
						<li><a href="?category=men">Men</a></li>
						<li><a href="?category=women">Women</a></li>
					</ul>

					<ul class="right">
						<?php 
						if (!isset($_SESSION['myses'])) { ?>
						<li><a href="Login"><i class="material-icons left">account_circle</i> Login</a></li>
						<?php }else{ ?><!-- 
						<li class="grey-text text-darken-4">Welcome, <?php echo $_SESSION['myses']; ?> </li>
						<li><a class="grey-text text-darken-4" href="logout">Logout</a></li> -->
						<li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">account_circle</i> Hello, <?php echo $_SESSION['myses']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
						<?php } ?>
						<ul id="dropdown1" class="dropdown-content">
							<li><a class="grey-text text-darken-4" href="action/?act=status_order">Status Order</a></li>
							<!-- <li><a class="grey-text text-darken-4" href="confirmation_payment.php">Confirmation Payment</a></li> -->
							<li class="divider"></li>
							<li><a class="grey-text text-darken-4" href="logout">Logout</a></li>
						</ul>
						<li><a href="action/?act=cart"><i class="material-icons left">shopping_cart</i> Cart (
							<?php
							include 'conn.php';
							$ses = $_SESSION['myses'];
							$query_user = mysql_query("SELECT * FROM users WHERE username = '$ses'");
							$user = mysql_fetch_assoc($query_user);
							$user_id = $user['user_id'];
							$query = mysql_query("SELECT * FROM carts WHERE user_id = '$user_id'");

							if (mysql_num_rows($query) == 0) {
								# code...
								echo "0 ";
							}else{
								
								echo mysql_num_rows($query);
							}
							?>)</a></li>
						</ul>
						<!-- <ul class="side-nav" id="mobile-demo">
							<li><a href="sass.html">Home</a></li>
							<li><a href="badges.html">Men</a></li>
							<li><a href="collapsible.html">Women</a></li>
						</ul> -->
					</div>
				</div>
			</nav>
			<nav>
				<div class="nav-wrapper search" style="background-color: #F4F2F3; color: #212;">
					<div class="input-field">
						<input id="search" type="search" required>
						<label for="search"><i class="material-icons">search</i></label>
						<i class="material-icons">close</i>
					</div>
				</div>
			</nav>
		</div>

		<div class="main-content">
			<div class="container center-align">
				<div id="page" class="row center-align">
					<img src="asset/img/rolling.gif" alt="">
				</div>

				<!-- <div id="pagination">
					<a href="" class="next">next</a>
				</div> -->
				<ul class="pagination">
					<div id="pagination-long"></div>
				</ul>
			</div>
		</div>

		<?php if ($_GET['category']) { ?>
		<input type="hidden" name="category" id="category" value="<?php echo $_GET['category']; ?>">
		<?php }else{ ?>
		<input type="hidden" name="category" id="category" value="">
		<?php } ?>
		<?php 
		include 'conn.php';
		// setting per page mau tampil berapa (efek ke pagination)
		$perpage = 9;
		//end setting

		$query = mysql_query("SELECT count(*) as total from products");
		$data = mysql_fetch_assoc($query);
		$total = $data['total'];
		$page = ceil($total / $perpage);
		?>
		<input type="hidden" id="totalpage" value="<?php echo $page; ?>">
		<script>
			$(function() {
				$(function() {
					var total = $('#totalpage').val();
					var category = $('#category').val();
					$('#pagination-long').materializePagination({
						align: 'center',
						lastPage: total,
						firstPage: 1,
						useUrlParameter: true,
						onClickCallback: function(requestedPage) {
							$.ajax({
								url: 'page.php',
								data: 'page='+ requestedPage +'&category='+ category,
								type: 'GET',
								success: function(data){
									$(document).scrollTop(0);
									$('#page').html(data);
									// $(document).scrollTop(600);
								}
							})

							// $("#search").keyup(function() {
							// 	/* Act on the event */
							// 	var key = $(this).val();
							// 	$.ajax({
							// 		url : 'search',
							// 		data : 'key='+key ,
							// 		type: 'GET',
							// 		beforeSend : function(data){
							// 			$('#page').html("<img src='asset/img/rolling.gif' />");
							// 		},
							// 		success : function(data){
							// 			$('#page').html(data);
							// 		}
							// 	})
							// });
						}
					});
				});
			});
		</script>














		<footer class="page-footer">
			<div class="footer-copyright grey darken-4">
				<div class="container">
					© 2016 Copyright Garis Mode
				</div>
			</div>
		</footer>


	</body>
	</html>