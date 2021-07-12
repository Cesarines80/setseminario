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
              <p><a href="materia.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10">
	<h1>ALTA DE MATERIA</h1>

<h3>Rellene los datos y de click en crear</h3>

<form>
<div class="form-group">
    <label for="materia">Materia</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="materia" placeholder="Nombre">
  </div>
  <div class="form-group">
  	<label for="carrera">Carrera</label>
  	<input type="text" class="form-control" id="carrera" name="carrera" placeholder="Apellido">
  </div>
  <div class="form-group">
  	<label for="credito">Credito</label>
  	<input type="text" class="form-control" name="credito" placeholder="credito">
  </div>
  <div class="form-group">
    <label for="clave">Clave</label>
    <input type="text" class="form-control" id="clave" placeholder="Email">
  </div>
  
  
  
  <button type="submit" class="btn btn-danger">Cancelar</button>        <button type="submit" class="btn btn-success">Guardar</button>
</form>

</div>

</div>
</div>
</body>
</html>