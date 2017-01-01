<div class="container">
	<div class="divider"></div>
	<div class="row">
		<div class="col s12 m6">
			<form action="confirmation/confirmation_process.php" method="POST" enctype="multipart/form-data">
				<?php 
				if ($_GET['data_order']) {
							# code...
					include '../conn.php';
					$no_invoice = $_GET['data_order'];
					$query_order = mysql_query("SELECT * from orders where order_id = '$no_invoice' ");
					$data_order = mysql_fetch_assoc($query_order);
				}
				?>
				<div class="row">
					<div class="input-field col s12">
						<input type="hidden" value="<?php echo ($data_order['no_invoice'] != '')? $data_order['no_invoice'] : '' ?>" name="noorder">
						<input disabled style="color: #212;" type="text" id="1" value="<?php echo ($data_order['no_invoice'] != '')? $data_order['no_invoice'] : '' ?>">
						<label style="color: #A6A6A6;" for="1">No. Order</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="bankname" id="bankname" placeholder="ex: MANDIRI">
						<label for="bankname">Bank Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="accname" id="accname">
						<label for="accname">Account Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="noacc" id="noacc">
						<label for="noacc">Number Account Bank</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<textarea class="materialize-textarea" type="text" id="2" placeholder="ex: Sudah transfer pukul 18:00" name="message"></textarea>
						<label for="2">Messege</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<label id="pict" for="pict">Upload Picture</label>
						<input class="btn waves-effect waves-light grey darken-4" type="file" id="pict" name="pict">
						<!-- <label class="btn lblimg waves-effect waves-light grey darken-4 white-text" for="pict" btn=>Transfer Pict</label> -->
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<button type="submit" name="submit" class="btn block waves-effect waves-light grey darken-4">SUBMIT</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m6 l6">
			<div class="card-panel">
				<div class="garmod-text center-align">
					<div>- GARIS -</div>
					- MODE -
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	label#pict{
		margin-top: -40px;
		color: #000;
	}
</style>
