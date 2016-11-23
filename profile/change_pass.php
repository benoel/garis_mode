<h4>change pass</h4>
<div class="divider"></div>
<form action="profile_process.php" method="POST">
	<div class="row">
		<input type="hidden" name="user_id" value="">
		<div class="input-field col s12 l6 offset-l3">
			<input value="" type="password" id="1" name="new_pass" autocomplete="off"  >
			<label for="1">New Password</label>
		</div>
		<div class="input-field col s12 l6 offset-l3">
			<input value="" type="password" id="2" name="conf_pass" autocomplete="off"  >
			<label for="2">Confirm New Password</label>
		</div>
		<div class="input-field col s12 l6 offset-l3">
			<input value="" type="password" id="2" name="old_pass" autocomplete="off"  >
			<label for="2">Old Password</label>
		</div>
		<div class="input-field col s12 l6 offset-l3">
			<button class="btn block waves-effect waves-light grey darken-4" type="submit" name="change_pass">Change</button>
		</div>
	</div>
	
</form>