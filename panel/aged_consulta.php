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
$id;
$idea = $_POST['idea'];
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$horario = $_POST['horario'];

$fechaHoy = date('Y-m-d');
//echo "holaaaa";
 if( $nombre!='' && $idea == '4'){
  $insert = mysqli_query($con, "Insert into reservas (nombre, telefono, email, fecha, id_profesion, ingreso, horario, comentario) value ('$nombre', '$telefono', '$email','$fechaHoy', '$idea', 'manual', '$horario', '$comentario')");
  //echo $insert;
      if($insert){
     echo "<script language='javascript'>alert('Consulta guardado correctamente.');
      window.location.href = 'http://localhost/sergio/verpostparto.php';</script>";
      }else{
        echo "<script language='javascript'>alert('Error al guardar la consulta, vuelva a intentarlo.');
      window.location.href = 'http://localhost/sergio/verpostparto.php';</script>";
      }
  }

?>
<div style=" padding:5px; margin:5px; ">  
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar consulta</h4>
      </div>
      <div id="nuevaAventura" class="modal-body">
      <form class="customform" form action="aged_consulta.php" method="post">
        <div class="form-group">
              <select name="horario" class="form-control">
                  <option name="0">Seleciona el horario:</option>
                  <option name="horario1">Horario1 </option>
                  <option name="horario2">Horario2 </option>
              </select>
        </div>
        
          <div class="form-group">
            <input type="text" name="nombre" placeholder="*Nombre y apellido" class="form-control">
          </div>      
          <div class="form-group">
              <input type="email" name="email" placeholder="*Email" class="form-control">
          </div>
          <div class="form-group">    
            <input type="text" name="telefono" placeholder="*Teléfono" class="form-control">
            Comentario
                <textarea name="comentario" class="form-control"></textarea>
                <input type="hidden" name="ingreso" value="Manualmente">
          </div>
        <div class="row">
          <div class="col-sm-12">
          <input type="hidden" name="idea" id="idea" value="<?php echo $id ?>" />
          <button type="submit" class="btn btn-default ultimo-boton pull-right" name="enviar" tabindex="7">
            Enviar
          </button>
        </div>
        </div>
    </form>
    </div>
    </div>
  </div>
</div>