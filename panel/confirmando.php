<?php require_once('funciones.php'); 
//session_start();
//$usu=$_SESSION['usuario'];
//hackerDefense_g();
ValidarDatos($_GET['sec']);
$sec=$_GET['sec'];
switch ($sec){
case 'psico';
$tabla="reservas";
$ident="id";
break;
}
ValidarDatos($_GET['cod']);
ValidarDatos($_GET['check']);
$cod=limpiar_tags($_GET['cod']);
$check=limpiar_tags($_GET['check']);

if ($tabla=="reservas"){
$query= sprintf("update reservas set confirmar='$check' where  $ident='$cod'");
//echo $query;
$con->query($query);

$sql = "SELECT * FROM reservas WHERE id='$cod'";
//echo $sql;
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$email = $row['email'];
$nombre = $row['nombre'];
$idHora = $row['id_hora'];
$fechaReserva = date("d-m-Y", strtotime($row['fecha_reserva']));

$sql1 = "SELECT * FROM horas WHERE id='$idHora'";	
//echo $sql1;
$result1=mysqli_query($con,$sql1);
$row1 = mysqli_fetch_array($result1);
$horaTurno = $row1['horas'];

$para = "agustinafassina@gmail.com";//Email al que se enviará
$asunto = "Consulta por turno web";//Puedes cambiar el asunto del mensaje desde aqui
//Este sería el cuerpo del mensaje
$mensaje = "
<table border='0' cellspacing='3' cellpadding='2'>
<tr>
<td colspan='2'>Hola $nombre, tu turno para Gaia Espacio Holistico fue confirmado, nos vemos pronto.</td>
</tr>
<tr>
<td align='left' bgcolor='#f0efef'><strong>Fecha reserva:</strong></td>
<td align='left'>$fechaReserva</td>
</tr>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Hora del turno:</strong></td>
<td width='70%' align='left'>$horaTurno:00Hs</td>
</tr>
<tr>
<td colspan='2'><img src='http://www.gaiaespacioholistico.com/pruebaservicios/panel/image/novedad10.jpg' style='width: 30%'></td>
</tr>

</table>
";
 
//Cabeceras del correo
$headers = "From: $nombre <$para>\r\n"; //Quien envia?
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
if (@mail($para, $asunto, $mensaje, $headers));
}
else {
echo "Vuelva a intentarlo.";
}
?>