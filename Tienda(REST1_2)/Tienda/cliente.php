<?php

function respuesta($response) {

    if (!$response) {
        echo 'Error al consumir el servicio web';
    } else {

        //$decodedText= substr($response,3, strlen($response)-1);
        $obj = json_decode($response);
        echo '<ul>';
        foreach ($obj as $value) {
            echo "<li>".$value."</li>";
        }
        echo '</ul>';
    }
}

function respuesta_producto($response){
     if (!$response) {
        echo 'Error al consumir el servicio web';
    } else {

        //$decodedText= substr($response,3, strlen($response)-1);
        $obj = json_decode($response);
        echo "<table border='1'><th>Id</th><th>Nombre</th><th>Precio</th><th>Descripcion</th><th>imagen</th><tr>";
        foreach ($obj as $value) {
            echo "<td>".$value."</td>";
        }
        echo '</tr></table>';
    }
}
function respuesta_insertar($response){
         if (!$response) {
        echo 'Error al consumir el servicio web';
    } else {

        //$decodedText= substr($response,3, strlen($response)-1);
        $obj = json_decode($response);
        foreach($obj as $value){
            echo "<p>".$value."</p>";
        }
    }
   
}
function respuesta_actualizar($response){
         if (!$response) {
        echo 'Error al consumir el servicio web';
    } else {

        //$decodedText= substr($response,3, strlen($response)-1);
        $obj = json_decode($response);
        foreach($obj as $value){
            echo "<p>".$value."</p>";
        }
    }
}
$llamada = curl_init('http://localhost/Workspace/Servicios_Web/REST/Tienda/producto');
curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "GET");
$response = curl_exec($llamada);
respuesta($response);

$llamada = curl_init('http://localhost/Workspace/Servicios_Web/REST/Tienda/producto/3');
curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "GET");
$response = curl_exec($llamada);
$obj = $response;
respuesta_producto($response);

?>
<form action="cliente.php" method="post">
Nombre:<input type="text" name="nombre"/>
Precio:<input type="number" name="precio"/>
<input type="submit" value="Enviar" name="enviar"/>
</form>
<?php
if(isset($_POST['enviar'])){
$productos = array("producto" => $_POST['nombre'], "precio" => $_POST['precio']);

curl_setopt($llamada, CURLOPT_URL, 'http://localhost/Workspace/Servicios_Web/REST/Tienda/insertar');
curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($productos));
$response = curl_exec($llamada);
respuesta_insertar($response);
}



curl_setopt($llamada, CURLOPT_URL, "http://localhost/Workspace/Servicios_Web/REST/Tienda/actualizar/8/Actualizado");
curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "PUT");
$response = curl_exec($llamada);
respuesta_actualizar($response);

/*
$parametros = array("saludo1"=>"Primer saludo","saludo2"=>"Segundo saludo");
curl_setopt($llamada, CURLOPT_URL, "http://localhost/Proyectos/ServiciosWeb/REST/Ejercicio_clase/saludo/nuevo");
curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($parametros));
$response = curl_exec($llamada);
respuesta($response);


curl_setopt($llamada, CURLOPT_URL, "http://localhost/Proyectos/ServiciosWeb/REST/Ejercicio_clase/elimino/3");
curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "DELETE");
$response = curl_exec($llamada);
respuesta($response);


curl_setopt($llamada, CURLOPT_URL, "http://localhost/Proyectos/ServiciosWeb/REST/Ejercicio_clase/adapto/2/Jose");
curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "PUT");
$response = curl_exec($llamada);
respuesta($response);




*/

curl_close($llamada);