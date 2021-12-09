<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tamaños</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Tamaños</li>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTamano">
                Agregar Tamaño
              </button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped tablaTamanos">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tamaño</th>
                    <th>acciones</th>
                  </tr>
                </thead>

                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Tamaño</th>
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

<div class="modal fade" id="modalAgregarTamano">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Tamaño</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" method="POST">

          <div class="form-group">
            <label for="tamano" class="form-label">Tamaño</label>
            <input type="text" class="form-control" name="tamano" placeholder="Tamaño">
          </div>

          <div class="card-footer">
            <button type="submit" name="submit_CrearTamano" class="btn btn-primary">Guardar</button>
          </div>

          <?php
          $crearTamano = new ControladorTamanos();
          $crearTamano->ctrCrearTamano();
          ?>
        </form>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalEditarTamanos">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Tamaños</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" method="POST">

          <input type="hidden" class="idTamano" name="idTamano">
          <div class="form-group">
            <label for="tamano" class="form-label">Nombre de la categoria</label>
            <input type="text" class="form-control tamano" name="tamano" placeholder="Tamaño">
          </div>

          <div class="card-footer">
            <button type="submit" name="submit_EditarTamano" class="btn btn-primary">Guardar</button>
          </div>

          <?php

          $editar = new ControladorTamanos();
          $editar->ctrEditarTamano();

          ?>

        </form>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!--=============================================
    MODAL ELIMINAR Tamaño
=============================================-->
<div class="modal fade" id="modalEliminarTamanos">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar Tamaño</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <input type="hidden" class="idTamano" name="idTamano">
          <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="button_EliminarTamano" class="btn btn-block btn-danger btn-lg">Eliminar</button>

          <?php
            $eliminar = new ControladorTamanos();
            $eliminar->ctrEliminarTamano();
          ?>
        </form>

      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>