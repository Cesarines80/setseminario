<?php
include'conexio.php';
require_once("class/class.php");

$obj= new Consultas();
$datos = $obj->get_grado();
$datosi = $obj->get_ciudades();
$de = $_SESSION['ides'];
$dt = new Consultas();
$usua = $dt->get_usuario($de);
$datos3=$dt->get_docente($usua[0]['ciudad']);
$datos4=$dt->get_trimestre($usua[0]['ciudad']);
 
if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new Ingresar();
$datos1 = $obj1->post_apermateria();
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>

<link rel="stylesheet" type="text/css" href="css/estyl.css">
<script type="text/javascript" language="javascript" src="js/valida.js"></script>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></link>
  <SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript">
$(document).ready(function(){
   $("#grado").change(function () {
           $("#grado option:selected").each(function () {
            elegido=$(this).val();
            $.post("materiasselect.php", { elegido: elegido }, function(data){
            $("#modelo").html(data);
            });            
        });
   })
});
</script>
</head>

<body >
<?php include "menuadmi.php"; ?>
<div class="container">

<div class="row">


<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p><a href="materiasemestre.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10"> 
<h2>Aperturar Materia</h2>
<form name="form" action="" class="form-horizontal" method="post" enctype="multipart/form-data">
<?php
if(isset($_GET["m"]))
{
switch ( $_GET["m"])
{
  case '1':
    ?>
      <h3 style="color:#006633">Materia ingresado Exitosamente</h3>
      <?php
   break;
   case '2':
   ?>
      <h3 style="color:#F00">La Materia ingresado ya existe en la base de datos</h3>
      <?php
    break;
  }
}
?>


<div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Grado</label>
              <div class="col-sm-10">
               <select name="grado" id="grado"  class="form-control" required>
               <option value="" disabled selected hidden>Selecione Grado...</option>
                <?php
                  for($i=0;$i<sizeof($datos);$i++)
                {
                  ?>
                  <option  value="<?php echo $datos[$i]["id_grado"]?>"><?php echo $datos[$i]["nivel"]?></option>
                  <?php
                  
                  }
              
                 ?>
                </select>
                <div id="grado"></div>
                <input type="hidden" name="ciudad" value="<?php echo $usua[0]['ciudad']; ?>">
              </div>
            </div>
<div class="form-group" >
           
              <label for="inputPassword" class="col-sm-2 control-label">Materia</label> 
              <div class="col-sm-10"id="modelo"></div>
              <div class="col-sm-10" >
               
                <div id="materia"></div>
              </div>
            </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Docente</label>
              <div class="col-sm-10">
                <select name="docente" class="form-control"  required>
                <option value="" disabled selected hidden>Seleccione Docente...</option>
                <?php
                  for($i=0;$i<sizeof($datos3);$i++)

                {
                  ?>
                  <option value="<?php echo $datos3[$i]["id_doc"]?>"><?php echo $datos3[$i]["nombre"]; echo "  ";echo $datos3[$i]["apellido"];?></option>
                  <?php
                  
                  }
              
              ?>
                </select>
                <div id="docente"></div>
              </div>
 </div>

 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Fecha de Inicio</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="theDate" required>
                <div id="fechi"></div>
              </div>
 </div>

 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Trimestre</label>
              <div class="col-sm-10">
                <select name="trimestre" class="form-control" required >
                <option value="" disabled selected hidden>Seleccione Trimestre...</option>
                <?php
                  for($k=0;$k<sizeof($datos4);$k++)

                {
                  ?>
                  <option value="<?php echo $datos4[$k]["id"]?>"><?php echo $datos4[$k]["semestre"];?></option>
                  <?php
                  
                  }
              
              ?>
                </select>
                <div id="docente"></div>
              </div>
 </div>
  

  <div class="form-group">
            <hr>
              <div class="col-sm-5"></div>
              <div class="col-sm-7">

                <input type="hidden" name="grabar" value="si" />
               <input type="button"  name="boton3" class="btn btn-warning" id="boton3" value="Cancelar" onClick="history.back();" /> 

              <input type="submit" name="Enviar" value="Enviar" class="btn btn-success" >
                </div>
              </div>
    


</form>

<br>
</div>
</div>
<div id="footer"><?php require_once("footer.php"); ?></div>
</div>

</body>
</html>