<?php
session_start();

class Conectar
{

	public  static function con()
	{
		$con = mysql_connect("localhost", "setbolivia_seti", "Casimiro11#");
		if (!$con) {
			throw new Exception("error de conexion", mysql_error());
		}

		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("setbolivia_set");
		return $con;
	}
}
?> 
	
	<?php
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
		public function __construc()
		{
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
		}

		public function get_alumno2($ide)
		{
			$sql = "select * from alumnos where id_alm='" . $ide . "'";
			$res = mysql_query($sql, Conectar::con());
			while ($reg = mysql_fetch_assoc($res)) {
				$this->alumno1[] = $reg;
			}
			return $this->alumno1;
		}

		public function get_materia11()
	{
		$sql="select * from materias limit 0, 20";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->materia[]=$reg;
			}
	
	  return $this->materia;	
	}
	public function get_materiasup()
	{
		$sql="select * from materias limit 27 , 14";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->tecnico[]=$reg;
			}
	
	  return $this->tecnico;	
	}
	public function get_materia5()
	{
		$sql="select * from materias limit 21, 5";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->licen[]=$reg;
			}
	
	  return $this->licen;	
	}
	}
