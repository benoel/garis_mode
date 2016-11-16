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
						<input disabled style="color: #212;" type="text" id="1" value="<?php echo ($data_order['no_invoice'] != '')? $data_order['no_invoice'] : '' ?>" name="noorder">
						<label style="color: #A6A6A6;" for="1">No. Order</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<textarea class="materialize-textarea" type="text" id="2" placeholder="Message (ex: Sudah transfer pukul 18:00 )" name="message"></textarea>
						<label for="2">Messege</label>
					</div>
				</div>
<!--  			<div class="row">
					<div class="input-field col s12">
						<input type="file" id="img" onchange="readURL(this);" name="pict">
						<label for="img">Upload Billing Picture</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<script type="text/javascript">
							function readURL(input) {
								if (input.files && input.files[0]) {
									var reader = new FileReader();

									reader.onload = function (e) {
										$('#blah').attr('src', e.target.result);
									}

									reader.readAsDataURL(input.files[0]);
								}
							}
						</script>
						<div class="img" style=" overflow: hidden; margin-top: 60px;">
							<img class="responsive-img" id="blah" src="" alt=""/>
							
						</div>

					</div>
				</div> -->


				<div class="row">
					<div class="input-field col s12">
						<button type="submit" name="submit" class="btn waves-effect waves-light grey darken-4">SUBMIT</button>
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

