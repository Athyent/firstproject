<?php
	define("SERV_BD", 'localhost');
	define("USER_BD", 'jose');
	define("PASS_BD", 'josefa');
	define("NAME_BD", 'BD_TENIS');

	$conexion=@mysqli_connect(SERV_BD, USER_BD, PASS_BD, NAME_BD);
	if(!$conexion)
	{
		die("Imposible conectar. Error n&uacute;mero ". mysqli_connect_errno()."".mysqli_connect_error());
	}
?>
