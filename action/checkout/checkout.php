<div class="container">
	<h3>Detail reciever of your order</h3>
	<div class="row">
		<?php  
		session_start();
		include '../conn.php';
		$ses = $_SESSION['myses'];
		$query_user = mysql_query("SELECT * FROM users WHERE username = '$ses'");
		$user = mysql_fetch_assoc($query_user);
		$user_id = $user['user_id'];
		$query_cart = mysql_query("SELECT * from carts where user_id = '$user_id'");
		if (mysql_num_rows($query_cart) > 0) { ?>
		<div class="col s12 m6">
			<form action="checkout/checkout_process.php" method="post">
				<input type="hidden" name="destination" id="destination">
				<div class="row">
					<div class="input-field col s12">
						<input type="text" id="3" placeholder="Name" value="<?php echo $user['name'] ?>" name="name">
						<label for="3">Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea class="materialize-textarea" type="text" id="2" placeholder="Address" name="address1"><?php echo $user['address'] ?></textarea>
						<label for="2">Delivery Address</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea class="materialize-textarea" type="text" id="2" placeholder="Optional Addres" name="address2"></textarea>
						<label for="2">Delivery Address 2</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" id="3" placeholder="Postal/ZIP Code" name="zip_code">
						<label for="3">Postal/ZIP Code</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="city" id="autocompleteCities" class="autocomplete">
						<label for="autocompleteCities">City</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
						<select name="courier" id="courier">
							<option value="" disabled selected>Choose your option</option>
							<option value="jne">JNE</option>
							<option value="pos">POS</option>
							<option value="tiki">TIKI</option>
						</select>
						<label for="courier">Courier</label>
					</div>
				</div>
				<div>
					<div class="row">
						<div class="input-field col s12">
							<select id="service">
								<!-- <option value="" disabled selected>Service</option> -->
							</select>
							<label>Service</label>
							<input type="hidden" name="service">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input style="color: #000;" disabled type="text" id="cost" placeholder="Cost" name="cost">
						<input type="hidden" id="cost" name="cost">
						<label for="cost">Cost</label>
					</div>
					<p style="font-style: italic; color: #716F70;">* please search for more info about courier</p>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input  type="text" id="3" placeholder="Phone" name="phone">
						<label for="3">Phone</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<select name="transfer_to" id="11">
							<option value="" disabled selected>Choose your option</option>
							<option value="BCA">BCA</option>
							<option value="MANDIRI">MANDIRI</option>
							<option value="BNI">BNI</option>
						</select>
						<label for="11">Transfer To</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<button type="submit" name="submit" class="btn block waves-effect waves-light grey darken-4">SUBMIT</button>
					</div>
				</div>
			</form>
		</div>
		<?php }else{ ?>
		<div class="col s12 m6">
			<div class="card-panel">
				<h4 style='padding: 50px;' class='center-align'>You Don't Have Any Product in Your Cart Yet!</h4>
			</div>
		</div>
		<?php } ?>
		<div class="col s12 m6">
			<div class="card-panel center-align">
				<div class="garmod-text">
					<div>- GARIS -</div>
					- MODE -
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.autocomplete-suggestions { 
		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
		background: #FFF; 
		overflow: auto; 
	}
	.autocomplete-suggestion { 
		clear: both;
		color: rgba(0,0,0,0.87);
		cursor: pointer;
		min-height: 50px;
		line-height: 1.5rem;
		width: 100%;
		text-align: left;
		text-transform: none; white-space: nowrap; overflow: hidden;
		padding: 15px;
	}
	.autocomplete-selected { background: #F0F0F0; }
	.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
	/*.autocomplete-group { padding: 2px 5px; }*/
	.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
</style>
