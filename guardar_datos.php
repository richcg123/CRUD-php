<?php
use phpDocumentor\Reflection\Location;

include("db.php");

    if (isset($_POST['guardar'])) {
    $titulo =  $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    echo $titulo;
    echo $descripcion;

    $consulta = "INSERT INTO tareas(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
    $resultado = mysqli_query($con, $consulta);
        if (!$resultado) {
            die("Consulta Fallida");
        }else {
            $_SESSION['mensaje'] = 'Tarea Guardada';
            $_SESSION['message_type'] = 'success';
            header("location: index.php");
        }
    }
?>
