<?php
require_once('session.php');
require_once("conexio.php");
/*print_r($_SESSION['']);
 exit;*/
//$sql="select * from comuna where ciudad = ".$_GET["id"]."";
$sql="select * from provincias where relacion=".$_SESSION['dep']."";
$res=mysql_query($sql,$conexio);
?>
<select name="provincia1" class="form-control">
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