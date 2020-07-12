<?php 
if (!isset($_SESSION)) {
	  session_start();
	}
error_reporting(0);
require_once('funciones.php');	
//ver porque no pasa con el hacker
//hackerDefense_p();

ValidarDatos($_POST['pass']);
ValidarDatos($_POST['user']);
$pass=$_POST['pass'];
$usu=$_POST['user'];

if ($usu && $pass) {
		$sql = "SELECT * FROM usuarios where usuario='$usu' and password ='$pass'";
		$result=mysqli_query($con,$sql);
		$aja = mysqli_num_rows($result);
		
		if($aja == 1){
			$_SESSION['usuario'] = $usu;	
			$datos_usu=getdatos($usu);
			$id_usuario=$datos_usu['id'];
			
			$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
			$dates = date("Y-n-j H:i:s");
			header("Location: admin.php");
			
	   	}else{
	   		header("Location: index.php?id=1");
	 		exit;
	   	}
	} 
?>