<?php
require_once("../conexio.php");

require_once("../PHPPaging.lib/PHPPaging.lib.php");
include "../session.php";
$id = $_SESSION['id'];

$pagina = new PHPPaging;
$pagina->agregarConsulta("select * from apermateria where id_doce= $id  and activo = 1");
$pagina->ejecutar();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "headers.php" ?>
  <script  type="text/javascript" >
     function aviso(url){
        if (!confirm("ALERTA!! va a proceder a Cerrar la materia,\n Confirme en Aceptar o en Cancelar.")) {
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

  <?php include "menudocente.php"; ?>
  <div class="container ">


    <div class="row">
      <div class="col-md-2">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Acciones</h3>
          </div>
          <div class="panel-body">
            <p><a href="../admindocente.php?id=<?php echo $_SESSION['id']; ?>">Regresar</a></p>
          </div>
        </div>

      </div>
      <div class="col-md-10">
        <h1>LISTA DE MATERIAS</h1>

        <table border="0" class="table table-bordered table-hover ">

          <thead class="thead-dark">
            <tr>

              <th>Materia</th>

              <th>CARRERA</th>

              <th>CREDITO</th>
              <th>Notas</th>
              <th>Cerrar Materia</th>

            </tr>
          </thead>



          <tbody>
            <?php
            $i = 1;
            while ($res = $pagina->fetchResultado()) {

              $obj =  new Consultas();
              $datos = $obj->get_materiaingactiva($res['id_materia']);
              $datos2 = $obj->get_grado1($datos[0]['id_grado']);

            ?>
              <tr>

                <td><?php echo $datos[0]['descripcion']; ?></td>

                <td><?php echo $datos2[0]['nivel']; ?></td>

                <td><?php echo  $datos[0]['creditos']; ?></td>
                <td><a href="notasalm.php?id_mat=<?php echo $res['id_materia']; ?>"><img src="../images/images.jpg" width="25" height="25" alt="Editar" border="0" /></a></td>

                <td>
                <a href="javascript:;" onclick="aviso('cerrarmateria.php?desactivar=<?php echo $res['id_aper'];?>'); return false;">Cerrar Materia</a>  
                </td>
                <ion-icon name="briefcase-outline"></ion-icon>
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