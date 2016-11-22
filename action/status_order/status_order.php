<div class="container">
	<div class="divider"></div>
	<div class="row">
		<div class="col s12 m6 l6">
			<ul class="collapsible" data-collapsible="accordion">
				<?php 
				include '../conn.php';
				$query_order = mysql_query("SELECT * FROM orders WHERE user_id = '$user_id' order by no_invoice DESC");
				if (mysql_num_rows($query_order) > 0) {
					while ($data_order = mysql_fetch_assoc($query_order)) {

						if ($data_order['status'] == 'waiting') {
										# code...
							$no_invoice = $data_order['no_invoice'];
							$query_conf = mysql_query("SELECT * from confirmations where no_invoice = '$no_invoice'");
							if (mysql_num_rows($query_conf) > 0) {
											# code...
								$psn = 'Oke now time to relax, we will check your confirmation :)';
								$color = 'blue';
							}else{
								$psn = 'We Waiting Your Confirmation!';
								$color = 'yellow';
							}
						}elseif ($data_order['status'] == 'accepted') {
										# code...
							$psn = 'Your product now in your way, Thanks For Shopping :D';
							$color = 'light-green accent-3';
						}else{
							$psn = 'The Time! Sorry we have to cancel your order :(';
							$color = 'red lighten-1';
						}
						?>
						<li>
							<div class="collapsible-header <?php echo $color;?>"><i class="material-icons">credit_card</i>No. Order : <?php echo $data_order['no_invoice']; ?> (Click For More Details)</div>
							<div class="collapsible-body">
								<div class="status">
									<?php echo $psn; ?>
								</div>
								<div class="divider"></div>
								<table>
									<tr>
										<td>Name</td>
										<td>: <?php echo $data_order['name']; ?></td>
									</tr>
									<tr>
										<td>Addres</td>
										<td>: <?php echo $data_order['delivery_address']; ?></td>
									</tr>
									<tr>
										<td>Addres 2</td>
										<td>: <?php echo ($data_order['delivery_address_2'] != '') ? $data_order['delivery_address_2'] : '-' ; ?></td>
									</tr>
									<tr>
										<td>City</td>
										<td>: <?php echo $data_order['city']; ?></td>
									</tr>
									<tr>
										<td>Postal/ZIP Code</td>
										<td>: <?php echo $data_order['zip_code']; ?></td>
									</tr>
									<tr>
										<td>Transfer To</td>
										<td>: <?php echo $data_order['transfer_to']; ?></td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>: <?php echo $data_order['phone']; ?></td>
									</tr>
									<tr>
										<td>SUBTOTAL</td>
										<td>: Rp. <?php echo $data_order['grand_total']; ?></td>
									</tr>
									<tr>
										<td>Expired Date</td>
										<td>: <?php $a = date_create($dt_order['order_date']);
											echo $date = date_format($a, "d M Y");?>
										</td>
									</tr>
									<tr>
										<td colspan="2"><button id="id_order" data="<?php echo $data_order['order_id']; ?>" class="btn block waves-effect waves-light grey darken-4">Detail Order</button></td>
									</tr>
									<?php
									if ($color == 'yellow') {?>
									<tr>
										<td colspan="2"><a href="?act=confirmation&data_order=<?php echo $data_order['order_id']; ?>" class="btn block waves-effect waves-light grey darken-4">Confirm This Order</a></td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</li>
						<?php }
					}else{
						echo "<h4 style='padding: 50px;' class='center-align'>You Don't Have Any Ordered Yet :( </h4>";
					} ?>
				</ul>

			</div>
			<div class="col s12 m6 l6">
				<div id = "detail_order" class="card-panel grey darken-4">
					<!-- isi dari detail order -->
				</div>
				<div class="card-panel">
					<h4><strong>Our Account Bank</strong></h4>
					<div class="acc-bank center-align">
						<ul>
							<li><img class="bca" src="../asset/img/bca.png" alt=""><div class="norek">- 1278 3982 7831</div></li>
							<li><img class="mandiri" src="../asset/img/mandiri.png" alt=""><div class="norek">- 1278 3812 7831</div></li>
							<li><img class="bni" src="../asset/img/bni.png" alt=""><div class="norek">- 1278 3982 7831</div></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</div>
