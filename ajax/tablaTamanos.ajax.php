<?php

require_once "../modelos/tamanos.modelo.php";
require_once "../controladores/tamanos.controlador.php";

class TablaTamanos
{

    public function mostrarTabla()
    {
        $item = null;
        $valor = null;

        $tamanos = ControladorTamanos::ctrMostrarTamanos($item, $valor);

        $datosJson = '{
            "data": [';

        for ($i = 0; $i < count($tamanos); $i++) {

            $acciones = "<button class='btn btn-app bg-success btnEditarTamanos' data-toggle='modal' idTamanos='" . $tamanos[$i]["id"] . "' data-target='#modalEditarTamanos'><i class='fas fa-edit'></i>Editar</button><button class='btn btn-app bg-danger btnEliminarTamanos' data-toggle='modal' idTamanos='" . $tamanos[$i]["id"] . "' data-target='#modalEliminarTamanos'><i class='far fa-trash-alt'></i>Eliminar</button>";


            $datosJson .= '[
                "' . ($i + 1) . '",
                "' . $tamanos[$i]["tamano"] . '",
                "' . $acciones . '"
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }
}

$activar = new TablaTamanos();
$activar->mostrarTabla();
