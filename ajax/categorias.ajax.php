<?php

require_once "../modelos/categorias.modelo.php";
require_once "../controladores/categorias.controlador.php";

class AjaxCategorias{

    public $idCategoria;

    public function ajaxEditarCategoria(){

        $item = "id";
        $valor = $this->idCategoria;

        $respuesta = ControladorCategorias::ctrMostrarCategorias2($item, $valor);

        echo json_encode($respuesta);

    }
}

if(isset($_POST["idCategorias"])){

    $editar = new AjaxCategorias();
    $editar -> idCategoria = $_POST["idCategorias"];
    $editar -> ajaxEditarCategoria();

}