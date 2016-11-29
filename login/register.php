<div class="card-panel hoverable white">
	<div class="register-text center-align">
		Register
	</div>
	<div class="divider"></div>
	<div class="register-form center-align">
		<form action="check_process.php" method="post">
			<div class="row">
				<div class="input-field col s6">
					<input autocomplete="off" id="username" type="text" name="username" required>
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
					<input autocomplete="off" id="121" type="password" name="password" required>
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
<div class="login-footer right-align grey-text text-darken-4">
	@ Copyright Garis Mode
</div>