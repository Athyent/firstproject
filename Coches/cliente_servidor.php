<?php

$url="https://adrianarmenta.000webhostapp.com/Servicios/servicio.php";
$uri="https://adrianarmenta.000webhostapp.com/Servicios";


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
/*
$n1 = "5/4";
$n2 = 5;
$numero = $cliente->sumar($n1, $n2);
echo 'valor de la suma ' . $n1 . '+' . $n2 . '=' . $numero . "<br>";

$n1 = 5;
$n2 = 4;
$numero = $cliente->sumar($n1, $n2);
echo 'valor de la suma ' . $n1 . '+' . $n2 . '=' . $numero . "<br>";
*/
?>
