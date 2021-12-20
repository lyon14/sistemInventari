<?php

require_once "../modelos/administradores.modelo.php";
require_once "../controladores/administradores.controlador.php";

class AjaxPerfiles{

    public $idPerfiles;

    public function ajaxEditarPerfil(){

        $item = "id";
        $valor = $this->idPerfiles;

        $respuesta = ControladorPerfiles::ctrMostrarPerfiles($item, $valor);

        echo json_encode($respuesta);

    }
}

if(isset($_POST["idPerfiles"])){

    $editar = new AjaxPerfiles();
    $editar -> idPerfiles = $_POST["idPerfiles"];
    $editar -> ajaxEditarPerfil();

}