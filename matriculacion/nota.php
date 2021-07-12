<?php
require_once("../conexio.php");

//print_r($_GET);
$sql="select * from registro where id_mat=".$_GET["id"]." and id_alm='".$_GET["id_alm"]."'";
$res=mysql_query($sql,$conexio);

$sql1="select * from materias where id_mat='".$_GET["id"]."'";
$res1=mysql_query($sql1,$conexio);
$reg1 = mysql_fetch_array($res1);

?>





<select  name="registro"  class="form-control"  >
<option value="0">seleccione..</option>
<?php
while ($reg=mysql_fetch_array($res))
{
?>
<option value="<?php echo $reg["id_reg"];?>" ><?php echo $reg1["descripcion"];?></option>
<?php
}
?>

</select>

