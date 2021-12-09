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

    static public function ctrCrearTamano()
    {
        if (isset($_POST["submit_CrearTamano"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tamano"])) {

                $tabla = "tamanos";

                $datos = array("tamano" => $_POST["tamano"]);

                $respuesta = ModeloTamanos::mdlIngresarTamano($tabla, $datos);
            }
        }
    }

    static public function ctrEditarTamano()
    {
        if (isset($_POST["submit_EditarTamano"])) {
            
            $id = $_POST["idTamano"];
            $tamano = $_POST["tamano"];

            $datos = array(
                "id" => $id,
                 "tamano" => $tamano
            );

            $respuesta = ModeloTamanos::mdlEditarTamano($datos);
        }
    }

    static public function ctrEliminarTamano(){
        if (isset($_POST["button_EliminarTamano"])) {
            $id = $_POST["idTamano"];

            $datos = array(
                "id" => $id
            );

            $respuesta = ModeloTamanos::mdlEliminarTamano($datos);
        }
    }
}
