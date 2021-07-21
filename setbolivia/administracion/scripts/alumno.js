var tabla;

//Función que se ejecuta al inicio
function init() {

    mostrarform(false);
    listar();

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })

    $.post("../ajax/alumno.php?op=selectPais", function(r) {



        $("#napais").html(r);


        $("#napais").chosen({ width: '100%' });
       //$("#napais").val('4').trigger("chosen:updated");
        $("#napais").trigger("chosen:updated");



    });
    $("#napais").change(function() {

      var parametros = "id=" + $("#napais").val();

      $.ajax({
          data: parametros,
          url: 'ajax_ciudades.php',
          type: 'post',
          beforeSend: function() {

          },
          success: function(response) {
              $("#naciudad").html(response);
              $("#naciudad").chosen({ width: '100%' });
              $('#naciudad').trigger("chosen:updated");
          },
          error: function() {
              alert("error")
          }
      });
  })
  $("#naciudad").change(function() {
      var parametros = "id=" + $("#naciudad").val();
      $.ajax({
          data: parametros,
          url: 'ajax_provincias.php',
          type: 'post',
          beforeSend: function() {

          },
          success: function(response) {
              $("#naprovincia").html(response);
              $("#naprovincia").chosen({ width: '100%' });
              $('#naprovincia').trigger("chosen:updated");
          },
          error: function() {
              alert("error")
          }
      });
  })

  ///--------------------Aqui Lugar del Seminario

  $.post("../ajax/alumno.php?op=selectCiudad", function(r) {



    $("#ciudad").html(r);
    $("#ciudad").chosen({ width: '100%' });
    // $("#napais").val('4').trigger("chosen:updated");
    $("#ciudad").trigger("chosen:updated");



});
$("#ciudad").change(function() {
    var parametros = "id=" + $("#ciudad").val();
    $.ajax({
        data: parametros,
        url: 'ajax_provincias1.php',
        type: 'post',
        beforeSend: function() {

        },
        success: function(response) {
            $("#provincia").html(response);
            $("#provincia").chosen({ width: '100%' });
            $('#provincia').trigger("chosen:updated");
        },
        error: function() {
            alert("error")
        }
    });
})

$("#provincia").change(function() {
    var parametros = "id=" + $("#provincia").val();
    $.ajax({
        data: parametros,
        url: 'ajax_distrito.php',
        type: 'post',
        beforeSend: function() {

        },
        success: function(response) {
            $("#distrito").html(response);
            $("#distrito").chosen({ width: '100%' });
            $('#distrito').trigger("chosen:updated");
        },
        error: function() {
            alert("error")
        }
    });
})


$('#imagenmuestra').hide();



}

//Función limpiar
function limpiar() {
  alert("limpiando");
    $("#nombre").val("");
    $("#apellido").val("");
    $("#telefono").val("");
    $("#celular").val("");
    //$("#imagen").val("");
    $("#imagenmuestra").hide();
  	$("#imagenactual").hide();
    $("#estado_civil").val("");
    $("#email").val("");
    $("#direccion").val("");
    $("#fech_nac").val("");
    $("#c_i").val("");
    $("#napais").val('').trigger("chosen:updated");
    $("#naciudad").val("");
    $("#naprovincia").val("");

   // $("#region").val("");
    $("#ciudad").val("");
    $("#provincia").val("");
    $("#distrito").val("");
  //  $("#miembro").val("");
  //  $("#fecha").val("");
   // $("#estado").val("");
  //  $("#act_sem").val("");

}

//Función mostrar formulario
function mostrarform(flag) {
    limpiar();
    if (flag) {
      limpiar();
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

    tabla = $('#tbllistado').dataTable({
        "aProcessing": true, //Activamos el procesamiento del datatables
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/alumno.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 30, //Paginación
        "order": [
                [0, "desc"]
            ] //Ordenar (columna,orden)
    }).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);
        console.log(formData);
    $.ajax({
        url: "../ajax/alumno.php?op=guardaryeditar",
        type: "POST",
        beforeSend: function() {

        },
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(id_alm) {


    $.post("../ajax/alumno.php?op=mostrar", { id_alm: id_alm }, function(data, status) {

        data = JSON.parse(data);
       //alert(data.napais);
        mostrarform(true);

        var  dato = 29;
        //alert(data.naciudad);
      $.ajax({
        data: dato,
        url: 'ajax_ciudades.php',
        type: 'post',
        beforeSend: function() {

        },
        success: function(response) {

            $("#naciudad").html(response);
            $("#naciudad").chosen({ width: '100%' });
           // $("#naciudad").val(data.naciudad).trigger("chosen:updated");
        },
        error: function() {
            alert("error")
        }
    });
        console.log(data.id_alm);

        $("#id_alm").val(data.id_alm);
        $("#nombre").val(data.nombre);
        $("#apellido").val(data.apellido);
        $("#telefono").val(data.telefono);
        $("#celular").val(data.celular);
        $('#imagenmuestra').show();
        $("#imagenmuestra").attr("src","../files/alumnos/"+data.imagen);
        $('#imagenactual').val(data.imagen);
        $("#estado_civil").val(data.estado_civil);
        $("#email").val(data.email);
        $("#direccion").val(data.direccion);
        $("#fech_nac").val(data.fech_nac);
        $("#c_i").val(data.c_i);



          $("#napais").val(data.napais).trigger("chosen:updated");

         $.post("../ajax/alumno.php?op=naCiudad ", {id : data.napais}, function(r) {


        $("#naciudad").html(r);


        $("#naciudad").chosen({ width: '100%' });

        $("#naciudad").trigger("chosen:updated");
        $("#naciudad").val(data.naciudad).trigger("chosen:updated");


    });
            $.post("../ajax/alumno.php?op=naProvincia ", {id : data.naciudad}, function(r) {


        $("#naprovincia").html(r);


        $("#naprovincia").chosen({ width: '100%' });

        $("#naprovincia").trigger("chosen:updated");
        $("#naprovincia").val(data.naprovincia).trigger("chosen:updated");


    });

    $("#ciudad").val(data.ciudad).trigger("chosen:updated");
           $.post("../ajax/alumno.php?op=Provincia ", {id : data.ciudad}, function(r) {


        $("#provincia").html(r);


        $("#provincia").chosen({ width: '100%' });

        $("#provincia").trigger("chosen:updated");
        $("#provincia").val(data.provincia).trigger("chosen:updated");


    });
        $.post("../ajax/alumno.php?op=Distrito ", function(r) {


        $("#distrito").html(r);


        $("#distrito").chosen({ width: '100%' });

        //$("#distrito").trigger("chosen:updated");
        $("#distrito").val(data.distrito).trigger("chosen:updated");
        //alert(data.distrito);

    });

    })
    limpiar();
}

//Función para desactivar registros
function desactivar(id_alm) {
    bootbox.confirm("¿Está Seguro de desactivar el Alumno?", function(result) {
        if (result) {
            $.post("../ajax/alumno.php?op=desactivar", { id_alm: id_alm }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(id_alm) {
    bootbox.confirm("¿Está Seguro de activar el Alumno?", function(result) {
        if (result) {
            $.post("../ajax/alumno.php?op=activar", { id_alm: id_alm }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}
function kardex(id_alm) {


        document.location.href = "kardex.php?id_alm=" + id_alm ;
}
function printr(id_alm) {


  document.location.href = "../pdf/kardex1.php?id_alm=" + id_alm ;
}

init();
