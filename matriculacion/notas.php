<?php
require_once('session.php');
include'conexio.php';
require_once("class/class.php");


$obj= new Consultas();
$usu = $obj->get_usuario($_SESSION['ides']);
 $d= $usu[0]['ciudad']; 
$datos = $obj->get_alumnociudad($d);


if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new Ingresar();
$datos1 = $obj1->aper_notas_historial_in($id=$_POST['materia'],$id=$_POST['alumno']);
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>

<title>Ingrese Notas</title>
<link rel="stylesheet" type="text/css" href="css/estyl.css">
<script type="text/javascript" language="javascript" src="js/valida.js"></script>
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript">
$(document).ready(function(){
   $("#alumno").change(function () {
           $("#alumno option:selected").each(function () {
            elegido=$(this).val();
            $.post("materiaselect.php", { elegido: elegido }, function(data){
            $("#modelo").html(data);
            });            
        });
   })
});
</script>
</head>

<body >
<?php 

      include "menuadmi.php";
   ?>

<div class="container">

<div id="row">
<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p><a href="admin.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10">
<h2>Ingrese Notas del Semestre</h2>
<form name="form" action="" class="form-horizontal" method="post" enctype="multipart/form-data">
  
     <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Alumno</label>
              <div class="col-sm-10">
                <select name="alumno" id="alumno" class="form-control" >
                  <option value="0">Seleccione Alumno...</option>
                <?php
                  for($i=0;$i<sizeof($datos);$i++)
                {
                  ?>
                  <option value="<?php echo $datos[$i]["id_alm"]?>"><?php echo $datos[$i]["nombre"]; echo " ";echo $datos[$i]["apellido"];?></option>
                  <?php
                  
                  }
              
                 ?>
                </select>
                <div id="alumno"></div>
              </div>
            </div>
   <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Materia</label>
              <div class="col-sm-10" id="modelo">
                <select name="materia" id="materia"  class="form-control">
                
                 </select>
              </div>
            </div>
 
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Nota</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nota" id="nota" placeholder="Nota">
                <div id="nota"></div>
              </div>
            </div>

 
<div class="form-group">
            <hr>
              <div class="col-sm-5"></div>
              <div class="col-sm-7">

                <input type="hidden" name="grabar" value="si" />
                <input type="button" class="btn btn-warning"  name="boton3" id="boton3" value="Cancelar" onClick="history.back();" />

               <input id="boton" type="submit" class="btn btn-success" name="Registrarr" value="Registrar" title="Registrar" >
               <input id="boton_2" type="button" value="Verificar" class="btn btn-danger" title="No puede Registrar" style="display:none" />
                </div>
              </div>
    

</form>
</div>
<br>
</div>
<div id="footer"><?php require_once("footer.php"); ?></div>
</div>

</body>
</html>