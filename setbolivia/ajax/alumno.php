<?php
session_start();
require_once "../modelos/Alumno.php";
//$d = $_SESSION['id'];
$alumno = new Alumno();
$d = $_SESSION['id'];
$usuciu = $alumno->usuci("usuario", $d);
$reg = $usuciu->fetch_object();
$de=$reg->ciudad;


$id_alm = isset($_POST["id_alm"])?limpiarCadena($_POST["id_alm"]):"";
//var_dump($id_alm);
$nombre = isset($_POST["nombre"])?limpiarCadena($_POST["nombre"]):"";
$apellido = isset($_POST["apellido"])?limpiarCadena($_POST["apellido"]):"";
$telefono = isset($_POST["telefono"])?limpiarCadena($_POST["telefono"]):"";
if (empty($telefono)) 
	{
    	$telefono = 0; //echo 'La variable SÍ está vacía, su contenido es: '. $var;
	}
	
$celular = isset($_POST["celular"])?limpiarCadena($_POST["celular"]):"";
if (empty($celular)) 
	{
    	$celular = 0; //echo 'La variable SÍ está vacía, su contenido es: '. $var;
	}
$imagen = isset($_POST["imagen"])?limpiarCadena($_POST["imagen"]):"";
$estado_civil = isset($_POST["estado_civil"])?limpiarCadena($_POST["estado_civil"]):"";
$email = isset($_POST["email"])?limpiarCadena($_POST["email"]):"";
$direccion = isset($_POST["direccion"])?limpiarCadena($_POST["direccion"]):"";
$fech_nac = isset($_POST["fech_nac"])?limpiarCadena($_POST["fech_nac"]):"";
if (empty($fech_nac)) 
	{
    	$fech_nac = '2022-2-20'; //echo 'La variable SÍ está vacía, su contenido es: '. $var;
	}
$napais = isset($_POST["napais"])?limpiarCadena($_POST["napais"]):"";
$naciudad = isset($_POST["naciudad"])?limpiarCadena($_POST["naciudad"]):"";
$naprovincia = isset($_POST["naprovincia"])?limpiarCadena($_POST["naprovincia"]):"";
$c_i = isset($_POST["c_i"])?limpiarCadena($_POST["c_i"]):"";
if (empty($c_i)) 
	{
    	$c_i = ''; //echo 'La variable SÍ está vacía, su contenido es: '. $var;
	}
$ciudad = isset($_POST["ciudad"])?limpiarCadena($_POST["ciudad"]):"";
$provincia = isset($_POST["provincia"])?limpiarCadena($_POST["provincia"]):"";
$distrito = isset($_POST["distrito"])?limpiarCadena($_POST["distrito"]):"";
$miembro = isset($_POST["miembro"])?limpiarCadena($_POST["miembro"]):"";
$fecha =date('Y-m-d');
$estado = isset($_POST["estado"])?limpiarCadena($_POST["estado"]):"";
$act_sem = '0';
switch ($_GET["op"]) {
    case 'guardaryeditar':
      if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        $imagen = $_POST["imagenactual"];
    }else {

        $ext = explode(".", $_FILES["imagen"]["name"]);
        if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"  ) {
            $imagen = round(microtime(true)).'.'. end($ext);
            move_uploaded_file($_FILES['imagen']['tmp_name'], "../files/alumnos/".$imagen);
        }
    }
        if (empty($id_alm)) {
            $rspta = $alumno->insertar($nombre, $apellido, $telefono, $celular, $imagen, $estado_civil, $email, $direccion, $fech_nac, $napais, $naciudad, $naprovincia, $c_i, $ciudad, $provincia, $distrito, $miembro, $fecha, '1', $act_sem);
          
            echo $rspta? "Alumno registrado":"Alumno no se pudo registrar";
        }else {
          $rspta = $alumno->editar($id_alm, $nombre, $apellido, $telefono, $celular, $imagen, $estado_civil, $email, $direccion, $fech_nac, $napais, $naciudad, $naprovincia, $c_i,  $ciudad, $provincia, $distrito, $miembro, $fecha, '1', $act_sem);

            echo $rspta ? "Alumno Actualizado":"Alumno no se pudo actualizar";

        }


        break;
    case 'desactivar':
            $rspta = $alumno->desactivar($id_alm);
            echo $rspta ? "Alumno Desactivado":"Alumno no se puede desactivar";
        break;
    case 'activar':
        $rspta = $alumno->activar($id_alm);
        echo $rspta ? "Alumno Activada":"Alumno no se puede activar";
        break;
    case 'mostrar':
            $rspta = $alumno->mostrar($id_alm);
            //Codificar el resultado utilizando json

            echo json_encode($rspta);
        break;
    case 'listar':
            $rspta = $alumno->listar($de);
            //Vamos a declarar un array

            $data = array();
            while ($reg = $rspta->fetch_object()) {
                $data[]=array(
                    "0"=>($reg->estado) ?'<buton class="btn btn-warning" id="mostrars" onclick="mostrar('.$reg->id_alm.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-danger" onclick="desactivar('.$reg->id_alm.')"><i class="fa fa-close"></i></buton>':
                    '<buton class="btn btn-warning" onclick="mostrar('.$reg->id_alm.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-primary" onclick="activar('.$reg->id_alm.')"><i class="fa fa-check"></i></buton>',
                    "1"=>'<buton class="btn btn-success"  onclick="kardex('.$reg->id_alm.')"><i class="fa fa-print"></i></buton> <buton class="btn btn-primary" onclick="printr('.$reg->id_alm.')" ><i class="fa fa-eye" ></i></buton>',
                    "2"=>$reg->nombre .' '.$reg->apellido,
                    "3"=>$reg->email,
                    "4"=>$reg->telefono,
                    "5"=>$reg->celular,
                    "6"=>($reg->estado)?'<span class="label bg-success">Activada</span>':
                    '<span class="label bg-red">Desactivada</span>'

                );
            }
            $results = array(
                "sEcho"=>1, //Informacion para el datatables
                "iTotalRecords"=>count($data),//enviamos el total registros al datatables
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            echo json_encode($results);
        break;
        case 'selectPais':
            $rspta = $alumno->listartodo("lista_paises");
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->opcion.'</option>';
            }
          break;

          case 'selectCiudad':

            $rspta = $alumno->listartodo("ciudades");
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->nombre.'</option>';
            }
          break;
          case 'naCiudad':

            $rspta = $alumno->listarid("lista_estados", $_POST['id']);
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->opcion.'</option>';
            }
          break;
          case 'naProvincia':

            $rspta = $alumno->listarid("lista_provincias", $_POST['id']);
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->opcion.'</option>';
            }
          break;
          case 'Provincia':

            $rspta = $alumno->listarid("provincias", $_POST['id']);
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->opcion.'</option>';
            }
          break;
          case 'Distrito':

            $rspta = $alumno->listartodo("distritos");
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id_d.'>'.$reg->opcion.'</option>';
            }
          break;



}


?>
