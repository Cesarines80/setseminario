$(document).ready(function(e){
  $("#ciudad").change(function(){
    var parametros= "id="+$("#ciudad").val();

    $.ajax({
             data:  parametros,
             url:   'ajax_provincias1.php',
             type:  'post',
             beforeSend: function () {

             },
             success:  function (response) {
                 $("#provincia").html(response);
             },
             error:function(){
               alert("error")
             }
         });
  })

  $("#provincia").change(function(){
    var parametros= "id="+$("#provincia").val();
    $.ajax({
             data:  parametros,
             url:   'ajax_distrito.php',
             type:  'post',
             beforeSend: function () {

             },
             success:  function (response) {
                 $("#distrito").html(response);
             },
             error:function(){
               alert("error")
             }
         });
  })
 })
