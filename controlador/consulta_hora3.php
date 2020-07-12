<?php
/*
$host = "localhost";
$usuario = "root";
$password = "";
$bdatos = "sergio";
*/
$host = "localhost";
$usuario = "mk000780_gaia";
$password = "sopiLI28po";
$bdatos = "mk000780_gaia";

$con = mysqli_connect($host, $usuario, $password, $bdatos);
mysqli_set_charset($con, "utf8");

//Resultado formulario
$valor = ($_POST['valorCaja1']); 

$sql = "SELECT re.id_hora FROM reservas re INNER JOIN horas h ON re.id_hora=h.id WHERE re.id_profesion='3' AND confirmar!='0' AND re.fecha_reserva='".$valor."'";
$result = mysqli_query($con,$sql);


for ($set = array (); $row = $result->fetch_assoc(); $set[] = $row['id_hora']);

$longitud = count($set);
//echo $longitud;
for($i=0; $i<$longitud; $i++)
      {
      //saco el valor de cada elemento
	echo $set[$i];
}

if($longitud == '0'){

$sql1 = "SELECT * FROM horas ORDER BY id asc";	
$result1 = mysqli_query($con,$sql1);
while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}else if($longitud == '1'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." ORDER BY id asc";
$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}else if($longitud == '2'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." ORDER BY id asc";	
$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}else if($longitud == '3'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." AND id!=".$set[2]." ORDER BY id asc";	
$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}else if($longitud == '4'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." AND id!=".$set[2]." AND id!=".$set[3]."   ORDER BY id asc";	

$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}else if($longitud == '5'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." AND id!=".$set[2]." AND id!=".$set[3]." AND id!=".$set[4]."   ORDER BY id asc";	

$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}
else if($longitud == '6'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." AND id!=".$set[2]." AND id!=".$set[3]." AND id!=".$set[4]." AND id!=".$set[5]."   ORDER BY id asc";	

$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}
else if($longitud == '7'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." AND id!=".$set[2]." AND id!=".$set[3]." AND id!=".$set[4]." AND id!=".$set[5]." AND id!=".$set[6]."   ORDER BY id asc";	
$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}
else if($longitud == '8'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." AND id!=".$set[2]." AND id!=".$set[3]." AND id!=".$set[4]." AND id!=".$set[5]." AND id!=".$set[6]." AND id!=".$set[7]."   ORDER BY id asc";	
$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}
else if($longitud == '9'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." AND id!=".$set[2]." AND id!=".$set[3]." AND id!=".$set[4]." AND id!=".$set[5]." AND id!=".$set[6]." AND id!=".$set[7]." AND id!=".$set[8]."   ORDER BY id asc";	
$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}
else if($longitud == '10'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." AND id!=".$set[2]." AND id!=".$set[3]." AND id!=".$set[4]." AND id!=".$set[5]." AND id!=".$set[6]." AND id!=".$set[7]." AND id!=".$set[8]."  AND id!=".$set[9]."   ORDER BY id asc";	
$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}

else if($longitud == '11'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." AND id!=".$set[2]." AND id!=".$set[3]." AND id!=".$set[4]." AND id!=".$set[5]." AND id!=".$set[6]." AND id!=".$set[7]." AND id!=".$set[8]."  AND id!=".$set[9]." AND id!=".$set[10]."   ORDER BY id asc";	
$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}

else if($longitud == '12'){

$sql1 = "SELECT * FROM horas WHERE id!=".$set[0]." AND id!=".$set[1]." AND id!=".$set[2]." AND id!=".$set[3]." AND id!=".$set[4]." AND id!=".$set[5]." AND id!=".$set[6]." AND id!=".$set[7]." AND id!=".$set[8]."  AND id!=".$set[9]." AND id!=".$set[10]." AND id!=".$set[10]."   ORDER BY id asc";	
$result1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($result1)){
$resultados = $row1['horas'];
$idHo = $row1['id'];
echo "<option value='".$idHo."'>".$resultados.":Hs</option>";

}

}
?>

