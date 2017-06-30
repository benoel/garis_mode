<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="asset/img/logo-garmod.png">
	<title>
		Garis Mode
	</title>
	<link rel="stylesheet" href="asset/css/materialize.min.css">
	<link rel="stylesheet" href="asset/css/fonts.css">
	<link rel="stylesheet" href="asset/css/animate.css">
	<link rel="stylesheet" href="asset/css/style.css">
	<script src="asset/js/jquery-3.1.1.min.js"></script>
	<script src="asset/js/materialize-pagination.min.js"></script>
	<script src="asset/js/materialize.min.js"></script>
	<script src="asset/js/myjs.js"></script>
</head>
<body>
	<div class="header">
		<nav class="grey darken-4">
			<div class="nav-wrapper">
				<div class="container">	
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul class="left hide-on-med-and-down">
						<li><a class="grey-text text-darken-4" href="product.php"><img style="padding: 4px;" width="63" src="asset/img/logo-garmod.png" alt=""></a></li>
						<li><a href="index.php">Home</a></li>
						<li><a href="?category=men">Men</a></li>
						<li><a href="?category=women">Women</a></li>
					</ul>

					<ul id="mobile-demo" class="side-nav">
						<li class="center-align" style="margin: 35px 0;"><a class="grey-text text-darken-4" href="index.php"><img width="63" src="asset/img/logo-garmod.png" alt=""></a></li>

						<div class="divider"></div>
						<li><a href="index.php">Home</a></li>
						<li><a href="?category=men">Men</a></li>
						<li><a href="?category=women">Women</a></li>
					</ul>

					<ul class="right">
						<?php
						include 'conn.php';
						$ses = $_SESSION['myses'];
						$query_user = mysql_query("SELECT * FROM users WHERE username = '$ses'");
						$user = mysql_fetch_assoc($query_user);
						$user_id = $user['user_id'];
						$query = mysql_query("SELECT * FROM carts WHERE user_id = '$user_id'");

						if (mysql_num_rows($query) == 0) {
							$shopping_cart = "0";
						}else{
							$shopping_cart = mysql_num_rows($query);
						} 
						if (!isset($_SESSION['myses'])) { ?>
						<li><a href="login"><i class="material-icons left">account_circle</i> Login</a></li>
						<?php }else{ ?>
						<li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">account_circle</i> Hello, <?php echo $_SESSION['myses']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
						<?php } ?>
						<ul id="dropdown1" class="dropdown-content">
							<li><a class="grey-text text-darken-4" href="action/index.php?act=status_order">Status Order</a></li>
							<li><a class="grey-text text-darken-4" href="profile/">Profile</a></li>
							<li class="hide-on-med-and-up"><a href="action/?act=cart" class="grey-text text-darken-4"><i class="material-icons left">shopping_cart</i> Cart ( <?php echo $shopping_cart; ?> )</a></li>
							<li class="divider"></li>
							<li><a class="grey-text text-darken-4" href="logout">Logout</a></li>
						</ul>
						<li class="hide-on-small-only"><a href="action/?act=cart"><i class="material-icons left">shopping_cart</i> Cart ( <?php echo $shopping_cart; ?> )</a></li>
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

		
		<?php 
		include 'conn.php';
		// setting per page mau tampil berapa (efek ke pagination)
		$perpage = 9;
		//end setting

		if ($_GET['category']) {
			$category = $_GET['category'];
			$query = mysql_query("SELECT count(*) as total from products where category = '$category' ");
			$data = mysql_fetch_assoc($query);
			$total = $data['total'];
			$page = ceil($total / $perpage); ?>

			<input type="hidden" name="category" id="category" value="<?php echo $_GET['category']; ?>">

			<?php }
			else { 
				$query = mysql_query("SELECT count(*) as total from products");
				$data = mysql_fetch_assoc($query);
				$total = $data['total'];
				$page = ceil($total / $perpage);
				?>

				<input type="hidden" name="category" id="category" value="">

				<?php } ?>
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
								}
							});
						});
					});
				</script>













				<footer style="background-color: #F4F2F3; box-shadow: -1px -1px 10px #424242; margin-top: 30px;" class="page-footer">
					<div class="container">
						<div class="row">
							<div class="col l6 s12">
								<h5 class="grey-text text-darken-4">Garis Mode</h5>
								<p class="grey-text text-darken-4">We just person who want to be success.</p>
							</div>
							<div class="col l4 offset-l2 s12">
								<h5 class="grey-text text-darken-4">Contact</h5>
								<ul>
									<li>Email : alfajrikozer@yahoo.com</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="footer-copyright grey darken-3">
						<div class="container">
							© 2016 Copyright GARIS MODE
						</div>
					</div>
				</footer>

			</body>
			</html>