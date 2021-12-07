<?php

require_once "conexion.php";

class ModeloInventario{

    static public function mdlMostrarInventario($tabla){
            
            $stmt = Conexion::conectar()->prepare("SELECT p.id, p.nombre, p.codigo, c.categoria, t.tamano, p.precio, p.stock FROM productos p JOIN categorias c ON p.id_categoria=c.id JOIN tamanos t ON p.id_tamano=t.id");
    
            $stmt -> execute();
    
            return $stmt -> fetchAll();
    
            $stmt -> close();
    
            $stmt = null;
    
    }

}