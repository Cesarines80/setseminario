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
<script  type="text/javascript" >
     function aviso(url){
        if (!confirm("ALERTA!! va a proceder a eliminar la Materia,\n Confirme en Aceptar o en Cancelar.")) {
          return false;
        }
        else {
        document.location = url;
        return true;
        }
        }
</script>
    
    
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
              <p><a href="aperturamateria.php">Apertura de Materias</a></p>
            </div>
          </div>

</div>
<div class="col-md-10">
  <h2>LISTA DE MATERIAS ABIERTAS</h2>

      <table class="table table-bordered table-hover table-striped ">

        <thead  class="alert alert-info"><tr>

          <td >N.</td>

          <td>Materia</td>
          <td>Grado</td>
          <td>Depto</td>
          <td>Semestre</td>
          <td>Eliminar</td>

        </tr></thead>

        

          <tbody>

<?php 
$i=1;
while($res=$pagina->fetchResultado()){

$obj2 = new Consultas();

$datosi = $obj2->get_materiaingactiva($res['id_materia']);
$datoss = $obj2->get_grado1($datosi[0]['id_grado']);
$ciudad = $obj2->get_ciudadselect($res['id_depto']);
$semestre = $obj2->get_semestreact($res['semestre']);

 ?>
          <tr>

            <td><?php echo $i; ?></td>

            <td><?php echo $datosi[0]['descripcion']; ?></td>

            <td><?php echo $datoss[0]['nivel']; ?></td>
            <td><?php echo $ciudad[0]['nombre']; ?></td>
            <td><?php echo $semestre[0]['semestre']; ?> </td>
            <td><a href="javascript:;" onclick="aviso('materiasemestrebaja.php?id=<?php echo $res['id_aper'];?>'); return false;">
            <img src="images/pocket-killbox_icon.png" width="25" height="25" alt="Eliminar" border="0"/></a></td>

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