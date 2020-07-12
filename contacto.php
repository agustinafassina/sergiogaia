<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$asunt = $_POST['asunt'];
$mensaje = $_POST['mensaje'];

$cabeceras = "From: $email\n" 
. "Reply-To: $email\n";
$asunto = "Mensaje desde gaiaespacioholistico.com"; 
$email_to = "info@gaiaespacioholistico.com"; 
$contenido = "$nombre ha enviado un mensaje desde el sitio web"
. "\n"
. "Nombre: ".utf8_decode($nombre)."\n"
. "Email: ".utf8_decode($email)."\n"
. "Telefono: ".utf8_decode($telefono)."\n"
. "Asunto: ".utf8_decode($asunt)."\n"
. "Mensaje: ".utf8_decode($mensaje)."\n"

. "\n";


if ($_POST['submit']) {
if (@mail($email_to, $asunto, $contenido, $cabeceras)) {
echo "<script language='javascript'>
alert('Mensaje enviado, muchas gracias.');
window.location.href = 'http://www.gaiaespacioholistico.com/contacto.html';
</script>";
} else {
echo "Falló el envio";
}
}
?>
