<?php 
require_once("../conexio.php");
require_once("../PHPPaging.lib/PHPPaging.lib.php");
require_once("../class/class.php");
$dat = new Consultas();

 
  $pagina = new PHPPaging;
$pagina->agregarConsulta("select * from usuario where usu_sw = 1");
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
        function activar(url){
        if (!confirm("ALERTA!! va a proceder a activar al usuario,\n Confirme en OK o en CANCELAR.")) {
          return false;
        }
        else {
        document.location = url;
        return true;
        }
        } function desactivar(url){
        if (!confirm("ALERTA!! va a proceder a desactivar al usuario,\n Confirme en OK o en CANCELAR.")) {
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
              <p><a href="ingresarususarios.php">Alta de Usuarios</a></p>
            </div>
          </div>

</div>
<div class="col-md-10">
  <h1>LISTA DE USUARIOS</h1>

  <table border="0" class="table table-bordered table-hover ">

    <thead >


    <tr>

      <th >N.</th>

      <th>nombre</th>

      <th>telefono</th>

      <th>login</th>

      

      <th>password</th>

      <th>Ciudad</th>

      <th>Editar</th>

      <th>Estado</th>
      <th>Eliminar</th>

    </tr></thead>

    

      <tbody>
<?php 
$i=1;
while($res=$pagina->fetchResultado()){



 ?>
      <tr>

        <td><?php echo $i; ?></td>

        <td><?php echo $res['nombre']; ?> <?php echo $res['apellido']; ?></td>

        <td><?php echo $res['telefono']; ?></td>
        <td><?php echo $res['usu_login']; ?></td>

        <td><?php echo $res['usu_pass']; ?></td>

       <td><?php
          $d=$res["ciudad"];
        $sqle="select * from ciudades where id='$d'";
             $rese=mysql_query($sqle,$conexio);
           $rege=mysql_fetch_array($rese); 
          echo   $rege["nombre"];

  ?></td>

        

        

    <td><a href="editarusuario.php?id_usu=<?php echo $res['usu_id']; ?>"><img src="../images/glassy-blue-edit-icon-thumb7099653.jpg" width="25" height="25" alt="Editar" border="0"/></a></td>

    <td>

    <?php
    if(($res['activo'])== 0){
      ?>
          <a href="javascript:;" onclick="activar('activarusuario.php?id_usu=<?php echo $res['usu_id'];?>'); return false;">
          <img src="../images/descarga.jpg" width="25" height="25" alt="Desactivado" border="0"/>
          </a>
      <?php
    }else{
      ?>
          <a href="javascript:;" onclick="desactivar('desactivarusuario.php?id_usu=<?php echo $res['usu_id'];?>'); return false;">
          <img src="../images/subir.jpg" width="25" height="25" alt="Activo" border="0"/>
          </a>
      <?php
    }
    ?>

  </td>
   <td>
<a href="javascript:;" onclick="aviso('eliminarusuario.php?borrar=<?php echo $res['usu_id'];?>'); return false;">
   <img src="../images/pocket-killbox_icon.png" width="25" height="25" alt="Eliminar" border="0"/></a></td>

      </tr>
      <?php 
$i++;
}
           ?>

     </tbody>

  </table>

</div>


      
 </div>

    </div> <!-- /container -->


    
    <?php include "footer.php" ?>
  </body>
</html>