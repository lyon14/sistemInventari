<?php

require_once "../modelos/inventario.modelo.php";
require_once "../controladores/inventario.controlador.php";

class TablaInventario{

    public function mostrarTabla(){

        $productos = ControladorInventario::ctrMostrarInventario();

        $datosJson = '{
            "data": [';
        for($i = 0; $i < count($productos); $i++){

            $acciones = "<a class='btn btn-app bg-success' data-toggle='modal' data-target='#modalEditarProducto'><i class='fas fa-edit'></i>Editar</a><a class='btn btn-app bg-warning' data-toggle='modal' data-target='#modalSumarProducto'><i class='fas fa-plus-square'></i>Sumar</a><a class='btn btn-app bg-danger' data-toggle='modal' data-target='#modalEliminarProducto'><i class='far fa-trash-alt'></i>Eliminar</a>";

            $datosJson .= '[
                "'.$productos[$i]["id"].'",
                "'.$productos[$i]["nombre"].'",
                "'.$productos[$i]["codigo"].'",
                "'.$productos[$i]["categoria"].'",
                "'.$productos[$i]["tamano"].'",
                "'.$productos[$i]["precio"].'",
                "'.$productos[$i]["stock"].'",
                "'.$acciones.'"
            ],';

        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }

}

$activar = new TablaInventario();
$activar -> mostrarTabla();