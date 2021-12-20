<?php

class ControladorAdministradores
{

    /*=============================================
	INGRESO DE ADMINISTRADOR
	=============================================*/

    public function ctrIngresoAdministrador()
    {

        if (isset($_POST["ingEmail"])) {

            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
            ) {

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "administradores";
                $item = "email";
                $valor = $_POST["ingEmail"];

                $respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

                if ($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar) {

                    $_SESSION["validarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["email"] = $respuesta["email"];
                    $_SESSION["password"] = $respuesta["password"];

                    echo '<script>

						window.location = "inicio";

					</script>';
                } else {

                    echo '<br>
					<div class="alert alert-danger">Error al ingresar vuelva a intentarlo</div>';
                }
            }
        }
    }
}

class ControladorPerfiles
{

    static public function ctrMostrarPerfiles($item, $valor)
    {

        $tabla = "administradores";

        $respuesta = ModeloPerfiles::mdlMostrarPerfiles($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCrearPerfil()
    {

        if (isset($_POST["submit_CrearPerfil"])) {

            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])
            ) {


                $encriptar = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "administradores";

                $datos = array(
                    "nombre" => $_POST["regNombre"],
                    "email" => $_POST["regEmail"],
                    "password" => $encriptar
                );

                $respuesta = ModeloPerfiles::mdlCrearPerfil($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>

						window.location = "perfiles";

					</script>';
                }
            }
        }
    }

    static public function ctrEditarPerfil()
    {

        if (isset($_POST["submit_EditarCategoria"])) {

            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ediEmail"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ediPassword"])
            ) {


                $encriptar = crypt($_POST["ediPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "administradores";

                $datos = array(
                    "id" => $_POST["idPerfiles"],
                    "nombre" => $_POST["ediNombre"],
                    "email" => $_POST["ediEmail"],
                    "password" => $encriptar
                );

                $respuesta = ModeloPerfiles::mdlEditarPerfil($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>

						window.location = "perfiles";

					</script>';
                }
            }
        }
    }

    static public function ctrEliminarPerfil()
    {

        if (isset($_POST["idPerfiles"])) {

            $tabla = "administradores";
            $datos = $_POST["idPerfiles"];

            $respuesta = ModeloPerfiles::mdlEliminarPerfil($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                    window.location = "perfiles";

                </script>';
            }
        }
    }
}
