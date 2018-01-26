<?php
require 'tienda.php';


$uri="http://localhost/Workspace/Actividades_finales/Actividad_1/";
$servidor = new SoapServer(null, array('uri'=>$uri));
$servidor->setClass("tienda");
$servidor->handle();
?>