<?php

  define('DB_SERVER', 'localhost');
  define('DB_NAME', 'bd_coches');
  define('DB_USER', 'jose');
  define('DB_PASS', 'josefa');
  

  $conexion = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
  if(!$conexion){
    die('Imposible conectar. Error numero'.mysql_errno()." : ".mysql_error());
  }
$bd = mysqli_select_db($conexion, DB_NAME);
if(!$bd)
  die("No se pudo conectar con bd ".mysql_error());

  mysqli_query($conexion, "SET NAMES 'utf8'");
 ?>
