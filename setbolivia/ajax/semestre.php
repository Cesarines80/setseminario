<?php
session_start();
require_once "../modelos/Semestre.php";



$sem = new Semestre();
$d = $_SESSION['id'];

$usuciu = $sem->usuci("usuario", $d);
$reg = $usuciu->fetch_object();
$de=$reg->ciudad;


$id = isset($_POST["id"])?limpiarCadena($_POST["id"]):"";
//var_dump($id_alm);
$semestre = isset($_POST["semestre"])?limpiarCadena($_POST["semestre"]):"";
$fechainicio = isset($_POST["fechainicio"])?limpiarCadena($_POST["fechainicio"]):"";
$fechafinal = isset($_POST["fechafinal"])?limpiarCadena($_POST["fechafinal"]):"";
$id_depto = isset($_POST["id_depto"])?limpiarCadena($_POST["id_depto"]):"";
$id_usu = isset($_POST["id_usu"])?limpiarCadena($_POST["id_usu"]):"";
$activo = '1';

switch ($_GET["op"]) {
    case 'guardaryeditar':

        if (empty($id)) {
            $rspta = $sem->insertar($semestre, $fechainicio, $fechafinal, $de, $d, $activo);

            echo $rspta? "Semestre registrado":"Semestre no se pudo registrar";
        }else {
          $rspta = $sem->editar($id, $semestre, $fechainicio, $fechafinal, $de, $d, $activo);

            echo $rspta ? "Semestre Actualizado":"Semestre no se pudo actualizar";

        }


        break;
    case 'desactivar':
            $rspta = $sem->desactivar($id);
            echo $rspta ? "Semestre Desactivado":"Semestre no se puede desactivar";
        break;
    case 'activar':
        $rspta = $sem->activar($id);
        echo $rspta ? "Semestre Activada":"Semestre no se puede activar";
        break;
    case 'mostrar':
            $rspta = $sem->mostrar($id);
            //Codificar el resultado utilizando json

            echo json_encode($rspta);
        break;
    case 'listar':



            $rspta = $sem->listar($de);

            //Vamos a declarar un array
            $data = array();
            while ($reg = $rspta->fetch_object()) {
                $data[]=array(
                    "0"=>($reg->activo) ?'<buton class="btn btn-warning" id="mostrar" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-danger" onclick="desactivar('.$reg->id.')"><i class="fa fa-close"></i></buton>':
                    '<buton class="btn btn-warning" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-primary" onclick="activar('.$reg->id.')"><i class="fa fa-check"></i></buton>',
                    "1"=>$reg->semestre,
                    "2"=>$reg->fechainicio,
                    "3"=>$reg->fechafinal,
                    "4"=>'<buton class="btn btn-primary" onclick="printr('.$reg->id_alm.')" ><i class="fa fa-closed-captioning" ></i></buton>',
                    "5"=>($reg->activo)?'<span class="label bg-success">Activada</span>':
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

}


?>
