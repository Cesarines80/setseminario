<?php 
require_once('../conexio.php');
require_once('../class/class.php');

//print_r($_GET); exit;
$obj = new Consultas();
$datos = $obj->get_grado1($_GET['id_grado']);
if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new actualizar();
$datos1 = $obj1->editarcarrera($_GET['id_grado']);
  exit;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
	include "headers.php"; 


 ?>	
</head>
<body>

	<?php include "menuadmi.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p><a href="carrera.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10">
	<h1>ALTA DE CARRERA</h1>

<h3>Rellene los datos y de click en crear</h3>

<form method="post" action="" name="form">
<div class="form-group">
    <label for="carrera">Carrera</label>
    <input type="hidden" name="grabar" value="si" />
    <input type="text" class="form-control" id="exampleInputEmail1" name="carrera" placeholder="Nombre" value="<?php echo $datos[0]['nivel'];?>">
  </div>
 
  
  <button type="submit" class="btn btn-danger">Cancelar</button>        <button type="submit" class="btn btn-success">Guardar</button>
</form>

</div>

</div>
</div>
</body>
</html>