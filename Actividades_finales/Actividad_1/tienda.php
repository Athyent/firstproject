<?php

class Tienda{
    
    /**
     * Devuelve el pvp
     * @param string $codigo
     * return float
     */
     
     
    public function getPVP($codigo){
        require "db.php";
        $consulta = "SELECT * FROM producto WHERE cod='".$codigo."'";
        $resultado = mysqli_query($conexion, $consulta);
        if(!$resultado){
            die("Error en la consulta");
        }else{
            if($filas=mysqli_num_rows($resultado)<1){
                return 0;
            }else{
                $fila = mysqli_fetch_assoc($resultado);
                return $fila['PVP'];
            }
        }
        
    }
    /**
     * Devuelve el stock
     * @param string $codigoProducto
     * @param float $codigoTienda
     * @return int
     */
    public function getStock($codigoProducto, $codigoTienda){
        require "db.php";
        $consulta = "SELECT unidades FROM stock WHERE producto='".$codigoProducto."' AND tienda=".$codigoTienda;
        $resultado = mysqli_query($conexion, $consulta);
        if(!$resultado){
            die("Error en la consulta");
        }else{
           
                $fila = mysqli_fetch_assoc($resultado);
                return $fila['unidades'];
            
             
            }
        }
        /**
         * Devuelve las familias
         * @return string[]
         */
        
        public function getFamilias(){
            require "db.php";
         $consulta = "SELECT * FROM familia";
        $resultado = mysqli_query($conexion, $consulta);
        if(!$resultado){
            die("Error en la consulta");
        }else{
            if($filas=mysqli_num_rows($resultado)<1){
                return 0;
            }else{
                $familias = array();
                while($fila = mysqli_fetch_assoc($resultado)){
                    $familias[]=$fila['cod'];
                          
                }
                return $familias;
            
             }
            }
        
        }
        /**
         * 
         * @param string $codigoFamilia
         * @return string[]
         */
        public function getProductosFamilias($codigoFamilia){
            require "db.php";
            $consulta = "SELECT * FROM producto WHERE familia='".$codigoFamilia."'";
            $resultado = mysqli_query($conexion, $consulta);
            if(!$resultado){
                die("Error en la consulta");
            }else{
            
                $productos = array();
                while($fila = mysqli_fetch_assoc($resultado)){
                    $productos[]=$fila['nombre_corto'];
                          
                }
                return $productos;
            
             }
            
        }
}

