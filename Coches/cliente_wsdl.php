<?php


$cliente = new SoapClient("http://localhost/Workspace/Servicios_Web/Coches/servicio_wsdl.php?wsdl");
$marcas = $cliente->obtenerMarcas();


echo "<ul>";
for($i=0;$i<count($marcas);$i++){
    $modelos= $cliente->obtenerModelo($marcas[$i]);
    $i++;
    echo "<li>".$marcas[$i]."</li>";
    echo "<ul>";
    for($j=0;$j<count($modelos);$j++){
        echo "<li>".$modelos[$j]."</li>";
    }
    echo "</ul>";
}

?>