/*========
CARGAR LA TABLA DINAMICA DE INVENTARIO
==========*/

$(".tablaInventario").DataTable({
  ajax: "ajax/tablaInventario.ajax.php",
  deferRender: true,
  retrieve: true,
  processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

$(".tablaInventario tbody").on("click", ".btnEditarProducto", function () {
  var idProducto = $(this).attr("idProducto");

  var datos = new FormData();

  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/inventario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#modalEditarProducto .idProducto").val(respuesta["id"]);
      $("#modalEditarProducto .editarCodigo").val(respuesta["codigo"]);
      $("#modalEditarProducto .editarNombre").val(respuesta["nombre"]);
      $("#modalEditarProducto .editarCategoria").val(respuesta["id_categoria"]);
      $("#modalEditarProducto .editarTamano").val(respuesta["id_tamano"]);
      $("#modalEditarProducto .editarPrecio").val(respuesta["precio"]);
      $("#modalEditarProducto .editarStock").val(respuesta["stock"]);
    },
  });
});

$(".tablaInventario tbody").on("click", ".btnSumarStock", function () {
  var idProducto = $(this).attr("idProducto");

  var datos = new FormData();

  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/inventario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#modalSumarProducto .idProducto").val(respuesta["id"]);
      $("#modalSumarProducto .stock").val(respuesta["stock"]);
    },
  });
});

$(".tablaInventario tbody").on("click", ".btnEliminarProducto", function () {
  var idProducto = $(this).attr("idProducto");

  var datos = new FormData();

  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/inventario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#modalEliminarProducto .idProducto").val(respuesta["id"]);
    },
  });
});

$("#formScaner").on("click", "#btnScaner", function () {
  var codigoScan = $("#codigoScan").val();
  console.log(codigoScan);
  var datos = new FormData();

  datos.append("codigoScan", codigoScan);

  $.ajax({
    url: "ajax/inventario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#codigoScan").val("");
    },
  });
});

$(document).ready(function () {
  $("#modalBtnScaner").click(function () {
    $("#modalModoScaner").modal();
  });
});

$(document).ready(function () {
  $("#modalModoScaner").on("shown.bs.modal", function () {
    $(this).find('input[id="codigoScan"]').focus();
  });
});

$("#codigoScan").keyup(function (e) {
  if (e.keyCode == 13) {
    $("#btnScaner").click();
  }
});
