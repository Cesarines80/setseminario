<?php
include "../session.php";
require_once("../class/class.php");
$d = $_SESSION['ide'];
//var_dump($d);
//exit;
$datos = new Consultas();
$ides=$datos->get_alumno2($d);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>
<link rel="icon" href="../images/cogoplogo.ico" type="image/x-icon">
    
  </head>

  <body>
 
  <nav class="navbar navbar-fixed-top navbar-inverse ">
    <h3 align="center" class="fon" >SISTEMA DE INFORMACION SEMINARIO</h3>
  </nav>

    <nav class="navbar navbar-inverse  nav-shadow">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand " href="adminalumno.php">PAGINA PRINCIPAL</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            <?php $ide=$_SESSION['ide']; ?>
             
              <li class="active" ><a href="semestre.php">MATERIAS SEM.</a></li>
              <li class="active" ><a href="notas.php?alumno=<?php echo $ide; ?>">KARDEX</a></li>
              
                <li class="active" ><a href="../cerrar_sesion.php">CERRAR SESION</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container " >
<h2 align="center">Administracion de Alumno </h2>
      
<?php echo "Bienvenido:".$ides[0]['nombre']." ".$ides[0]['apellido']; ?>
    </div> <!-- /container -->


    
    <?php include "footer.php" ?>
  </body>
</html>