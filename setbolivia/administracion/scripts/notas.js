var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();
    limpiar();

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })

    $.post("../ajax/notas.php?op=alumnos", function(r) {



        $("#id_alm").html(r);
        $("#id_alm").chosen({ width: '100%' });
        // $("#napais").val('4').trigger("chosen:updated");
        $("#id_alm").trigger("chosen:updated");



    });


    ///--------------------Aqui Lugar del Seminario

    $.post("../ajax/notas.php?op=materias", function(r) {



        $("#id_mat").html(r);
        $("#id_mat").chosen({ width: '100%' });
        // $("#napais").val('4').trigger("chosen:updated");
        $("#id_mat").trigger("chosen:updated");



    });
    $.post("../ajax/notas.php?op=docentes", function(r) {



        $("#docente").html(r);
        $("#docente").chosen({ width: '100%' });
        // $("#napais").val('4').trigger("chosen:updated");
        $("#docente").trigger("chosen:updated");



    });





    $("#nota").on("click", function() {


        var id_alm = $("#id_alm option:selected").val();
        var id_mat = $("#id_mat option:selected").val();
        var id_his = $("#id_his").val();

        if (!id_his) {


            $.post("../ajax/notas.php?op=verifica", { id_alm: id_alm, id_mat: id_mat }, function(r) {

                if (r > 0) {
                    $("#nota").val(r);
                    $("#btnGuardar").hide();
                    $("#not").text("nota existente").css({ 'color': 'red' });
                }
            });
        }


    });

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




}

//Función limpiar
function limpiar() {
    $("#id_his").val("");
    $("#id_alm").val("1").trigger("chosen:updated");;
    $("#id_mat").val("1").trigger("chosen:updated");;
    $("#nota").val("");
    $("#fecha").val("");
    $("#not").text("");
    $("#docente").val("1").trigger("chosen:updated");;


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
            url: '../ajax/notas.php?op=listar',
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
        url: "../ajax/notas.php?op=guardaryeditar",
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

function mostrar(id_his) {


    $.post("../ajax/notas.php?op=mostrar", { id_his: id_his }, function(data, status) {

        data = JSON.parse(data);
        // alert(data.napais);
        mostrarform(true);

        // var  dato = 29;
        //alert(data.naciudad);

        //console.log(data.id_alm);
        $("#id_his").val(data.id_his);
        $("#id_alm").val(data.id_alm).trigger("chosen:updated");
        $("#id_mat").val(data.id_mat).trigger("chosen:updated");
        $("#nota").val(data.nota);
        $("#fecha").val(data.fecha);
        $("#docente").val(data.docente).trigger("chosen:updated");





    });
}

//Función para desactivar registros
function desactivar(id_his) {
    bootbox.confirm("¿Está Seguro de desactivar la nota?", function(result) {
        if (result) {
            $.post("../ajax/notas.php?op=desactivar", { id_doc: id_doc }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(id_his) {
    bootbox.confirm("¿Está Seguro de activar la nota?", function(result) {
        if (result) {
            $.post("../ajax/notas.php?op=activar", { id_doc: id_doc }, function(e) {
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