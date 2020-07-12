<?php 
$dbhost = 'sergio.gaia';
$usuario = 'root';
$dbpasswordpass = '';
$bdatos = 'mk000780_gaia';
/*
$dbhost = "localhost";
$usuario = "mk000780_gaia";
$dbpasswordpass = "sopiLI28po";
$bdatos = "mk000780_gaia";
*/

$con = mysqli_connect($dbhost, $usuario, $dbpasswordpass, $bdatos);
mysqli_set_charset($con, "utf8");
?>