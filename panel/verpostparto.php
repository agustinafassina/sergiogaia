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

?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#psicologia').DataTable();
    } );
    $(document).ready(function() {
        $('#psicologiaRealizados').DataTable();
    } );
</script>
<style>
    .divRu{
      background-color: #fff;
    padding: 8px;}
</style> 
<div id="content-wrapper">
  <div class="mui--appbar-height"></div>
  <div class="mui-container-fluid">

         <div class="row" style="margin: 15px;">
          <div class="col-sm-9">
              <h3>PLANILLA DE CONSULTAS PRE POST PARTO</h3>
              <ul>
                <li>Aquí encontrarán los registors que ingresán por la web.</li>
                <li>Para agregar consultas a la derecha en el botón +.</li>
              </ul>
          </div>
          <div class="col-sm-3">
            <a href="#" data-toggle="modal" data-target="#popupNuevaAventuraas" style="border: none;text-decoration:none;"> 
            <button type="button" class="btn btn-primary">¡AQUÍ AGREGAR TURNO!</button>
            </a>
          </div>
        </div>    
        <div class="divRu">  
        <table id="psicologia" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                    <th class="thTablas">FECHA</th>
                    <th class="thTablas">NOMBRE</th>
                    <th class="thTablas">TELÉFONO</th>
                    <th class="thTablas">EMAIL</th>
                    <th class="thTablas">HORARIOS</th>
                </tr>
            </thead> 
            <tbody>
            <?php 
            $sql = "SELECT * FROM reservas WHERE id_profesion='4' ORDER by fecha desc";
           // mysqli_set_charset($con, "utf8");

           if (!$result=mysqli_query($con,$sql));
             
            while($row = mysqli_fetch_array($result)){

                ?>
                <tr>
                    <td><?php echo date("d-m-Y", strtotime($row['fecha'])) ?><br>Ingreso: <?php echo $row['ingreso'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['telefono'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['horario'] ?></td>
                </tr>    
             <?php }?>
            </tbody>
        </table>
        </div>

       <div class="modal fade" id="popupNuevaAventuraas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <?php 
     $id = '4';
     include('aged_consulta.php');?>
      </div>

      </div>
    </div>

  </body>
</html>
