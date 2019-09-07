<?php
function respuesta($response){
     if (!$response) {
        echo 'Error al consumir el servicio web';
    } else {

        //$decodedText= substr($response,3, strlen($response)-1);
        $obj = json_decode($response);
        echo "<table border='1' style='padding:.5rem;'><th style='padding:1rem;'>Nombre</th><th>Editar</th><th>Borrar</th><tr>";
        $i=0;
        foreach ($obj as $key=>$value) {
            $i++;
            echo "<td style='padding:1rem;'><a style='text-decoration:none;color:black;' href='cliente_2.php?mostrar=".$key."'>".$value."</a></td>";
            echo "<td><a href='cliente_2.php?editar=".$key."'>Editar</a></td>";
            echo "<td><a href='cliente_2.php?borrar=".$key."'>Borrar</a></td></tr>";
        }
        echo '</table>';
    }
    
}
function respuesta_insertar($response){
         if (!$response) {
        echo 'Error al consumir el servicio web';
    } else {

        //$decodedText= substr($response,3, strlen($response)-1);
        $obj = json_decode($response);
        foreach($obj as $value){
            echo "<p style='padding:1rem;border:1px solid black;'>".$value."</p>";
        }
    }
}
function respuesta_producto($response){
     if (!$response) {
        echo 'Error al consumir el servicio web';
    } else {

        //$decodedText= substr($response,3, strlen($response)-1);
        $obj = json_decode($response);
        echo "<table style='padding:1rem;' border='1'><th style='padding:1rem;'>Id</th><th>Nombre</th><th>Precio</th><th>Descripcion</th><th>imagen</th><tr>";
        foreach ($obj as $value) {
            echo "<td style='padding:1rem;'>".$value."</td>";
        }
        echo '</tr></table>';
    }
}
function respuesta_actualizar($response){
         if (!$response) {
        echo 'Error al consumir el servicio web';
    } else {

        //$decodedText= substr($response,3, strlen($response)-1);
        $obj = json_decode($response);
        foreach($obj as $value){
            echo "<p style='padding:1rem;border:1px solid black; '>".$value."</p>";
        }
    }
}
$llamada = curl_init('http://localhost/Workspace/Tienda(REST1_2)/Tienda/producto');
curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "GET");
$response = curl_exec($llamada);
respuesta($response);
if(isset($_GET['mostrar'])){
    $url = 'http://localhost/Workspace/Tienda(REST1_2)/Tienda/producto/'.$_GET['mostrar'];
    $llamada = curl_init($url);
    curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "GET");
    $response = curl_exec($llamada);
    $obj = $response;
    respuesta_producto($response);

}
if(!isset($_POST['insertarp'])){
?>
<form action="cliente_2.php" method="post">
    <input type="submit" name="insertarp" value="Insertar nuevo producto" style="padding:1rem;border:1px solid black;"/>
</form>
<?php
}
    if(isset($_POST['insertarp'])){
?>
<p style='border:1px solid black;padding:1rem;width:auto;'>Insertar nuevo producto</p>
<form action="cliente_2.php" method="post">
    <p>Nombre:<input  style='border:1px solid black;padding:1rem;' type="text" name="nombre"/></p>
    <p>Precio:<input style='border:1px solid black;padding:1rem;' type="number" name="precio"/></p>
<input type="submit" value="Enviar" name="enviar" style='border:1px solid black;padding:1rem;'/>
</form>
<?php
    }
if(isset($_POST['enviar'])){
$productos = array("producto" => $_POST['nombre'], "precio" => $_POST['precio']);

curl_setopt($llamada, CURLOPT_URL, 'http://localhost/Workspace/Tienda(REST1_2)/Tienda/insertar');
curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($productos));
$response = curl_exec($llamada);
respuesta_insertar($response);
}

if(isset($_GET['editar'])){
    ?>
    <form action="cliente_2.php" method="post">
    <p>Nuevo nombre:<input  style='border:1px solid black;padding:1rem;' type="text" name="nombreact"/></p>
     <input type="hidden" value="<?php if(isset($_GET['editar'])) echo $_GET['editar']; else echo $_POST['idact'];?>" name="idact"/>
<input type="submit" value="Enviar" name="enviareditar" style='border:1px solid black;padding:1rem;'/>
</form>
<?php

}

if(isset($_POST['enviareditar'])){
    $urled = "http://localhost/Workspace/Tienda(REST1_2)/Tienda/actualizar/".$_POST['idact']."/".$_POST['nombreact'];
  
    curl_setopt($llamada, CURLOPT_URL, $urled);
    curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "PUT");
    $response = curl_exec($llamada);
    respuesta_actualizar($response);
}
if(isset($_GET['borrar'])){
    $urled = "http://localhost/Workspace/Tienda(REST1_2)/Tienda/elimino/".$_GET['borrar'];
  
    curl_setopt($llamada, CURLOPT_URL, $urled);
    curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, "DELETE");
    $response = curl_exec($llamada);
    respuesta_actualizar($response);
}
