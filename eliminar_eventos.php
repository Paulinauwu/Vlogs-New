<?php
include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM eventos WHERE id = $id";
    $resultado = mysqli_query($conectar, $deleteQuery);

    if ($resultado) {
        header("Location: listado_eventos.php"); // Redirige a la página de listados de eventos
        exit();
    } else {
        echo "<p>Error al eliminar el Proyecto.</p>";
    }
} else {
    echo "<p>No se ha proporcionado un ID válido.</p>";
}
?>
