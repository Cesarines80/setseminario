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
	<section class="full-reset" style="min-height: 850px;">
		<div class="jumbotron">
		  <h2 class="text-center titles">Matricula</h2>
		  <p class="text-center lead">
		  	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio adipisci doloribus, amet eaque perspiciatis ut culpa quidem accusantium unde velit explicabo doloremque cupiditate! Facere quibusdam, deleniti molestias magni excepturi voluptas!
		  </p>
		</div>
		<!--======================================== Info. ========================================-->
		<article>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="text-center titles">
							Diploma Ministerial
						</h3>
						<br><br>
						<h4 class="titles">Requisitos indispensables:</h4>
						<br>
						<p class="lead">
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
						</p>
					</div>
				</div>
			</div>
		</article>
		<div class="divider-general"></div>
		<!--======================================== Info. ========================================-->
		<article>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="text-center titles">
							Tecnico Superior en Teologia
						</h3>
						<br><br>
						<h4 class="titles">Requisitos indispensables:</h4>
						<br>
						<p class="lead">
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
						</p>
					</div>
				</div>
			</div>
		</article>
		<div class="divider-general"></div>
		
		
		<!--======================================== Info. generalidades ========================================-->
		<article class="well" style="margin-bottom: 0 !important;">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="text-center titles">
							Consideraciones Generales
						</h3>
						<br><br>
						<p class="lead">
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
							<i class="fa fa-angle-double-right"></i> &nbsp; Lorem ipsum dolor sit amet.<br><br>
						</p>
					</div>
				</div>
			</div>
		</article>
	</section>
	<!--======================================== Pie de pagina ========================================-->
	<?php 
        include_once ("footer.php");
		  
        ?>
</body>
</html>