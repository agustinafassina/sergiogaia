<?php 
require_once("coneccion.php");
function ValidarDatos($campo){
//Array con las posibles cabeceras a utilizar por un spammer
$badHeads = array("Content-Type:",
"MIME-Version:",
"Content-Transfer-Encoding:",
"Return-path:",
"Subject:",
"From:",
"Envelope-to:",
"To:",
"bcc:",
"cc:");
//Comprobamos que entre los datos no se encuentre alguna de
//las cadenas del array. Si se encuentra alguna cadena se
//dirige a una página de Forbidden
foreach($badHeads as $valor){
if(strpos(strtolower($campo), strtolower($valor)) !== false){
header( "HTTP/1.0 403 Forbidden");
exit;
}
}
}

function limpiar_tags($tags){  
$tags = strip_tags($tags);  
$tags = stripslashes($tags);  
$tags = htmlentities($tags);  
return $tags;  
}  

function hackerDefense_p(){  
// begin hacker defense  
foreach ($_POST as $secvalue) {  
if ((eregi("]*script.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*object.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*iframe.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*applet.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*window.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*document.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*cookie.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*meta.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*style.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*alert.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*form.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*php.*\"?[^>]*>", $secvalue)) ||  
(eregi("]*]*>", $secvalue)) ||  
(eregi("]*img.*\"?[^>]*>", $secvalue))) {  
header("location:index.php");  
die ();  
}}}


/*
function loginusuario($username, $password)
// comprueba el nombre del usuario y el password con la base de datos
// si sí, devuelve verdadero
// si no devueelve falso
{   $pos_usu=strrpos($username, "'");
  $pos_pass=strrpos($password, "'");
    if ($pos_usu or $pos_pass)
    return 0;
  else {  
  // comprobar que el nombre de usuario sea único
  $result0 = mysql_query("select * from usuarios where usuario='$username'");
  if (mysql_num_rows($result0)!=1) return 0;
  else {
  $result = mysql_query("select * from usuarios
                         where usuario='$username'
                         and pass = '$password'");
  if (!$result)
     return 0;

  if (mysql_num_rows($result)>0){
    $res=mysql_fetch_assoc($result);
     $_SESSION['puesto']=$res['id_puesto'];
   $_SESSION['local']=$res['id_local'];
   return 1;
  }
  else
     return 0;
   }
}
}
*/
function check_admin_user()
// ver si alguien está logged in y notificárselo si no
{
  
  if (isset($_SESSION["usuario"]))
    return true;
  else
    return false;
}
/*
function change_password($username, $old_password, $new_password)
// cambiar contraseña para  username/old_password a nueva contraseña
// devuelve verdadero o falso
{
  // si la vieja contraseña es correcta
  // cambia su contraseña a nueva contraseña y devuelve verdadero
  // s no es así devuelve falso
  if (loginusuario($username, $old_password))
  {
    $result = mysql_query( "update usuarios set pass = '$new_password' where usuario = '$username'");
    if (!$result)
      return false;  // no cambiado
    else
      return true;  // cambiado correctamente

  }
  else
    return false; // la vieja contraseña estaba equivocada
}*/
function change_password_cliente($username, $old_password, $new_password)
// cambiar contraseña para  username/old_password a nueva contraseña
// devuelve verdadero o falso
{
  // si la vieja contraseña es correcta
  // cambia su contraseña a nueva contraseña y devuelve verdadero
  // s no es así devuelve falso
  if (loginusuario($username, $old_password))
  {
    $result = mysqli_query( $con, "update usuarios set password = '$new_password' where usuario = '$username'");
    if (!$result)
      return false;  // no cambiado
    else
      return true;  // cambiado correctamente

  }
  else
    return false; // la vieja contraseña estaba equivocada
}
function getdatos($usuario){
$result = mysqli_query($con, "select * from usuarios
                         where usuario='$usuario'");
if (!$result)
     return 0;
else $row=mysqli_fetch_assoc($result);
return $row;
}
/*
function getprovee($id){
$result = mysql_query("select * from proveedor_muu
                         where id_provee='$id'");
if (!$result)
     return 0;
else $row=mysql_fetch_assoc($result);
return $row;
}
function getdatosxid($id){
$result = mysql_query("select * from usuarios
                         where id_usuario='$id'");
if (!$result)
     return 0;
else $row=mysql_fetch_assoc($result);
return $row;
}
function getpuesto($id){
$result = mysql_query("select * from puestos
                         where id_puesto='$id'");
if (!$result)
     return 0;
else $row=mysql_fetch_assoc($result);
return $row;
}
function getlocal($id){
$result = mysql_query("select * from locales
                       where id_local='$id'");
if (!$result)
     return 0;
else $row=mysql_fetch_assoc($result);
return $row;
}
function getpauta($id){
$result = mysql_query("select * from pautas
                         where id_pauta='$id'");
if (!$result)
     return 0;
else $row=mysql_fetch_assoc($result);
return $row;
}
function getinvref($id){
$result = mysql_query("select * from inversion_reformas
                         where id_inv_ref='$id'");
if (!$result)
     return 0;
else $row=mysql_fetch_assoc($result);
return $row;
}
function get_permxpuesto($id){
$result = mysql_query("select * from puestos
                         where id_puesto='$id'");
if (!$result)
     return 0;
else $row=mysql_fetch_assoc($result);
return $row;
}

function getjeffe($id_local,$id_puesto){
$res0 = mysql_query("select id_puesto from puestos order by id_puesto desc");
$row0 = mysql_fetch_assoc($res0);
do { $vector_cargo=substr($row0['a_su_cargo'],1,-1);
$vector_cargo_array= explode(',',$vector_cargo);
$large=count($vector_cargo_array);
for ($i=0;$i<$large;$i++)
{
$vector_cargo_array[$i]=substr($vector_cargo_array[$i],1,-1);
if ($vector_cargo_array[$i]==$id_puesto) $id_puesto_jeffe = $row0['id_puesto']; 
}
}while($row0 = mysql_fetch_assoc($res0) and $id_puesto_jeffe=="");
if ($id_puesto_jeffe=="" and $id_local==0)
{
$result = mysql_query("select Email from usuarios where id_puesto='1'");
if (!$result)
     return 0;
else $row=mysql_fetch_assoc($result);
return $row['Email'];}
else if($id_puesto_jeffe=="" and $id_local!=""){
$result = mysql_query("select email from usuarios where id_puesto='$id_puesto' and id_local='0'");
if (!$result)
     return 0;
else $row=mysql_fetch_assoc($result);
return $row['Email'];}
else {
if ($id_local==0 or $id_puesto==3) $result = mysql_query("select Email from usuarios where id_puesto<='$id_puesto_jeffe' and id_local=0 order by id_puesto desc"); 
else if ($id_puesto==11) $result = mysql_query("select email from usuarios where id_puesto='5'");
else $result = mysql_query("select email from usuarios where id_puesto='$id_puesto_jeffe' and id_local='$id_local'");
if (!$result)
     return 0;
else $row=mysql_fetch_assoc($result);
return $row['Email'];}
}
function get_mail($usu)
{
$result = mysql_query("select Email from usuarios
                         where usuario='$usu'");
$res=mysql_result($result,0);
return $res;
}
function get_auditor($id_usuario)
{
$result = mysql_query("select nombre from auditores where id_usuario='$id_usuario'");
$res=mysql_result($result,0);
return $res;
}
function get_datauditor($id_usuario)
{
$result = mysql_query("select * from auditores where id_usuario='$id_usuario'");
$res=mysql_fetch_assoc($result);
return $res;
}
function _value_in_array($que, $array){
 $res=false;
 $array_long=count($array);
 for ($i=0; $i<$array_long; $i++){
   if ($que==$array[$i]) $res=true;
 }
 return $res; 
}
function promedio($array){
$array_long=count($array);
for ($i=0; $i<$array_long; $i++){
   $suma+=$array[$i];
 }
 return ceil((($suma/5)/$array_long)*100); 
}*/
?>
