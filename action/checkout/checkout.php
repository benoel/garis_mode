
<div class="container">
	<div class="row">
		<div class="col s12 m6">
			<form action="checkout/checkout_process.php" method="post">
				<div class="row">
					<div class="input-field col s12">
						<input type="text" id="3" placeholder="Name" name="name">
						<label for="3">Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea class="materialize-textarea" type="text" id="2" placeholder="Address" name="address1"></textarea>
						<label for="2">Delivery Address</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea class="materialize-textarea" type="text" id="2" placeholder="Address 2" name="address2"></textarea>
						<label for="2">Delivery Address 2</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" id="3" placeholder="City" name="city">
						<label for="3">City</label>
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
						<input type="text" id="3" placeholder="Phone" name="phone">
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
						<button type="submit" name="submit" class="btn waves-effect waves-light grey darken-4">SUBMIT</button>
					</div>
				</div>
			</form>
		</div>
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
