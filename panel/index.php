<?php
header("Content-Type: text/html;charset=utf-8"); 
error_reporting(0);
if (!isset($_SESSION)) {
	  session_start();
}
$_SESSION['user'] = NULL; 
unset($_SESSION['user']);
session_unset();
$id = $_GET['id'];	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="image/favicon.ico"/>
<title>Panel</title>
<meta charset="utf-8">
<style>
@media screen and (min-width: 847px) {
  #login-form {
	margin: 50px auto;
	width: 100%;
	}

#login-form input[type="text"],
#login-form input[type="password"] {
	border: 1px solid #dcdcdc;
	padding: 12px 10px;
	width: 300px;
}
#login-form input {
	font-size: 14px;
}  

}
@media screen and (min-width: 992px) {
  #login-form {
	margin: 50px auto;
	width: 100%;
	}

#login-form input[type="text"],
#login-form input[type="password"] {
	border: 1px solid #dcdcdc;
	padding: 12px 10px;
	width: 300px;
}
#login-form input {
	font-size: 14px;
}
.msj{
	font-size: 20px;
}
  
}
@media screen and (min-width: 250px) {
	#login-form {
	margin: 50px auto;
	width: 100%;
	}

#login-form input[type="text"],
#login-form input[type="password"] {
	border: 1px solid #dcdcdc;
	padding: 12px 10px;
	width: 90%;
	height: 40px;
}
#login-form input {
	font-size: 14px;
}
.msj{
	font-size: 25px;
}

}	
@media screen and (min-width: 400px) {
  #login-form {
	margin: 50px auto;
	width: 90%;
	}

#login-form input[type="text"],
#login-form input[type="password"] {
	border: 1px solid #dcdcdc;
	padding: 12px 10px;
	width: 98%;
	height: 90px;
}
#login-form input {
	font-size: 33px;
}
.msj{
	font-size: 25px;
}
  
}@media screen and (min-width: 1200px) {
	#login-form {
	margin: 50px auto;
	width: 300px;
	}

#login-form input[type="text"],
#login-form input[type="password"] {
	border: 1px solid #dcdcdc;
	padding: 12px 10px;
	width: 238px;
	height: auto;
}
#login-form input {
	font-size: 14px;
}
.msj{
	font-size: 14px;
}
}
body {
	background: #ccc;
	color: #999;
	font: 100%/1.5em sans-serif;
	margin: 0;
}

h1 { margin: 0; }

a {
	color: #999;
	text-decoration: none;
}

a:hover { color: #1dabb8; }

fieldset {
	border: none;
	margin: 0;
}

input {
	border: none;
	font-family: inherit;
	font-size: inherit;
	margin: 0;
	outline: none;
	-webkit-appearance: none;
}

input[type="submit"] { cursor: pointer; }

.clearfix { *zoom: 1; }
.clearfix:before, .clearfix:after {
	content: "";
	display: table;	
}
.clearfix:after { clear: both; }

/* ---------- LOGIN-FORM ---------- */


#login-form h1 {
	border-radius: 5px 5px 0 0;
	color: #fff;
	font-size: 14px;
	padding: 20px;
	text-align: center;
	text-transform: uppercase;
	border: 4px solid;
}

#login-form fieldset {
	background: #fff;
	border-radius: 0 0 5px 5px;
	padding: 20px 20px 30px;
	position: relative;
}

#login-form fieldset:before {
	background-color: #fff;
	content: "";
	height: 8px;
	left: 50%;
	margin: -4px 0 0 -4px;
	position: absolute;
	top: 0;
	-webkit-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	transform: rotate(45deg);
	width: 8px;
}

#login-form input[type="text"] {
	border-radius: 3px 3px 0 0;
}

#login-form input[type="password"] {
	border-top: none;
	border-radius: 0px 0px 3px 3px;
}

#login-form input[type="submit"] {
	background: #000;
	border-radius: 3px;
	color: #fff;
	float: right;
	font-weight: bold;
	margin-top: 20px;
	padding: 12px 20px;
}

#login-form input[type="submit"]:hover { background: #424242; }

#login-form footer {
	font-size: 12px;
	margin-top: 16px;
}

.info {
	background: #e5e5e5;
	border-radius: 50%;
	display: inline-block;
	height: 20px;
	line-height: 20px;
	margin: 0 10px 0 0;
	text-align: center;
	width: 20px;
}
label{
	font-size:11px;
	color: #000;
}
	</style>
	</head>

<body>
	 <div id="login-form">
       <h1><img src="image/logo.png" style="width:71%; height:5%"></h1>
        <fieldset>
            <form method="post" action="loginvarus.php" autocomplete="off">
				<input type="text" id="user" name="user" placeholder="Usuario"/> 
				<input type="password" id="pass" name="pass" placeholder="Contraseña"/>
				<input type="submit" value="ENVIAR" name="submit2">
			</form>
			<label><?php 
				if($id){
					echo "<p class='msj'>Usuario o contraseña incorrectos.</p>";
				}
				?></label>
		</fieldset>
	</div>
</body>
</html>
