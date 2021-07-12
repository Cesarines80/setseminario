<?php 
require_once("../conexio.php");
require_once("../class/class.php");

 if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new Ingresar();
$datos = $obj1->aper_notas_historial($_GET['id_mat'],$_GET['id_alm']);
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

	<?php include "menudocente.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p><a href="carrera.php">Salir</a></p>
            </div>
          </div>
</div>
<div class="col-md-10">
	<h1>Ingrese Nota</h1>

<h3>Rellene el dato </h3>

<form name="form" action="" class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="carrera">Nota</label>

    <input type="text" class="form-control" id="exampleInputEmail1" name="nota" placeholder="Nota">
  </div>
 
   <input type="hidden" name="grabar" value="si" />
  <button type="submit" class="btn btn-danger">Cancelar</button>        <button type="submit" class="btn btn-success">Guardar</button>
</form>

</div>

</div>
</div>
</body>
</html>