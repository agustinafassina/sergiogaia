<?php //include('admin.php');

$dbhost = 'localhost';
$usuario = 'mk000780_gaia';
$dbpasswordpass = 'sopiLI28po';
$bdatos = 'mk000780_gaia';

$con = mysqli_connect($host, $usuario, $password, $bdatos);

mysqli_set_charset($con, "utf8");


$id = $_GET["id"];
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$fechaDehoy = date("Y-m-d");

if($id == '4'){
$horario = $_POST["horario"];
$insert = "Insert into reservas (nombre, telefono, email, horario, fecha, id_profesion, ingreso) value ('$nombre', '$telefono', '$email','$horario', '$fechaDehoy', '$id', 'web')";
$con->query($insert);


//$para = "agustinafassina@gmail.com";//Email al que se enviará
$para = "maternidad@gaiaespacioholistico.com";

$asunto = "Consulta del curso de Pre-post parto";//Puedes cambiar el asunto del mensaje desde aqui
//Este sería el cuerpo del mensaje
$mensaje = "
<table border='0' cellspacing='3' cellpadding='2'>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Nombre:</strong></td>
<td width='80%' align='left'>$nombre</td>
</tr>
<tr>
<td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
<td align='left'>$email</td>
</tr>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Teléfono:</strong></td>
<td width='70%' align='left'>$telefono</td>
</tr>
<tr>
<td align='left' bgcolor='#f0efef'><strong>Horario:</strong></td>
<td align='left'>$horario</td>
</tr>
</table>
";
 
//Cabeceras del correo
$headers = "From: $nombre <$para>\r\n"; //Quien envia?
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
 

if (@mail($para, $asunto, $mensaje, $headers)) {
if($insert){
echo "<script language='javascript'>alert('Mensaje enviado, nosotros nos contactaremos. Muchas gracias.');
window.location.href = 'http://www.gaiaespacioholistico.com/maternidad.html#contenido';</script>";
} else {
echo "<script language='javascript'>alert('Falló el envio, vuelva a intentarlo más tarde.');
window.location.href = 'http://www.gaiaespacioholistico.com/maternidad.html#contenido';</script>";
}
}

}else if ($id == "1" OR $id == "2" OR $id == "3") {
$fechaReserva = $_POST['caja_texto'];
$hora = $_POST['hora'];
$paraquien = $_POST['paraquien'];
$primeravisita = $_POST['primeravisita'];
$comentario = $_POST['comentario'];


$sql = "SELECT * FROM horas WHERE id=".$hora;
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$horaFijo = $row['horas'];
$insert = "Insert into reservas (nombre, telefono, email, fecha, id_profesion, fecha_reserva, id_hora, para_quien, primera_visita, comentario, ingreso) value ('$nombre', '$telefono', '$email','$fechaDehoy', '$id', '$fechaReserva', '$hora', '$paraquien','$primeravisita','$comentario', 'web')";
//echo $insert;
$con->query($insert);

$fechaRe = date('d-m-Y', strtotime($fechaReserva));
if($id == '1'){
$para = "psicoterapia@gaiaespacioholistico.com";//Email al que se enviará
//$para = "agustinafassina@gmail.com";	
$asunto = "psico";
}else if($id == '2'){
$para = "yoga@gaiaespacioholistico.com";//Email al que se enviará	
//$para = "agustinafassina@gmail.com";	
$asunto = "yoga";	
}else if($id == '3'){
$para = "nutricion@gaiaespacioholistico.com";//Email al que se enviará		
//$para = "agustinafassina@gmail.com";	
$asunto = "yoga";
}
//descomentar el asunto y comentarlos en los otros if(arriba)
//$asunto = "Consulta por turno web";//Puedes cambiar el asunto del mensaje desde aqui
//Este sería el cuerpo del mensaje
$mensaje = "
<table border='0' cellspacing='3' cellpadding='2'>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Nombre:</strong></td>
<td width='80%' align='left'>$nombre</td>
</tr>
<tr>
<td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
<td align='left'>$email</td>
</tr>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Teléfono:</strong></td>
<td width='70%' align='left'>$telefono</td>
</tr>
<tr>
<td align='left' bgcolor='#f0efef'><strong>Fecha reserva:</strong></td>
<td align='left'>$fechaRe</td>
</tr>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Hora:</strong></td>
<td width='70%' align='left'>$horaFijo</td>
</tr>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Para quién:</strong></td>
<td width='70%' align='left'>$paraquien</td>
</tr>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Primera visita:</strong></td>
<td width='70%' align='left'>$primeravisita</td>
</tr>
</table>
";
 
//Cabeceras del correo
$headers = "From: $nombre <$para>\r\n"; //Quien envia?
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
 

if (@mail($para, $asunto, $mensaje, $headers)) {
	if($id == '1'){
echo "<script language='javascript'>alert('Mensaje enviado, nosotros nos contactaremos. Muchas gracias.');
	window.location.href = 'http://www.gaiaespacioholistico.com/psicologia.html#contenido';</script>";
	}else if($id == '2'){
echo "<script language='javascript'>alert('Mensaje enviado, nosotros nos contactaremos. Muchas gracias.');
	window.location.href = 'http://www.gaiaespacioholistico.com/yoga.html#contenido';</script>";
	}else if($id == '3'){
echo "<script language='javascript'>alert('Mensaje enviado, nosotros nos contactaremos. Muchas gracias.');
	window.location.href = 'http://www.gaiaespacioholistico.com/nutricion.html#contenido';</script>";		
	}
}else{
echo "<script language='javascript'>alert('Falló el envio, vuelva a intentarlo más tarde.');
window.location.href = 'http://www.gaiaespacioholistico.com/';</script>";
}
}

 ?>