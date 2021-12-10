<?php

$item = null;
$valor = null;

$productos = ControladorProductos::ctrMostrarProductos($item, $valor);

$count_productos = count($productos);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Inicio</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="inicio">Inicio</a></li>
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
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dashboard</h3>

            </div>
            <div class="card-body">
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?php echo $count_productos; ?></h3>

                    <p>Cantidad de Productos</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-boxes"></i>
                  </div>
                  <a href="inventario" class="small-box-footer">
                    Mas Info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Footer
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->