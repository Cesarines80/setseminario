<?php
require "../config/conexion.php";
require_once "../modelos/Alumno.php";
$nac = new Alumno();
?>
<!DOCTYPE html>
<html>
<head>
	<title>SELECT DEPENDIENTES DE TRES NIVELES www.apptivaweb.com</title>
	<script src="../public/js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="col-12">
			<h1 class="text-center shadow-lg m-5 p-3">SELECT DINÁMICO DE TRES NIVELES</h1>
		</div>
		<div class="row">
			<select name="ciudad" id="ciudad" class="form-control col-sm-4">
				<?php
				$ciudad=$nac->listartodo("ciudades");
				foreach($ciudad as $ciudad):
					?><option value="<?php echo $ciudad['id'] ?>"><?php echo $ciudad['nombre'] ?></option><?php
				endforeach;
				?>
			</select>
			<select name="provincia" id="provincia" class="form-control col-sm-4"></select>
			<select name="distrito" id="distrito" class="form-control col-sm-4"></select>
		</div>
	</div>
<script src="scripts/select1.js"></script>
</body>
</html>
