<?php 
require_once('../session.php');
require_once("../conexio.php");
require_once("../PHPPaging.lib/PHPPaging.lib.php");
require_once('../class/class.php');
$obj = new Consultas();
$usu = $obj->get_usuario($_SESSION['ides']);
 $d= $usu[0]['ciudad']; 
  $pagina = new PHPPaging;
$pagina->agregarConsulta("select * from alumnos where estado = 1 and ciudad=$d");
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
if (!confirm("ALERTA!! va a proceder a eliminar este registro,\n Confirme en OK o en CANCELAR.")) {
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
              <p><a href="ingalumnos.php">Alta de Alumnos</a></p>
            </div>
          </div>

</div>
<div class="col-md-10">
  <h1>LISTA DE ALUMNOS</h1>
  
  <div class="container">
   
    <div class="row">
        <div class="col-md-9 ">
            <form id="buscador" action="alumnosbus.php" class="search-form" name="buscador" method="post">
               
              <div class="input-group">
                <label for="search" class="sr-only">Buscar</label>
                <input type="text" class="form-control"   placeholder="Buscar aqui.." id="buscar" name="buscar">
                <span class="input-group-btn">
                <button type="submit" name="buscador" class="btn btn-primary">Buscar</button>
                </span>
            </div>
      <br>
            </form>
        </div>
    </div>
</div>

      <table border="0" class="table table-bordered table-hover ">

        <thead ><tr>

          <td >N.</td>

          <td>nombre</td>

          <td>correo</td>

          <td>telefono</td>

          

          
          <td>Notas</td>

          <td>Imprimir</td>

          <td>Editar</td>

          <td>Eliminar</td>

        </tr></thead>

        

          <tbody>

<?php 
$i=1;
while($res=$pagina->fetchResultado()){



 ?>
          <tr>

            <td><?php echo $i; ?></td>

            <td><?php echo $res['nombre']; ?> &nbsp;<?php  echo $res['apellido'] ?></td>

            <td><?php echo $res['email']; ?></td>

            <td><?php echo $res['telefono']; ?></td>

            

           
             <td><a href="../historial.php?alumno=<?php echo $res['id_alm']; ?>" ><img src="../images/images.jpg" width="30" height="30" alt="notas" border="0"/></a>&nbsp;</td>

            <td><a href="../pdf/cabecera_pie.php?id_alm=<?php echo $res['id_alm']; ?>" ><img src="../images/3986372icon_printer.gif" width="30" height="30" alt="imprimir" border="0"/></a>&nbsp;</td>

        <td><a href="editaralumno.php?id_alm=<?php echo $res['id_alm']; ?>"><img src="../images/glassy-blue-edit-icon-thumb7099653.jpg" width="25" height="25" alt="Editar" border="0"/></a></td>

        <td>
          
        <a href="javascript:;" onclick="aviso('eliminaralumno.php?borrar=<?php echo $res['id_alm'];?>'); return false;"><img src="../images/pocket-killbox_icon.png" width="25" height="25" alt="Eliminar" border="0"/></a></td>

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
    <script type="text/javascript" src="js/VentanaCentrada.js"></script>
  <script type="text/javascript" src="js/buscar.js"></script>
  </body>
</html> 