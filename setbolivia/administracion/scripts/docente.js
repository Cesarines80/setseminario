var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })

    $.post("../ajax/docente.php?op=categoria", function(r) {



        $("#especialidad").html(r);
        $("#especialidad").chosen({ width: '100%' });
        // $("#napais").val('4').trigger("chosen:updated");
        $("#especialidad").trigger("chosen:updated");



    });


    ///--------------------Aqui Lugar del Seminario

    $.post("../ajax/docente.php?op=selectCiudad", function(r) {



        $("#departamento").html(r);
        $("#departamento").chosen({ width: '100%' });
        // $("#napais").val('4').trigger("chosen:updated");
        $("#departamento").trigger("chosen:updated");



    });
    $("#departamento").change(function() {
        var parametros = "id=" + $("#departamento").val();
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
    $("#nombre").val("");
    $("#apellido").val("");
    $("#telefono").val("");
    $("#celular").val("");
    $("#imagen").val("");

    $("#email").val("");

    $("#fech_nac").val("");
    $("#departamento").val("");

    $("#ci").val("");
    $("#sexo").val("");

    $("#provincia").val("");
    $("#distrito").val("");


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
            url: '../ajax/docente.php?op=listar',
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
        url: "../ajax/docente.php?op=guardaryeditar",
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

function mostrar(id_doc) {


    $.post("../ajax/docente.php?op=mostrar", { id_doc: id_doc }, function(data, status) {

        data = JSON.parse(data);
        // alert(data.napais);
        mostrarform(true);

        // var  dato = 29;
        //alert(data.naciudad);

        //console.log(data.id_alm);

        $("#id_doc").val(data.id_doc);
        $("#nombre").val(data.nombre);
        $("#apellido").val(data.apellido);
        $("#telefono").val(data.telefono);
        $("#celular").val(data.celular);
        $('#imagenmuestra').show();
        $("#imagenmuestra").attr("src", "../files/docentes/" + data.imagen);
        $('#imagenactual').val(data.imagen);
        $("#fech_nac").val(data.fech_nac);
        $("#sexo").val(data.sexo);
        $("#ci").val(data.ci);
        $("#especialidad").val(data.especialidad).trigger("chosen:updated");
        $("#email").val(data.email);


        $("#departamento").val(data.departamento).trigger("chosen:updated");
        $.post("../ajax/docente.php?op=Provincia ", { id: data.departamento }, function(r) {


            $("#provincia").html(r);


            $("#provincia").chosen({ width: '100%' });

            $("#provincia").trigger("chosen:updated");
            $("#provincia").val(data.provincia).trigger("chosen:updated");


        });

        $.post("../ajax/docente.php?op=Distrito ", function(r) {


            $("#distrito").html(r);


            $("#distrito").chosen({ width: '100%' });

            //$("#distrito").trigger("chosen:updated");
            $("#distrito").val(data.distrito).trigger("chosen:updated");
            //alert(data.distrito);

        });

    })
}

//Función para desactivar registros
function desactivar(id_doc) {
    bootbox.confirm("¿Está Seguro de desactivar el Docente?", function(result) {
        if (result) {
            $.post("../ajax/docente.php?op=desactivar", { id_doc: id_doc }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(id_doc) {
    bootbox.confirm("¿Está Seguro de activar el Docente?", function(result) {
        if (result) {
            $.post("../ajax/docente.php?op=activar", { id_doc: id_doc }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function kardex(id_alm) {


    document.location.href = "kardex.php?id_alm=" + id_alm;
}

function printr(id_alm) {


    document.location.href = "../pdf/kardex1.php?id_alm=" + id_alm;
}

init();
