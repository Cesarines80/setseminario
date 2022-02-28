<?php
//session_start();
require_once('../conexion/conexion.php');
//
//var_dump($_SESSION);

///
class Consultas
{


	private $grado;
	private $rango;
	private $alumno;
	private $alumno1;
	private $materia;
	private $materia1;
	private $docente;
	private $grupos;
	private $tecnico;
	private $tecnico1;
	private $licen;
	private $licen1;
	private $registro;
	private $semestre;
	private $promedio;
	private $sem;
	private $db;
  private $usuario1;

        public function __construc()
          {
            //require_once('../conexion/conexion.php');

            $this->grado = array();
            $this->rango = array();
            $this->alumno = array();
            $this->alumno1 = array();
            $this->materia = array();
            $this->materia1 = array();
            $this->docente = array();
            $this->grupos = array();
            $this->tecnico = array();
            $this->tecnico1 = array();
            $this->licen = array();
            $this->licen1 = array();
            $this->registro = array();
            $this->semestre = array();
            $this->promedio = array();
            $this->sem = array();
            $this->usuario1=array();
          }

    public function get_alum($id)
    {
      $con = new conexion();
      $mysqli = $con->conexion();
      $query = "SELECT * FROM alumnos WHERE id_alm = '$id' and estado = '1'";
      $resultado = $mysqli->query($query);
       $row = $resultado->fetch_assoc();
        $this->alumno[] = $row;

      return $this->alumno;
    }

    public function get_materia($i, $j)
    {
      $this->mat=array();
      //require_once('../conexion/conexion.php');
      $con = new conexion();
      $mysqli = $con->conexion();

       $query = "SELECT * FROM materias WHERE estado ='1'  LIMIT $i, $j ";
      $resultados = $mysqli->query($query);
     // $rows = $resultados->fetch_assoc();
      while($fila = $resultados->fetch_assoc())
      {
          $this->mat[]=$fila;
      }
      return $this->mat;
      $resultados -> free_result();

      $mysqli -> close();


    }

    public function get_notas($id, $id_mat){
      $this->notas=array();
      $con = new conexion();
      $mysqli = $con->conexion();
       $sql = "SELECT * from notas_historial where id_alm='$id' and id_mat='$id_mat'";

      $res= $mysqli->query($sql);
      //$reg = mysql_fetch_array($res);
      $row = $res->fetch_assoc();
      $this->notas[]=$row;

      return $this->notas;
        //echo $row['nota'];


    }

    public function get_registrover($n)
	{
    $this->registro=array();
    $con = new conexion();
    $mysqli = $con->conexion();
   	$sql = "select * from registro where activo = 1 and id_alm = $n";
		$res = $mysqli->query($sql);
    while($fila = $res->fetch_assoc())
    {
        $this->registro[]=$fila;
    }
    return $this->registro;
    $resultados -> free_result();

    $mysqli -> close();
	}
  public function get_materia_total($n)
	{
      $this->mater=array();
      $con = new conexion();
      $mysqli = $con->conexion();

		$sql = "select * from materias where id_mat=$n ";
		$res = $mysqli->query($sql);
		while ($reg = $res->fetch_assoc()) {
			$this->mater[] = $reg;
		}

		return $this->mater;
	}
  public function get_grado($n)
	{
      $this->grado=array();
      $con = new conexion();
      $mysqli = $con->conexion();

		$sql = "select * from grado_academico where id_grado=$n ";
		$res = $mysqli->query($sql);
		while ($reg = $res->fetch_assoc()) {
			$this->grado[] = $reg;
		}

		return $this->grado;
	}
  public function get_docentes($n)
	{
      $this->docente=array();
      $con = new conexion();
      $mysqli = $con->conexion();

		$sql1 = "select * from docentes where id_doc= '$n' ";
		$res1 = $mysqli->query($sql1);
		while ($reg1 = $res1->fetch_assoc()) {
			$this->docente[] = $reg1;
		}

		return $this->docente;
	}

  public function get_usuario($n)
	{
      $this->usuario1=array();
      $con = new conexion();
      $mysqli = $con->conexion();

		$sql1 = "select * from usuario where usu_id= '$n' ";
		$res1 = $mysqli->query($sql1);
		while ($reg1 = $res1->fetch_assoc()) {
			$this->usuario1[] = $reg1;
		}

		return $this->usuario1;
	}
//////////////CALCULAR PROMEDIO/////////////////////////
  public function promedio($d)
	{
    $this->promedio=array();
    $con = new conexion();
    $mysqli = $con->conexion();

	$sql = "select nota from notas_historial where id_alm='$d' and  nota > 60 ";
    $res = $mysqli->query($sql);
    $num = $res->num_rows;
		//while ($reg = $res->fetch_assoc()) {
			//$this->promedio[] = $reg1;
		//}
      $this->promedio[]=$num;
		return $this->promedio;

	}
  public function promedio_si($d)
	{
    $this->prom=array();
    $con = new conexion();
    $mysqli = $con->conexion();

	$sql = "select nota from notas_historial where id_alm='$d' and  nota > 60 ";
    $res = $mysqli->query($sql);
    //$num = $res->num_rows;

		while ($reg = $res->fetch_assoc()) {
			$this->prom[] = $reg;
		}
      //$this->promedio[]=$num;
		return $this->prom;

	}
  public function get_historial($d, $ide)
	{
    $this->hist=array();
    $con = new conexion();
    $mysqli = $con->conexion();

	$sql = "select nota from notas_historial where id_alm='$d' and  id_mat = '$ide' ";
    $res = $mysqli->query($sql);
    //$num = $res->num_rows;

		while ($reg = $res->fetch_assoc()) {
			$this->hist[] = $reg;
		}
      //$this->promedio[]=$num;
		return $this->hist;

	}
  public function get_materia_doc($d)
	{
    $this->matdoc=array();
    $con = new conexion();
    $mysqli = $con->conexion();

	$sql = "select * from apermateria where id_doce= $d  and activo = 1";
    $res = $mysqli->query($sql);
    //$num = $res->num_rows;

		while ($reg = $res->fetch_assoc()) {
			$this->matdoc[] = $reg;
		}
      //$this->promedio[]=$num;
		return $this->matdoc;

	}
  public function get_num_mat($d)
	{
    $this->numdoc=array();
    $con = new conexion();
    $mysqli = $con->conexion();

	$sql = "select * from apermateria where id_doce= $d  and activo = 1";
    $res = $mysqli->query($sql);
    $num = $res->num_rows;


			$this->numdoc[] = $num;

      //$this->promedio[]=$num;
		return $this->numdoc;

	}
  public function get_registro($ide)
	{
    $this->regis=array();
    $con = new conexion();
    $mysqli = $con->conexion();

	 $sql = "select * from registro where id_mat= '$ide'  and activo = 1";
    $res = $mysqli->query($sql);
    //$num = $res->num_rows;

		while ($reg = $res->fetch_assoc()) {
			$this->regis[] = $reg;
		}
      //$this->promedio[]=$num;
		return $this->regis;

	}
  public function aper_notas_historial($n, $m)
	{
		//print_r($_POST); exit;
    $con = new conexion();
    $mysqli = $con->conexion();

		$id = $_POST['nota'];


		$sql = "UPDATE notas_historial
					SET nota = $id WHERE id_mat =$n and id_alm = $m";
		//exit;
		$res = $mysqli->query($sql);
		header("Location: notasalm.php?id_mat=$n");
	}

  public function cerrarmateria($n)
	{
		//print_r($n);

    $con = new conexion();
    $mysqli = $con->conexion();
		$sql = "UPDATE apermateria
					SET activo = '0' WHERE id_aper =$n";
		//exit;
		$res = $mysqli->query($sql);

    $sqlis = "select * from apermateria where id_aper= '$n'  ";
    $resi = $mysqli->query($sqlis);
    $regi = $resi->fetch_assoc();
    $docente = $regi['id_doce'];
     $materass = $regi['id_materia'];
      //var_dump($regi);
      //exit;
      //id_mteria  //id_doce

     $sqliss = "SELECT * from registro where id_mat= '$materass' and id_doc = '$docente'  ";
      $resis = $mysqli->query($sqliss);

      while ($reg = $resis->fetch_assoc()) {

        $sqli = "UPDATE registro
					SET activo = '0' WHERE id_doc =$docente";
          $res = $mysqli->query($sqli);




        //var_dump($reg);

      }

      //$sqli = "UPDATE registro
				//	SET activo = '0' WHERE id_aper =$n";

    //exit;
		//$res = $mysqli->query($sqli);





		header("Location: semestre.php");




	}
}
