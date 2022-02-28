<?php

require_once"../config/conexion.php";



class Listadocentes
{
    public function __construct()
    {

    }

    public function listar($id)
    {

        $sql = "SELECT docentes.nombre as nombre , docentes.apellido as apellido, materias.descripcion as materia,  grado_academico.nivel as grado, apersemestre.semestre as semestre FROM apermateria
        INNER JOIN materias ON materias.id_mat=apermateria.id_materia
        INNER JOIN apersemestre ON apersemestre.semestre = apermateria.semestre
        INNER JOIN  docentes ON docentes.id_doc=apermateria.id_doce
        INNER JOIN  grado_academico ON grado_academico.id_grado = materias.id_grado
        where apermateria.id_depto = $id and apermateria.activo = '1'";
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


}

?>
