<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>S.E.T.</title>
	<link rel="icon" href="matriculacion/images/cogoplogo.ico" type="image/x-icon">
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
        include_once ("Nombreinstitucional.php");
		  
        ?>
       
		<!--======================================== Links de navegación ========================================-->
        <?php 
        include_once ("linknavegacion.php");
		  
        ?>
		<!--======================================== Mega menu ==-->
        <?php 
        include_once ("menubar.php");
		  
        ?>
			<!========================================-->
		
		<!--======================================== Boton menu mobil ========================================-->
		<a href="#" class=" hidden-sm hidden-md hidden-lg pull-right button-menu-mobile show-close-menu-m"><i class="fa fa-ellipsis-v"></i></a>
	</header>
	<!--======================================== Logo & Lema ========================================-->
	<section class="full-reset font-cover" style="background-image: url(assets/img/bandera.jpg);">
		<div class="full-reset" style="height: 100%; background-color: rgba(82, 110, 236, 0.219); padding: 60px 0;">
			<h1 class="text-center titles">Seminario de Estudios Teologicos</h1>
			<figure class="Logo-Ins-Index">
				<img src="assets/img/log2.png" alt="Logo" class="img-responsive">
			</figure>
			<p class="lead text-center contee">
				"Un discípulo no está por encima de su maestro; mas todo discípulo, después de que se ha preparado bien, será como su maestro."
			</p>
		</div>
	</section>
	<div class="divider-general"></div>
	<!--======================================== Video corto & carrusel========================================-->
	
	<div class="divider-general"></div>
	<!--======================================== Acontecer institucional ========================================-->
	<section class="events-ins">
		<div class="container-fluid">
			<h2 class="text-center titles">ACONTECER INSTITUCIONAL</h2>
			<br><br>
			<div class="row">
				<!--======================================== Articulo 1 ========================================-->
				<article class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumbnail">
				     <!--- <img src="assets/gallery/1-2021.jpeg" alt="IMG" class="img-responsive img-rounded"> -->
				      <div class="caption">
				        <h3 class="text-center">Inscripciones Abiertas</h3>
				        <p class="text-justify">Iniciamos esta gestion con nuevo trimestre participa no te quedes sin ser parte de este reto.</p>
				        
				      </div>
				    </div>
				</article>
				<!--======================================== Articulo 2 ========================================-->
				<article class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumbnail">
				     <!---   <img src="assets/gallery/1-docentes.jpeg" alt="IMG" class="img-responsive img-rounded"> -->
				      <div class="caption">
				        <h3 class="text-center">Docentes de la Materia</h3>
				        <p class="text-justify">Docentes con amplia experiencia en las materias a desarrollarse.</p>
				        
				      </div>
				    </div>
				</article>
				<!--======================================== Articulo 3 ========================================-->
				<article class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumbnail">
				    <!---    <img src="assets/gallery/default.png" alt="IMG" class="img-responsive img-rounded"> -->
				      <!----- <div class="caption">
				        <h3 class="text-center">Lorem ipsum dolor sit amet</h3>
				        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis quam, incidunt, sapiente id quibusdam voluptatem.</p>
				        <p class="text-center"><a href="#" class="btn btn-primary" role="button">Ver imágenes</a></p>
				      </div>--->
				    </div>
				</article>
			</div>
		</div>
	</section>
	<div class="divider-general"></div>
	<!--======================================== Enlaces importantes ========================================-->
<!--	<section class="text-center important-links-index">
		<h2 class="titles">Sitios y enlaces importantes</h2>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-graduation-cap"></i>
			<p>MOODLE</p>
		</a>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-paw"></i>
			<p>ARA-MACAO</p>
		</a>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-globe"></i>
			<p>JOVENES A.T.T</p>
		</a>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-star-o"></i>
			<p>Promo. INS</p>
		</a>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-file-text-o"></i>
			<p>Cons.conducta</p>
		</a>

		<a href="#!" class="open-link-newTab">
			<i class="fa fa-download"></i>
			<p>Descargas</p>
		</a>
	</section> -->
	<!--======================================== Pie de pagina ========================================-->
	<?php 
        include_once ("footer.php");
		  
        ?>
</body>
</html>