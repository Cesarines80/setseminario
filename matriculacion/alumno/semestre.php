<?php
include "../session.php";
include'../conexio.php';
require_once("../class/class.php");
$obj = new Consultas();

$datos2=$obj->get_alumno1();
$d = $_SESSION['ide'];
//var_dump($d);
//exit;
$datos = new Consultas();
$ides=$datos->get_alumno2($d);

$d = $_SESSION['ide'];
$semestre = $obj->get_registrover($d);



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>
<link rel="stylesheet" href="../css/estyl.css" type="text/css" />
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
             
              <li class="active" ><a href="semestre.php ?>">MATERIAS SEM.</a></li>
              <li class="active" ><a href="notas.php?alumno=<?php echo $ide;?>">KARDEX</a></li>
              
                <li class="active" ><a href="../cerrar_sesion.php">CERRAR SESION</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


   <div class="container">

<div class="row">

<div class="row">
<div class="col-md-12">
  <span class="label label-default">Nombre Completo:</span><strong> <?php echo $ides[0]["nombre"]; echo " "; echo $ides[0]["apellido"];  ?> </strong>
  
</div>
</div>
<div class="row">
<div class="col-md-12">
  <span class="label label-default">Iglesia:</span><strong> <?php echo $ides2[0]["miembro"]; ?>  </strong>
  
</div>
</div>
<div class="row">
<div class="col-md-12">
  <span class="label label-default">DISTRITO:</span><strong> <?php echo $ides[0]["distrito"];  ?>  </strong>
  
</div>
</div>
<h3 align="center">MATERIAS SEMESTRE ACTUAL</h3>

<br>

 <table border="0" class="table table-bordered table-hover ">

        <thead ><tr>

          <th >N.</th>

          <th>Materia</th>
          <th>Docente</th>
         

        

          

          
          

         

          <th>Bibliografia</th>

        </tr></thead>

        

          <tbody>

<?php 
$i=1;
$j=0;
foreach($semestre as $valor){
  
$obj2 = new Consultas();

$datosi = $obj2->get_materiaingactiva($valor['id_mat']);
//$datoss = $obj2->get_grado1($datosi[0]['id_grado']);
$docente = $obj2->get_docentebus($valor['id_doc']);
  
 ?>
          <tr>

            <td><?php echo $i; ?></td>

            <td><?php echo $datosi[0]['descripcion']; ?></td>


            <td><?php echo $docente[0]['nombre']; ?> <?php echo $docente[0]['apellido']; ?></td>
            

           

            

            
             

        <td><a href="bibliografia.php?id=<?php echo $res['id_aper'];?>"><img src="images/pocket-killbox_icon.png" width="25" height="25" alt="Bibliografia" border="0"/></a></td>

          </tr>

          <?php 
$i++;
$j++;

}
           ?>
        </tbody>
         

    
</table>
</div>
<div id="footer"><?php require_once("footer.php"); ?></div>
</div>


    
    
  </body>
</html>