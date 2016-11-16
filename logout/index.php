<?php 
session_start();
session_destroy();
header('location: ../index.php');
// echo '<script>window.location.replace("http://localhost/garmod/");</script>';

?>