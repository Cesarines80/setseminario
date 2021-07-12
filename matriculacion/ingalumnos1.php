<?php
include'../conexio.php';
//print_r($_POST);
 $nombre = ucwords(strtolower($_REQUEST["txt_nombre"]));
 $apellido = ucwords(strtolower($_REQUEST["txt_apellido"]));
 $telefono = $_REQUEST["txt_telefono"];
 $celular = $_REQUEST["txt_celular"];
 $estadocivil = $_REQUEST["txt_civil"];
 $email = $_REQUEST["email"];
 $direccion = ucwords(strtolower($_REQUEST["txt_direccion"]));

// Formando la fecha --------->
$ano = $_REQUEST["txt_ano"];
$sqli="SELECT * FROM `ano` WHERE `id_ano`='$ano'";
		$resultii = mysql_query($sqli, $conexio);
		$row1=mysql_fetch_array($resultii);
		$ano1 = $row1['ano'];
$mes = $_REQUEST["txt_mes"];
$dia = $_REQUEST["txt_dia"];
$sqlis="SELECT * FROM `dia` WHERE `id_dia`='$dia'";
		$resultiis = mysql_query($sqlis, $conexio);
		$row1s=mysql_fetch_array($resultiis);
		$dia = $row1s['dia'];
$var="-";
$fec_nac = $ano1.$var.$mes.$var.$dia;

//-----------------------<img src="imagen/adordo1a.jpg" width="305" height="17" />
//Lugar de nacimiento


$pai =$_REQUEST["pais"];
$sqlis1="SELECT * FROM `lista_paises` WHERE `id`='$pai'";
		$resultiis1 = mysql_query($sqlis1, $conexio);
		$row1s1=mysql_fetch_array($resultiis1);
		$pais = $row1s1['opcion'];
      
 $ciu = $_POST["ciudad"];

$sqlis8="SELECT * FROM `lista_estados` WHERE `id`='$ciu'";
		$resultiis8 = mysql_query($sqlis8, $conexio);
		$row1s8=mysql_fetch_array($resultiis8);
		$ciuda = $row1s8['opcion'];
	
$pro = $_POST["provincia"];

$sqlis9="SELECT * FROM `lista_provincias` WHERE `id`='$pro'";
		$resultiis9 = mysql_query($sqlis9, $conexio);
		$row1s9=mysql_fetch_array($resultiis9);
		 $provincia = $row1s9['opcion'];	
$pro1 = $_POST["provincia1"];	
$sqlis19="SELECT * FROM `lista_provincias` WHERE `id`='$pro1'";
		$resultiis19 = mysql_query($sqlis19, $conexio);
		$row1s19=mysql_fetch_array($resultiis19);
		 $provincia1 = $row1s19['opcion'];	


//--------------------------->		

 $ci = $_REQUEST["txt_ci"];
// $miembro = $_REQUEST["txt_miembro"];
//***********************************************************



//-------------------------------------------
 



 $region = $_REQUEST["region"];
 $ciudadalm = $_REQUEST["ciudad1"];
 $res="SELECT  * FROM `ciudad` WHERE `id`='$ciudadalm'";
		$resu = mysql_query($res, $conexio);
		$reg=mysql_fetch_array($resu);
		$ciudad = $reg["opcion"];

 
 $distrito1 = $_REQUEST["distrito"];
 
 $res1="SELECT  * FROM `distrito` WHERE `id`='$distrito1'";
		$resu1 = mysql_query($res1, $conexio);
		$reg1=mysql_fetch_array($resu1);
		$distrito = $reg1["opcion"];

$iglesiapa = $_REQUEST["iglesia"];
$sqliss="SELECT id_i, igle FROM `iglesia` WHERE `id_i`='$iglesiapa'";
		$resultiiss = mysql_query($sqliss, $conexio);
		$row1ss=mysql_fetch_array($resultiiss);
		$iglesialm = $row1ss["igle"];
 

 $fecha = $_REQUEST["txt_fecha"];
 $estado= 1;
 $imagen = $_FILES['imagen']['tmp_name'];
//$fecha_actual=date("Y-m-d");

## CONFIGURACION #############################

    # ruta de la imagen a redimensionar
    //$imagen='prueba.jpg';
    # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe
	$imagen = $_FILES['imagen']['tmp_name']; // almaceno el nombre del archivo subido 
	$tipos=$_FILES["imagen"]["type"];
	//$imagen_final = '123445'.$img; //nombre de la nueva imagen achicada
	//$tipo = $_FILES['imagen']['type'];  // almaceno el tipo de archivo
	//$dir = './'; // selecciono la carpta donde almaceno las imagenes
/////////////////////////////////////////////////////////////////////////////
if ($tipos=="image/png" or $tipos=="image/jpeg" or $tipos=="application/vnd.openxmlformats-officedocument.wordprocessingml.document")
{
//**************************************************************************
//Ahora podemos subir la imagen al servidor
switch ($tipos)
{
	case 'image/png':
		$ext=".png";
	break;
	case 'image/jpeg':
		$ext=".jpg";
	break;
	case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
		$ext=".docx";
	break;
}
}



/////////////////////////////////////////////////////////////////////////////
    $imagen_final='fotos/'.$ci.$ext;
    $ancho_nuevo=150;
    $alto_nuevo=140;

## FIN CONFIGURACION #############################

###############################################
redim ($imagen,$imagen_final,$ancho_nuevo,$alto_nuevo);


function redim($ruta1,$ruta2,$ancho,$alto)
    {
    # se obtene la dimension y tipo de imagen
    $datos=getimagesize ($ruta1);
    
    $ancho_orig = $datos[0]; # Anchura de la imagen original
    $alto_orig = $datos[1];    # Altura de la imagen original
     $tipo = $datos[2];
    
    if ($tipo==1){ # GIF
        if (function_exists("imagecreatefromgif"))
            $img = imagecreatefromgif($ruta1);
        else
            return false;
    }
    else if ($tipo==2){ # JPG
        if (function_exists("imagecreatefromjpeg"))
            $img = imagecreatefromjpeg($ruta1);
        else
            return false;
    }
    else if ($tipo==3){ # PNG
        if (function_exists("imagecreatefrompng"))
            $img = imagecreatefrompng($ruta1);
        else
            return false;
    }
    
    # Se calculan las nuevas dimensiones de la imagen
    if ($ancho_orig>$alto_orig)
        {
        $ancho_dest=$ancho;
        $alto_dest=($ancho_dest/$ancho_orig)*$alto_orig;
        }
    else
        {
        $alto_dest=$alto;
        $ancho_dest=($alto_dest/$alto_orig)*$ancho_orig;
        }

    // imagecreatetruecolor, solo estan en G.D. 2.0.1 con PHP 4.0.6+
    $img2=@imagecreatetruecolor($ancho_dest,$alto_dest) or $img2=imagecreate($ancho_dest,$alto_dest);

    // Redimensionar
    // imagecopyresampled, solo estan en G.D. 2.0.1 con PHP 4.0.6+
    @imagecopyresampled($img2,$img,0,0,0,0,$ancho_dest,$alto_dest,$ancho_orig,$alto_orig) or imagecopyresized($img2,$img,0,0,0,0,$ancho_dest,$alto_dest,$ancho_orig,$alto_orig);

    // Crear fichero nuevo, según extensión.
    if ($tipo==1) // GIF
        if (function_exists("imagegif"))
            imagegif($img2, $ruta2);
        else
            return false;

    if ($tipo==2) // JPG
        if (function_exists("imagejpeg"))
            imagejpeg($img2, $ruta2);
        else
            return false;

    if ($tipo==3)  // PNG
        if (function_exists("imagepng"))
            imagepng($img2, $ruta2);
        else
            return false;
    
    return true;
    }



			   $sql2="INSERT INTO `alumnos` 		(`id_alm`,`nombre`,`apellido`,`telefono`,`celular`,`imagen`,`estado_civil`,`email`,`direccion`,`fech_nac`,`napais`,`naciudad`,`naprovincia`,`c_i`,`region`,`ciudad`,`provincia`,`distrito`,`miembro`,`fecha`,`estado`) VALUES 
(null,'$nombre','$apellido','$telefono','$celular','$imagen_final','$estadocivil','$email','$direccion','$fec_nac','$pais','$ciuda','$provincia','$ci','$region','$ciudad','$provincia1','$distrito','$iglesialm',now(),'1')";
$result2 = mysql_query($sql2, $conexio);

		header("Location: ingalumnos.php");	

?>