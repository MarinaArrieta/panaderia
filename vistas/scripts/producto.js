var tabla;

//Función que se ejecuta al inicio
function init() {
  mostrarform(false);
  listar();

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });
}

//Función limpiar
function limpiar() {
  $("#idProducto").val("");
  $("#nombre").val("");
  $("#iva").val("");
  $("#precioVenta").val("");
  $("#precioCompra").val("");
  $("#idProveedor").val("");
  $("#stock").val("");
  $("#stockMinimo").val("");
  $("#idRubro").val("");
}

//Función mostrar formulario
function mostrarform(flag) {
  limpiar();
  if (flag) {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } else {
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
    $("#btnagregar").show();
  }
}

//Función cancelarform
function cancelarform() {
  limpiar();
  mostrarform(false);
}

//Función Listar
function listar() {
  tabla = $("#tableProducto")
    .dataTable({
      aProcessing: true, //Activamos el procesamiento del datatables
      aServerSide: true, //Paginación y filtrado realizados por el servidor
      dom: "Bfrtip", //Definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../controlador/producto.php?op=listar",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      iDisplayLength: 10, //Paginación
      order: [[0, "desc"]], //Ordenar (columna,orden)
    })
    .DataTable();
}
//Función para guardar o editar

function guardaryeditar(e) {
  e.preventDefault(); //No se activará la acción predeterminada del evento
  $("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "../controlador/producto.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      bootbox.alert(datos);
      mostrarform(false);
      tabla.ajax.reload();
    },
  });
  limpiar();
}

function mostrar(idProducto) {
  $.post(
    "../controlador/producto.php?op=mostrar",
    { idProducto: idProducto },
    function (data, status) {
      data = JSON.parse(data);
      mostrarform(true);

      $("#idProducto").val(data.idProducto);
      $("#nombre").val(data.nombre);
      $("#iva").val(data.iva);
      $("#precioVenta").val(data.precioVenta);
      $("#precioCompra").val(data.precioComra);
      $("#idProveedor").val(data.idProveedor);
      $("#stock").val(data.stock);
      $("#stockMinimo").val(data.stockMinimo);
      $("#idRubro").val(data.idRubro);
    }
  );
}

//Función para desactivar registros
function desactivar(idProducto) {
  bootbox.confirm("¿Está Seguro de desactivar rubro?", function (result) {
    if (result) {
      $.post(
        "../controlador/producto.php?op=desactivar",
        { idProducto: idProducto },
        function (e) {
          bootbox.alert(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

//Función para activar registros
function activar(idProducto) {
  bootbox.confirm("¿Está Seguro de activar el rubro?", function (result) {
    if (result) {
      $.post(
        "../controlador/producto.php?op=activar",
        { idProducto: idProducto},
        function (e) {
          bootbox.alert(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

init();
