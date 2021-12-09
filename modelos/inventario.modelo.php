<?php

require_once "conexion.php";

class ModeloInventario
{

    static public function mdlMostrarInventario($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT p.id, p.nombre, p.codigo, c.categoria, t.tamano, p.precio, p.stock FROM productos p JOIN categorias c ON p.id_categoria=c.id JOIN tamanos t ON p.id_tamano=t.id");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
}

class ModeloProductos
{

    static public function mdlIngresarProducto($datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO productos(nombre, codigo, precio, stock, id_categoria, id_tamano) VALUES (:nombre, :codigo, :precio, :stock, :id_categoria, :id_tamano)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_INT);
        $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
        $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":id_tamano", $datos["id_tamano"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarProductos($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlEditarProducto($datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE productos SET nombre = :nombre, codigo = :codigo, precio = :precio, stock = :stock, id_categoria = :id_categoria, id_tamano = :id_tamano WHERE id = :id");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_INT);
        $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
        $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":id_tamano", $datos["id_tamano"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlSumarStock($datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock = stock + :stock WHERE id = :id");

        $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlEliminarProducto($datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM productos WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }


    static public function mdlRestarUnProducto($item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock = stock - 1 WHERE $item = :codigo");

        $stmt->bindParam(":codigo", $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
