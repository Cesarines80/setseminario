<?php
require_once("../conexio.php");
//print_r($_GET);
//$sql="select * from comuna where ciudad = ".$_GET["id"]."";
$sql="select * from distrito where relacion=".$_GET["id"];
$res=mysql_query($sql,$conexio);
?>

<select name="distrito"  onchange="from(document.form.distrito.value,'iglesia','iglesia.php')">
<option value="0">Selec. Dist.</option>

<?php
while ($reg=mysql_fetch_array($res))
{
?>
<option value="<?php echo $reg["id"];?>"><?php echo $reg["opcion"];?></option>
<?php
}
?>

</select>