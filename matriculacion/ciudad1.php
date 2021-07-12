<?php
require_once("conexio.php");


//print_r($_GET);
$sql="select * from ciudad where relacion=".$_GET["id"]."";
$res=mysql_query($sql,$conexio);

?>

<select  name="ciudad1" class="form-control" onchange="from(document.form.ciudad1.value,'provincia1','../provincia1.php')" >
<option value="0">Selec. Ciudad</option>

<?php
while ($reg=mysql_fetch_array($res))
{
?>
<option value="<?php echo $reg["relacion1"];?>"   ><?php echo $reg["opcion"];?></option>
<?php
}
?>

</select>