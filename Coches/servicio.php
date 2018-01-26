<?php
require 'coches.php';

function obtenerMarcas(){
    $marcas = coches::obtenerMarcas();
    return $marcas;
    
}
function obtenerModelos($a){
    $modelos = coches::obtenerModelo($a);
    return $modelos;
}
$uri="http://localhost/Workspace/Servicios_Web/Coches";
$servidor = new SoapServer(null, array('uri'=>$uri));
$servidor->addFunction("obtenerMarcas");
$servidor->addFunction("obtenerModelos");
$servidor->handle();
?>