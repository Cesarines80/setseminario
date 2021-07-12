<?php
include'conexio.php';
require_once("class/class.php");
$obj= new Consultas();
$datos = $obj->get_materiaing($_POST['elegido']);

?>
<select name="materia" id="materia"  class="form-control" required>
<option value="" disabled selected hidden>Selecione Materia...</option>
                <?php
                  for($i=0;$i<sizeof($datos);$i++)
                {
                  ?>
                  <option value="<?php echo $datos[$i]["id_mat"]?>"><?php echo $datos[$i]["descripcion"]?></option>
                  <?php
                  
                  }
              
                 ?>
                </select>
