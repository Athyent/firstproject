<?php
function obtener_productos(){
    require 'db.php';
    
    mysqli_query($conexion, "SET NAMES utf8");
    $consulta = "SELECT * FROM productos";
    $productos = array();
    $result = mysqli_query($conexion, $consulta);
    
    if(!$result){
        die("Imposible realizar la consulta");
    }
    
    while ($fila = mysqli_fetch_assoc($result)){
    $productos += [$fila['id']=>$fila['producto']];
    }
    
    mysqli_close($conexion);
    mysqli_free_result($result);
 
    return $productos;
    
    
}
function obtener_productos2(){
    $productos ="";
    return $productos;
}
function obtener_producto($id){
     require 'db.php';
    
    mysqli_query($conexion, "SET NAMES utf8");
    $consulta = "SELECT * FROM productos WHERE id=".$id;
    $productos = array();
    $resultado = mysqli_query($conexion, $consulta);
    
    if(!$resultado){
        die("Imposible realizar la consulta");
    }
    $producto = array('error'=>"No existe el producto");
    if(mysqli_num_rows($resultado)>0){
        $producto= mysqli_fetch_assoc($resultado);
    }
    
    
    mysqli_close($conexion);
    mysqli_free_result($resultado);
 
    return $producto;
    
}

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new Slim\Slim();

$app ->contentType('application/json; charset=utf-8');

$app ->get('/producto',function() use($app){
    echo json_encode(obtener_productos(), JSON_FORCE_OBJECT);
    
});

$app ->get('/producto/:id', function($id) use ($app){
    echo json_encode(obtener_producto($id), JSON_FORCE_OBJECT);
});

$app ->post('/insertar', function () use ($app) {
    require "db.php";
    mysqli_query($conexion, "SET NAMES utf8");
    $consulta = "INSERT INTO productos (producto, precio) VALUES ('".$_POST['producto']."', ".$_POST['precio'].")";
    $resultado =  mysqli_query($conexion , $consulta);
    if(!$resultado){
        die("Fallo al insertar producto");
    }
    echo json_encode(array("msj"=>"Producto insertado con exito. Producto: ".$_POST['producto'].". Precio:".$_POST['precio']), JSON_FORCE_OBJECT);
    
});
$app->put('/actualizar/:id/:nombre', function ($id,$nombre){
    require "db.php";
    mysqli_query($conexion, "SET NAMES utf8");
    $consulta = "UPDATE productos SET producto='".$nombre."' WHERE id=".$id;
    $resultado =  mysqli_query($conexion , $consulta);
    if(!$resultado){
        die("Fallo al realizar la actualización");
    }
    echo json_encode(array('msj' => "El producto con id:" . $id." se ha cambiado su nombre a: ".$nombre), JSON_FORCE_OBJECT);
    
});
$app->delete('/elimino/:id', function ($id){
    require "db.php";
    mysqli_query($conexion, "SET NAMES utf8");
     $consulta = "DELETE FROM productos WHERE id=".$id;
    $resultado =  mysqli_query($conexion , $consulta);
    echo json_encode(array('msj' => "Eliminando el producto con id:" . $id), JSON_FORCE_OBJECT);
    
});
$app->run();

/*
$app->post('/saludo/nuevo', function () use ($app) {
    
    echo json_encode(array('msj' => "Datos recibidos:" . $_POST["saludo1"] . " y " .
        $_POST["saludo2"]), JSON_FORCE_OBJECT);
    
});

$app->delete('/elimino/:id', function ($id){
    
    echo json_encode(array('msj' => "Eliminando el saludo con id:" . $id), JSON_FORCE_OBJECT);
    
});

$app->put('/adapto/:id/:nombre', function ($id,$nombre){
    
    echo json_encode(array('msj' => "Adaptando el saludo con id:" . $id." cambiando nombre a: ".$nombre), JSON_FORCE_OBJECT);
    
});
*/








