<?php

require_once "../modelos/administradores.modelo.php";
require_once "../controladores/administradores.controlador.php";

class tablaPerfiles
{
    public function mostrarTabla()
    {
        $item = null;
        $valor = null;

        $perfiles = ControladorPerfiles::ctrMostrarPerfiles($item, $valor);

        $datosJson = '{
            "data": [';

        for ($i = 0; $i < count($perfiles); $i++) {

            $acciones = "<button class='btn btn-app bg-success btnEditarPerfiles' data-toggle='modal' idPerfiles='" . $perfiles[$i]["id"] . "' data-target='#modalEditarPerfiles'><i class='fas fa-edit'></i>Editar</button><button class='btn btn-app bg-danger btnEliminarPerfiles' data-toggle='modal' idPerfiles='" . $perfiles[$i]["id"] . "' data-target='#modalEliminarPerfiles'><i class='far fa-trash-alt'></i>Eliminar</button>";

            $datosJson .= '[
                "' . ($i + 1) . '",
                "' . $perfiles[$i]["nombre"] . '",
                "' . $acciones . '"
            ],';
        }


        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
    }';

        echo $datosJson;
    }
}

$activar = new tablaPerfiles();
$activar->mostrarTabla();