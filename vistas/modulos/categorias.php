<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Categorias</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Categorias</li>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
                Agregar Categoria
              </button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped tablaCategorias">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>acciones</th>
                  </tr>
                </thead>

                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>acciones</th>
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

<div class="modal fade" id="modalAgregarCategoria">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Categoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" method="POST">

          <div class="form-group">
            <label for="categoria" class="form-label">Nombre de la categoria</label>
            <input type="text" class="form-control" name="categoria" placeholder="Categoria">
          </div>

          <div class="card-footer">
            <button type="submit" name="submit_CrearCategoria" class="btn btn-primary">Guardar</button>
          </div>
          <?php
            $crearCategoria = new ControladorCategorias();
            $crearCategoria->ctrCrearCategoria();
          ?>
        </form>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalEditarCategoria">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Categoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" method="POST">

          <input type="hidden" class="idCategorias" name="idCategorias">
          <div class="form-group">
            <label for="categoria" class="form-label">Nombre de la categoria</label>
            <input type="text" class="form-control categoria" name="categoria" placeholder="Categoria">
          </div>

          <div class="card-footer">
            <button type="submit" name="submit_EditarCategoria" class="btn btn-primary">Guardar</button>
          </div>

          <?php
          
            $editar = new ControladorCategorias();
            $editar->ctrEditarCategoria();

          ?>

        </form>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--=============================================
    MODAL ELIMINAR Categoria
=============================================-->
<div class="modal fade" id="modalEliminarCategoria">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar Categoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <input type="hidden" class="idCategoria" name="idCategoria">
          <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="button_EliminarCategoria" class="btn btn-block btn-danger btn-lg">Eliminar</button>

          <?php
            $eliminar = new ControladorCategorias();
            $eliminar->ctrEliminarCategoria();
          ?>
        </form>

      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>