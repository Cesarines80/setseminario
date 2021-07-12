<!DOCTYPE html>
<html lang="en">
<head>
<?php
	include "headers.php"; 

 ?>	
</head>
<body>

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
              <p><a href="docente.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10">
	<h1>ALTA DE DOCENTE</h1>

<h3>Rellene los datos y de click en crear</h3>

<form>
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre" placeholder="Nombre">
  </div>
  <div class="form-group">
  	<label for="apellido">Apellido</label>
  	<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
  </div>
  <div class="form-group">
  	<label for="direccion">Direccion</label>
  	<input type="text" class="form-control" name="direccion" placeholder="Direccion">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  
  <button type="submit" class="btn btn-danger">Cancelar</button>        <button type="submit" class="btn btn-success">Guardar</button>
</form>

</div>

</div>
</div>
</body>
</html>