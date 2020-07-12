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
$fechaReserva = $_POST['caja_texto'];
$hora = $_POST['hora'];
$paraquien = $_POST['paraquien'];
$primeravisita = $_POST['primeravisita'];
$comentario = $_POST['comentario'];
$fechaHoy = date('Y-m-d');
if($nombre!=''){
  $sql1 = "SELECT * FROM reservas WHERE id_profesion='$idea' AND fecha_reserva='$fechaReserva' AND id_hora='$hora' AND confirmar='1'";
  $result1=mysqli_query($con,$sql1);
  $row1 = mysqli_num_rows($result1);
      if($row1 == '0'){
            $insert = mysqli_query($con, "Insert into reservas (nombre, telefono, email, fecha, id_profesion, fecha_reserva, id_hora, para_quien, primera_visita, comentario, ingreso, horario) value ('$nombre', '$telefono', '$email','$fechaHoy', '$idea', '$fechaReserva', '$hora', '$paraquien','$primeravisita','$comentario' ,'manual', '0')");
            if($insert){
                if($idea == '1'){
                 echo "<script language='javascript'>alert('Turno guardado correctamente.');
                 window.location.href = 'http://localhost/sergio/verpsicologia.php';</script>";
                }else if($idea == '2'){
                  echo "<script language='javascript'>alert('Turno guardado correctamente.');
                  window.location.href = 'http://localhost/sergio/veryoga.php';</script>";
                }else if($idea == '3'){
                  echo "<script language='javascript'>alert('Turno guardado correctamente.');
                  window.location.href = 'http://localhost/sergio/vernutricion.php';</script>";
                }
            }else{
              echo "<script language='javascript'>alert('Error al cargar turno, vuelva a intentarlo.');
            window.location.href = 'http://localhost/sergio/verpsicologia.php';</script>";
            }

    
      }else if($row1 == '1'){
            if($idea == '1'){
             echo "<script language='javascript'>alert('El turno seleccionado se encuentra ocupado, vuelva a intentarlo.');
             window.location.href = 'http://localhost/sergio/verpsicologia.php';</script>";
            }else if($idea == '2'){
              echo "<script language='javascript'>alert('El turno seleccionado se encuentra ocupado, vuelva a intentarlo.');
              window.location.href = 'http://localhost/sergio/veryoga.php';</script>";
            }else if($idea == '3'){
              echo "<script language='javascript'>alert('El turno seleccionado se encuentra ocupado, vuelva a intentarlo.');
              window.location.href = 'http://localhost/sergio/vernutricion.php';</script>";
            }else{
            
             echo "<script language='javascript'>alert('El turno seleccionado se encuentra ocupado, vuelva a intentarlo.');
            window.location.href = 'http://localhost/sergio/verpsicologia.php';</script>";
            }
      }
}      
?>

<div style=" padding:5px; margin:5px; ">  
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar turno</h4>
      </div>
      <div id="nuevaAventura" class="modal-body">
      <form class="customform" form action="aged_turno.php" method="post">
        <div class="form-group">
            <label>Consulta la fecha:</label> 
            
            <input type="date" name="caja_texto" min="<?php echo $fechaHoy?>" id="valor1" value="0" class="form-control" /> 
            <input type="button" class="form-control" style="background-color: #4ba44a; color:#fff; cursor: pointer" href="javascript:;" onclick="realizaProceso($('#valor1').val());return false;" value="Consultar fechas disponibles aquí."/>
        </div>
        <div class="form-group">
            <label>Selecciona el horario:</label> 
        
        <a href="javascript:mostrar();">    
            <select name="hora" id="resultado" class="form-control">
            </select>
        </a>
        </div>

        <div id="flotante" style="display:none;">
        <div class="form-group" >
            <label>¿Para quién es el turno?:</label> 
            <input type="radio" value="Para mí" name="paraquien" class="form-control">Para mí 
            <input type="radio" value="Para otra persona" name="paraquien" class="form-control">Para otra persona
            
          </div>
          <div class="form-group">
            <label>¿Es la primera visita?:</label> 
            <input type="radio" value="Si" name="primeravisita" class="form-control">Si
            <input type="radio" value="No" name="primeravisita" class="form-control">No
            
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
            
    </form>
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

