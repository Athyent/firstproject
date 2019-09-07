<?php

$url="http://localhost/Workspace/Servicios_Web/Coches/servicio.php";
$uri="http://localhost/Workspace/Servicios_Web/Coches/";


$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
$marcas = $cliente->obtenerMarcas();
echo "<ul>";
for($i=0;$i<count($marcas);$i++){
    $modelos= $cliente->obtenerModelos($marcas[$i]);
    $i++;
    echo "<li>".$marcas[$i]."</li>";
    echo "<ul>";
    for($j=0;$j<count($modelos);$j++){
        echo "<li>".$modelos[$j]."</li>";
    }
    echo "</ul>";
}
echo "</ul>";

?>
