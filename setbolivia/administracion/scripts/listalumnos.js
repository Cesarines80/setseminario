var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();
    limpiar();

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })



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





}

//Función limpiar
function limpiar() {
    $("#id").val("");
    $("#semestre").val("");
    $("#fechainicio").val("");
    $("#fechafinal").val("");

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
            url: '../ajax/listalumnos.php?op=listar',
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
        url: "../ajax/semestre.php?op=guardaryeditar",
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

function mostrar(id) {


    $.post("../ajax/semestre.php?op=mostrar", { id: id }, function(data, status) {

        data = JSON.parse(data);
        // alert(data.napais);
        mostrarform(true);

        // var  dato = 29;
        //alert(data.naciudad);

        //console.log(data.id_alm);
        $("#id").val(data.id);
        $("#semestre").val(data.semestre);
        $("#fechainicio").val(data.fechainicio);
        $("#fechafinal").val(data.fechafinal);






    });
}

//Función para desactivar registros
function desactivar(id) {
    bootbox.confirm("¿Está Seguro de desactivar el Trimestre?", function(result) {
        if (result) {
            $.post("../ajax/semestre.php?op=desactivar", { id: id }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(id) {
    bootbox.confirm("¿Está Seguro de activar el Trimestre?", function(result) {
        if (result) {
            $.post("../ajax/semestre.php?op=activar", { id: id }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}


init();