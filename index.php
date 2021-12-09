<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/inventario.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/tamanos.controlador.php";

require_once "modelos/administradores.modelo.php";
require_once "modelos/inventario.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/tamanos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->plantilla();
