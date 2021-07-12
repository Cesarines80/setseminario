<?php 
require_once('session.php');
require_once("conexio.php");
require_once("class/class.php");
require_once("PHPPaging.lib/PHPPaging.lib.php");
$d = $_SESSION['ides'];
  $pagina = new PHPPaging;
$pagina->agregarConsulta("select * from apermateria where activo= 1 and id_usu = $d");
$pagina->ejecutar();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>
    <script src="../js/jquery.js"></script>
<script src="../js/paginacion.js"></script>

    
    
  </head>

  <body>
 
  <?php 

      include "menuadmi.php";
   ?>

    <div class="container " >
    


<div class="row">
<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p></p>
            </div>
          </div>

</div>
<div class="col-md-10">
  <h2>LISTA DE DOCENTES Y SUS MATERIAS ABIERTAS</h2>

  <table  class="table table-bordered table-hover table-striped ">

  <thead class="alert alert-info">
        <tr>

          <td scope="col" >N.</td>
          <td scope="col">Nombre</td>
          <td scope="col">Apellido</td>
          <td scope="col">Materia</td>
          <td scope="col">Grado</td>
          <td scope="col">Depto</td>

        </tr>
      </thead>
             

          <tbody>

<?php 
$i=1;
while($res=$pagina->fetchResultado()){
//var_dump($res);
//exit;

$obj2 = new Consultas();

$datosi = $obj2->get_materiaingactiva($res['id_materia']);
$datoss = $obj2->get_grado1($datosi[0]['id_grado']);
$ciudad = $obj2->get_ciudadselect($res['id_depto']);
$docente = $obj2->get_docentebus($res['id_doce']);

 ?>
          <tr>

            <td><?php echo $i; ?></td>
            <td><?php echo $docente[0]['nombre']; ?></td>
            <td><?php echo $docente[0]['apellido']; ?></td>
            <td><?php echo $datosi[0]['descripcion']; ?></td>

            <td><?php echo $datoss[0]['nivel']; ?></td>
            <td><?php echo $ciudad[0]['nombre']; ?></td>

           

            

            
             

       

          </tr>

          <?php 
$i++;
}
           ?>
        </tbody>
         

      </table>

      
</div>

      
 </div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-2"></div>
<div class="col-md-1"></div>
<div class="col-md-" class="pagination"><?php
echo 'Paginas '.$pagina->fetchNavegacion();
 ?></div>
<div class="col-md-2"></div>
<div class="col-md-2"></div>
  



</div>
 
   
 

    </div> <!-- /container -->


    
    <?php include "footer.php" ?>
  </body>
</html> 