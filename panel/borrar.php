<?php require_once('funciones.php'); 
if (!isset($_SESSION)) {
  session_start();
}
if (!check_admin_user()) {

	echo "datos de loggin incorrectos <br>";
	if ($fibra=='')
	echo "<a href=\"index.php\"> volver a intentar<//a>";
	else echo "<a href=\"http://www.fibraconsultores.com.ar/admin/index.php\"> volver a intentar<//a>";
	exit;}
else { 
    //sino, calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["ultimoAcceso"];
	$ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 
     if($tiempo_transcurrido >= 900) { 
     //si pasaron 10 minutos o m�s 
      session_destroy(); // destruyo la sesi�n 
      header("Location: index.php"); //env�o al usuario a la pag. de autenticaci�n 
      //sino, actualizo la fecha de la sesi�n 
    }else { 
    $_SESSION["ultimoAcceso"] = $ahora; 
   } 
}
$id=limpiar_tags($_GET["id"]);
$que=limpiar_tags($_GET["que"]);
if($que == 'novedades'){
$borra = mysqli_query($con,"delete from novedades where id='$id'");
header ("Location: vernovedades.php");
}
?>