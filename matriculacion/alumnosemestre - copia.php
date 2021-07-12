<?php 
require_once('session.php');
require_once("conexio.php");
require_once("class/class.php");
require_once("PHPPaging.lib/PHPPaging.lib.php");
$d = $_SESSION['ides'];
$objetos = new Consultas();
$usuario = $objetos->get_usuarioselect($d);
$ciudadusu = $usuario[0]['ciudad'];
//echo $ciudadusu;
//exit;
  $pagina = new PHPPaging;
$pagina->agregarConsulta("select * from alumnos where estado = 1 and ciudad = $ciudadusu and act_sem = 1 ");
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
              <p><a href="registro.php">Apertura de Alumnos</a></p>
            </div>
          </div>

</div>
<div class="col-md-10">
  <h1>Lista de Alumnos en el Semestre</h1>

      <table border="0" class="table table-bordered table-hover ">

        <thead class="thead-dark" ><tr>

          <td >N.</td>

          <td>Nombre</td>
          <td>Apellido</td>
          <td>Depto</td>

        

          

          
          

         

          <td>Eliminar</td>

        </tr></thead>

        

          <tbody>

<?php 
$i=1;
while($res=$pagina->fetchResultado()){

//var_dump($res);
//exit;
$obj2 = new Consultas();

//$datosi = $obj2->get_materiaingactiva($res['id_mat']);
//$datoss = $obj2->get_alumno2($res['id_alm']);
$ciudad = $obj2->get_ciudadselect($res['ciudad']);

 ?>
          <tr>

            <td><?php echo $i; ?></td>

            <td><?php echo $res['nombre']; ?></td>

            <td><?php echo $res['apellido']; ?></td>
            <td><?php echo $ciudad[0]['nombre']; ?></td>

           

            

            
             

        <td><a href="materiasemestrebaja.php?id=<?php echo $res['id_aper'];?>"><img src="images/pocket-killbox_icon.png" width="25" height="25" alt="Eliminar" border="0"/></a></td>

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