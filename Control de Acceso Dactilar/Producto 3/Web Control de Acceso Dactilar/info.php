<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index2.php");
}elseif ($_SESSION['rol']==1) {
	header("Location:index2.php");
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

<div class="navbar">
  <div class="navbar-inner">
	<div class="container">
	  <div class="nav-collapse">
		<ul class="nav">
			<li><a href="admin.php"><strong>Volver</strong></a></li>
			 
		</ul>
		<form action="#" class="navbar-search form-inline" style="margin-top:6px">
		
		</form>
		<ul class="nav pull-right">
			  <li><a href="desconectar.php"> Cerrar Cesión </a></li>			 
		</ul>
	  </div><!-- /.nav-collapse -->
	</div>
  </div><!-- /navbar-inner -->
</div>

<!-- ======================================================================================================================== -->
<div class="row">
			
	<div class="span12">

		<div class="caption">
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<font color= "green"><h2> Perfil de Usuario</h2></font>
		<div class="well well-small">
		<h4><center><u>Informaci&oacuten del Usuario</center></u></h4>
		<div class="row-fluid">
		
			<?php
				require("connect_db.php");
				$usuario = $_SESSION['user'];
				$sql=("SELECT * FROM login WHERE user='$usuario'");
	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				$ressql=mysqli_query($mysqli,$sql);
		while ($row=mysqli_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$idlh=$row[1];
		    	$realname=$row[2];
		    	$lastname=$row[3];
		    	$user=$row[4];
		    	$pass=$row[5];
		    	$email=$row[6];
		    }

		?>
			  
		<form action="ejecutaactualizar.php" method="post">
				ID<br><input type="text" name="id" value= "<?php echo $id ?>" readonly="readonly"><br>
				ID Lector de Huellas<br><input type="text" name="idlh" value= "<?php echo $idlh?>" readonly="readonly"><br>
				Nombre Profesor<br> <input type="text" name="realname" value="<?php echo $realname?>"><br>
				Apellido<br> <input type="text" name="lastname" value="<?php echo $lastname?>"><br>
				Usuario<br> <input type="text" name="user" value="<?php echo $user?>"><br>
				Correo usuario<br> <input type="text" name="email" value="<?php echo $email?>"><br>
				Contraseña usuario<br> <input type="text" name="pass" value="<?php echo $pass?>"><br>
				
				<br>
				<input type="submit" value="Guardar" class="btn btn-success btn-primary">
			</form>
		
		<div class="span8">
		
		</div>	
		</div>	
		<br/>

		<!--EMPIEZA DESLIZABLE-->
		
		 <!--TERMINA DESLIZABLE-->
		
		</div>

<!--///////////////////////////////////////////////////Termina cuerpo del documento interno////////////////////////////////////////////-->
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

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>