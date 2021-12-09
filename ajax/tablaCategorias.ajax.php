<?php

require_once "../modelos/categorias.modelo.php";
require_once "../controladores/categorias.controlador.php";

class TablaCategorias{

    public function mostrarTabla(){

        $categorias = ControladorCategorias::ctrMostrarCategorias();

        $datosJson = '{
            "data": [';
        
        for($i = 0; $i < count($categorias); $i++){

            $acciones = "<button class='btn btn-app bg-success btnEditarCategoria' data-toggle='modal' idCategorias='" . $categorias[$i]["id"] . "' data-target='#modalEditarCategoria'><i class='fas fa-edit'></i>Editar</button><button class='btn btn-app bg-danger btnEliminarCategoria' data-toggle='modal' idCategorias='" . $categorias[$i]["id"] . "' data-target='#modalEliminarCategoria'><i class='far fa-trash-alt'></i>Eliminar</button>";


            $datosJson .= '[
                "'. ($i+1) .'",
                "'. $categorias[$i]["categoria"] .'",
                "'. $acciones .'"
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }
}

$activar = new TablaCategorias();
$activar -> mostrarTabla();