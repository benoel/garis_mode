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
	<link rel="stylesheet" href="../asset/css/animate.css">
	<link rel="stylesheet" href="../asset/css/style.css">
	<script src="../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../asset/js/materialize.min.js"></script>
	<script src="../asset/js/myjs.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col l4">
				<div>
					<div class="center-align">
						<img width="205" class="responsive-img" src="../asset/img/logo-garmod.png" alt="">
					</div>

					<div class="divider"></div>
					<ul class="nav-profile">
						<li><a href="index.php?act=">Change Password</a></li>
						<li><a href="../logout">Logout</a></li>
					</ul>
				</div>
			</div>
			<div class="col l8">
				<div class="card-panel">
					<?php  
					include '../conn.php';
					$ses = $_SESSION['myses'];
					$query_user = mysql_query("SELECT * FROM users WHERE username = '$ses'");
					$user = mysql_fetch_assoc($query_user);
					?>
					<h4>Profile</h4>
					<?php  
					if (isset($_GET['act'])) {
						# code...
						include 'change_pass.php';
					}else{ ?>
					<div class="divider"></div>
					<div class="row">
						<form action="profile_process.php" method="POST">
							<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
							<div class="input-field col l6">
								<input disabled style="color: #212;" value="<?php echo $user['username']; ?>" type="text" id="1" name="username" autocomplete="off"  >
								<label for="1">Username</label>
							</div>
							<div class="input-field col l6">
								<input value="<?php echo $user['name']; ?>" type="text" id="2" name="name" autocomplete="off"  >
								<label for="2">Full Name</label>
							</div>
							<div class="input-field col l6">
								<input value="<?php echo $user['address']; ?>" type="text" id="3" name="address" autocomplete="off"  >
								<label for="3">Address</label>
							</div>
							<div class="input-field col l6">
								<input value="<?php echo $user['phone']; ?>" type="text" id="4" name="phone" autocomplete="off"  >
								<label for="4">Phone</label>
							</div>
							<div class="input-field col l6">
								<input value="<?php echo $user['email']; ?>" type="email" id="5" name="email" autocomplete="off"  >
								<label for="5">Email</label>
							</div>
						</div>
						<button class="btn waves-effect waves-light grey darken-4" type="submit" name="update_profile">Update</button>
					</form>
				</div>
				<?php } ?>
			</div>

		</div>
	</div>

</body>
</html>