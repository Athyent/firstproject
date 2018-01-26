<?php
/**
 * Clase coches
 */
class coches{
   /**
    * Devuelve las marcas
    * 
    * @return string[]
    */
   public function obtenerMarcas(){
        require_once "db.php";
        $consulta = "SELECT id, marca FROM marcas";
        $resultado = mysqli_query($conexion, $consulta);
        $arrayMarcas = array();
        if($num_filas=mysqli_num_rows($resultado)){
            while($fila=mysqli_fetch_assoc($resultado)){ 
               
               $arrayMarcas[count($arrayMarcas)]=$fila['id'];
               $arrayMarcas[count($arrayMarcas)]=$fila['marca'];
            }
            
        }
        return $arrayMarcas;
    }
        /**
         * Devuelve los modelos
         * 
         * @param float $a
         * @return string[]
         */
    public function obtenerModelo($a){
        require_once "db.php";
        $consulta = "SELECT modelo FROM modelos WHERE marca='".$a."'";
        $resultado = mysqli_query($conexion, $consulta);
        $arrayModelos = array();
        if($num_filas=mysqli_num_rows($resultado)){
            while($fila=mysqli_fetch_assoc($resultado)){ 
               $arrayModelos[count($arrayModelos)]=$fila['modelo'];
            }
            
        }
        return $arrayModelos;
    }
}