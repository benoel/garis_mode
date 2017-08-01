<!DOCTYPE html>
<?php session_start(); ?>
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
	<!-- <link rel="stylesheet" href="asset/css/animate.css"> -->
	<link rel="stylesheet" href="asset/css/style.css">
	<script src="asset/js/jquery-3.1.1.min.js"></script>
	<script src="asset/js/materialize-pagination.min.js"></script>
	<script src="asset/js/materialize.min.js"></script>
	<script src="asset/js/TweenMax.min.js"></script>
	<script src="asset/js/TimelineMax.min.js"></script>
	<script src="asset/js/ScrollMagic.min.js"></script>
	<script src="asset/js/animation.gsap.min.js"></script>
	<script src="asset/js/debug.addIndicators.min.js"></script>
	<script src="asset/js/myscroll.js"></script>
	<script src="asset/js/myjs.js"></script>
</head>
<body>
	<div class="cover hide-on-small-only" id="cover">
		<div class="row">
			<div class="col m8 s12 center-align">
				<div class="list">
					<div class="scene" id="garmod">
						<img class="logo center-align responsive-img" src="asset/img/logo-garmod.png" alt="">
						<div class="garmodText">
							<img class="responsive-img" width="570" src="asset/img/garmod-text.png" alt="">
						</div> 
						<div class="moto">
							Choose Your Mode
						</div>
						<div class="btnHome">
							<div class="row">
								<div class="col s12">
									<a class="btn-large waves-effect waves-light grey darken-4" href="product.php">SEE PRODUCT</a>
								</div>
							</div>
							<?php 
							if (!$_SESSION['myses']) { ?>
							<div class="row">
								<div class="col s12">
									<a class="btn-large waves-effect waves-light grey darken-4" href="login">Or LOGIN</a>
								</div>
							</div>
							<?php }
							?>
						</div>
					</div>
					<!-- <div class="scene center-align" id="ourTeam">
						<h1>OUR TEAM</h1>
						<h5>Ibnu Abdul Azis</h5>
						<h5>Saud Siregar</h5>
						<h5>Putri Nurdiyanti</h5>
						<h5>Zetry Delta</h5>
						<h5>Anina Ulfa Wibawanti</h5>
						<h5>Nesia Wijaya</h5>
					</div> -->
				</div>
				
			</div>
			<div class="col m4">
				<img class="background" src="asset/img/cover.png" alt="">
			</div>
		</div>
	</div>
	<div class="center hide-on-med-and-up">
		<div class="row">
			<div class="col s12">
				<div id="scene1Mobile">
					<img class="logo center-align responsive-img" src="asset/img/logo-garmod.png" alt="">
					<div class="garmodText">
						<img class="responsive-img" width="570" src="asset/img/garmod-text.png" alt="">
					</div> 
					<div class="moto">
						Choose Your Mode
					</div>
					<div class="btnHome">
						<div class="row">
							<div class="col s12">
								<a class="btn-large waves-effect waves-light grey darken-4" href="product.php">SEE PRODUCT</a>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<a class="btn-large waves-effect waves-light grey darken-4" href="login">Or LOGIN</a>
							</div>
						</div>
					</div>
				</div>
				<div class="center-align" id="ourTeamMobile">
					<h1>OUR TEAM</h1>
					<h5>Ibnu Abdul Azis</h5>
					<h5>Saud Siregar</h5>
					<h5>Putri Nurdiyanti</h5>
					<h5>Zetry Delta</h5>
					<h5>Anina Ulfa Wibawanti</h5>
					<h5>Nesia Wijaya</h5>
				</div>
			</div>
		</div>
	</div>
	<div class="cover center" id="cover2">
		<div class="just_arrived">JUST ARRIVED!</div>
		<div style="height: 475px;" class="carousel">
			<?php  
			include 'conn.php';
			$query_product = mysql_query("SELECT * from products order by created desc limit 0,5");
			while ($dt_product = mysql_fetch_assoc($query_product)) { ?>
			<div class="carousel-item">
				<a href="action/?act=detail_product&id=<?php echo $dt_product['product_id'] ?>"><img class="responsive-img" src="asset/img/upload/<?php echo $dt_product['picture']; ?>"></a>
				<div class=""><?php echo (strlen($dt_product['name']) <= 15)? $dt_product['name'] : substr($dt_product['name'], 0, 15).'...';  ?></div>
			</div>
			<?php } ?>
		</div>
		<h3>*Get Discount Up To 10%</h3>
	</div>
	<footer style="margin-top: 0; background-color: #F5F3F4;" class="page-footer">
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