<?php
include'../conexio.php';
require_once("../class/class.php");

$obj= new Consultas();
$dat =$obj->get_docentebus($_GET['id_doc']);



if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new actualizar();
$datos1 = $obj1->editardocente();
  exit;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include "headers.php" ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ingreso de Docentes</title>
<link rel="stylesheet" type="text/css" href="../css/estyl.css">
<script type="text/javascript" language="javascript" src="../js/valida.js"></script>
<link rel="stylesheet" type="text/css" href="select_dependientes_3_niveles.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" type="text/css" href="css/estyl.css">
<script language="javascript" type="text/javascript" src="../js/funciones.js"></script>

</head>

<body onLoad="limpiar();">
<?php 

      include "menuadmi.php";
   ?>
<div class="container" >
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
<div class="col-md-10"> <!--desde aqui-->


<form name="form" action="" class="form-horizontal" method="post" enctype="multipart/form-data">
<h2>Editar Docentes</h2>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre" id="inputPassword" placeholder="Nombre" value="<?php echo $dat[0]['nombre'];?>">
                <div id="nombre"></div>
              </div>
 </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Apellido</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="apellido" id="inputPassword" placeholder="Apellido" value="<?php echo $dat[0]['apellido'];?>">
                <div id="apellido"></div>
              </div>
 </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Telefono</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="telefono" id="inputPassword" placeholder="Telefono" value="<?php echo $dat[0]['telefono'];?>">
                <div id="telefono"></div>
              </div>
 </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Celular</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="celular" id="inputPassword" placeholder="Celular" value="<?php echo $dat[0]['celular'];?>">
                <div id="celular"></div>
              </div>
 </div>



 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">C.I.</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ci" id="inputPassword" placeholder="C.I." value="<?php echo $dat[0]['ci'];?>" onBlur="from_1(document.form.ci.value,'ci','../doc.php')">
                <div id="ci"></div>
              </div>
 </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">E-Mail</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id="inputPassword" placeholder="Email" value="<?php echo $dat[0]['email'];?>" >
                <div id="email"></div>
              </div>
 </div>
 
  

 <div class="form-group">
            <hr>
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
              
                <input type="hidden"  name="grabar" value="si" />
                <input type="button" class="btn btn-warning" name="boton3" id="boton3" value="Cancelar" onClick="history.back();" />
               
                </div>
                <div class="col-sm-3">
                  <input id="boton" type="submit" class="btn btn-success" name="Registrarr" value="Actualizar" title="Actualizar" >

               <input id="boton_2" type="button" class="btn btn-danger" value="Verificar" title="No puede Registrar" style="display:none" />
                </div>
              </div>
    





</form>
<br>
</div> <!---Hasta-->
</div>
<div id="footer"><?php require_once("footer.php"); ?></div>
</div>
</body>
</html>

