<?php
    
    //incluimos nuestro archivo config
    include 'config.php'; 

    // Incluimos nuestro archivo de funciones
    include 'funciones.php';

    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT * FROM eventos WHERE id=$id");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();

    // titulo 
    $titulo=$row['title'];

    // cuerpo
    $evento=$row['body'];

    $class=$row['class'];

    // Fecha inicio
    $inicio=$row['inicio_normal'];

    // Fecha Termino
    $final=$row['final_normal'];

// Eliminar evento
if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM eventos WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo "Solicitud de laboratorio eliminada";
    }
    else
    {
        echo "La solicitud de laboratorio, no se pudo eliminar";
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$titulo?></title>
</head>
<body>
	 <h3>Descripción de Solicitud</h3>
	 <hr><br>
     <b>Profesor:</b> <?=$class?><br><br>
     <b>Asignatura:</b> <?=$titulo?>
    <br><b><p>Laboratorio: </b><?=$evento?></p>
     <b>Fecha y Hora de Inicio:</b> <?=$inicio?><br><br>
     <b>Fecha y Hora de Termino:</b> <?=$final?><br><br>
</body>
<form action="" method="post">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</form>
</html>
