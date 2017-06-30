<style>
	.tabs .indicator{
		background-color: black;
	}
</style>
<div class="container">
	<div class="divider"></div>
	<div class="row">
		<div class="col s12">
			<ul class="tabs">
				<li class="tab col s3"><a class="grey-text text-darken-4 active" href="#test1">Tagihan</a></li>
				<li class="tab col s3"><a class="grey-text text-darken-4" href="#test2">Tunggu Konf. Admin</a></li>
				<li class="tab col s3"><a class="grey-text text-darken-4" href="#test3">Pesanan Sukses</a></li>
				<li class="tab col s3"><a class="grey-text text-darken-4" href="#test4">Pesanan Gagal</a></li>
			</ul>
		</div>
		<div id="test1" class="tab-content col s12">
			<ul class="collapsible" data-collapsible="accordion">
				<?php 
				include '../conn.php';
				$query_order = mysql_query("SELECT * FROM orders WHERE user_id = '$user_id' and status = 'waiting' order by no_invoice DESC");
				if (mysql_num_rows($query_order) > 0) {
					while ($data_order = mysql_fetch_assoc($query_order)) {	?>
					<li>
						<div class="collapsible-header"><i class="material-icons">credit_card</i>No. Order : <?php echo $data_order['no_invoice']; ?> (klik untuk lihat detail)</div>
						<div class="collapsible-body">
							<div class="invoice-box">
								<table cellpadding="0" cellspacing="0">
									<tr class="top">
										<td colspan="2">
											<table>
												<tr>
													<td class="title">
														<img src="../asset/img/logo-cromind.png" style="width:100%; max-width:150px;">
													</td>
													
													<td>
														Invoice #: <?php echo $data_order['no_invoice'] ?><br>
														Created: <?php $a = date_create($data_order['order_date']);
														echo $date = date_format($a, "d M Y");?><br>
														Due: <?php $b = date_create($data_order['expired_date']);
														echo $date_expired = date_format($b, "d M Y");?>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									
									<tr class="information">
										<td colspan="2">
											<table>
												<tr>
													<td>
														Cromind Clothes<br>
														Jl. Liam, Duri Kepa<br>
														Jakarta Barat, 11510
													</td>
													
													<td>
														Dipesan :<?php echo $_SESSION['myses'] ?><br>
														Kirim ke : <?php echo $data_order['name'] ?><br>
														Alamat : <?php echo $data_order['delivery_address'].', '.$data_order['city'] ?> <br>
														<?php echo $data_order['zip_code'] ?><br>
														Telp/Hp :<?php echo $data_order['phone'] ?>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									
									<tr class="heading">
										<td>
											Payment Method
										</td>
										
										<td>
											Transfer BCA#
										</td>
									</tr>
									
									<tr class="details">
										<td>
											Transfer to
										</td>
										
										<td>
											4910375682 a/n Fikrah Dinullah
										</td>
									</tr>
									
									<tr class="heading">
										<td>
											Item
										</td>
										
										<td>
											Price
										</td>
									</tr>
									<?php  
									$id = $data_order['order_id'];
									$query_orderdetail = mysql_query("SELECT * FROM orderdetails a left join products b on a.product_id = b.product_id WHERE order_id = '$id'");
									if (mysql_num_rows($query_orderdetail) > 0) { 
										while ($data_orderdetail = mysql_fetch_assoc($query_orderdetail)) { ?>
										<tr class="item">
											<td>
												<?php echo $data_orderdetail['name'] ?> (<?php echo $data_orderdetail['qty'] ?> Pcs)
											</td>

											<td>
												Rp. <?php echo $data_orderdetail['total_price'] ?>
											</td>
										</tr>
										<?php } 
									} ?>
									<tr class="item last">
										<td>
											Ongkir
										</td>

										<td>
											Rp. <?php echo $data_order['cost_courier'] ?>
										</td>
									</tr>

									<tr class="total">
										<td></td>

										<td>
											Total: Rp. <?php echo $data_order['grand_total'] ?>
										</td>
									</tr>
									<?php  
									$no_invoice = $data_order['no_invoice'];
									$query_conf = mysql_query("SELECT * from confirmations where no_invoice = '$no_invoice'");
									if (mysql_num_rows($query_conf) > 0) { ?>
									<tr>
										<td colspan="4"><b>Menunggu Konfirmasi Admin</b></td>
									</tr>
									<?php }else{ ?>
									<tr>
										<td colspan="2"><a href="?act=confirmation&data_order=<?php echo $data_order['order_id']; ?>" class="btn waves-effect waves-light grey darken-4">Konfirmasi Pembayaran</a></td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>
					</li>
					<?php }
				}else{
					echo "<h4 style='padding: 50px;' class='center-align'>You Don't Have Any Ordered Yet :( </h4>";
				} ?>
			</ul>
		</table>
	</div>
	<div id="test2" class="tab-content col s12">
		<table>
			<thead>
				<tr>
					<th>No. Order</th>
					<th>Di transfer oleh</th>
					<th>Tgl transfer</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include '../conn.php';
				$queryconf = mysql_query("SELECT * FROM confirmations WHERE user_id = '$user_id' and status = 'waiting' order by no_invoice DESC");
				if (mysql_num_rows($queryconf) > 0) { 
					while ($dtconf = mysql_fetch_assoc($queryconf)) { ?>
					<tr>
						<td><?php echo $dtconf['no_invoice'] ?></td>
						<td><?php echo $dtconf['accname'] ?></td>
						<td><?php echo $dtconf['confirmation_date'] ?></td>
					</tr>
					<?php }
				} else { ?>
				<tr>
					<td colspan="3">Belum Ada Konfirmasi!</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
	<div id="test3" class="tab-content col s12">
		<table>
			<thead>
				<tr>
					<th>No. Order</th>
					<th>Di transfer oleh</th>
					<th>Tgl Diterima</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include '../conn.php';
				$queryconf = mysql_query("SELECT * FROM confirmations WHERE user_id = '$user_id' and status = 'accepted' order by no_invoice DESC");
				if (mysql_num_rows($queryconf) > 0) { 
					while ($dtconf = mysql_fetch_assoc($queryconf)) { ?>
					<tr>
						<td><?php echo $dtconf['no_invoice'] ?></td>
						<td><?php echo $dtconf['accname'] ?></td>
						<td><?php echo $dtconf['receive_date'] ?></td>
					</tr>
					<?php }
				} else { ?>
				<tr>
					<td colspan="3">Belum ada konfirmasi yang diterima!</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div id="test4" class="tab-content col s12">
		<table>
			<thead>
				<tr>
					<th>No. Order</th>
					<th>Tgl order</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include '../conn.php';
				$queryconf = mysql_query("SELECT * FROM orders WHERE user_id = '$user_id' and status = 'expired' order by no_invoice DESC");
				if (mysql_num_rows($queryconf) > 0) { 
					while ($dtconf = mysql_fetch_assoc($queryconf)) { ?>
					<tr>
						<td><?php echo $dtconf['no_invoice'] ?></td>
						<td><?php echo $dtconf['order_date'] ?></td>
					</tr>
					<?php }
				} else { ?>
				<tr>
					<td colspan="3">Tidak ada orderan yang gagal!</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<!-- <div class="col s12 m6 l6">
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
						$psn = 'Your product now in your way, Thanks For Shopping.';
						$color = 'light-green accent-3';
					}else{
						$psn = 'The Time! Sorry we have to cancel your order.';
						$color = 'red lighten-1';
					}
					?>
					<li>
						<div class="collapsible-header <?php echo $color;?>"><i class="material-icons">credit_card</i>No. Order : <?php echo $data_order['no_invoice']; ?> (klik untuk lihat detail)</div>
						<div class="collapsible-body">
							<div class="status">
								<?php echo $psn; ?>
							</div>
							<div class="divider"></div>
							<table>
								<tr>
									<td>Nama Penerima</td>
									<td>: <?php echo $data_order['name']; ?></td>
								</tr>
								<tr>
									<td>Alamat 1</td>
									<td>: <?php echo $data_order['delivery_address']; ?></td>
								</tr>
								<tr>
									<td>Alamat 2</td>
									<td>: <?php echo ($data_order['delivery_address_2'] != '') ? $data_order['delivery_address_2'] : '-' ; ?></td>
								</tr>
								<tr>
									<td>Kota</td>
									<td>: <?php echo $data_order['city']; ?></td>
								</tr>
								<tr>
									<td>Kode POS</td>
									<td>: <?php echo $data_order['zip_code']; ?></td>
								</tr>
								<tr>
									<td>Transfer ke</td>
									<td>: <?php echo $data_order['transfer_to']; ?></td>
								</tr>
								<tr>
									<td>No. HP / telp</td>
									<td>: <?php echo $data_order['phone']; ?></td>
								</tr>
								<tr>
									<td>Total Transfer</td>
									<td>: Rp. <?php echo $data_order['grand_total']; ?></td>
								</tr>
								<tr>
									<td>Tanggal expired</td>
									<td>: <?php $a = date_create($dt_order['order_date']);
										echo $date = date_format($a, "d M Y");?>
									</td>
								</tr>
								<tr>
									<td colspan="2"><button id="id_order" data-target="modal1" data="<?php echo $data_order['order_id']; ?>" class="btn block waves-effect waves-light mycolor">Detail Pesanan</button></td>
								</tr>
								<?php
								if ($color == 'yellow') {?>
								<tr>
									<td colspan="2"><a href="?act=confirmation&data_order=<?php echo $data_order['order_id']; ?>" class="btn block waves-effect waves-light mycolor">Konfirmasi Pembayaran</a></td>
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

		</div> -->
		<div class="col s12 m12 l12">
				<!-- <div id = "detail_order" class="card-panel mycolor">
					
			</div> -->
			<div class="card-panel">
				<!-- <h4><strong>Our Account Bank</strong></h4>
				<div class="acc-bank center-align">
					<ul>
						<li><img class="bca" src="../asset/img/bca.png" alt=""><div class="norek">- 1278 3982 7831</div></li>
						<li><img class="mandiri" src="../asset/img/mandiri.png" alt=""><div class="norek">- 1278 3812 7831</div></li>
						<li><img class="bni" src="../asset/img/bni.png" alt=""><div class="norek">- 1278 3982 7831</div></li>
					</ul>
				</div> -->
				<h4>Petunjuk:</h4>
				<h5 style="text-decoration: underline;">Daftar Bank:</h5>
				<ul>
					<li>1. BCA : No. rek 4910375682 a/n Fikroh Dinullah</li>
					<!-- <li>2. BCA : No. rek 7550282458 a/n Ibnu Abdul Azis</li> -->
				</ul>
				<p>Setalah melakukan pembayaran harap segera melakukan konfirmasi agar pesan anda dapat di proses secepatnya.</p>
				<div class="divider"></div>
				<p>Pesanan anda akan otomatis kami batalkan jika lebih dari 2 hari tidak membayar/transafer.</p>
				<!-- <h5 style="text-decoration: underline;">Keterangan Warna pada card order:</h5>
				<ul>
					<li><div class="yellow">Kuning :</div> Menunggu konfirmasi pembayaran anda</li>
					<li><div class="blue">Biru :</div> Menunggu admin untuk memverifikasi pembayaran anda</li>
					<li><div class="light-green accent-3">Hijau :</div> Pesanan berhasil di verifikasi dan siap dikirim</li>
					<li><div class="red lighten-1">Merah :</div>Pesanan expired</li>
				</ul> -->
			</div>

		</div>
	</div>
</div>


<div id="modal1" class="modal modal-fixed-footer">
	<div class="modal-content row center-align">

	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">OK</a>
	</div>
</div>
