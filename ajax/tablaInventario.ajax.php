<?php

require_once "../modelos/inventario.modelo.php";
require_once "../controladores/inventario.controlador.php";

class TablaInventario
{

    public function mostrarTabla()
    {

        $productos = ControladorInventario::ctrMostrarInventario();

        $datosJson = '{
            "data": [';
        for ($i = 0; $i < count($productos); $i++) {

            $acciones = "<button class='btn btn-app bg-success btnEditarProducto' data-toggle='modal' idProducto='" . $productos[$i]["id"] . "' data-target='#modalEditarProducto'><i class='fas fa-edit'></i>Editar</button><button class='btn btn-app bg-warning btnSumarStock' data-toggle='modal' idProducto='" . $productos[$i]["id"] . "' data-target='#modalSumarProducto'><i class='fas fa-plus-square'></i>Sumar</button><button class='btn btn-app bg-danger btnEliminarProducto' data-toggle='modal' idProducto='" . $productos[$i]["id"] . "' data-target='#modalEliminarProducto'><i class='far fa-trash-alt'></i>Eliminar</button>";

            $datosJson .= '[
                "' . $productos[$i]["id"] . '",
                "' . $productos[$i]["nombre"] . '",
                "' . $productos[$i]["codigo"] . '",
                "' . $productos[$i]["categoria"] . '",
                "' . $productos[$i]["tamano"] . '",
                "' . $productos[$i]["precio"] . '",
                "' . $productos[$i]["stock"] . '",
                "' . $acciones . '"
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }
}

$activar = new TablaInventario();
$activar->mostrarTabla();
