<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Perfiles</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Perfiles</li>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPerfil">
                Agregar Perfil
              </button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped tablaPerfiles">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>acciones</th>
                  </tr>
                </thead>

                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
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

<div class="modal fade" id="modalAgregarPerfil">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Perfil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" method="POST">

          <div class="form-group">
            <label for="regNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="regNombre" placeholder="nombre">
          </div>
          <div class="form-group">
            <label for="regEmail" class="form-label">Email</label>
            <input type="email" class="form-control" name="regEmail" placeholder="email">
          </div>
          <div class="form-group">
            <label for="regPassword" class="form-label">Contraseña</label>
            <input type="text" class="form-control" name="regPassword" placeholder="password">
          </div>

          <div class="card-footer">
            <button type="submit" name="submit_CrearPerfil" class="btn btn-primary">Guardar Pefil</button>
          </div>
          <?php 
          
          $crearPerfil = new ControladorPerfiles();
          $crearPerfil -> ctrCrearPerfil();
          ?>

        </form>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalEditarPerfiles">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Perfil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" method="POST">

          <input type="hidden" class="idPerfiles" name="idPerfiles">
          <div class="form-group">
            <label for="ediNombre" class="form-label">Editar Nombre</label>
            <input type="text" class="form-control ediNombre" name="ediNombre" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label for="ediEmail" class="form-label">Editar Email</label>
            <input type="text" class="form-control ediEmail" name="ediEmail" placeholder="email">
          </div>
          <div class="form-group">
            <label for="ediPassword" class="form-label">Editar Contraseña</label>
            <input type="text" class="form-control ediPassword" name="ediPassword" placeholder="Contraseña">
          </div>

          <div class="card-footer">
            <button type="submit" name="submit_EditarCategoria" class="btn btn-primary">Guardar</button>
          </div>

          <?php
          
          $editarPerfil = new ControladorPerfiles();
          $editarPerfil -> ctrEditarPerfil();
          ?>
        </form>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalEliminarPerfiles">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar Perfil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <input type="hidden" class="idPerfiles" name="idPerfiles">
          <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="button_EliminarPerfiles" class="btn btn-block btn-danger btn-lg">Eliminar</button>

          <?php
          
          $eliminarPerfil = new ControladorPerfiles();
          $eliminarPerfil -> ctrEliminarPerfil();
          ?>
        </form>

      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>