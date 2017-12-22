<!DOCTYPE html>

	<?php
	session_start();
	if (@!$_SESSION['user']) {
		header("Location:index.php");
	}elseif ($_SESSION['rol']==1) {
		header("Location:admin.php");
	}
	?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Control de Acceso Dactilar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Gabriel Contreras">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>


    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="favicon.png">
  </head>
<body data-offset="40" background="images/fondotot.jpg" style="background-attachment: fixed">
<div class="container">
<header class="header">
<div class="row">
	<?php
	include("include/cabecera.php");
	?>
</div>
</header>

  <!-- Navbar
    ================================================== -->
<?php

include("include/menu.php");

?>
<!-- ======================================================================================================================== -->
</br>
<div id="myCarousel" class="carousel slide homCar">
		<div class="carousel-inner" style="border-top:18px solid #222; border-bottom:1px solid #222; border-radius:4px;">
		  <div class="item active">
			<img src="images/progra.jpg" alt="#" style="min-height:250px; min-width:100%"/>
			<div class="carousel-caption">
				  <center><h4>Programaci&oacuten</h4></center>
			</div>
		  </div>
		  <div class="item">
			<img src="images/pascomputacion.jpg" alt="#" style="min-height:250px; min-width:100%"/>
			<div class="carousel-caption">
				  <center><h4>Dedicaci&oacuten</h4></center>
			</div>
		  </div>
		  <div class="item">
			<img src="images/fondo2.jpg" alt="#" style="min-height:250px; min-width:100%"/>
			<div class="carousel-caption">
				  <center><h4>Esfuerzo</h4></center>
			</div>
		  </div>
		</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div></br>

<h3><font color= "green">Solicitudes de Laboratorios.</font></h3>
<div class="row" style="text-align:center">
			<div class="span12">
				<div class="well well-small">
					<h4>Ver disponibilidad de Laboratorios</h4>
					<a href="http://localhost/controldactilar/calendario/cal.php" target="blank_"><small><b>Haz click Aqu&iacute</b></small></a>
				</div>
			</div>
			
			<div class="span6">
				<div class="well well-small">
					<h3>Laboratiorio 216</h3>
					Ubicado en el 2do piso de la torre D a un costado de los baños
				</div>
			</div>

			<div class="span6">
				<div class="well well-small">
					<h3>Laboratiorio 306</h3>
					Ubicado en el 3cer piso de la torre D a un costado de los baños
				</div>
			</div>

			<div class="span12">
				<div class="well well-small">
					<h4 >Contactar a los Encargados</h4>
				Ser&aacutes redireccionado y podr&aacutes contactarlos v&iacutea email.</br></br>
					<a href="mailto:encargadoslaboratorio@unab.cl"><small><b>Haz click Aqu&iacute</b></small></a>

				</div>
			</div>
		
</div>

</br></br><h3><center><font color= "green">Lenguajes de programaci&oacuten m&aacutes populares.</font></center></h3></br>

<div class="row">
	<div class="span4">
	<div class="thumbnail">
	<h3 style="text-align:center"><font color= "green"><u>C++</u></font></h3>	
	<img src="images/algebra.jpg" />
	</div>
	</div>

	<div class="span4">
	<div class="thumbnail">
	<h3 style="text-align:center"><font color= "green"><u>Python</u></font></h3>	
	<img src="images/topografia.jpg" />
	</div>
	</div>

	<div class="span4">
	<div class="thumbnail">
	<h3 style="text-align:center"><font color= "green"><u>Php</u></font></h3>	
	<img src="images/computacion.jpg"/>
	</div><br/><br/>
	</div><br/>


</div>
<hr/><br/>
<div class="row">
	<div class="span12">
	<div class="well well-small">
		<center><img src="images/unab.png"/></center>
	</div>
	</div>
	
</div>
<!-- Footer
      ================================================== -->
<hr class="soften"/>
<footer class="footer">

<hr class="soften"/>
<font color= "green"><center><p><b>&copy; 2017 Control de Acceso Dactilar | All rights reserved.</font><br/><br/></p></center></b>
 </footer>
</div><!-- /container -->
    
	</style>
  </body>
</html>