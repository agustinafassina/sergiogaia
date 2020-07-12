<?php require_once('funciones.php'); 
//session_start();
//$usu=$_SESSION['usuario'];
//hackerDefense_g();
ValidarDatos($_GET['sec']);
$sec=$_GET['sec'];
switch ($sec){
case 'psico';
$tabla="reservas";
$ident="id";
}
ValidarDatos($_GET['cod']);
ValidarDatos($_GET['check']);
$cod=limpiar_tags($_GET['cod']);
$check=limpiar_tags($_GET['check']);

if ($tabla=="reservas"){
$query= sprintf("update reservas set realizado='$check' where  $ident='$cod'");
//echo $query;
$con->query($query);
}
else {
$query= sprintf("update reservas set realizado='$check' where $ident='$cod' ");
//echo $query;
$con->query($query);
}
?>