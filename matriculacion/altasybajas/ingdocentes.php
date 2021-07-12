<?php
include'../conexio.php';
require_once("../class/class.php");
$obj= new Consultas();
$datos = $obj->get_rango();
if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new Ingresar();
$datos1 = $obj1->post_docentes();
  exit;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include "headers.php" ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ingreso de Docentes</title>
<link rel="stylesheet" type="text/css" href="../css/estyl.css">
<script type="text/javascript" language="javascript" src="../js/valida.js"></script>
<link rel="stylesheet" type="text/css" href="select_dependientes_3_niveles.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" type="text/css" href="css/estyl.css">
<script language="javascript" type="text/javascript" src="../js/funciones.js"></script>

</head>

<body onLoad="limpiar();">
<?php 

      include "menuadmi.php";
   ?>
<div class="container" >
<div class="row">
<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p><a href="docente.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10"> <!--desde aqui-->


<form name="form" action="" class="form-horizontal" method="post" enctype="multipart/form-data">
<h2>Ingrese Docentes</h2>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre" id="inputPassword" placeholder="Nombre">
                <div id="nombre"></div>
              </div>
 </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Apellido</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="apellido" id="inputPassword" placeholder="Apellido">
                <div id="apellido"></div>
              </div>
 </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Telefono</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="telefono" id="inputPassword" placeholder="Telefono">
                <div id="telefono"></div>
              </div>
 </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Celular</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="celular" id="inputPassword" placeholder="Celular">
                <div id="celular"></div>
              </div>
 </div>

 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Sexo</label>
              <div class="col-sm-10">
                   <select class="form-control" name="sexo">
                    <option value="0">Selecc..</option> 
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    </select>
                <div id="sexo"></div>
              </div>
 </div>

 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">C.I.</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ci" id="inputPassword" placeholder="C.I." onBlur="from_1(document.form.ci.value,'ci','../doc.php')">
                <div id="ci"></div>
              </div>
 </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">E-Mail</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id="inputPassword" placeholder="Email" >
                <div id="email"></div>
              </div>
 </div>
 <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Rango</label>
              <div class="col-sm-10">
                <select name="grado" class="form-control" onChange="from(document.form.grado.value,'provincia1','../provincia1.php')" >
                  <option value="0">Seleccione Grado...</option>
                <?php
                  for($i=0;$i<sizeof($datos);$i++)
                {
                  ?>
                  <option value="<?php echo $datos[$i]["id_cat"]?>"><?php echo $datos[$i]["categoria"]?></option>
                  <?php
                  
                  }
              
                  ?>
                </select>
                <div id="grado"></div>
              </div>
 </div>
 <div class="form-group">
    <input type="hidden" name="ciudad2" value="<?php echo $_SESSION[dep]; ?>">
 </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Provincia</label>
              <div class="col-sm-4">
               <div id="provincia1">

                <select name="provincia1" disabled  class="form-control" >
                <option value="0">Selec. Dist.</option>


                </select>
                </div>
              </div>
              
            </div>

            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Distrito</label>
              <div class="col-sm-4">
                    <?php
                    $sql="select * from distritos";
                    $res=mysql_query($sql,$conexio);
                            ?>
                                  
                    <div id="distrito">

                    <select name="distrito" class="form-control" onchange="from(document.form.distrito.value,'iglesia','../iglesia.php')"  >
                    <option value="0">Selec. Dist.</option>

                    <?php
                    while ($reg=mysql_fetch_array($res))
                    {
                    ?>
                    <option value="<?php echo $reg["id_d"];?>" ><?php echo $reg["opcion"];?></option>
                    <?php
                    }
                    ?>

                    </select>
                    </div>
              </div>
              
            </div>

 <div class="form-group">
            <hr>
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
              
                <input type="hidden"  name="grabar" value="si" />
                <input type="button" class="btn btn-warning" name="boton3" id="boton3" value="Cancelar" onClick="history.back();" />
               
                </div>
                <div class="col-sm-3">
                  <input id="boton" type="button" class="btn btn-success" name="Registrarr" value="Registrar" title="Registrar" onClick="valida_docente();">

               <input id="boton_2" type="button" class="btn btn-danger" value="Verificar" title="No puede Registrar" style="display:none" />
                </div>
              </div>
    





</form>
<br>
</div> <!---Hasta-->
</div>
<div id="footer"><?php require_once("footer.php"); ?></div>
</div>
</body>
</html>

