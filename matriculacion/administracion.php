<?php 
require_once('session.php');
$dat=new Consultas();
$datos = $dat->get_usuario($_SESSION['ides']);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>

    
  </head>

  <body>
 
  <nav class="navbar navbar-fixed-top navbar-inverse ">
    <h3 align="center" class="fon" >SISTEMA DE INFORMACION SEMINARIO</h3>
  </nav>

   <?php  include "menuadministracion.php"; ?>
    <div class="container " >
    <div class="row">
        <h5>Usuario: <?php echo $datos[0]["nombre"].' '; echo $datos[0]["apellido"];  ?></h5>
      </div>

      <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-9 ">
          <img align="center"  src="images/dX3FYQjx.jpg" height="650" width="650" alt="">
        </div>
      </div>
      

    </div> <!-- /container -->


    
    <?php include "footer.php" ?>
  </body>
</html>