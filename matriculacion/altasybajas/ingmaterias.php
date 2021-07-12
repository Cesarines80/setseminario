<?php
include'../conexio.php';
require_once("../class/class.php");
$obj= new Consultas();
$datos = $obj->get_grado();
if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new Ingresar();
$datos1 = $obj1->post_grado();
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>

<link rel="stylesheet" type="text/css" href="css/estyl.css">
<script type="text/javascript" language="javascript" src="js/valida.js"></script>
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
              <p><a href="materia.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10"> 
<h2>Ingrese las Materias</h2>
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
              <label for="inputPassword" class="col-sm-2 control-label">Materia</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="materia" id="inputPassword" placeholder="Materia">
                <div id="materia"></div>
              </div>
            </div>
<div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Sigla</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="sigla" id="inputPassword" placeholder="Siglas">
                <div id="sigla"></div>
              </div>
            </div>
<div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Creditos</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="creditos" id="inputPassword" placeholder="Siglas">
                <div id="creditos"></div>
              </div>
            </div>
<div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Grado</label>
              <div class="col-sm-10">
               <select name="grado"  class="form-control">
                  <option value="0">Seleccione Grado...</option>
                <?php
                  for($i=0;$i<sizeof($datos);$i++)
                {
                  ?>
                  <option value="<?php echo $datos[$i]["id_grado"]?>"><?php echo $datos[$i]["nivel"]?></option>
                  <?php
                  
                  }
              
                 ?>
                </select>
                <div id="grado"></div>
              </div>
            </div>

  <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Activo</label>
              <div class="col-sm-10">
               <select name="activo" class="form-control">
                <option value="0">0</option>
                <option value="1">1</option>
                </select>
                <div id="activo"></div>
              </div>
            </div>

  <div class="form-group">
            <hr>
              <div class="col-sm-5"></div>
              <div class="col-sm-7">

                <input type="hidden" name="grabar" value="si" />
               <input type="button"  name="boton3" class="btn btn-warning" id="boton3" value="Cancelar" onClick="history.back();" /> 

              <input type="button" name="Enviar" value="Enviar" class="btn btn-success" onClick="valida_materia();">
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