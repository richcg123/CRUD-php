<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "DELETE FROM tareas WHERE id = $id";
    $resultado = mysqli_query($con, $consulta);

    if (!$resultado) {
        die("Consulta Fallida");
    }
        $_SESSION['mensaje'] = "Tarea eliminada";
        $_SESSION['message_type'] = "danger";
        header("Location: index.php");
    
}
?>