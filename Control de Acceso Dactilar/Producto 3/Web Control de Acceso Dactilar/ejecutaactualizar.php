<?php


extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	require("connect_db.php");
	//$sentencia="update login set realname='$realname', lastname='$lastname', user='$user', password='$pass', email='$email' where id='$id'";
	$sentencia="update login set realname='$realname', lastname='$lastname', user='$user', password='$pass', email='$email', idlh='$idlh' where id='$id'";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {
		echo "Error de procesamiento no se han actuaizado los datos";
		echo '<script>alert("Error en el proceso, No se actualizaron datos")</script> ';
		header("location: admin.php");
		
		echo "<script>location.href='admin.php'</script>";
	}else {
		echo '<script>alert("Registro Actualizado con Exito")</script> ';
		
		echo "<script>location.href='admin.php'</script>";

		
	}
?>