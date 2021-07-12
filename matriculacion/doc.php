<?php
require_once("../conexio.php");
sleep(2);
$sql="select * from docentes where `ci`='".$_GET["id"]."'";
$res=mysql_query($sql,$conexio);
if (mysql_num_rows($res)==0)
{
	echo "no";
}else
{
	echo "si";
}

?>