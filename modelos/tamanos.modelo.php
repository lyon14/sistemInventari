<?php

require_once "conexion.php";

class ModeloTamanos
{

    /*=============================================
    MOSTRAR CATEGORIAS
    =============================================*/

    static public function mdlMostrarTamanos($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlIngresarTamano($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tamano) VALUES (:tamano)");

        $stmt->bindParam(":tamano", $datos["tamano"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlEditarTamano($datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE tamanos SET tamano = :tamano WHERE id = :id");

        $stmt->bindParam(":tamano", $datos["tamano"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlEliminarTamano($datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM tamanos WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
