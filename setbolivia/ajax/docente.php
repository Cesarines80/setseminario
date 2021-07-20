<?php
session_start();
require_once "../modelos/Docente.php";

$docente = new Docente();

$d = $_SESSION['id'];
$usuciu = $docente->usuci("usuario", $d);
$reg = $usuciu->fetch_object();
$de=$reg->ciudad;


$id_doc = isset($_POST["id_doc"])?limpiarCadena($_POST["id_doc"]):"";
//var_dump($id_alm);
$nombre = isset($_POST["nombre"])?limpiarCadena($_POST["nombre"]):"";
$apellido = isset($_POST["apellido"])?limpiarCadena($_POST["apellido"]):"";
$telefono = isset($_POST["telefono"])?limpiarCadena($_POST["telefono"]):"";
$celular = isset($_POST["celular"])?limpiarCadena($_POST["celular"]):"";
$imagen = isset($_POST["imagen"])?limpiarCadena($_POST["imagen"]):"";
$fech_nac = isset($_POST["fech_nac"])?limpiarCadena($_POST["fech_nac"]):"";
$sexo = isset($_POST["sexo"])?limpiarCadena($_POST["sexo"]):"";
$ci = isset($_POST["ci"])?limpiarCadena($_POST["ci"]):"";
$email = isset($_POST["email"])?limpiarCadena($_POST["email"]):"";
$especialidad = isset($_POST["especialidad"])?limpiarCadena($_POST["especialidad"]):"";
$departamento = isset($_POST["departamento"])?limpiarCadena($_POST["departamento"]):"";
$provincia = isset($_POST["provincia"])?limpiarCadena($_POST["provincia"]):"";
$distrito = isset($_POST["distrito"])?limpiarCadena($_POST["distrito"]):"";
$activo = '1';
switch ($_GET["op"]) {
    case 'guardaryeditar':
      if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        $imagen = $_POST["imagenactual"];
    }else {

        $ext = explode(".", $_FILES["imagen"]["name"]);
        if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"  ) {
            $imagen = round(microtime(true)).'.'. end($ext);
            move_uploaded_file($_FILES['imagen']['tmp_name'], "../files/docentes/".$imagen);
        }
    }
        if (empty($id_doc)) {
            $rspta = $docente->insertar($nombre, $apellido, $telefono, $celular, $imagen, $fech_nac, $sexo, $ci, $email, $especialidad, $departamento, $provincia, $distrito, $activo);

            echo $rspta? "Docente registrado":"Docente no se pudo registrar";
        }else {
          $rspta = $docente->editar($id_doc, $nombre, $apellido, $telefono, $celular, $imagen, $fech_nac, $sexo, $ci, $email, $especialidad, $departamento, $provincia, $distrito, $activo);

            echo $rspta ? "Docente Actualizado":"Docente no se pudo actualizar";

        }


        break;
    case 'desactivar':
            $rspta = $docente->desactivar($id_doc);
            echo $rspta ? "Docente Desactivado":"Docente no se puede desactivar";
        break;
    case 'activar':
        $rspta = $docente->activar($id_doc);
        echo $rspta ? "Docente Activada":"Docente no se puede activar";
        break;
    case 'mostrar':
            $rspta = $docente->mostrar($id_doc);
            //Codificar el resultado utilizando json

            echo json_encode($rspta);
        break;
    case 'listar':
            $rspta = $docente->listar($de);
            //Vamos a declarar un array
            $data = array();
            while ($reg = $rspta->fetch_object()) {
                $data[]=array(
                    "0"=>($reg->activo) ?'<buton class="btn btn-warning" id="mostrars" onclick="mostrar('.$reg->id_doc.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-danger" onclick="desactivar('.$reg->id_doc.')"><i class="fa fa-close"></i></buton>':
                    '<buton class="btn btn-warning" onclick="mostrar('.$reg->id_doc.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-primary" onclick="activar('.$reg->id_doc.')"><i class="fa fa-check"></i></buton>',
                    "1"=>$reg->nombre .' '.$reg->apellido,
                    "2"=>$reg->email,
                    "3"=>$reg->telefono,
                    "4"=>$reg->celular,
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
        case 'categoria':
            $rspta = $docente->listartodo("categoria");
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id_cat.'>'.$reg->categoria.'</option>';
            }
          break;

          case 'selectCiudad':

            $rspta = $docente->listartodo("ciudades");
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->nombre.'</option>';
            }
          break;
          case 'naCiudad':

            $rspta = $docente->listarid("lista_estados", $_POST['id']);
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->opcion.'</option>';
            }
          break;
          case 'naProvincia':
            echo  '<option value=""></option>';
            $rspta = $docente->listarid("lista_provincias", $_POST['id']);

            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->opcion.'</option>';
            }
          break;
          case 'Provincia':

            $rspta = $docente->listarid("provincias", $_POST['id']);
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->opcion.'</option>';
            }
          break;
          case 'Distrito':

            $rspta = $docente->listartodo("distritos");
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id_d.'>'.$reg->opcion.'</option>';
            }
          break;



}


?>
