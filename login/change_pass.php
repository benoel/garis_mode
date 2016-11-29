<?php 
if ($_GET['auth_user'] && $_GET['lp']) {

	$username = $_GET['auth_user'];
	$password = $_GET['lp'];
	include '../conn.php';
	$query_user = mysql_query("select * from users where username = '$username' and password = '$password'");
	if ( mysql_num_rows($query_user) > 0 ) {?>
	<div class="col l4 offset-l4">
		<div class="card-panel hoverable white">
			<div class="row">
				<form action="check_process.php" method="post">
					<div class="input-field col s12">
						<input type="hidden" name="auth_user" value="<?php echo $username ?>">
						<input type="password" name="password" placeholder="Input your new password" id="1">
						<label for="1">Password</label>
					</div>
					<div class="input-field col s12">
						<input type="password" name="cfpassword" placeholder="Confirm your password" id="1">
						<label for="1">Confirm Password</label>
					</div>
					<div class="col s12">
						<button class="btn block waves-effect waves-light grey darken-4" type="submit" name="change_pass">Change</button>
					</div>
				</form>
			</div>
		</div>
		<div class="login-footer right-align grey-text text-darken-4">
			@ Copyright Garis Mode
		</div>
	</div>
	<?php }else{
		echo '<script>window.history.back();</script>';
	}
} ?>