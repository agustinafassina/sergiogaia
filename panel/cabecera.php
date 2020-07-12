<?php 
require_once('funciones.php');
error_reporting(0); 
$usu=$_SESSION['usuario'];
$datos_usu=getdatos($usu);
$id_usuario=$datos_usu['id'];

?>
<!doctype html>
<html>
  <head>
    <title>PANEL DE CONTROL</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="js/mui.min.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="shortcut icon" href="image/favicon.ico"/>

    <link href="css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
      .colorMenu{
        color:#ddd;
      }
      a:hover{
        text-decoration: none;
      }

      .fa{

    margin-right: 10px;
    /* color: #515253; */
      }
    </style>
  </head>
  <body>
    <div id="sidedrawer" class="mui--no-user-select">
      <div id="sidedrawer-brand" class="mui--appbar-line-height" style="padding-top: 10px"><img src="image/logo.png" style="width:96%"></div>
      <div class="mui-divider"></div>
      <ul>
        <li>
          <a href="admin.php" class="colorMenu"> 
              <strong><i class="fa fa-home" aria-hidden="true"></i>INICIO</strong>
          </a>
        </li>
        <li>
          <a href="verpsicologia.php" class="colorMenu">
              <strong><i class="fa fa-check-square" aria-hidden="true"></i>PSICOLOGÍA</strong>
          </a>
        </li>
          <a href="veryoga.php" class="colorMenu"> 
                <strong><i class="fa fa-check-square" aria-hidden="true"></i>YOGA CREATIVO</strong>
            </a>
        <li>
        </li>
          <a href="vernutricion.php" class="colorMenu"> 
                <strong><i class="fa fa-check-square" aria-hidden="true"></i>NUTRICIÓN</strong>
            </a>
        <li>
          <a href="verpostparto.php" class="colorMenu"> 
                <strong><i class="fa fa-check-square" aria-hidden="true"></i>PRE - POST PARTO</strong>
            </a>
        </li>
       <li>
          <a href="vernovedades.php" class="colorMenu"> 
                <strong><i class="fa fa-check-square" aria-hidden="true"></i>NOVEDADES ADMIN.</strong>
            </a>
        </li>
        <li>
          <a href="cambiarcontrasena.php" class="colorMenu"> 
                <strong><i class="fa fa-cog" aria-hidden="true"></i>Cambiar contraseña</strong>
            </a>
        </li>
        <li>
          <a href="logout.php" class="colorMenu"> 
                <strong><i class="fa fa-circle-o-notch" aria-hidden="true"></i>Cerrar</strong>
            </a>
        </li>
      </ul>
    </div>
    <header id="header">
      <div class="mui-appbar mui--appbar-line-height">
        <div class="mui-container-fluid">
          <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
          <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>
          <span class="mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block"><img src="image/logo.png" style="width:80%"></span>
        </div>
      </div>
    </header>
