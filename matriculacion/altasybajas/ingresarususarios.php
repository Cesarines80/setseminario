<?php 
require_once('../conexio.php');
require_once('../class/class.php');
if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new Ingresar();
$datos1 = $obj1->post_usuarios();
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
              <p><a href="usuarios.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10">
	<h1>ALTA DE USUARIOS</h1>

<h3>Rellene los datos y de click en guardar</h3>

<form name="form" action="" method="post">
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre" placeholder="Nombre">
  </div>
  <div class="form-group">
  	<label for="apellido">Apellido</label>
  	<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
  </div>
  <div class="form-group">
    <label for="apellido">Login</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Login">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <input type="hidden"  name="grabar" value="si" />
  </div>
  <div class="form-group">
    <label for="direccion">Telefono</label>
    <input type="text" class="form-control" name="telefono" placeholder="Telefono">
  </div>
  <div class="form-group">
  	<label for="direccion">Direccion</label>
  	<input type="text" class="form-control" name="direccion" placeholder="Direccion">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
              <label for="inputPassword" >Departamento</label>
              
                <?php

                    $sql="SELECT * FROM ciudades";
                    $res=mysql_query($sql,$conexio);
                    ?>

                    <select name="ciudad2" class="form-control" >
                    <option value="0">Seleccione la ciudad</option>

                    <?php
                    while ($reg=mysql_fetch_array($res))
                    {
                    ?>
                    <option value="<?php echo $reg["id"];?>" ><?php echo $reg["nombre"];?></option>
                    <?php
                    }
                    ?>

                    </select>
             
              
            </div>
  
  
  
  
  <button type="submit" class="btn btn-danger">Cancelar</button>        <button type="submit" class="btn btn-success">Guardar</button>
</form>

</div>

</div>
</div>
</body>
</html>