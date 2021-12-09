<?php

require_once "../modelos/tamanos.modelo.php";
require_once "../controladores/tamanos.controlador.php";

class AjaxTamanos{

    public $idTamanos;

    public function ajaxEditarTamano(){
            
            $item = "id";
            $valor = $this->idTamanos;
            
            $respuesta = ControladorTamanos::ctrMostrarTamanos($item, $valor);
    
            echo json_encode($respuesta);
    
    }
}

if(isset($_POST["idTamanos"])){

    $editar = new AjaxTamanos();
    $editar -> idTamanos = $_POST["idTamanos"];
    $editar -> ajaxEditarTamano();

}