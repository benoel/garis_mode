<?php
include '../../conn.php';
				// $ses = $_SESSION['myses'];
$now = date("Y-m-d H:i:s");
$query_conf = mysql_query("SELECT * FROM orders WHERE status = 'waiting' and '$now' >= expired_date");

if (mysql_num_rows($query_conf) > 0) {
								# code...
	echo mysql_num_rows($query_conf);
}else{
	echo "0";
}
?>