<?php
include'../conexio.php';
require_once('../class/class.php');
$obj = new Consultas();
$datos = $obj->get_alumno2($_GET['id_alm']);

if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new actualizar();
$datos1 = $obj1->editaralumno($_GET['id_alm']);
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>


<title>Sistema de Matriculacion</title>
<link rel="stylesheet" type="text/css" href="select_dependientes_3_niveles.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" type="text/css" href="css/estyl.css">
<script language="javascript" type="text/javascript" src="../js/funciones.js"></script>
<script language="javascript" type="text/javascript" src="../js/valida.js"></script>
</head>

<body  onLoad="limpiar2()"  >
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
              <p><a href="alumnos.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10">
  

<div class="row">
  
  
      <legend class="text-center">Ingresar Alumno</legend>
      <form name="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">


        


          <!--  desde aqui -->

          <div class="row">
            
  
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_nombre" id="inputPassword" placeholder="Nombre" value="<?php echo $datos[0]['nombre']; ?>">
                <div id="div_nom"></div>
              </div>
            </div>
             <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Apellido</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_apellido" id="inputPassword" placeholder="Apellido" value="<?php echo $datos[0]['apellido']; ?>">
                <div id="div_apell"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Telefono</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_telefono" id="inputPassword" placeholder="Telefono" onKeyPress="return acceptNum(event)" value="<?php echo $datos[0]['telefono']; ?>">
                <div id="div_tel"></div>
              </div>
            </div>
             <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Celular</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_celular" id="inputPassword" placeholder="Celular" onKeyPress="return acceptNum(event)" value="<?php echo $datos[0]['celular']; ?>">
                <div id="div_cel"></div>
              </div>
            </div>

            
            
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Correo</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputPassword" placeholder="Email"  value="<?php echo $datos[0]['email']; ?>">
                <div id="div_correo"></div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Direccion</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_direccion" id="txt_direccion" placeholder="Direccion"  value="<?php echo $datos[0]['direccion']; ?>">
                <div id="div_dir"></div>
              </div>
            </div>

             

             <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">C.I.</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="txt_ci" id="txt_direccion" placeholder="C.I."  onBlur="from1(document.form.txt_ci.value,'div_ci','verifica.php')" onKeyPress="return acceptNum(event)" value="<?php echo $datos[0]['c_i']; ?>" maxlength="8">
                <div id="div_ci"></div>
              </div>
            </div>

           
            
            
          
            <div class="form-group">
            <hr>
              <div class="col-sm-5"></div>
              <div class="col-sm-7">
              <input type="hidden"  name="grabar" value="si" />
                <input type="button"  name="boton3" class="btn btn-danger" id="boton3" value="Cancelar" onClick="history.back();" />
                <input id="boton" class="btn btn-primary" type="submit" value="Actualizar " title="Ingresar"  />
                <input id="boton_2" type="button" class="btn btn-block" value="No se puede Ingresar" title="No se puede Ingresar" 
                style="display:none" />

               
                </div>
              </div>
    



            </div> 

             </form>
          </div>
          </div>

           <div class="row"> <div class="footer" > <?php require_once("footer.php"); ?> </div> </div>
        
</div>
</div>

</body>

</html>
