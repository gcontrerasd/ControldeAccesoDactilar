<?php

	$realname=$_POST['realname'];
	$lastname=$_POST['lastname'];
	$username=$_POST['username'];
	$idlh=$_POST['idlh'];
	$mail=$_POST['mail'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];

	require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$mail'");
	$check_mail=mysqli_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Error, ya existe el mail utilizado por un usuario, verifique sus datos");</script> ';
			}else{
				
				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO login VALUES('', null,'$realname','$lastname','$username','$pass','$mail','','2')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				echo "<script>location.href='admin.php'</script>";
			}
			
		}else{
			echo 'Las contraseñas no coinciden o son incorrectas';
		}

	
?>