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

    <script  type="text/javascript" >
     function aviso(url){
        if (!confirm("ALERTA!! va a proceder a eliminar este registro,\n Confirme en ACEPTAR o en CANCELAR.")) {
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
              <p><a href="registro.php">Apertura de Alumnos</a></p>
            </div>
          </div>

</div>
<div class="col-md-10">
  <h1>Lista de Alumnos en el Semestre</h1>
</div>
</div>
    </div> <!-- /container -->

    <div class="container " >
 <div class="panel-body cold-md-12   ">
        <form class="form-horizontal" role="form" id="datos_cotizacion">
        
            <div class="form-group row">
              
              <div class="col-md-9">
                <input type="text" class="form-control" id="q" placeholder="Nombre o Cargo" onkeyup='load(1);'>
              </div>
              
              
              
              <div class="col-md-3">
                <button type="button" class="btn btn-default" onclick='load(1);'>
                  <span class="glyphicon glyphicon-search" ></span> Buscar</button>
                <span id="loader"></span>
              </div>
              
            </div>
        
        
        
      </form>
        <div id="resultados"></div><!-- Carga los datos ajax -->
        <div class='outer_div'></div><!-- Carga los datos ajax -->
      </div>
      
    <hr>
   
 

    </div> <!-- /container -->


    
    <?php include "footer.php" ?>
    <script type="text/javascript" src="js/VentanaCentrada.js"></script>
  <script type="text/javascript" src="js/buscar.js"></script>
  </body>
</html> 