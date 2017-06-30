<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="../../asset/img/logo-garmod.png">
	<title>
		Garis Mode
	</title>
	<link rel="stylesheet" href="../../asset/css/materialize.min.css">
	<link rel="stylesheet" href="../../asset/css/fonts.css">
	<link rel="stylesheet" href="asset/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="asset/css/style-admin.css">
	<script src="../../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../../asset/js/materialize.min.js"></script>
	<script src="../asset/js/jquery.dataTables.min.js"></script>
	<script src="../asset/js/data-tables-script.js"></script>
	<script src="../asset/js/myjs.js"></script>
</head>
<body>
	<h1 class="center">
		REPORT
	</h1>
	<div class="container">
		<table>
			<thead>
				<tr>
					<th>No. Order</th>
					<th>Ordered by</th>
					<th>Deliver to</th>
					<th>Status</th>
					<th>Sign by</th>
					<th>SUB TOTAL</th>
					<th>Order Date</th>
				</tr>
			</thead>

			<tbody>
				<?php  
				if ($_POST['submit']) {
					$from = $_POST['from'].' 00:00:00';
					$to = $_POST['to'].' 23:59:00';
					include '../../conn.php';
					$query_order = mysql_query("SELECT * FROM orders WHERE order_date BETWEEN '$from' and '$to'");
					while ($data_order = mysql_fetch_assoc($query_order)) {
						$a = date_create($data_order['order_date']);
						$date = date_format($a, "d M Y");
						if ($data_order['status'] == 'waiting') {
					 	# code...
							$color = 'yellow-text';
						}elseif ($data_order['status'] == 'expired') {
						# code...
							$color = 'red-text';
						}else{
							$color = 'green-text';
						}
						$admin = $data_order['sign_by'];
						$query_admin = mysql_query("SELECT * from users where user_id = '$admin'");
						$dt_admin = mysql_fetch_assoc($query_admin);
						$user = $data_order['user_id'];
						$query_user = mysql_query("SELECT * from users where user_id = '$user'");
						$dt_user = mysql_fetch_assoc($query_user);
						?>

						<tr>
							<td><?php echo $data_order['no_invoice'] ?></td>
							<td><?php echo $dt_user['username'] ?></td>
							<td><?php echo $data_order['name'] ?></td>
							<td class="<?php echo $color ?>"><?php echo $data_order['status']  ?></td>
							<td><?php echo $dt_admin['username'] ?></td>
							<td><?php echo 'Rp. '.$data_order['grand_total'] ?></td>
							<td><?php echo $date ?></td>
						</tr>

						<?php 
					}
				}
				?>
			</tbody>
		</table>
		<div class="center" style="margin-top: 30px;">
			<button id="print" class="btn waves-effect waves-light grey darken-4">Print</button>
			<button id="back" class="btn waves-effect waves-light grey darken-4">Back</button>
		</div>
	</div>
	
</body>
</html>
<script>
	$(document).ready(function(){
		// $('#print').click(function(event) {
		// 	/* Act on the event */
		// 	event.preventDefault();
		// 	$(this).hide();
		// 	$('.back').hide();
		// 	popup_print();
		// });
		$('#print').click(function(e){
			e.preventDefault();
			$(this).hide();
			$('#back').hide();
			window.print();
			$(this).show();
			$('#back').show();
		})

		$('#back').click(function() {
			window.history.back();
		});

		// function popup_print(){
		// 	window.open('data-report.php','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
		// }
	})
</script>