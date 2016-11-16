<?php
include '../../conn.php';
				// $ses = $_SESSION['myses'];
$query_conf = mysql_query("SELECT * FROM confirmations WHERE status = 'waiting'");

if (mysql_num_rows($query_conf) > 0) {
								# code...
	echo mysql_num_rows($query_conf);
}else{
	echo "0";
}
?>