<?php

class ControladorInventario
{

    static public function ctrMostrarInventario()
    {

        $tabla = "productos";

        $respuesta = ModeloInventario::mdlMostrarInventario($tabla);

        return $respuesta;
    }
}

class ControladorProductos
{

    static public function ctrCrearProducto($datos)
    {

        $respuesta = ModeloProductos::mdlIngresarProducto($datos);

        return $respuesta;
    }

    static public function ctrMostrarProductos($item, $valor)
    {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrEditarProducto($datos)
    {

        $respuesta = ModeloProductos::mdlEditarProducto($datos);

        return $respuesta;
    }

    static public function ctrSumarStock($datos)
    {

        $respuesta = ModeloProductos::mdlSumarStock($datos);

        return $respuesta;
    }

    static public function ctrEliminarProducto($datos)
    {

        $respuesta = ModeloProductos::mdlEliminarProducto($datos);

        return $respuesta;
    }

    static public function ctrRestarUnProducto($item, $valor)
    {
        $respuesta = ModeloProductos::mdlRestarUnProducto($item, $valor);

        return $respuesta;
    }
}
