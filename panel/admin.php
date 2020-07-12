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
$fechaHoy = date('Y-m-d');
$mes = date('m');
$sql1 = "SELECT * FROM reservas WHERE id_profesion='1' AND confirmar='0' ";
$result1=mysqli_query($con,$sql1);
$row1 = mysqli_num_rows($result1);

$sql1_a = "SELECT * FROM reservas WHERE id_profesion='1' AND confirmar='1' AND realizado='1'";
$result1_a=mysqli_query($con,$sql1_a);
$row1_a = mysqli_num_rows($result1_a);


//Yoga
$sql2 = "SELECT * FROM reservas WHERE id_profesion='2' AND confirmar='0' ";
$result2=mysqli_query($con,$sql2);
$row2 = mysqli_num_rows($result2);

$sql2_a = "SELECT * FROM reservas WHERE id_profesion='2' AND confirmar='1' AND realizado='1'";
$result2_a=mysqli_query($con,$sql2_a);
$row2_a = mysqli_num_rows($result2_a);

//Nutrición
$sql3 = "SELECT * FROM reservas WHERE id_profesion='3' AND confirmar='0' ";
$result3=mysqli_query($con,$sql3);
$row3 = mysqli_num_rows($result3);

$sql3_a = "SELECT * FROM reservas WHERE id_profesion='3' AND confirmar='1' AND realizado='1'";
$result3_a=mysqli_query($con,$sql3_a);
$row3_a = mysqli_num_rows($result3_a);


//pre post parto
$sql4 = "SELECT * FROM reservas WHERE id_profesion='4' AND confirmar='0' ";
$result4=mysqli_query($con,$sql4);
$row4 = mysqli_num_rows($result4);

$sql4_a = "SELECT * FROM reservas WHERE id_profesion='4' AND confirmar='0' AND MONTH(fecha)=".$mes;
$result4_a=mysqli_query($con,$sql4_a);
$row4_a = mysqli_num_rows($result4_a);

$sql4_b = "SELECT * FROM reservas WHERE id_profesion='4' AND MONTH(fecha)=".$mes;
$result4_b=mysqli_query($con,$sql4_b);
$row4_b = mysqli_num_rows($result4_b);

?>
    <div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br>
        <h1>Hola <?php  echo ucwords($usu);?>, bienvenido a su panel de control.</h1>
        <p>Aquí encontrarán un resumen de sus turnos.</p>
        <div class="row">
            <a href="verpsicologia.php">
            <div class="col-sm-3">
                <div class="headerInicio">   
                    <div class="headerInicioHijo">   
                        <h3 align="center">PSICOLOGÍA</h3>
                        <p>Turnos sin confirmar: <b><?php echo $row1;?></b></p>
                        <p>Total de turnos realizados   : <b><?php echo $row1_a?></b></p>
                    </div>
                </div>
                <div> 
                    <img src="image/img-psicologia.jpg" style="width: 100%;">
                </div>
                <div class="headerInicio">   
                    <div class="headerInicioHijo"> 
                    <div>
                        <h4 align="center">TURNOS PARA HOY</h4>
                        <?php  


                        $sql1_c = "SELECT * FROM reservas re INNER JOIN horas h ON re.id_hora=h.id WHERE re.id_profesion='1' AND re.fecha_reserva='$fechaHoy'  AND re.confirmar='1' ORDER BY re.id_hora asc";
                        if (!$result1_c=mysqli_query($con,$sql1_c));
                        $yes = mysqli_num_rows($result1_c);
                        if($yes!='0'){
                        while($row1_c = mysqli_fetch_array($result1_c)){?>
                        <P>Hora: <?php echo $row1_c['horas'];?>:00 - <?php echo $row1_c['nombre'];?></P>
                        <?php 
                        }
                        }else{
                            echo "<p>No hay resultados para el día de la fecha.</p>";
                        }
                         ?>
                        
                    </div>
                   </div>
                </div>    
            </div> 
            </a> 
            <a href="veryoga.php">
            <div class="col-sm-3">
                <div class="headerInicio">   
                    <div class="headerInicioHijo">   
                        <h3 align="center">YOGA CREATOVO</h3>
                        <p>Turnos sin confirmar: <b><?php echo $row2;?></b></p>
                        <p>Total de turnos realizados: <b><?php echo $row2_a?></b></p>
                    </div>
                </div>
                <div> 
                    <img src="image/img-yoga.jpg" style="width: 100%;">
                </div>
                <div class="headerInicio">   
                    <div class="headerInicioHijo"> 
                    <div>
                        <h4 align="center">TURNOS PARA HOY</h4>
                        <?php  
                        $sql2_c = "SELECT * FROM reservas re INNER JOIN horas h ON re.id_hora=h.id WHERE re.id_profesion='2' AND re.fecha_reserva='$fechaHoy'  AND re.confirmar='1' ORDER BY re.id_hora asc";
                        if (!$result2_c=mysqli_query($con,$sql2_c));
                        $yes = mysqli_num_rows($result2_c);
                        if($yes!='0'){
                        while($row2_c = mysqli_fetch_array($result2_c)){?>
                        <P>Hora: <?php echo $row2_c['horas'];?>:00 - <?php echo $row2_c['nombre'];?></P>
                        <?php 
                        }
                        }else{
                            echo "<p>No hay resultados para el día de la fecha.</p>";
                        }
                         ?>
                    </div>
                   </div>
                </div>  
            </div> 
            </a>
            <a href="vernutricion.php">
            <div class="col-sm-3">
                <div class="headerInicio">   
                    <div class="headerInicioHijo">   
                        <h3 align="center">NUTRICIÓN</h3>
                        <p>Turnos sin confirmar: <b><?php echo $row3;?></b></p>
                        <p>Total de turnos realizados: <b><?php echo $row3_a?></b></p>
                    </div>
                </div>
                <div> 
                    <img src="image/img-nutricion.jpg" style="width: 100%;">
                </div>
                <div class="headerInicio">   
                    <div class="headerInicioHijo"> 
                    <div>
                        <h4 align="center">TURNOS PARA HOY</h4>
                        <?php  
                        $sql3_c = "SELECT * FROM reservas re INNER JOIN horas h ON re.id_hora=h.id WHERE re.id_profesion='3' AND re.fecha_reserva='$fechaHoy'  AND re.confirmar='1' ORDER BY re.id_hora asc";
                        if (!$result3_c=mysqli_query($con,$sql3_c));
                        $yes = mysqli_num_rows($result3_c);
                        if($yes!='0'){
                        while($row3_c = mysqli_fetch_array($result3_c)){?>
                        <P>Hora: <?php echo $row3_c['horas'];?>:00 - <?php echo $row3_c['nombre'];?></P>
                        <?php 
                        }
                        }else{
                            echo "<p>No hay resultados para el día de la fecha.</p>";
                        }
                         ?>
                    </div>
                   </div>
                </div>  
            </div> 
            </a>
            <a href="verpostparto.php">
            <div class="col-sm-3">
                <div class="headerInicio">   
                    <div class="headerInicioHijo">   
                        <h3 align="center">PRE POST PARTO</h3>
                        <p>Consultas: <b><?php echo $row4;?></b></p>
                        <p>Total de consultas: <b><?php echo $row4_b?></b></p>
                    </div>
                </div>
                <div> 
                    <img src="image/img-maternidad.jpg" style="width: 100%;">
                </div>
                <div class="headerInicio">   
                    <div class="headerInicioHijo"> 
                    
                   </div>
                </div>  
            </div> 
            </a> 
        </div>
       
      </div>
    </div>

  </body>
</html>
