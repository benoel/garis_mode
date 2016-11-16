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
					
					<div class="col s4">
						<div class="login-box hoverable white center-align">
							<img width="200" class="responsive-img" src="../asset/img/logo-garmod.png" alt="">
							<div class="login-text center-align">
								Log In
							</div>
							<div class="divider"></div>
							<div class="login-form center-align">
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
											<button type="submit" class="btn waves-effect waves-light grey darken-4" name="login">Login</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col s8">
						<div class="register-box hoverable white">
							<div class="register-text center-align">
								Register
							</div>
							<div class="divider"></div>
							<div class="register-form center-align">
								<form action="check_process.php" method="post">
									<div class="row">
										<div class="input-field col s6">
											<input id="username" type="text" name="username" required>
											<label class="active" for="username">Username</label>
										</div>
										<div class="input-field col s6">
											<input id="fullname" type="text" name="full_name" required>
											<label for="fullname">Full Name</label>
										</div>
										<div class="input-field col s12">
											<textarea id="addres" class="materialize-textarea" required name="address"></textarea>
											<label for="addres">Addres</label>
										</div>
										<div class="input-field col s6">
											<input id="phone" type="text" name="phone" required>
											<label for="phone">Phone</label>
										</div>
										<div class="input-field col s6">
											<input id="email" type="email" name="email" required>
											<label for="email">E-mail</label>
										</div>
										<div class="input-field col s6">
											<input id="121" type="password" name="password" required>
											<label for="121">password</label>
										</div>
										<div class="input-field col s6">
											<input id="12" type="password" name="conf_password" required>
											<label for="12">Confirmation Password</label>
										</div>
										<div class="col s12">
											<button type="submit" class="btn waves-effect waves-light grey darken-4" name="register">Register</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="login-footer right-align">
					@ Copyright Garis Mode
				</div>
			</div>
		</div>
	</div>



</body>
</html>