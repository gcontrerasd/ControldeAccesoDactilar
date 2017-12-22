
<?php
//include("connect_db.php");

//$miconexion = new connect_db;


session_start();
	require("connect_db.php");

	$username=$_POST['user'];
	$pass=$_POST['pass'];


	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($mysqli,"SELECT * FROM login WHERE user='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){
		if($pass==$f2['pasadmin']){
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['user'];
			$_SESSION['rol']=$f2['rol'];

			echo '<script>alert("Bienvenido Administrador")</script> ';
			echo "<script>location.href='admin.php'</script>";
		
		}
	}

	$sql=mysqli_query($mysqli,"SELECT * FROM login WHERE user='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['password']){
			$_SESSION['id']=$f['id'];
			$_SESSION['user']=$f['user'];
			$_SESSION['rol']=$f['rol'];

			echo '<script>alert("Bienvenido a Control de Acceso Dactilar")</script> ';
			echo "<script>location.href='index2.php'</script>";
		}else{
			echo '<script>alert("Contraseña incorrecta")</script> ';
		
			echo "<script>location.href='index.php'</script>";
		}
	}else{
		
		echo '<script>alert("El usuario no existe, porfavor registrese para poder ingresar")</script> ';
		
		echo "<script>location.href='index.php'</script>";	

	}

?>