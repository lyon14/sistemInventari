<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inventario Nano</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  
</head>

<?php

if(isset($_SESSION["validarSesion"]) && $_SESSION["validarSesion"] === "ok"){

    echo '<body class="hold-transition sidebar-mini layout-fixed">';

    echo '<div class="wrapper">';

    include "modulos/cabezote.php";

    include "modulos/lateral.php";

    if(isset($_GET["ruta"])) {
        if ($_GET["ruta"]== "inicio") {
            
            include "modulos/".$_GET["ruta"].".php";

        }
    }else{

        include "modulos/inicio.php";

    }

    include "modulos/footer.php";

    echo '</div>';

}else{
    echo '<body class="hold-transition login-page">';
    include "modulos/login.php";

}

?>

<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
</body>
</html>
