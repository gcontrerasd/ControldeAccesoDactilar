<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}elseif ($_SESSION['rol']==2) {
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
		<font color= "green"><h2> Registrar un nuevo usuario</h2></font>	
		<div class="well well-small">
		<form method="post" action="" >
  <fieldset>
    <center><legend  style="font-size: 16pt"><b><font color= "black"><u>Formulario de registro</u></font></b></legend></center>
    <div class="form-group">
   <!-- <label style="font-size: 14pt"><b><font color= "black"> ID Registrado en el lector de huellas </font></b></label>
      <input type="text" name="idlh" class="form-control" placeholder="ID" />
    </div> -->
    <div class="form-group">
      <label style="font-size: 14pt"><b><font color= "black"> Ingresa tu nombre </font></b></label>
      <input type="text" name="realname" class="form-control" placeholder="Nombre" />
    </div>
      <div class="form-group">
      <label style="font-size: 14pt"><b><font color= "black"> Ingresa tu apellido </font></b></label>
      <input type="text" name="lastname" class="form-control" placeholder="Apellido" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color: #FFFFFF;"><b><font color= "black"> Ingresa tu email </font></b></label>
      <input type="text" name="mail" class="form-control"  required placeholder="Email"/>
    </div>
      <div class="form-group">
      <label style="font-size: 14pt"><b><font color= "black"> Crea un usuario </font></b></label>
      <input type="text" name="username" class="form-control" placeholder="Usuario" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color: #FFFFFF;"><b><font color= "black"> Crea una contraseña </font></b></label>
      <input type="password" name="pass" class="form-control"  placeholder="**********" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt"><b><font color= "black"> Repite la contraseña creada</font></b></label>
      <input type="password" name="rpass" class="form-control" required placeholder="**********" />
    </div></br>
      <a href="admin.php"><input  class="btn btn-danger" type="submit" name="submit" value="Registrar"/></a>
    </div>

  </fieldset>
</form>
</div>
<?php
		if(isset($_POST['submit'])){
			require("registro.php");
		}
	?>
		
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