<?php
include '../../conn.php';
$id = $_GET['id'];
$query_conf = mysql_query("SELECT * FROM confirmations where confirmation_id = '$id'");
$data = mysql_fetch_assoc($query_conf);
echo '<div class="row">';
echo '<div class="col s12 center">';
echo '<img style="max-width: 100%; margin: 10px auto;" src="../asset/img/conf/'.$data['pict'].'" alt="">';
echo '</div>';
echo '</div>';
?>