$(document).ready(function(e){
  $("#napais").change(function(){
    var parametros= "id="+$("#napais").val();

    $.ajax({
             data:  parametros,
             url:   'ajax_ciudades.php',
             type:  'post',
             beforeSend: function () {

             },
             success:  function (response) {
                 $("#naciudad").html(response);
             },
             error:function(){
               alert("error")
             }
         });
  })

  $("#naciudad").change(function(){
    var parametros= "id="+$("#naciudad").val();
    $.ajax({
             data:  parametros,
             url:   'ajax_provincias.php',
             type:  'post',
             beforeSend: function () {

             },
             success:  function (response) {
                 $("#naprovincia").html(response);
             },
             error:function(){
               alert("error")
             }
         });
  })
 })
