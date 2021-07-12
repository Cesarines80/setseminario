var tabla;

//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();
    limpiar();

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    })
    $.post("../ajax/materia.php?op=grado", function(r) {



        $("#grado").html(r);


        $("#grado").chosen({ width: '100%' });
        //$("#napais").val('4').trigger("chosen:updated");
        $("#grado").trigger("chosen:updated");



    });
    $.post("../ajax/materia.php?op=docente", function(r) {



        $("#id_doce").html(r);


        $("#id_doce").chosen({ width: '100%' });
        //$("#napais").val('4').trigger("chosen:updated");
        $("#id_doce").trigger("chosen:updated");



    });
    $.post("../ajax/materia.php?op=semestre", function(r) {



        $("#semestre").html(r);


        $("#semestre").chosen({ width: '100%' });
        //$("#napais").val('4').trigger("chosen:updated");
        $("#semestre").trigger("chosen:updated");



    });
    $("#grado").change(function() {
        var id_grado = $("#grado option:selected").val();
        //alert(id_grado);
        $.post("../ajax/materia.php?op=materias ", { id_grado: id_grado }, function(r) {


            $("#id_materia").html(r);


            $("#id_materia").chosen({ width: '100%' });

            $("#id_materia").trigger("chosen:updated");



        });
    })









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
            url: '../ajax/materia.php?op=listar',
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
        url: "../ajax/materia.php?op=guardaryeditar",
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

function mostrar(id_aper) {

    //alert(id_aper);

    $.post("../ajax/materia.php?op=mostrar", { id_aper: id_aper }, function(data, status) {

        data = JSON.parse(data);
        //alert(data);
        mostrarform(true);

        // var  dato = 29;
        //alert(data.naciudad);

        //console.log(data.id_alm);
        $("#id_aper").val(data.id_aper);
        $("#grado").val(data.grado).trigger("chosen:updated");
        $.post("../ajax/materia.php?op=materias ", { id_grado: data.grado }, function(r) {


            $("#id_materia").html(r);


            $("#id_materia").chosen({ width: '100%' });

            $("#id_materia").trigger("chosen:updated");
            $("#id_materia").val(data.id_materia).trigger("chosen:updated");


        });
        //$("#id_materia").val(data.id_materia).trigger("chosen:updated");
        $("#id_doce").val(data.id_doce).trigger("chosen:updated");
        $("#fecha").val(data.fecha);
        $("#semestre").val(data.semestre).trigger("chosen:updated");






    });
}

//Función para desactivar registros
function desactivar(id_aper) {
    bootbox.confirm("¿Está Seguro de desactivar el Trimestre?", function(result) {
        if (result) {
            $.post("../ajax/materia.php?op=desactivar", { id_aper: id_aper }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(id_aper) {
    bootbox.confirm("¿Está Seguro de activar el Trimestre?", function(result) {
        if (result) {
            $.post("../ajax/materia.php?op=activar", { id_aper: id_aper }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}


init();