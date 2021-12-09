<?php

class ControladorTamanos
{

    /*=============================================
        MOSTRAR TAMAÑOS
        =============================================*/

    static public function ctrMostrarTamanos($item, $valor)
    {

        $tabla = "tamanos";

        $respuesta = ModeloTamanos::mdlMostrarTamanos($tabla, $item, $valor);

        return $respuesta;
    }
}
