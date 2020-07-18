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
$id = $row['id'];
$sql1 = "SELECT * FROM novedades WHERE id=$id";
$result1=mysqli_query($con,$sql1);
$row1 = mysqli_fetch_array($result1);

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$idea = $_POST['idea']; 
$archi = $_POST['archivo']; 
$link = $_POST['link'];

$linkNovedad = str_replace(' ','-',$titulo);
$fechaDate = date("Y-m-d h:i:s");
if($titulo){
if($archi){
  $archivo = $archi;
}else{
if($_FILES['archivo']['size']>0)
$archivo= addslashes(nl2br(urlencode($_FILES['archivo']['name'])));


$upload="novedades/".$archivo;
}
 
if ($idea){ 
  if($upload == 'novedades/'){
  $sql3 = "UPDATE novedades SET titulo='$titulo', detalle='$descripcion', link='$link', link_novedad='$linkNovedad', fecha='$fechaDate' where id='$idea'";
  }elseif ($upload != 'novedades/') {
    $sql3 = "UPDATE novedades SET titulo='$titulo', imagen='$upload', detalle='$descripcion, link='$link', link_novedad='$linkNovedad', fecha='$fechaDate' where id='$idea'";
  }
  //echo $sql;

  $rs = mysqli_query($con,$sql3);
  echo "<script>alert('Novedad actualizada con éxito!');window.location.href='vernovedades.php';</script>";
}else{ 
if (move_uploaded_file($_FILES['archivo']['tmp_name'],$upload)){
  $insert = mysqli_query($con, "INSERT INTO novedades (titulo, detalle, imagen, fecha, link_novedad) VALUES ('$titulo', '$descripcion', '$upload', '$fechaDate', '$linkNovedad')");
  //echo $insert;
 echo "<script>alert('Novedad agregada con éxito!');window.location.href='vernovedades.php';</script>";
 //echo "aca";
 //$rs = mysqli_query($con,$sql3);
 }else{
  $insert = mysqli_query($con, "INSERT INTO novedades (titulo, detalle, imagen, fecha, link, link_novedad) VALUES ('$titulo', '$descripcion', '$upload', '$fechaDate', '$link', '$linkNovedad')");
  //echo $insert;
  //echo "por este el ultimoooo";
 echo "<script>alert('Novedad agregada con éxito!');window.location.href='vernovedades.php';</script>";
 //$rs = mysqli_query($con,$sql3);
 } 
}
}
?>
<div style=" padding:5px; margin:5px; ">  
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
        <h4 class="modal-title" id="myModalLabel">AGREGAR NOVEDAD</h4>
      </div>
      <div id="nuevaAventura" class="modal-body">
      <form method="post" action="aged_novedad.php" enctype="multipart/form-data">
        <div class="form-group">
           <input type="text" name="titulo" value="<?php echo $row1['titulo']?>" placeholder="Título novedad" class="form-control">
        </div>      
        <div class="form-group">
          Detalle novedad:
            <textarea cols="80" id="descripcion<?php echo $id ?>" name="descripcion" rows="10"><?php echo $row1['detalle']?></textarea>
          <script type="text/javascript">
          CKEDITOR.replace('descripcion<?php echo $id ?>');
          </script>
        </div>
        <div class="form-group">    
            <input type="file" name="archivo" placeholder="*archivo" class="form-control">
            <?php if($row1['detalle'] !== 'novedades/'){ ?>
            <img src="<?php echo $row1['imagen'];?>" style="width: 20%">
            <?php }?>
        </div>
        <div class="form-group">    
            <input type="text" name="link" value="<?php echo $row1['link'];?>" placeholder="*Link Youtube" class="form-control">
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
    
    </form>
    </div>
    </div>
  </div>
</div>


