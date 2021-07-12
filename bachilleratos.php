<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Institucion</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/modernizr.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<!--======================================== Boton ir arriba ========================================-->
	<i class="btn-up fa fa-arrow-circle-o-up hidden-xs"></i>
	<!--======================================== Navegación ========================================-->
	<header class="full-reset header">
		<!--======================================== Logo(Nombre INS) ========================================-->
		<?php 
		  include "Nombreinstitucional.php";
		?>
		<!--======================================== Links de navegación ========================================-->
		<?php 
        include_once ("linknavegacion.php");
		  
        ?>
		<!--======================================== Mega menu ========================================-->
		<?php 
		include_once ("menubar.php");
		 ?>
		<!--======================================== Boton menu mobil ========================================-->
		<a href="#" class=" hidden-sm hidden-md hidden-lg pull-right button-menu-mobile show-close-menu-m"><i class="fa fa-ellipsis-v"></i></a>
	</header>
	<!--======================================== contenido de la pagina ========================================-->
	<section class="full-reset" style="background-color: #fff; padding: 20px 0;">
		<div class="container">
			<div class="row">
				<section class="col-xs-12 col-sm-8 col-md-9 info-section-ins">
					<p class="lead">
					La estructura curricular que se adopta para el mejor aprovechamiento de los
					estudiantes de teología para el plan de actividades pedagógicas está formado por siete
					áreas: área bíblica, área teológica, área práctica-educación, área historia, área
					evangelismo, área idiomas-oratoria, área ciencias sociales y elemento curricular
					complementario área en ramas técnicas.
					</p>
					
					<!--======================================== General ========================================-->
					<article class="full-reset" id="b-general">	
						<div class="page-header" style="margin-bottom:40px;">
						  <h2><i class="fa fa-graduation-cap"></i> &nbsp; Diploma Ministerial</h2>
						</div>
						<figure>
							<img src="assets/img/Banner_bachillerato_general.png" alt="bachillerato general" class="img-responsive img-rounded center-box">
						</figure>
						<br>
						<p class="lead">
							El Diploma Ministerial cuenta con una carga semanal de 42 horas de clase, y tiene una duración de 7 trimestres, a continuación:
						</p>
						<div class="table-responsive">
						  <table class="table table-hover table-bordered text-center">
						    <thead>
						    	<tr class="info">
						    		
						    		<th class="text-center"  colspan="3">Materias del Diploma Ministerial</th>
						    	</tr>
						    </thead>
						    <tbody>
						    	<tr class="success">
						    		<td><strong>Nro.</strong></td>
						    		<td><strong>Materia</strong></td>
						    		<td><strong>Creditos</strong></td>
						    	</tr>
						    	<tr>
						    		<td>1</td>
						    		<td>Biblia 1 (Introduccion al A.T.)</td>
						    		<td>4</td>
						    	</tr>
						    	<tr>
						    		<td>2</td>
						    		<td>Biblia II (INtroduccion al N.T.)</td>
						    		<td>4</td>
						    	</tr>
						    	<tr>
						    		<td>3</td>
						    		<td>Historia Cristiana I</td>
						    		<td>4</td>
						    	</tr>
						    	<tr>
						    		<td>4</td>
						    		<td>Historia Crstiana II</td>
						    		<td>4</td>
						    	</tr>
						    	<tr>
						    		<td>5</td>
						    		<td>Pentateuco</td>
						    		<td>3</td>
						    	</tr>
						    	<tr>
						    		<td>6</td>
						    		<td>Profetas</td>
						    		<td>3</td>
						    	</tr>
						    	<tr>
						    		<td>7</td>
						    		<td>Introduccion a la Teologia</td>
						    		<td>3</td>
						    	</tr>
						    	<tr>
						    		<td>8</td>
						    		<td>Teologia Sistematica I</td>
						    		<td>4</td>
						    	</tr>
						    	<tr>
						    		<td>9</td>
						    		<td>Teologia Sistematica II</td>
						    		<td>4</td>
						    	</tr>
						    	<tr>
						    		<td>10</td>
						    		<td>Teologia Sitematica III</td>
						    		<td>4</td>
						    	</tr>
						    	<tr>
						    		<td>11</td>
						    		<td>Administracion Eclesial I</td>
						    		<td>3</td>
						    	</tr>
								<tr>
						    		<td>12</td>
						    		<td>Metodos de Investigacion</td>
						    		<td>4</td>
						    	</tr>
								<tr>
						    		<td>13</td>
						    		<td>Gramatica</td>
						    		<td>3</td>
						    	</tr>
								<tr>
						    		<td>14</td>
						    		<td>Daniel y Apocalipsis</td>
						    		<td>4</td>
						    	</tr>
								<tr>
						    		<td>15</td>
						    		<td>Hermeneutica</td>
						    		<td>4</td>
						    	</tr>
								<tr>
						    		<td>16</td>
						    		<td>Cartas Paulinas</td>
						    		<td>4</td>
						    	</tr>
								<tr>
						    		<td>17</td>
						    		<td>Educacion Cristiana</td>
						    		<td>4</td>
						    	</tr>
								<tr>
						    		<td>18</td>
						    		<td>Homiletica I</td>
						    		<td>3</td>
						    	</tr>
								<tr>
						    		<td>19</td>
						    		<td>Evangelismo y Discipulado</td>
						    		<td>4</td>
						    	</tr>
								<tr>
						    		<td>20</td>
						    		<td>Teologia de la Adoracion</td>
						    		<td>3</td>
						    	</tr>
						    	<tr class="danger">
						    		<td>TOTAL</td>
						    		<td>Total</td>
						    		<td>73</td>
						    	</tr>
						    </tbody>
						  </table>
						</div>
					</article>
					<!--======================================== Asistencia administrativa ========================================-->
					<article class="full-reset" id="b-asistente">
						<div class="page-header" style="margin-bottom:40px;">
						  <h2><i class="fa fa-briefcase"></i> &nbsp; Tecnico Superior en Teologia</h2>
						</div>
						<figure>
							<img src="assets/img/Banner_bachillerato_asistente.png" alt="bachillerato asistente" class="img-responsive img-rounded center-box">
						</figure>
						<br>
						
						<br>
						<p class="lead">
							Los graduados se pueden incorporar al sistema productivo como asistente de gerencia de empresas, asistencia de presidencia de empresas, asistente de ejecutivo financiero o crediticio, asistente del área de comunicaciones, asistente del área  de relaciones públicas y otros.
						</p>
						<br><br>
						
						
						
						<p class="lead">
							A continuación se detallan las asignaturas y módulos de la especialidad que se deben cursar en este bachillerato:
						</p>
						<br><br>
						<h3 class="titles text-center">Materias de tecnico Superior</h3>
						<div class="table-responsive">
							<table class="table table-hover table-bordered text-center">
								<thead>
								<tr class="success">
						    		<td><strong>Nro.</strong></td>
						    		<td><strong>Materia</strong></td>
						    		<td><strong>Creditos</strong></td>
						    	</tr>
								</thead>
								<tbody>
									
									<tr>
									    <td>21</td>
										<td>Teologia Sistematica IV</td>
										<td>4</td>
									</tr>
									<tr>
									    <td>22</td>
										<td>Teologia Sistematica V</td>
										<td>4</td>
									</tr>
									<tr>
									    <td>23</td>
										<td>Hist. Igl. A. Latina y Bolivia</td>
										<td>4</td>
									</tr>
									<tr>
									    <td>24</td>
										<td>Griego I</td>
										<td>4</td>
									</tr>
									<tr>
									    <td>25</td>
										<td>Griego II</td>
										<td>4</td>
									</tr>
									<tr>
									    <td>26</td>
										<td>Hebreo I</td>
										<td>4</td>
									</tr>
									<tr>
									    <td>27</td>
										<td>Hebreo II</td>
										<td>4</td>
									</tr>
									<tr>
									    <td>28</td>
										<td>Tiempo Intertestamentario</td>
										<td>3</td>
									</tr>
									<tr>
									    <td>29</td>
										<td>Homiletica II (Pred. Expositiva)</td>
										<td>3</td>
									</tr>
									<tr>
									    <td>30</td>
										<td>Liderazgo Cristiano</td>
										<td>3</td>
									</tr>
									<tr>
									    <td>31</td>
										<td>Consejeria Pastoral</td>
										<td>4</td>
									</tr>
									<tr>
									    <td>32</td>
										<td>Administracion Eclesial II</td>
										<td>3</td>
									</tr>
									<tr>
									    <td>33</td>
										<td>Apolegetica</td>
										<td>3</td>
									</tr>
									<tr>
									    <td>34</td>
										<td>Historia de Israel</td>
										<td>4</td>
									</tr>

									
									<tr>
										<td>Educación Física</td>
										<td>2</td>
									</tr>
									<tr class="success">
										<td colspan="2"><strong>Módulos</strong></td>
									</tr>
									
								</tbody>
							</table>
						</div>
						<br><br>
						<h3 class="titles text-center">CURSO FUNDAMENTAL</h3>
						<div class="table-responsive">
							<table class="table table-hover table-bordered text-center">
								<thead>
								<tr class="success">
						    		<td><strong>Nro.</strong></td>
						    		<td><strong>Materia</strong></td>
						    		<td><strong>Creditos</strong></td>
						    	</tr>
								</thead>
								<tbody>
									
									<tr>
										<td>5</td>
										<td>Biblia</td>
										<td>4</td>
									</tr>
									<tr>
									    <td>4</td>
										<td>Introduccion a la teologia C. F.</td>
										<td>2</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Historia Cristiana</td>
										<td>3</td>
									</tr>
									<tr><td>2</td>
										<td>Iglesia de Dios de la Profecia</td>
										<td>4</td>
									</tr>
									<tr><td>1</td>
										<td>Formacion Espiritual</td>
										<td>3</td>
									</tr>

									
									
									<tr>
										<td>Elaboración de conciliaciones bancarias</td>
									</tr>
									<tr class="danger">
										<td><strong>TOTAL</strong></td>
										<td colspan="3"><strong>49</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
						<br><br>
						
					</article>
					
				<!--======================================== Navegacion fija lateral derecha ========================================-->
				<nav class="hidden-xs scroll-navigation-ins">
					<figure class="full-reset">
						<img src="assets/img/logg.png" alt="Logo" class="img-responsive center-box">
					</figure>
					<h4 class="text-center titles">Bachilleratos</h4>
					<ul class="list-unstyled full-reset">
						<li data-href="#b-general">Diploma Ministerial</li>
						<li data-href="#b-asistente">Tecnico Superior en Teologia</li>
						
					</ul>
				</nav>
			</div>
		</div>
	</section>
	<!--======================================== Pie de pagina ========================================-->
	<?php 
        include_once ("footer.php");
		  
        ?>
</body>
</html>