$(".tablaPerfiles").DataTable({
  ajax: "ajax/tablaPerfiles.ajax.php",
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

$(".tablaPerfiles tbody").on("click", ".btnEditarPerfiles", function () {
  var idPerfiles = $(this).attr("idPerfiles");

  var datos = new FormData();

  datos.append("idPerfiles", idPerfiles);

  $.ajax({
    url: "ajax/administradores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {

      $("#modalEditarPerfiles .idPerfiles").val(respuesta["id"]);
      $("#modalEditarPerfiles .ediNombre").val(respuesta["nombre"]);
      $("#modalEditarPerfiles .ediEmail").val(respuesta["email"]);

    },
  });
});

$(".tablaPerfiles tbody").on("click", ".btnEliminarPerfiles", function () {
  var idPerfiles = $(this).attr("idPerfiles");

  var datos = new FormData();
  datos.append("idPerfiles", idPerfiles);

  $.ajax({
    url: "ajax/administradores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {


      $("#modalEliminarPerfiles .idPerfiles").val(respuesta["id"]);

    },
  });
});