<?php 
if (!isset($_SESSION)) {
session_start();
}
error_reporting(0);   
require_once('funciones.php');  
if (!check_admin_user()) {
    header("Location: index.php");
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
include('cabecera.php');

$old_passwd=$_POST['old_passwd'];
$new_passwd=$_POST['new_passwd'];
$new_passwd2=$_POST['new_passwd2'];
$id_oculto=$_POST['idoculto'];


if ($id_oculto==1){
 if($old_passwd){

 $resulta = mysqli_query( $con, "SELECT * FROM usuarios WHERE password = '$old_passwd' AND usuario = '$usu'");
  $rowa = mysqli_num_rows($resulta);
echo $rowa;
  if($rowa == 0){
    $send = "Esa contraseña no existe, vuelva a intentarlo.";
  }else{
         if ($old_passwd=="" or $new_passwd=="" or $new_passwd2=="" or $old_passwd=="0" or $new_passwd=="0" or $new_passwd2=="0")
         {

           $send =  "No has cubierto el formulario completamente.
                 Inténtalo de nuevo, por favor.";
              exit;
         }
         else
         {
            if ($new_passwd!=$new_passwd2)
               $send =  "Las contraseñas no erán iguales, intenté de nuevo.";
            else
            {
                // attempt update

        		   $result = mysqli_query( $con, "update usuarios set password = '$new_passwd2' where usuario = '$usu'");

               if ($result)
                   $send =  "Contraseña cambiada.";
                else
                   $send = "La contraseña no ha podido cambiarse.";
            }

         }
    }     
}
 }  
?>
<div id="content-wrapper">
<div class="mui--appbar-height"></div>
<div class="mui-container-fluid">
 <h3>SECCIÓN CAMBIAR CONTRASEÑA</h3>

<div id="contenido" style="width:50%">
<form method="post" action="">

<div class="form-group"> 
    <label for="contrasenav">Vieja contraseña</label>
    <input type="password" required name="old_passwd" size="16" maxlength="16" class="form-control" />
</div>
<div class="form-group"> 
    <label for="contrasenan">Nueva contraseña</label>      
    <input type="password" required name="new_passwd" size="16" maxlength="16" class="form-control" />
</div>
<div class="form-group"> 
    <label for="contrasenar">Repetir nueva contraseña</label>  
    <input type="password" required name="new_passwd2" size="16" maxlength="16" class="form-control" />
</div>
<div class="form-group"> 
    <input name="idoculto" type="hidden" value="1" />
    <input type="submit" value="Cambiar Contraseña" class="btn btn-primary" />    </td>
</div>
</form>
<label for="mensaje"><?php echo $send;?></label>
</div>
</div>
</div>

<?php include('footer.php')?>