<?php
require_once('session.php');
require_once("conexio.php");
require_once("class/class.php");
require_once("PHPPaging.lib/PHPPaging.lib.php");
$d = $_SESSION['ides'];
$pagina = new PHPPaging;
$pagina->agregarConsulta("select * from apersemestre where activo= 1 and id_usu = $d");
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
        if (!confirm("ALERTA!! va a proceder a cerrar el semestre,\n Confirme en Aceptar o en Cancelar.")) {
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

  <div class="container ">



    <div class="row">
      <div class="col-md-2">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Acciones</h3>
          </div>
          <div class="panel-body">
            <p><a href="aperturasemestre.php">Apertura de Semestre</a></p>
          </div>
        </div>

      </div>
      <div class="col-md-10">
        <h2>APERTURA DE SEMESTRES ABIERTAS</h2>

        <table  class="table table-bordered table-hover table-striped ">

        <thead class="alert alert-info">
            
            <tr >
            <th scope="col" >N.</th>
            <th scope="col">Semestre</th>
            <th scope="col">Inicio</th>
            <th scope="col">Final</th>
            <th scope="col">Cerrar</th>
            
            
            
          </tr>
          </thead>



          <tbody>

            <?php
            $i = 1;
            while ($res = $pagina->fetchResultado()) {

              
              ?>
              <tr>

                <td><?php echo $i; ?></td>
                <td><?php echo $res['semestre']; ?></td>
                <td><?php echo $res['fechainicio']; ?></td>
                <td><?php echo $res['fechafinal']; ?></td>
                <td>
                <a href="javascript:;" onclick="aviso('cerrarsemestre.php?id=<?php echo $res['id'];?>'); return false;">CerrarSemestre</a>
                </td>

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
                                              echo 'Paginas ' . $pagina->fetchNavegacion();
                                              ?></div>
      <div class="col-md-2"></div>
      <div class="col-md-2"></div>




    </div>




  </div> <!-- /container -->



  <?php include "footer.php" ?>
</body>

</html>