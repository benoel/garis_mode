<div class="container">
	<form action="admin-pg/act_process.php" method="post">
		<?php 
		include ('../conn.php');
		if ($_GET['id'] != '') {
			# code...
			$id = $_GET['id'];
			$query = mysql_query("select * from users where user_id = $id");
			$data = mysql_fetch_assoc($query);
			include ('../conn.php');
			$user_admin = $_SESSION['admin'];
			$query = mysql_query("SELECT * from users where user_id = '$user_admin'");
			$data_query = mysql_fetch_assoc($query);
			echo "<h3>Edit</h3>";
		}else{
			echo "<h3>Add New Admin</h3>";
		}
		?>
		<input type="hidden" name="id" value="<?php echo ($data['user_id'] != '') ? $data['user_id'] : ''; ?>">
		<div class="row">
			<div class="col s12 l6">
				<div class="row">
					<div class="input-field col s12 l12">
						<input type="text" id="name" name="username" value="<?php echo ($data['username'] != '') ? $data['username'] : ''; ?>" autocomplete="off" required <?php echo ($data['username'] != '') ? 'disabled style="color: #212;"' : ''; ?> >
						<label for="Username">Username</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 l12">
						<input type="text" id="price" name="name" value="<?php echo ($data['name'] != '') ? $data['name'] : ''; ?>" autocomplete="off" required>
						<label for="name">Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 l12">
						<textarea id="addres" class="materialize-textarea" required name="address"><?php echo ($data['address'] != '') ? $data['address'] : ''; ?></textarea>
						<label for="address">Address</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 l12">
						<input type="text" id="phone" name="phone" value="<?php echo ($data['phone'] != '') ? $data['phone'] : ''; ?>">
						<label for="phone">Phone</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 l12">
						<input type="email" id="email" name="email" autocomplete="off" >
						<label for="email">Email</label>
					</div>
				</div>

				<?php 
				if ($data['user_id'] != '') { ?>
				<div class="row">
					<div class="input-field col s12 l12">
						<input placeholder="<?php echo ($data['user_id'] != '') ? 'optional' : ''; ?>" type="password" id="password" name="password" autocomplete="off" <?php echo ($data['user_id'] != '') ? '' : 'required'; ?> >
						<label for="password">New Password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 l12">
						<input placeholder="<?php echo ($data['user_id'] != '') ? 'optional' : ''; ?>" type="password" id="con_password" name="con_password" value="" autocomplete="off" <?php echo ($data['user_id'] != '') ? '' : 'required'; ?> >
						<label for="con_password">Confirmation Password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 l12">
						<input type="password" placeholder="<?php echo ($data['user_id'] != '') ? 'Require if you want edit your profile' : ''; ?>" id="old_password" name="old_password" value="" autocomplete="off" required>
						<label for="old_password">Old Password</label>
					</div>
				</div>
				<?php }else{ ?>
				<div class="row">
					<div class="input-field col s12 l12">
						<input type="password" id="password" name="password" autocomplete="off" required>
						<label for="password">Password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 l12">
						<input type="password" id="con_password" name="con_password" value="" autocomplete="off" required>
						<label for="con_password">Confirmation New Password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 l12">
						<input name="role" type="radio" id="reg_admin" value="2" required />
						<label for="reg_admin">Regular Admin</label>
						<input name="role" type="radio" id="sup_admin" value="3" required />
						<label for="sup_admin">Super Admin</label>
					</div>
				</div>
				<?php } ?>
				<br>
				<div class="row">
					<div class="col s12 l12">
						<button class="btn waves-effect waves-light grey darken-4" type="submit" name="save">Save
							<i class="material-icons right">send</i>
						</button> &nbsp
						<a href="index.php" class="btn waves-effect waves-light grey darken-4">Back
						</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>