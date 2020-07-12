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
<div id="content-wrapper">
<script type="text/javascript">
    $(document).ready(function() {
        $('#psicologia').DataTable();
    } );
    $(document).ready(function() {
        $('#psicologiaRealizados').DataTable();
    } );
  </script>

<script type="text/javascript">  
function check(x){
document.getElementById(x+'d').style.display="none";
document.getElementById(x+'s').style.display="block";
    var valores = '?cod='+x;
  var valores = valores +'&check='+1;
  var valores = valores + '&sec=psico'
  var divajax = 'ajax';
    var urlto = 'confirmando.php';
  var metodo = 'GET';
  GAjax(urlto,divajax,valores,metodo);
}
function uncheck(x){
document.getElementById(x+'s').style.display="none";
document.getElementById(x+'d').style.display="block";
var valores = '?cod='+x
  var valores = valores + '&check='+0;
  var valores = valores + '&sec=psico'
  var divajax = 'ajax';
    var urlto = 'confirmando.php';
  var metodo = 'GET';
  GAjax(urlto,divajax,valores,metodo);
}

function checks(x){
document.getElementById(x+'a').style.display="none";
document.getElementById(x+'u').style.display="block";
    var valores = '?cod='+x;
  var valores = valores +'&check='+1;
  var valores = valores + '&sec=psico'
  var divajax = 'ajax';
    var urlto = 'realizado.php';
  var metodo = 'GET';
  GAjax(urlto,divajax,valores,metodo);
}
function unchecks(x){
document.getElementById(x+'u').style.display="none";
document.getElementById(x+'a').style.display="block";
var valores = '?cod='+x
  var valores = valores + '&check='+0;
  var valores = valores + '&sec=psico'
  var divajax = 'ajax';
    var urlto = 'realizado.php';
  var metodo = 'GET';
  GAjax(urlto,divajax,valores,metodo);
}
function realizaProceso(valorCaja1){
var parametros = {
        "valorCaja1" : valorCaja1
};
$.ajax({
        data:  parametros,
        url:   'consulta_hora3.php',
        type:  'post',
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
                $("#resultado").html(response);
        }
});
}

function mostrar() {
    div = document.getElementById('flotante');
    div.style.display = '';
}

</script>   
<style>
    .divRu{
      background-color: #fff;
    padding: 8px;}
</style> 
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
      <div class="row" style="margin: 15px;">
        <div class="col-sm-9">
            <h3>PLANILLA DE TURNOS NUTRICIÓN</h3>
            <ul>
              <li>Aquí encontrarán los registors que ingresán por la web.</li>
              <li>Al tildar y confirmar el turno dejara de aparecer como disponible en la web.</li>
              <li>Al tildar la columna TURNO REALIZADO, dejara de aparecer en la primera tabla y aparecera en la tabla de turnos realizados.</li>
              <li>Al confirmar un turno, se enviará un mail avisando al paciente de la confirmación.</li>
              <li>Para agregar turnos a la derecha en el botón +.</li>
            </ul>
        </div>
        <div class="col-sm-3">
          <a href="#" data-toggle="modal" data-target="#popupNuevaAventuraas" style="border: none;text-decoration:none;"> 
          <button type="button" class="btn btn-primary">¡AQUÍ AGREGAR TURNO!</button>
          </a>
        </div>
      </div>
      <h3>TURNOS PENDIENTES</h3>
   <div class="divRu">  
       <table id="psicologia" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="thTablas" style="width:20%">FECHA Y HORA (TURNO)</th>
                <th class="thTablas" style="width:10%">FECHA Y POR DONDE INGRESO</th>
                <th class="thTablas">NOMBRE</th>
                <th class="thTablas">TELÉFONO</th>
                <th class="thTablas">EMAIL</th>
                <th class="thTablas" style="width:5%">PRIMERA VISITA</th>
                <th class="thTablas" style="width:5%">PARA QUIÉN</th>
                <th class="thTablas" style="width:20%">COMENTARIO</th>
                <th class="thTablas">¿CONFIRMAR TURNO?</th>
                <th class="thTablas">¿TURNO REALIZADO?</th>
            </tr>
        </thead>
        <tbody>
           
            <?php 
            $sql = "SELECT * FROM reservas WHERE id_profesion='3' AND realizado='0' ORDER by fecha_reserva desc,id_hora";
           // mysqli_set_charset($con, "utf8");

           if (!$result=mysqli_query($con,$sql));
             
            while($row = mysqli_fetch_array($result)){
              $id =$row['id'];
              $idHor = $row['id_hora'];
              $sql1 = "SELECT * FROM horas WHERE id=".$idHor;
              $result1=mysqli_query($con,$sql1);
              $row1 = mysqli_fetch_array($result1);
                ?>
            <tr>
              <td style="width: 12%">
                <b>Fecha:</b> <?php echo date("d-m-Y", strtotime($row['fecha_reserva'])) ?><br>
                <b>Hora:</b>  <?php echo $row1['horas'];?>:00
              </td>
              <td><?php echo date("d-m-Y", strtotime($row['fecha'])) ?><br>Ingreso: <?php echo $row['ingreso'] ?></td>
              <td><?php echo $row['nombre'] ?></td>
              <td><?php echo $row['telefono'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['primera_visita'] ?></td>
              <td><?php echo $row['para_quien'] ?></td>
              <td><?php echo $row['comentario'] ?></td>
              <td>
                <div id="ajax"></div>
                  <div id="<?php echo $id;?>s" class="check" onclick="uncheck('<?php echo $id;?>');" <?php if ($row['confirmar']=="" or $row['confirmar']==0) echo " style=\"display:none\"";?>>&nbsp;</div>
                  <div id="<?php echo $id;?>d" class="uncheck" onclick="check('<?php echo $id;?>');" <?php if ($row['confirmar']==1) echo " style=\"display:none\"";?>>&nbsp;</div>
              </td>
              <td>
                <div id="<?php echo $id;?>u" class="checks" onclick="unchecks('<?php echo $id;?>');" <?php if ($row['realizado']=="" or $row['realizado']==0) echo " style=\"display:none\"";?>>&nbsp;</div>
                  <div id="<?php echo $id;?>a" class="unchecks" onclick="checks('<?php echo $id;?>');" <?php if ($row['realizado']==1) echo " style=\"display:none\"";?>>&nbsp;</div>
              </td>

                </tr>    
             <?php }?>
        </tbody>
      </table>
      </div>
      <br><br>
      <div class="divRu">  
      

      <h3>TURNOS REALIZADOS</h3>
       <table id="psicologiaRealizados" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="thTablas">FECHA Y HORA (TURNO)</th>
                <th class="thTablas" style="width:10%">FECHA Y POR DONDE INGRESO</th>
                <th class="thTablas">NOMBRE</th>
                <th class="thTablas">TELÉFONO</th>
                <th class="thTablas">EMAIL</th>
                <th class="thTablas">PRIMERA VISITA</th>
                <th class="thTablas">PARA QUIÉN</th>
                <th class="thTablas">COMENTARIO</th>
            </tr>
        </thead>
        <tbody>
           
            <?php 
            $sqlA = "SELECT * FROM reservas WHERE id_profesion='3' AND realizado='1'  ORDER by fecha_reserva desc,id_hora";
           // mysqli_set_charset($con, "utf8");

           if (!$resultA=mysqli_query($con,$sqlA));
             
            while($rowA = mysqli_fetch_array($resultA)){
              $id =$rowA['id'];
              $idHor = $rowA['id_hora'];
              $sqlA1 = "SELECT * FROM horas WHERE id=".$idHor;
              $resultA1=mysqli_query($con,$sqlA1);
              $rowA1 = mysqli_fetch_array($resultA1);
                ?>
            <tr>
              <td>
                <b>Fecha:</b> <?php echo date("d-m-Y", strtotime($rowA['fecha_reserva'])) ?><br>
                <b>Hora:</b>  <?php echo $rowA1['horas'];?>:00
              </td>
              <td><?php echo date("d-m-Y", strtotime($rowA['fecha'])) ?></td>
              <td><?php echo $rowA['nombre'] ?></td>
              <td><?php echo $rowA['telefono'] ?></td>
              <td><?php echo $rowA['email'] ?></td>
              <td><?php echo $rowA['primera_visita'] ?></td>
              <td><?php echo $rowA['para_quien'] ?></td>
              <td><?php echo $rowA['comentario'] ?></td>
              

              </tr>    
            <?php }?>
        </tbody>
    </table>
    <div class="modal fade" id="popupNuevaAventuraas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <?php 
     $id = '3';
     include('aged_turno.php');?>
      </div>
 </div> 
  </div>
</div> 