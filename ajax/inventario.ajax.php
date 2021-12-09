<?php

require_once "../modelos/inventario.modelo.php";
require_once "../controladores/inventario.controlador.php";

class AjaxInventario
{

    public $idProducto;

    public function ajaxEditarProducto()
    {

        $item = "id";
        $valor = $this->idProducto;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
    }

    public $codigoScan;
    public function ajaxScanearProducto(){

        $item = "codigo";
        $valor = $this->codigoScan;
        $respuesta = ControladorProductos::ctrRestarUnProducto($item, $valor);
        
        echo json_encode($respuesta);
        
        
    }

}

if (isset($_POST["idProducto"])) {

    $editar = new AjaxInventario();
    $editar->idProducto = $_POST["idProducto"];
    $editar->ajaxEditarProducto();
}

if (isset($_POST["codigoScan"])){

    $scaner = new AjaxInventario();
    $scaner->codigoScan = $_POST["codigoScan"];
    $scaner->ajaxScanearProducto();
    
}
