<?php

class ControladorCategorias
{

    /*=============================================
        MOSTRAR CATEGORIAS
        =============================================*/

    static public function ctrMostrarCategorias()
    {

        $tabla = "categorias";

        $respuesta = ModeloCategorias::mdlMostrarCategoria($tabla);

        return $respuesta;
    }

    static public function ctrCrearCategoria()
    {

        if (isset($_POST["submit_CrearCategoria"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["categoria"])) {


                $tabla = "categorias";

                $datos = array("categoria" => $_POST["categoria"]);

                $respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

                #echo '<script>console.log("' . $respuesta . '");</script>';
            }
        }
    }

    static public function ctrMostrarCategorias2($item, $valor){

        $tabla = "categorias";

        $respuesta = ModeloCategorias::mdlMostrarCategoria2($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrEditarCategoria(){

        if (isset($_POST['submit_EditarCategoria'])){
            $id = $_POST['idCategorias'];
            $categoria = $_POST['categoria'];

            $datos = array(
                'id' => $id,
                'categoria' => $categoria
            );

            $respuesta = ModeloCategorias::mdlEditarCategoria($datos);
        }

    }

    static public function ctrEliminarCategoria(){

        if (isset($_POST['button_EliminarCategoria'])){
            $id = $_POST['idCategoria'];

            $datos = array(
                'id' => $id
            );

            $respuesta = ModeloCategorias::mdlEliminarCategoria($datos);
        }

    }

}
