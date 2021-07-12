<?php
session_start();

class Conectar
{

	public  static function con()
	{
		$con = mysql_connect("localhost", "db_sistema", "Casimiro11");
		if (!$con) {
			throw new Exception("error de conexion", mysql_error());
		}

		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("setboliv_set");
		return $con;
	}
}
?>
<!-----                        _  _              
                                | || |             
   ___  ___   _ __   ___  _   _ | || |_  __ _  ___ 
  / __|/ _ \ | '_ \ / __|| | | || || __|/ _` |/ __|
 | (__| (_) || | | |\__ \| |_| || || |_| (_| |\__ \
  \___|\___/ |_| |_||___/ \__,_||_| \__|\__,_||___/
  ---->
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
	private $promedio;
	private $sem;
	private $db;
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
		$this->promedio = array();
		$this->sem = array();
	}
		public function nueva_sesion()
	{
		//recogemos las variables post del formulario
		$nombre = $_POST['nom'];
		$password = $_POST['pass'];
		//realizamos la consulta sql 
		//colocamos script_tags para eliminar las etiquetas html y php, por si vienen
		$query = "SELECT 
		* 
		FROM
		usuario
		WHERE usu_login='" . strip_tags($nombre) . "' 
		AND
		usu_pass='" . strip_tags($password) . "' 
		AND
		activo='1'";
		//ejecutamos la consulta y guardamos el resultado en la variable resultado
		$resultado = mysql_query($query, Conectar::con());
		//si el número de filas devuelto por la variable resultado es 1,
		//lo que significa que en la base de datos blog, en la tabla usuarios
		//existe una fila que coincide con los datos ingresados
		//nos envíe a logueado.php, que sería como el home de nuestra página,
		//en otro caso, nos deja en nueva_sesion, con una variable get llamada usuario
		//y con el valor no_existe
		if ($reg = mysql_num_rows($resultado) == 0) {
			header("Location:login.php?usuario=no_existe");
		} else {
		}
		if ($reg = mysql_fetch_array($resultado)) {

			$_SESSION['nick'] = $reg['usu_login'];
			$_SESSION['ides'] = $reg['usu_id'];
			$_SESSION['dep'] = $reg['ciudad'];

			if ($reg['usu_sw'] == 2) {
				header("Location:administracion.php");
			} else {
				header("Location:admin.php");
			}
		}
	}

	public function nueva_docente()
	{
		//recogemos las variables post del formulario
		$nombre = $_POST['nom'];
		$password = $_POST['pass'];
		//realizamos la consulta sql 
		//colocamos script_tags para eliminar las etiquetas html y php, por si vienen
		$query = "SELECT 
		* 
		FROM
		docentes
		WHERE nombre='" . strip_tags($nombre) . "' 
		AND
		ci='" . strip_tags($password) . "';";
		//ejecutamos la consulta y guardamos el resultado en la variable resultado
		$resultado = mysql_query($query, Conectar::con());
		//si el número de filas devuelto por la variable resultado es 1,
		//lo que significa que en la base de datos blog, en la tabla usuarios
		//existe una fila que coincide con los datos ingresados
		//nos envíe a logueado.php, que sería como el home de nuestra página,
		//en otro caso, nos deja en nueva_sesion, con una variable get llamada usuario
		//y con el valor no_existe
		if ($reg = mysql_num_rows($resultado) == 0) {
			header("Location:logindocente.php?usuario=no_existe");
		} else {
		}
		if ($reg = mysql_fetch_array($resultado)) {
			$_SESSION['nick'] = $reg['nombre'];
			$_SESSION['apellido'] = $reg['apellido'];
			$_SESSION['id'] = $reg['id_doc'];
			header("Location:admindocente.php");
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////PRODEDIO DE NOTAS /////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function promedio()
	{

		$sql = "select nota from notas_historial where id_alm='" . $_GET["alumno"] . "' and  nota > 60 ";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {

			$this->promedio[] = $reg;
		}

		return $this->promedio;
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function nueva_alumno()
	{
		//recogemos las variables post del formulario
		$nombre = $_POST['nom'];
		$password = $_POST['pass'];
		//realizamos la consulta sql 
		//colocamos script_tags para eliminar las etiquetas html y php, por si vienen
		$query = "SELECT 
		* 
		FROM
		alumnos
		WHERE nombre='" . strip_tags($nombre) . "' 
		AND
		c_i='" . strip_tags($password) . "';";
		//ejecutamos la consulta y guardamos el resultado en la variable resultado
		$resultado = mysql_query($query, Conectar::con());
		//si el número de filas devuelto por la variable resultado es 1,
		//lo que significa que en la base de datos blog, en la tabla usuarios
		//existe una fila que coincide con los datos ingresados
		//nos envíe a logueado.php, que sería como el home de nuestra página,
		//en otro caso, nos deja en nueva_sesion, con una variable get llamada usuario
		//y con el valor no_existe
		if ($reg = mysql_num_rows($resultado) == 0) {
			header("Location:loginalumno.php?usuario=no_existe");
		} else {
		}
		if ($reg = mysql_fetch_array($resultado)) {
			$_SESSION['nick'] = $reg['nombre'];
			$_SESSION['ide'] = $reg['id_alm'];
			header("Location:./alumno/adminalumno.php");
		}
	}
	public function get_usuario($n)
	{
		$sql = "select * from usuario where usu_id = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {

			$this->grado[] = $reg;
		}

		return $this->grado;
	}

	public function get_grado()
	{
		$sql = "select * from grado_academico";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {

			$this->grado[] = $reg;
		}

		return $this->grado;
	}
	public function get_notas_historial($n, $m)
	{


		$sql = "select * from notas_historial where id_mat = $n and id_alm =$m";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {

			$this->grado[] = $reg;
		}

		return $this->grado;
	}
	public function get_grado1($n)
	{

		$sql = "select * from grado_academico where id_grado = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {

			$this->grado[] = $reg;
		}

		return $this->grado;
	}
	public function get_rango()
	{
		$sql = "select * from categoria";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {

			$this->rango[] = $reg;
		}

		return $this->rango;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////Registro de materias////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///
	public function get_apermateria($n)
	{   //echo $n; exit;
		$sql = "select * from apermateria where activo = 1 and id_materia = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->alumno[] = $reg;
		}
		return $this->alumno;
	}
	public function get_alumnociudad($n)
	{   //echo $n; exit;
		$sql = "select * from alumnos where ciudad = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->alumno[] = $reg;
		}
		return $this->alumno;
	}
	public function get_alumno()
	{
		$sql = "select * from alumnos";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->alumno[] = $reg;
		}
		return $this->alumno;
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function get_alumno1()
	{

		$sql = "select * from alumnos where id_alm='" . $_GET["alumno"] . "'";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->alumno[] = $reg;
		}
		return $this->alumno;
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
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function get_materia()
	{
		$sql = "select * from materias where estado = 1";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->materia[] = $reg;
		}

		return $this->materia;
	}
	public function get_materiareg($n)
	{
		$sql = "select * from materias where id_mat = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->materia[] = $reg;
		}

		return $this->materia;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function get_materiaactivas($n)
	{
		$d = $_SESSION['ides'];
		//var_dump($d); 
		//exit();
		$sql = "select * from apermateria where activo = 1 and id_depto = $n and id_usu = $d";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->materia[] = $reg;
		}

		return $this->materia;
	}
	

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function get_materiaing($n)
	{

		$sql = "select * from materias where id_grado=$n ";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->materia[] = $reg;
		}

		return $this->materia;
	}

	public function get_registrover($n)
	{

		$sql = "select * from registro where activo = 1 and id_alm = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->registro[] = $reg;
		}

		return $this->registro;
	}
	public function get_registro($n)
	{
		$sql = "select * from notas_historial where id_alm = $n and activo='1' ";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->materia[] = $reg;
		}

		return $this->materia;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function get_materiaingactiva($n)
	{


		$sql = "select * from materias where id_mat=$n ";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->materia[] = $reg;
		}

		return $this->materia;
	}

	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function get_semestreact($n)
	{


		$sql = "select * from apersemestre where id=$n ";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->sem[] = $reg;
		}

		return $this->sem;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function get_semestreactiva($n)
	{


		$sql = "select * from materias where id_mat=$n ";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->materia[] = $reg;
		}

		return $this->materia;
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////Diplomado en Teologia///////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
	public function get_materia1()
	{
		$sql = "select * from materias limit 0, 10";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->materia[] = $reg;
		}

		return $this->materia;
	}
	public function get_materia11()
	{
		$sql = "select * from materias limit 0, 20";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->materia[] = $reg;
		}

		return $this->materia;
	}
	public function get_materia2()
	{
		$sql = "select * from materias limit 10 , 10";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->materia1[] = $reg;
		}

		return $this->materia1;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////Tecnico en Teologia////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function get_materia3()
	{
		$sql = "select * from materias limit 27 , 8";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->tecnico[] = $reg;
		}

		return $this->tecnico;
	}
	public function get_materia4()
	{
		$sql = "select * from materias limit 35 , 6";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->tecnico1[] = $reg;
		}

		return $this->tecnico1;
	}

	public function get_materiasup()
	{
		$sql = "select * from materias limit 26 , 15";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->tecnico[] = $reg;
		}

		return $this->tecnico;
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////Licenciatura en Teologia////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function get_materia5()
	{
		$sql = "select * from materias limit 21, 5";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->licen[] = $reg;
		}

		return $this->licen;
	}
	public function get_materia6()
	{
		$sql = "select * from materias limit 47 , 7";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->licen1[] = $reg;
		}

		return $this->licen1;
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * Muestra docentes desde el id
	 * 
	 */
	public function get_docentebus($n)
	{
		//print_r($_GET);
		//exit;
		$sql = "select * from docentes where id_doc = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->docente[] = $reg;
		}
		return $this->docente;
	}
	public function usuariobus($n)
	{
		//print_r($_GET);
		//exit;
		$sql = "select * from usuario where usu_id = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->docente[] = $reg;
		}
		return $this->docente;
	}
	public function get_notas_his($n, $k)
	{
		$sql = "select * from notas_historial where id_mat = $n and id_alm =$k";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {

			$this->grado[] = $reg;
		}

		return $this->grado;
	}

	public function get_docente($n)
	{
		$sql = "select * from docentes where activo = 1 and departamento = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->docente[] = $reg;
		}
		return $this->docente;
	}
	public function get_trimestre($n)
	{
		$sql = "select * from apersemestre where activo = 1 and id_depto = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->semestre[] = $reg;
		}
		return $this->semestre;
	}
	public function get_docente1()
	{
		$sql = "select * from docentes";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->docente[] = $reg;
		}
		return $this->docente;
	}
	public function get_docente2($n)
	{
		$sql = "select * from docentes where departamento = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->docente[] = $reg;
		}
		return $this->docente;
	}
	public function get_grupos()
	{
		$sql = "select * from grupos";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->grupos[] = $reg;
		}
		return $this->grupos;
	}
	public function get_ciudad()
	{
		$sql = "select * from ciudad";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->grupos[] = $reg;
		}
		return $this->grupos;
	}
	public function get_ciudades()
	{
		$sql = "select * from ciudades";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->grupos[] = $reg;
		}
		return $this->grupos;
	}
	public function get_ciudadess($n)
	{
		$sql = "select * from ciudades where id=$n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->grupos[] = $reg;
		}
		return $this->grupos;
	}
	public function get_ciudadselect($n)
	{
		$sql = "select * from ciudades where id = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->grupos[] = $reg;
		}
		return $this->grupos;
	}
	public function get_usuarioselect($n)
	{
		$sql = "select * from usuario where usu_id = $n";
		$res = mysql_query($sql, Conectar::con());
		while ($reg = mysql_fetch_assoc($res)) {
			$this->grupos[] = $reg;
		}
		return $this->grupos;
	}
}

class Ingresar
{
	public function post_grado()
	{
		//print_r($_POST);
		$sql = "select sigla from materias where `sigla` ='" . $_POST["sigla"] . "' ";
		$res = mysql_query($sql, Conectar::con());
		if (mysql_num_rows($res) == 0) {
			$query = "insert into materias values (null,'" . $_POST["sigla"] . "','" . $_POST["materia"] .
				"','" . $_POST["creditos"] . "','" . $_POST["grado"] . "','" . $_POST["activo"] . "',1)";
			mysql_query($query, Conectar::con());
			header("Location: ingmaterias.php?m=1");
		} else {
			//header("Location: ingmaterias.php?m=2");
		}
	}
	public function aper_materia()
	{
		//print_r($_POST);

		$sql = "UPDATE materias
					SET activo = '1' WHERE id_mat ='" . $_POST["materia"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: materiasemestre.php");
	}
	public function aper_notas_historial($n, $m)
	{
		//print_r($_POST); exit;
		$id = $_POST['nota'];


		$sql = "UPDATE notas_historial
					SET nota = $id WHERE id_mat =$n and id_alm = $m";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: notasalm.php?id_mat=$n");
	}
	public function aper_notas_historial_in($n, $m)
	{
		//print_r($_POST); exit;
		$id = $_POST['nota'];


		$sql = "UPDATE notas_historial
					SET nota = $id , activo ='0' WHERE id_mat =$n and id_alm = $m";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		/* $sql1="UPDATE registro
					SET activo = 0 WHERE id_mat =$n and id_alm = $m"; 
					//exit;
	   $res1=mysql_query($sql1,Conectar::con());*/
		header("Location: notas.php");
	}
	public function post_usuarios()
	{
		//print_r($_POST); exit;
		$sql = "insert into usuario values (null,'" . ucwords($_POST["nombre"]) . "','" . ucwords($_POST["apellido"]) . "','" . $_POST["telefono"] . "','" . $_POST["login"] . "','" . $_POST["password"] . "',1,'" . $_POST["direccion"] . "','" . $_POST["email"] . "','" . $_POST["ciudad2"] . "')";
		mysql_query($sql, Conectar::con());
		header("Location: usuarios.php");
	}

	public function post_docentes()
	{
		//print_r($_POST);
		$sql = "insert into docentes values (null,'" . ucwords($_POST["nombre"]) . "','" . ucwords($_POST["apellido"]) . "','" . $_POST["telefono"] . "','" . $_POST["celular"] . "','" . $_POST["sexo"] . "','" . $_POST["ci"] . "','" . $_POST["email"] . "','" . $_POST["grado"] . "','" . $_POST["ciudad2"] . "','" . $_POST["provincia1"] . "','" . $_POST["distrito"] . "',1)";
		mysql_query($sql, Conectar::con());
		header("Location: docente.php");
	}

	public function post_registro()
	{
		$array = $_POST['materia'];



		$d = $_SESSION['ides'];
		$odd = new Consultas();
		$ciudad = $odd->get_usuario($d);
		foreach ($array as $valor) {

			$obb = new Consultas();
			$aper = $obb->get_apermateria($valor);

			//echo $aper[0]["id_doce"];
			//var_dump($aper);
			//exit;
			$sql = "insert into registro values (null,'" . $_POST["alumno"] . "','" . $valor . "',now(),'" . $aper[0]["id_doce"] . "',0,'" . $ciudad[0]['ciudad'] . "',1)";
			mysql_query($sql, Conectar::con());
			$sql1 = "insert into notas_historial values (null,'" . $_POST["alumno"] . "','" . $valor . "',0,now(),0,'" . $aper[0]["id_doce"] . "',1)";
			mysql_query($sql1, Conectar::con());
		}
		$sql = "UPDATE alumnos
					SET act_sem = '1' WHERE id_alm ='" . $_POST["alumno"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());

		header("Location: registro.php");
	}

	public function post_grupos()
	{
		$sql = "insert into grupos values (null,'" . $_POST["grupo"] . "')";
		mysql_query($sql, Conectar::con());
		header("Location: grupos.php");
	}

	/**
	 * Ingresar Materias del Semestre 
	 */
	public function post_apermateria()
	{
		//print_r($_POST);  //echo $_SESSION['ides']; 
		//exit;
		$sql = "insert into apermateria values (null,'" . $_POST["materia"] . "','" . $_POST["ciudad"] . "','" . $_SESSION["ides"] . "','" . $_POST["docente"] . "','" . $_POST["theDate"] . "','" . $_POST["trimestre"] . "',1)";
		mysql_query($sql, Conectar::con());
		header("Location: materiasemestre.php");
	}
	public function post_apersemestre()
	{
		$d = $_SESSION['ides'];

		$dati = new Consultas();
		$ob = $dati->get_usuario($d);
		$depto = $ob[0]['ciudad'];
		//var_dump($_POST);
		//print_r($_POST);  echo $_SESSION['ides']; 

		echo $sql = "insert into apersemestre values (null,'" . $_POST["trimestre"] . "','" . $_POST["theDate"] . "',now(),$depto,$d,'1')";

		mysql_query($sql, Conectar::con());
		header("Location: semestre.php");
	}

	public function post_notas()
	{
		print_r($_POST);
		exit;
		$sql = "insert into notas_historial values (null,'" . $_POST["alumno"] . "','" . $_POST["materia"] . "','" . $_POST["nota"] . "',now(),'" . $_POST["registro"] . "','" . $_POST["docente"] . "')";
		mysql_query($sql, Conectar::con());
		header("Location: notas.php");
	}
	public function post_notas1()
	{
		//print_r($_POST); 
		//exit;

		$obj = new Consultas();
		$datos = $obj->get_notas_his($_POST["materia"], $_POST["alumno"]);


		if ($datos == NULL) {
			$sql = "insert into notas_historial values (null,'" . $_POST["alumno"] . "','" . $_POST["materia"] . "','" . $_POST["nota"] . "','" . $_POST["theDate"] . "','0','" . $_POST["docente"] . "','0')";

			mysql_query($sql, Conectar::con());
			header("Location: notas1.php");
		} else {

			$ds = $datos[0]["nota"];

			header("Location: alerts.php?d=$ds");
		}
		exit;
	}

	public function post_carrera()
	{
		//  print_r($_POST); exit;
		$sql = "insert into grado_academico values (null,'" . $_POST["carrera"] . "',1)";
		mysql_query($sql, Conectar::con());
		header("Location: carrera.php");
	}
}

/**
 * Update
 */
class actualizar
{
	public function editarcarrera($n)
	{


		$sql = "UPDATE grado_academico
					SET nivel = '" . $_POST['carrera'] . "'WHERE id_grado =$n";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: carrera.php");
	}
	public function editarapermateria($n)
	{


		echo $sql = "UPDATE `apermateria`
					SET `activo` = '0' WHERE  `apermateria`.`id_aper` =$n";

		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: materiasemestre.php");
	}
	public function editarmateria($n)
	{
		//print_r($_POST); exit;

		$sql = "UPDATE materias
					SET sigla = '" . $_POST['sigla'] . "', descripcion = '" . $_POST['materia'] . "', creditos = '" . $_POST['creditos'] . "' WHERE id_mat =$n";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: materia.php");
	}
	public function editaralumno($n)
	{
		//print_r($_POST); exit;

		$sql = "UPDATE alumnos
					SET nombre = '" . ucwords($_POST['txt_nombre']) . "', apellido = '" . ucwords($_POST['txt_apellido']) . "', telefono = '" . ucwords($_POST['txt_telefono']) . "', celular = '" . ucwords($_POST['txt_celular']) . "', email ='" . $_POST['email'] . "', direccion='" . $_POST['txt_direccion'] . "', c_i='" . $_POST['txt_ci'] . "' WHERE id_alm =$n";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: alumnos.php");
	}

	public function editardocente()
	{
		//rint_r($_POST); exit;

		$sql = "UPDATE docentes
					SET nombre = '" . ucwords($_POST['nombre']) . "', apellido = '" . ucwords($_POST['apellido']) . "', telefono = '" . ucwords($_POST['telefono']) . "', celular = '" . ucwords($_POST['celular']) . "', email ='" . $_POST['email'] . "', ci='" . $_POST['ci'] . "' WHERE id_doc ='" . $_GET["id_doc"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: docente.php");
	}
	public function editarusuario()
	{
		//print_r($_POST); exit;

		$sql = "UPDATE usuario
					SET nombre = '" . ucwords($_POST['nombre']) . "', apellido = '" . ucwords($_POST['apellido']) . "', telefono = '" . ucwords($_POST['telefono']) . "', usu_login = '" . $_POST['login'] . "', usu_pass ='" . $_POST['password'] . "', ciudad ='" . $_POST['ciudad'] . "' WHERE usu_id ='" . $_GET["id_usu"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: usuarios.php");
	}
	/**
	 * [eliminar alumno description]
	 * 
	 */
	public function eliminaralumno()
	{
		//print_r($_GET);

		$sql = "UPDATE alumnos
					SET estado = '0' WHERE id_alm ='" . $_GET["borrar"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: alumnos.php");
	}

	public function eliminarsemalumno()
	{
		//print_r($_GET);

		$sql = "UPDATE alumnos
					SET act_sem = '0' WHERE id_alm ='" . $_GET["borrar"] . "'";
		$res = mysql_query($sql, Conectar::con());
		$sqls = "UPDATE registro
					SET activo = '0' WHERE id_alm ='" . $_GET["borrar"] . "'";
		//exit;
		$ress = mysql_query($sqls, Conectar::con());
		$sqlss = "UPDATE notas_historial
					SET activo = '0' WHERE id_alm ='" . $_GET["borrar"] . "'";
		//exit;
		$resss = mysql_query($sqlss, Conectar::con());
		header("Location: alumnosemestre.php");
	}

	/**
	 * Eliminar Docente
	 */
	public function eliminardocente()
	{
		//print_r($_GET);

		$sql = "UPDATE docentes
					SET activo = '0' WHERE id_doc ='" . $_GET["borrar"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: docente.php");
	}
	/**
	 * Eliminar usuario
	 */
	public function eliminarusuario()
	{
		//print_r($_GET); exit;

		$sql = "UPDATE usuario
					SET usu_sw = '0' WHERE usu_id ='" . $_GET["borrar"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: usuarios.php");
	}
	public function activarusuario()
	{
		//print_r($_GET); exit;

		$sql = "UPDATE usuario
					SET activo = '1' WHERE usu_id ='" . $_GET["id_usu"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: usuarios.php");
	}
	public function desactivarusuario()
	{
		//print_r($_GET); exit;

		$sql = "UPDATE usuario
					SET activo = '0' WHERE usu_id ='" . $_GET["id_usu"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: usuarios.php");
	}
	/**
	 * Eliminar Materia
	 */
	public function eliminarmateria()
	{
		//print_r($_GET);
		$sql = "UPDATE materias
					SET estado = '0' WHERE id_mat ='" . $_GET["borrar"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: materia.php");
	}
	/**
	 * Eliminar Carrera
	 */
	public function eliminarcarrera()
	{
		//print_r($_GET); exit;
		$sql = "UPDATE grado_academico
					SET activo = '0' WHERE id_grado ='" . $_GET["borrar"] . "'";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: carrera.php");
	}

	public function cerrarmateria($n)
	{
		//print_r($_POST);

		$sql = "UPDATE apermateria
					SET activo = '0' WHERE id_aper =$n";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: materias.php");
	


		
	}
	public function cerrarsemestre($n)
	{
		//print_r($_POST);

		$sql = "UPDATE apersemestre
					SET activo = '0' WHERE id =$n";
		//exit;
		$res = mysql_query($sql, Conectar::con());

		$sql = "UPDATE alumnos
					SET act_sem = '0' ";
		//exit;
		$res = mysql_query($sql, Conectar::con());
		header("Location: semestre.php");
	


		
	}
}
?>