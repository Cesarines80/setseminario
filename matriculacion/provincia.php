<?php

require_once("conexio.php");
//print_r($_GET);
//$sql="select * from comuna where ciudad = ".$_GET["id"]."";
$sql="select * from lista_provincias where relacion=".$_GET["id"]."";
$res=mysql_query($sql,$conexio);
?>
<select name="provincia" class="form-control">
<option value="0">Selec. Prov.</option>

<?php
while ($reg=mysql_fetch_array($res))
{
?>
<option value="<?php echo $reg["id"];?>"  ><?php echo $reg["opcion"];?></option>
<?php
}
?>

</select>