$(".tablaTamanos").DataTable({
  ajax: "ajax/tablaTamanos.ajax.php",
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

$(".tablaTamanos tbody").on("click", ".btnEditarTamanos", function () {
  var idTamanos = $(this).attr("idTamanos");

  var datos = new FormData();

  datos.append("idTamanos", idTamanos);

  $.ajax({
    url: "ajax/tamanos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#modalEditarTamanos .idTamano").val(respuesta["id"]);
      $("#modalEditarTamanos .tamano").val(respuesta["tamano"]);
    },
  });
});

$(".tablaTamanos tbody").on("click", ".btnEliminarTamanos", function () {
  var idTamanos = $(this).attr("idTamanos");

  var datos = new FormData();
  
  datos.append("idTamanos", idTamanos);

  $.ajax({
    url: "ajax/tamanos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#modalEliminarTamanos .idTamano").val(respuesta["id"]);
    },
  });
});