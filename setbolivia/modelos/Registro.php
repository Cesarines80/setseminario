<?php

require_once"../config/conexion.php";



class Registro
{
    public function __construct()
    {

    }
    //Implementamos un metodo para insertr registros
    public function insertar1($id_alm, $id_mat, $fecha, $id_doc, $id_grupo, $id_ciudad, $activo)
    {
         $sql = "INSERT INTO registro (id_alm, id_mat, fecha, id_doc, id_grupo, id_ciudad activo)
        VALUES ('$id_alm', '$id_mat', '$fecha', '$id_doc', '$id_grupo', '$id_ciudad', '$activo')";

      return ejecutarConsulta($sql);
    }
    //Implementamos un método para insertar registros
    // semestre = id_semestre
	public function insertar($id_alm, $id_aper, $fecha, $id_doc, $semestre, $de, $activo)
	{
    $sql = "INSERT INTO registro (id_alm, id_mat, fecha, id_doc, id_grupo, id_ciudad, activo)
    VALUES ('$id_alm', '0', NOW(), '0', '$semestre', '$de', '1')";
    // ejecutarConsulta($sql);
		$idregnew=ejecutarConsulta_retonarID($sql);
     // echo $idregnew;
		$array = $id_aper;
    $sw=true;
    foreach ($array as $valor) {

      $mat = new Registro();
      $materiaaper = $mat->materiaper($valor);
      $aray= $materiaaper->fetch_object();

     $id_mat =$aray->id_materia;
     $docente =$aray->id_doce;

      $sql1 = "INSERT INTO notas_historial VALUES (null,'$id_alm','$id_mat',0,NOW(),'$idregnew','$docente',1)";
      //var_dump($sql1);
     // exit();

      ejecutarConsulta($sql1);
    }
    $sqls = "UPDATE alumnos
    SET act_sem = '1' WHERE id_alm = $id_alm";
    //exit;
    ejecutarConsulta($sqls);


		return $sw;
	}
    //Implementamos un metodo para editar registros
    public function editar($id_reg, $id_alm, $id_mat, $fecha, $id_doc, $id_grupo, $id_ciudad, $activo)
    {
        $sql = "UPDATE registro SET
        id_alm ='$id_alm', id_mat='$id_mat', fecha='$fecha',
        id_doc = '$id_doc', id_grupo='$id_grupo', id_ciudad='$id_ciudad', activo='$activo'
        WHERE id_reg = '$id_reg'";

        return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para eliminar categorias
    public function desactivar($id)
    {
        $sql = "UPDATE registro SET activo = '0' WHERE id_reg = '$id'";
        return ejecutarConsulta($sql);
    }
    public function activar($id)
    {
        $sql = "UPDATE registro SET activo = '1' WHERE id_reg = '$id'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id)
    {
      $sql = "SELECT * FROM registro WHERE id_reg = '$id'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar($id)
    {

        $sql = "SELECT registro.id_reg as id_reg, alumnos.nombre as nombre , alumnos.apellido as apellido,
         registro.fecha as fecha, apersemestre.semestre as semestre, registro.activo as activo  FROM registro
        INNER JOIN alumnos ON alumnos.id_alm = registro.id_alm
        INNER JOIN apersemestre ON apersemestre.id = registro.id_grupo
       where registro.id_ciudad  = $id and registro.activo = 1";
        return ejecutarConsulta($sql);
    }
    public function listartodo($tabla)
    {
        $sql = "SELECT * FROM $tabla";
        return ejecutarConsulta($sql);
    }
    public function listaraper($id)
    {

        $sql = "SELECT apermateria.id_aper, apermateria.id_materia, apermateria.id_depto, apermateria.id_usu,
        apermateria.id_doce, apermateria.fecha, apersemestre.semestre, apermateria.activo, apersemestre.id as id_sem FROM apermateria
        INNER JOIN apersemestre ON apersemestre.id = apermateria.semestre WHERE apermateria.id_aper = $id";

        return ejecutarConsulta($sql);
    }
    public function apermateria($id)
    {
        $sql = "SELECT materias.descripcion, materias.id_mat, apermateria.id_aper FROM apermateria
        INNER JOIN materias ON materias.id_mat=apermateria.id_materia
        WHERE apermateria.id_depto = $id AND  apermateria.activo = 1";

        return ejecutarConsulta($sql);
    }
    public function materiaper($id)
    {
         $sql = "SELECT * FROM apermateria
        WHERE id_aper = $id";

        return ejecutarConsulta($sql);
    }


    public function get_usuario($id)
    {
        $sql = "SELECT * FROM usuario where id_usu = '$id' ";
        return ejecutarConsulta($sql);
    }

    public function usuci($tabla,$id)
    {
        $sql = "SELECT * FROM $tabla where usu_id = '$id' ";
        return ejecutarConsulta($sql);
    }

    //Implementamos un metodo para eliminar categorias
    public function desactivarmat($id_his)
    {
        $sql = "UPDATE notas_historial SET activo = '0' WHERE id_his = '$id_his'";
        return ejecutarConsulta($sql);
    }
    public function activarmat($id_his)
    {
        $sql = "UPDATE notas_historial SET activo = '1' WHERE id_his = '$id_his'";
        return ejecutarConsulta($sql);
    }


}

?>
