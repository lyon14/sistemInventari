<?php

class ControladorInventario{
    
    static public function ctrMostrarInventario(){
        
        $tabla = "productos";
        
        $respuesta = ModeloInventario::mdlMostrarInventario($tabla);
        
        return $respuesta;
        
    }

}