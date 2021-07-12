<?php
include'conexio.php';
require_once("class/class.php");
$obj= new Consultas();
$datos = $obj->get_registro($_POST['elegido']);

?>
<select name="materia" id="materia"  class="form-control">
                  <option value="0">Seleccione Materia...</option>
                <?php
                  for($i=0;$i<sizeof($datos);$i++)
                {
                  $d=$datos[$i]['id_mat']; 

                   $sql1="select * from materias where id_mat=$d ";
                    $result1 = mysql_query($sql1, $conexio);
                    $row=mysql_fetch_array($result1);
                  ?>
                  <option value="<?php echo $row["id_mat"]?>"><?php echo $row['descripcion']?></option>
                  <?php
                  
                  }
              
                 ?>
                </select>
