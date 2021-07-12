<?php
include'../conexio.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>


<title>Sistema de Matriculacion</title>
<link rel="stylesheet" type="text/css" href="select_dependientes_3_niveles.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" type="text/css" href="css/estyl.css">
<script language="javascript" type="text/javascript" src="js/funciones.js"></script>
<script language="javascript" type="text/javascript" src="js/valida.js"></script>
</head>

<body  onLoad="limpiar2()"  >
<?php 

      include "menuadmi.php";
   ?>

<div class="container">
<div class="row">
  

<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p><a href="alumnos.php">Regresar</a></p>
            </div>
          </div>
</div>
<div class="col-md-10">
  

<div class="row">
  
  
      <legend class="text-center">Ingresar Alumno</legend>
      <form name="form" class="form-horizontal" method="post" action="ingalumnos1.php?select=<?php $_REQUEST[select]?>&id=<?php echo $id_pas; ?>&ides=<?php echo $ides; ?>" enctype="multipart/form-data">


        


          <!--  desde aqui -->

          <div class="row">
            
  
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_nombre" id="inputPassword" placeholder="Nombre">
                <div id="div_nom"></div>
              </div>
            </div>
             <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Apellido</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_apellido" id="inputPassword" placeholder="Apellido">
                <div id="div_apell"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Telefono</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_telefono" id="inputPassword" placeholder="Telefono" onKeyPress="return acceptNum(event)" value="<?php echo $telefono; ?>">
                <div id="div_tel"></div>
              </div>
            </div>
             <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Celular</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_celular" id="inputPassword" placeholder="Celular" onKeyPress="return acceptNum(event)" value="<?php echo $celular; ?>">
                <div id="div_cel"></div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Fotografia</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="imagen" id="archivo" >
                
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Estado Civil</label>
              
              <div class="col-sm-10 " >
                Soltero <input type="radio"  name="txt_civil" id="radio"  value="SOLTERO" <?php if ($estadocivil=="SOLTERO") {echo "checked";}    ?>>
                Casado 
                 <input type="radio" name="txt_civil" id="radio2" value="CASADO" <?php if ($estadocivil=="CASADO") {echo "checked";}    ?>>
                
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Correo</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputPassword" placeholder="Email"  value="<?php echo $email; ?>">
                <div id="div_correo"></div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Direccion</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_direccion" id="txt_direccion" placeholder="Direccion"  value="<?php echo $direccion; ?>">
                <div id="div_dir"></div>
              </div>
            </div>

             <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Fecha de Nacimiento</label>
              <div class="col-sm-3">
                <select name="txt_ano" id="txt_ano" class="form-control">
                  <option value="0">.:Ano:.</option>
                   <?php  $sql1="SELECT id_ano, ano FROM `ano` order by id_ano desc ";
                    $result1 = mysql_query($sql1, $conexio);
                     
                
               while ($row=mysql_fetch_array($result1))
                      {
                     ?>
                
          <option value="<?php echo $row["id_ano"];?>" <?php if ($row["ano"]==$ano) {echo "selected=\"selected\"";} ?>> <?php echo $row["ano"];?>

                </option>
                
                <?php
                        }
                    ?>
                
                </select>
                </div>
                <div class="col-sm-3">
                <select name="txt_mes" id="txt_mes" class="form-control">
                  <option value="0">.:Mes:.</option>
                  <?php  $sql2="SELECT id_mes, meses FROM `mes` ";
                    $result2 = mysql_query($sql2, $conexio);
                       while ($row=mysql_fetch_array($result2))
                      {
              ?>
                  <option value="<?php echo $row["id_mes"];?>"<?php if ($row["id_mes"]==$mes) {echo "selected=\"selected\"";} ?>><?php echo $row["meses"];?></option>
                  <?php
                        }
        ?>
              </select>
                  
                </div>

                <div class="col-sm-4">
                <select name="txt_dia" id="txt_dia" class="form-control">
                  <option value="0" >.:Dia:.</option>
                  <?php  $sql3="SELECT id_dia, dia FROM `dia` ";
                    $result3 = mysql_query($sql3, $conexio);

                       while ($row=mysql_fetch_array($result3))
                      {
              ?>
                  <option value="<?php echo $row["id_dia"];?>"<?php if ($row["dia"]==$dia) {echo "selected=\"selected\"";} ?>><?php echo $row["dia"];?></option>
                  <?php
                        }
        ?>
                </select>
                  
                </div>
               
                 
              </div>

              <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Lugar de Nacimiento</label>
              <div class="col-sm-3">
                <?php

                $sql="SELECT id, opcion FROM lista_paises";
                $res=mysql_query($sql,$conexio);
                ?>
                <select name="pais" class="form-control" onChange="from(document.form.pais.value,'ciudad','ciudad.php')">
                  <option value="0">Seleccione la regi&oacute;n</option>

                  <?php
                  while ($reg=mysql_fetch_array($res))
                  {
                  ?>
                  <option value="<?php echo $reg["id"];?>" <?php if ($reg["opcion"]==$reg1["pais"]) {echo "selected=\"selected\"";} ?>><?php echo $reg["opcion"];?></option>

                  <?php
                  }
                  ?>

                  </select>
              </div>
              <div class="col-sm-3">
                <div id="ciudad">

                  <select  name="ciudad" disabled class="form-control"   >
                  <option value="0">Selec. Ciudad</option>


                  </select>
                  </div>
              </div>
              <div class="col-sm-4">
                <div id="provincia">

                <select name="provincia" disabled class="form-control">
                <option value="0">Selec. Prov.</option>

                </select></div>
              </div>
            </div>

             <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">C.I.</label>
              <div class="col-sm-4">
                <input type="email" class="form-control" name="txt_ci" id="txt_direccion" placeholder="C.I."  onBlur="from1(document.form.txt_ci.value,'div_ci','verifica.php')" onKeyPress="return acceptNum(event)" value="<?php echo $ci; ?>" maxlength="8">
                <div id="div_ci"></div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Region</label>
              <div class="col-sm-4">
                <?php

                    $sql="SELECT id, opcion FROM region";
                    $res=mysql_query($sql,$conexio);
                    ?>

                    <select name="region" class="form-control" onChange="from(document.form.region.value,'ciudad1','ciudad1.php')">
                    <option value="0">Seleccione la regi&oacute;n</option>

                    <?php
                    while ($reg=mysql_fetch_array($res))
                    {
                    ?>
                    <option value="<?php echo $reg["id"];?>" <?php if ($reg["id"]==$region) {echo "selected=\"selected\"";} ?>><?php echo $reg["opcion"];?></option>
                    <?php
                    }
                    ?>

                    </select>
              </div>
              
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Departamento</label>
              <div class="col-sm-4">
               <?php  
        
              $sql="select * from ciudad ";
              $res=mysql_query($sql,$conexio);
                      
                      ?>
                            
                            <div id="ciudad1">

              <select  name="ciudad1" disabled  class="form-control">
              <option value="0">Selec. Ciudad</option>

              <?php
              while ($reg=mysql_fetch_array($res))
              {
              ?>
              <option value="<?php echo $reg["id"];?>"    <?php if ($reg["id"]==$ciudad) {echo "selected=\"selected\"";} ?> ><?php echo $reg["opcion"];?></option>
              <?php
              }
              ?>

              </select>
              </div>
              </div>
              
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

                    <select name="distrito" class="form-control" onchange="from(document.form.distrito.value,'iglesia','iglesia.php')"  >
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
              <label for="inputPassword" class="col-sm-2 control-label">Miembro Iglesia</label>
              <div class="col-sm-4">
                   <?php
              $sql="select * from iglesia ";
              $res=mysql_query($sql,$conexio);
                      ?>
              <div id="iglesia">

              <select name="iglesia" disabled class="form-control">
              <option value="0">Selec. Iglesia.</option>

              <?php
              while ($reg=mysql_fetch_array($res))
              {
              ?>
              <option value="<?php echo $reg["id_i"];?>"<?php if ($reg["igle"]==$iglesia) {echo "selected=\"selected\"";} ?>><?php echo $reg["igle"];?></option>
              <?php
              }
              ?>

              </select>
              </div>
              </div>
              
            </div>

            <div class="form-group">
            <hr>
              <div class="col-sm-5"></div>
              <div class="col-sm-7">

                <input id="boton" class="btn btn-primary" type="button" value="Ingresar " title="Ingresar" onClick="valida_alm()" />
                <input id="boton_2" type="button" class="btn btn-block" value="No se puede Ingresar" title="No se puede Ingresar" 
                style="display:none" />

               <input type="button"  name="boton3" class="btn btn-danger" id="boton3" value="Cancelar" onClick="history.back();" />
                </div>
              </div>
    



            </div> 

             </form>
          </div>
          </div>

           <div class="row"> <div class="footer" > <?php require_once("footer.php"); ?> </div> </div>
        
</div>
</div>

</body>

</html>
