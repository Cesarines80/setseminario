<?php

require_once"../config/conexion.php";



class Listalumnos
{
    public function __construct()
    {

    }

    public function listar($id)
    {

        $sql = "SELECT alumnos.nombre as nombre , alumnos.apellido as apellido,
        materias.descripcion as materia , docentes.nombre as nombredoc,
        docentes.apellido as apellidodoc, apersemestre.semestre as semestre
        FROM notas_historial
                INNER JOIN materias ON materias.id_mat=notas_historial.id_mat

                INNER JOIN  docentes ON docentes.id_doc=notas_historial.docente
                INNER JOIN alumnos ON alumnos.id_alm = notas_historial.id_alm
                INNER JOIN apermateria ON apermateria.id_materia=materias.id_mat
                INNER JOIN apersemestre ON apersemestre.id=apermateria.semestre
                WHERE apermateria.activo = '1' and apermateria.id_depto = '1' and alumnos.act_sem='1'";
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
