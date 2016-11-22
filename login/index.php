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
	<link rel="stylesheet" href="../asset/css/materialize.min.css">
	<link rel="stylesheet" href="../asset/css/fonts.css">
	<link rel="stylesheet" href="../asset/css/style-login.css">
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
	<a class="btn-floating btn-large waves-effect waves-light blue-grey lighten-2" id="back" href="#"><i class="material-icons">keyboard_backspace</i></a>
	<div class="container">
		<div class="row">
			<div class="col m12">
				<div class="header center-align">
					GARIS MODE
				</div>
				<div class="row">

					<?php  
					if ($_GET['act'] == 'register') {
						include 'register.php';
					}elseif ($_GET['act'] == 'change_pass' && $_GET['auth_user'] != '' && $_GET['lp'] != '') {
						include 'change_pass.php';
					}elseif ($_GET['act'] == 'sending_pass') {
						include 'sending_pass.php';
					}elseif ($_GET['act'] == 'forgot_password') { 
						include 'forgot_password.php';
					}else{ ?>
					
					<div class="col s4 offset-s4">
						<div class="card-panel hoverable white ">
							<!-- <img width="200" class="responsive-img" src="../asset/img/logo-garmod.png" alt=""> -->
							<div class="login-text center-align">
								Log In
							</div>
							<div class="divider"></div>
							<div class="login-form">
								<div class="row">
									<form action="check_process.php" method="post">
										<div class="input-field col s12">
											<input id="username" name="username" type="text">
											<label class="active" for="username">Username</label>
										</div>
										<div class="input-field col s12">
											<input id="password" name="password" type="password">
											<label for="password">password</label>
										</div>
										<div class="col s12">
											<button type="submit" class="btn block waves-effect waves-light grey darken-4" name="login">Login</button>
										</div>
										<div class="col s12">
											<br>
											<a href="index.php?act=forgot_password" class="grey-text text-darken-4">Forgot Password?</a>
										</div>
										<div class="col s12">
											<a href="index.php?act=register" class="grey-text text-darken-4">Register</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>

				<div class="login-footer right-align">
					@ Copyright Garis Mode
				</div>
			</div>
		</div>
	</div>



</body>
</html>