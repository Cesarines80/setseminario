<?php

require_once"../config/conexion.php";



class Materia
{
    public function __construct()
    {

    }
    //Implementamos un metodo para insertr registros
    public function insertar($id_materia, $id_depto, $id_usu, $id_doce, $fecha, $semestre, $activo)
    {
         $sql = "INSERT INTO apermateria (id_materia, id_depto, id_usu, id_doce, fecha, semestre, activo)
        VALUES ('$id_materia', '$id_depto', '$id_usu', '$id_doce', '$fecha', '$semestre', '$activo')";

      return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para editar registros
    public function editar($id_aper, $id_materia, $id_depto, $id_usu, $id_doce, $fecha, $semestre, $activo)
    {
        $sql = "UPDATE apermateria SET
        id_materia ='$id_materia', id_depto='$id_depto', id_usu='$id_usu',
        id_doce = '$id_doce', fecha='$fecha', semestre='$semestre', activo='$activo'
        WHERE id_aper = '$id_aper'";

        return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para eliminar categorias
    public function desactivar($id_aper)
    {
        $sql = "UPDATE apermateria SET activo = '0' WHERE id_aper = '$id_aper'";
        return ejecutarConsulta($sql);
    }
    public function activar($id_aper)
    {
        $sql = "UPDATE apermateria SET activo = '1' WHERE id_aper = '$id_aper'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id_aper)
    {
       $sql = "SELECT apermateria.id_aper as id_aper, apermateria.id_materia as id_materia,
       apermateria.id_doce as id_doce, apermateria.fecha as fecha,
       apermateria.semestre as semestre, grado_academico.id_grado as grado FROM `apermateria`
       INNER JOIN materias ON materias.id_mat=apermateria.id_materia
       INNER JOIN grado_academico ON grado_academico.id_grado=materias.id_grado
        WHERE id_aper = '$id_aper'";

        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar($id)
    {

      $sql = "SELECT apermateria.id_aper as id_aper, materias.descripcion as materia,
      docentes.nombre as nombre, docentes.apellido as apellido, apermateria.fecha as fecha,
      apersemestre.semestre as semestre , grado_academico.nivel as grado, apermateria.activo FROM apermateria
      INNER JOIN docentes ON docentes.id_doc = apermateria.id_doce
      INNER JOIN apersemestre ON apersemestre.id = apermateria.semestre
      INNER JOIN materias ON materias.id_mat= apermateria.id_materia
      INNER JOIN grado_academico ON grado_academico.id_grado = materias.id_grado
      where apermateria.id_depto = $id and apersemestre.activo = 1";
        return ejecutarConsulta($sql);
    }
    public function listartodo($tabla)
    {
        $sql = "SELECT * FROM $tabla";
        return ejecutarConsulta($sql);
    }
    public function listargrado($tabla)
    {
        $sql = "SELECT * FROM $tabla where   activo = 1 ";
        return ejecutarConsulta($sql);
    }
    public function listarmaterias($id)
    {
        $sql = "SELECT * FROM materias where id_grado = $id and estado = 1 ";
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
    public function docenteciudad($id)
    {
        $sql = "SELECT * FROM docentes WHERE departamento=$id";
        return ejecutarConsulta($sql);
    }
    public function semestreciudad($id)
    {
        $sql = "SELECT * FROM apersemestre WHERE id_depto=$id";
        return ejecutarConsulta($sql);
    }


}

?>
