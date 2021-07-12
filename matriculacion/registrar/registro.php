<?php
include'../conexio.php';
require_once("class/class.php");
$obj= new Consultas();
$datos = $obj->get_alumno();
$datos2= $obj->get_materia();
$datos3=$obj->get_docente();
$datos4=$obj->get_grupos();
if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new Ingresar();
$datos1 = $obj1->post_registro();
  exit;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include "headers.php" ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Registro de Materias</title>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>

<link rel="stylesheet" type="text/css" href="css/estyl.css">
<script type="text/javascript" language="javascript" src="js/valida.js"></script>
</head>

<body onLoad="limpiar();">
<?php 

      include "./menuadmin/menuadmi.php";
   ?>

<div class="container">

<div class="row">
<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p><a href="docente.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10">


<form name="form" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<h2>Registro de Materias</h2>
<hr>
<div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Alumno</label>
              <div class="col-sm-10">
                <select name="alumno" class="form-control" >
                  <option value="0">Seleccione alumno...</option>
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
              <div class="col-sm-10">
                <select name="materia" class="form-control">
                  <option value="0">Seleccione Grado...</option>
                <?php
                  for($i=0;$i<sizeof($datos2);$i++)
                {
                  ?>
                  <option value="<?php echo $datos2[$i]["id_mat"]?>"><?php echo $datos2[$i]["descripcion"]?></option>
                  <?php
                  
                  }
              
              ?>
                </select>
                <div id="materia"></div>
              </div>
 </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Fecha de Inicio</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="2012/07/18" readonly name="theDate"><input type="button" value="Cal" onclick="displayCalendar(document.forms[0].theDate,'yyyy/mm/dd',this)">
                <div id="fechi"></div>
              </div>
 </div>

 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Docente</label>
              <div class="col-sm-10">
                <select name="docente" class="form-control" >
                  <option value="0">Seleccione Docente...</option>
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
              <label for="inputPassword" class="col-sm-2 control-label">Grupo</label>
              <div class="col-sm-10">
                <select name="grupo"  class="form-control">
                  <option value="0">Seleccione Grupo...</option>
                <?php
                  for($i=0;$i<sizeof($datos4);$i++)
                {
                  ?>
                  <option value="<?php echo $datos4[$i]["id_grupo"]?>"><?php echo $datos4[$i]["nombre"]; ?> </option>
                  <?php
                  
                  }
              
              ?>
                </select>
                <div id="grupo"></div>
              </div>
 </div>
 <div class="form-group">
            <hr>
              <div class="col-sm-3"></div>
              <div class="col-sm-4">
              
               <input type="hidden" name="grabar" value="si" />
                <input type="button" class="btn btn-warning"  name="boton3" id="boton3" value="Cancelar" onClick="history.back();" />
                </div>
                <div class="col-sm-5">
                  <input id="boton" type="button" class="btn btn-success" name="Registrarr" value="Registrar" title="Registrar" onClick="valida_registro();">

               <input id="boton_2" type="button" value="Verificar" class="btn btn-danger" title="No puede Registrar" style="display:none" />
               <input name="alm" type="button"  class="btn btn-primary" onClick="javascript:window.location.href='ingalumnos.php'" value="Registrar Nuevos">
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