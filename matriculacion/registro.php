<?php
require_once('session.php');
include'conexio.php';
require_once("class/class.php");
$obj= new Consultas();
$usu = $obj->get_usuario($_SESSION['ides']);

$datos = $obj->get_alumnociudad($usu[0]['ciudad']);

$datos2= $obj->get_materiaactivas($usu[0]['ciudad']);



$datos3=$obj->get_docente($usu[0]['ciudad']);


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
 

  <link rel="stylesheet" href="docsupport/prism.css">
  <link rel="stylesheet" href="docsupport/chosen.css">



</head>

<body onLoad="limpiar();">
<?php 

      include "menuadmi.php";
   ?>

<div class="container">

<div class="row">
<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p><a href="alumnosemestre.php">Salir</a></p>
            </div>
          </div>
</div>
<div class="col-md-10">


<form name="form" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<h2>Registro de Alumnos</h2>
<hr>
<div class="form-group">
              
              <label for="inputPassword" class="col-sm-2 control-label">Alumno</label>
              <div class="col-sm-10">
                
                   <select  name="alumno" data-placeholder="Choose a Country..." 
          class="chosen-select form-control" tabindex="2" required >
          <option value="" disabled selected hidden>Selecione Alumno...</option>
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
                <select name="materia[]"  class="chosen-select form-control" multiple tabindex="4">
                  <option value="0">Seleccione Materia...</option>
                <?php

                  for($i=0;$i<sizeof($datos2);$i++)

                {
                  $d=$datos2[$i]['id_materia']; 

                   $sql1="select * from materias where id_mat=$d";
                    $result1 = mysql_query($sql1, $conexio);
                    $row=mysql_fetch_array($result1);
                    //echo $row['descripcion']; exit;
                  ?>
                  <option value="<?php echo $row["id_mat"]?>"><?php echo $row["descripcion"]?></option>
                  <?php
                  
                  }
              
              ?>
                </select>
                <div id="materia"></div>
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
                  <input id="boton" type="submit" class="btn btn-success" name="Registrarr" value="Registrar" title="Registrar" >

               <input id="boton_2" type="button" value="Verificar" class="btn btn-danger" title="No puede Registrar" style="display:none" />
               <input name="alm" type="button"  class="btn btn-primary" onClick="javascript:window.location.href='altasybajas/ingalumnos.php'" value="Registrar Nuevos">
                </div>
              </div>


<script src="docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="docsupport/chosen.jquery.js" type="text/javascript"></script>
  <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="docsupport/init.js" type="text/javascript" charset="utf-8"></script>

</form>
<br>
</div>
</div>
<div id="footer"><?php require_once("footer.php"); ?></div>
</div>

</body>
</html>