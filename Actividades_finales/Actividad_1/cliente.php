<?php

$url="http://localhost/Workspace/Actividades_finales/Actividad_1/servicio.php";
$uri="http://localhost/Workspace/Actividades_finales/Actividad_1/";

$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

$pvp = $cliente->getPVP('PIXMAIP4850');

echo 'El PVP del código PIXMAIP4850 es '.$pvp;

$stock = $cliente->getStock('OPTIOLS1100', 1);

echo '<br/>El stock del producto OPTIOLS1100 de la tienda 1 es de: '.$stock.' unidades<br/>';

$familias = $cliente->getFamilias();
echo "<ul>";
foreach($familias as $value){
    echo "<li>".$value."</li>";
}
echo "</ul>";

$productos = $cliente->getProductosFamilias('CAMARA');
echo "<ul>";
foreach($productos as $value){
    echo "<li>".$value."</li>";
}
echo "</ul>";

?>