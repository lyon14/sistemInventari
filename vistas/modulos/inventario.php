<?php
if (isset($_POST['submit_CrearProducto'])) {
  $nombre = $_POST['nombre'];
  $codigo = $_POST['codigo'];
  $precio = $_POST['precio'];
  $stock = $_POST['stock'];
  $categoria = $_POST['categoria'];
  $tamano = $_POST['tamano'];

  $datos = array(
    'nombre' => $nombre,
    'codigo' => $codigo,
    'precio' => $precio,
    'stock' => $stock,
    'id_categoria' => $categoria,
    'id_tamano' => $tamano
  );

  $respuesta = ControladorProductos::ctrCrearProducto($datos);

  if ($respuesta == 'ok') {
    echo '<script>
    
    windows.location = "inventario";

    </script>';
  }
}

if (isset($_POST['submit_EditarProducto'])) {

  $id = $_POST['idProducto'];
  $nombre = $_POST['nombre'];
  $codigo = $_POST['codigo'];
  $precio = $_POST['precio'];
  $stock = $_POST['stock'];
  $categoria = $_POST['categoria'];
  $tamano = $_POST['tamano'];

  $datos = array(
    'id' => $id,
    'nombre' => $nombre,
    'codigo' => $codigo,
    'precio' => $precio,
    'stock' => $stock,
    'id_categoria' => $categoria,
    'id_tamano' => $tamano
  );

  #var_dump($datos);
  $respuesta = ControladorProductos::ctrEditarProducto($datos);
}

if (isset($_POST['submit_SumarStock'])) {
  $id = $_POST['idProducto'];
  $sumarStock = $_POST['sumarStock'];

  $datos = array(
    'id' => $id,
    'stock' => $sumarStock
  );

  $respuesta = ControladorProductos::ctrSumarStock($datos);
  echo '<script>console.log("' . $respuesta . '");</script>';
}

if (isset($_POST['button_EliminarProducto'])) {
  $id = $_POST['idProducto'];

  $datos = array(
    'id' => $id
  );

  $respuesta = ControladorProductos::ctrEliminarProducto($datos);
}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Inventario</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Inventario</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
                Agregar Producto
              </button>
              <button class="btn btn-app bg-secondary" id="modalBtnScaner">
                <i class="fas fa-barcode"></i> Modo Scaner
              </button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped tablaInventario">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Tamaño</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                  </tr>
                </thead>

                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Tamaño</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--=============================================
    MODAL AGREGAR PRODUCTO
    =============================================-->
<div class="modal fade" id="modalAgregarProducto" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">

          <div class="form-group">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" class="form-control" name="codigo" placeholder="Codigo">
          </div>

          <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="categoria">categoria</label>
              <select name="categoria" class="custom-select">

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {
                  echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                }

                ?>

              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="tamano">Tamaño</label>
              <select name="tamano" class="custom-select">
                <?php

                $item = null;
                $valor = null;

                $tamanos = ControladorTamanos::ctrMostrarTamanos($item, $valor);

                foreach ($tamanos as $key => $value) {
                  echo '<option value="' . $value["id"] . '">' . $value["tamano"] . '</option>';
                }

                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" placeholder="Precio">
          </div>

          <div class="form-group">
            <label for="stock" class="form-label">Stock</label>
            <input type="text" class="form-control" name="stock" placeholder="Stock">
          </div>
          <div class="card-footer">
            <button type="submit" name="submit_CrearProducto" class="btn btn-primary">Guardar</button>
          </div>
        </form>

      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--=============================================
          MODAL EDITAR PRODUCTO
=============================================-->

<div class="modal fade" id="modalEditarProducto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <input type="hidden" class="idProducto" name="idProducto">
          <div class="form-group">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" class="form-control editarCodigo" name="codigo" placeholder="Codigo">
          </div>

          <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control editarNombre" name="nombre" placeholder="Nombre">
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="categoria">categoria</label>
              <select name="categoria" class="custom-select editarCategoria">

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {
                  echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                }

                ?>

              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="tamano">Tamaño</label>
              <select name="tamano" class="custom-select editarTamano">
                <?php

                $item = null;
                $valor = null;

                $tamanos = ControladorTamanos::ctrMostrarTamanos($item, $valor);

                foreach ($tamanos as $key => $value) {
                  echo '<option value="' . $value["id"] . '">' . $value["tamano"] . '</option>';
                }

                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control editarPrecio" name="precio" placeholder="Precio">
          </div>

          <div class="form-group">
            <label for="stock" class="form-label">Stock</label>
            <input type="text" class="form-control editarStock" name="stock" placeholder="Stock">
          </div>
          <div class="card-footer">
            <button type="submit" name="submit_EditarProducto" class="btn btn-primary">Guardar</button>
          </div>

        </form>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!--=============================================
    MODAL SUMAR STOCK
=============================================-->

<div class="modal fade" id="modalSumarProducto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sumar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" method="POST">

          <input type="hidden" class="idProducto" name="idProducto">
          <div class="form-group">
            <label for="stock" class="form-label">Stock Actual</label>
            <input type="text" class="form-control stock" name="stock" placeholder="Stock" disabled>
          </div>
          <div class="form-group">
            <label for="stock" class="form-label">Cuanto desea sumarle al stock</label>
            <input type="text" class="form-control" name="sumarStock" placeholder="Sumar al Stock">
          </div>
          <div class="card-footer">
            <button type="submit" name="submit_SumarStock" class="btn btn-primary">Guardar</button>
          </div>

        </form>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<!--=============================================
    MODAL ELIMINAR PRODUCTO
=============================================-->
<div class="modal fade" id="modalEliminarProducto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <input type="hidden" class="idProducto" name="idProducto">
          <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="button_EliminarProducto" class="btn btn-block btn-danger btn-lg">Eliminar</button>
        </form>

      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<!--=============================================
    MODAL MODO SCANER
=============================================-->
<div class="modal fade" id="modalModoScaner" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Scanear para Descontar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="formScaner">

          <div class="form-group">
            <label for="codigoScan" class="form-label">Scanear para restar 1</label>
            <input type="text" class="form-control" name="codigoScan" id="codigoScan">
          </div>
          <div class="card-footer">
            <button type="button" name="submit_scaner" id="btnScaner" class="btn btn-primary">scanear</button>
          </div>

        </form>

      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('input[name=codigo]').forEach(node => node.addEventListener('keypress', e => {
      if (e.keyCode == 13) {
        e.preventDefault();
      }
    }))
  });

  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('input[name=codigoScan]').forEach(node => node.addEventListener('keypress', e => {
      if (e.keyCode == 13) {
        e.preventDefault();
      }
    }))
  });
</script>