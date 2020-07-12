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
<script type="text/javascript" src="agregartexto/ckeditor.js"></script>
<div id="content-wrapper">
<script type="text/javascript">
    $(document).ready(function() {
        $('#psicologia').DataTable();
    } );
    $(document).ready(function() {
        $('#psicologiaRealizados').DataTable();
    } );

function confirma(url){
if (!confirm("Va a proceder a eliminar este registro, si desea eliminarlo clic en ACEPTAR\n de lo contrario clic en CANCELAR.")) {
return false;
}
else {
document.location = url;
return true;
}
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
            <h3>NOVEDADES ADMINISTRABLES</h3>
            <ul>
              <li>Aquí encontrarán las novedades administrables que se mostrarán en la web.</li>
              <li>Se pueden agregar, editar y borrar.</li>
              <li>Las mismas se mostrarán ordenadas por fecha de carga.</li>
            </ul>
        </div>
        <div class="col-sm-3">
          <a href="#" data-toggle="modal" data-target="#popupNuevaAventuraas" style="border: none;text-decoration:none;"> 
          <button type="button" class="btn btn-primary">¡AQUÍ AGREGAR NOVEDAD!</button>
          </a>
        </div>
      </div>
      <h3>NOVEDADES</h3>
      <div class="divRu"> 
       <table id="psicologia" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               <th class="thTablas" style="width:20%">FECHA CARGA</th>
                <th class="thTablas" style="width:10%">TÍTULO</th>
                <th class="thTablas">DESCRIPCIÓN</th>
                <th class="thTablas">IMAGEN /LINK</th>
                <th class="thTablas">VER EN WEB</th>
                <th class="thTablas">EDITAR Y BORRAR</th>
            </tr>
        </thead>
        <tbody>
           
            <?php 
            $sql = "SELECT * FROM novedades ORDER by fecha desc";
           // mysqli_set_charset($con, "utf8");
           // echo $sql;

           if (!$result=mysqli_query($con,$sql));
             
            while($row = mysqli_fetch_array($result)){
              $id =$row['id'];
                ?>
            <tr>
              <td  style="width: 12%">
                <?php echo date("d-m-Y", strtotime($row['fecha'])) ?><br>
              </td>
              <td><?php echo $row['titulo'] ?></td>
              <td><?php echo $row['detalle'] ?></td>
               <td><a href="http://www.gaiaespacioholistico.com/verdetalle.php?id=<?php echo $id ;?>" target="_blank"><b>ABRIR NOVEDAD</b></a></td>
              <td>
                <?php if($row['imagen'] !== 'novedades/'){?>
                <img src="<?php echo $row['imagen'] ?>" style="width:50%">
                Sin video.
                <?php }else if($row['link'] !== ''){?>
                Sin imagen.
                <iframe width="300" height="150" src="<?php echo $row['link'];?>" frameborder="0" allowfullscreen></iframe>
                <?php } ?>
              </td>
              <td>
                <a href="javascript:;" style="margin-left: 0px" onclick="confirma('borrar.php?fibra=<?php echo $fibra ;?>&amp;que=novedades&amp;id=<?php echo $id;?>'); return false;">
                <img src="image/borrar.png" style="width:30px; height:30px">
                </a>
                <div data-toggle="modal" data-target="#popupNuevaAventurae<?php echo $id?>">
                  <img src="image/editar.png"  style="width:30px; height:30px; cursor:pointer">
                </div>
                <div class="modal fade" id="popupNuevaAventurae<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <?php include ("aged_novedad.php");?>
                </div>
              </td>

                </tr>    
             <?php }?>
        </tbody>
      </table>

      </div>
      <br><br>

      
	    <div class="modal fade" id="popupNuevaAventuraas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	     <?php 
	     $id = '2';
	     include('aged_novedad.php');?>
	      </div>
    </div>
  </div>
</div> 
