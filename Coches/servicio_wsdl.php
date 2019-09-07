<?php

require_once('coches.php');
$servidor= new SoapServer("http://localhost/Workspace/Servicios_Web/Coches/servicio.xml");
$servidor->setClass('coches');
$servidor->handle();
?>