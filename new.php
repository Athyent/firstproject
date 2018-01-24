<?php
$llamada = curl_init('http://localhost/Proyectos/ServiciosWeb/REST/Tienda/producto');
curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "GET");
$response = curl_exec($llamada);
respuesta($response);

echo "<ul><li></li><ul>";
?>
