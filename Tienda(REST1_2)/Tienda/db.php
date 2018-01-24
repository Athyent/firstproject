<?php

define("SERV_BD", "localhost");
define('USER_BD', 'jose');
define('PASS_BD', 'josefa');
define('NAME_BD', 'bd_tienda');


$conexion = @mysqli_connect(SERV_BD, USER_BD, PASS_BD, NAME_BD); //@ Para quitar el warning

if (!$conexion) {

    die("Imposible conectar. Error numero" . mysqli_errno() . " : " . mysqli_error());
}
?>