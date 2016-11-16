<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$name = "tokobaju";

$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($name, $koneksi) or die("Tidak ada database yang dipilih!");

?>