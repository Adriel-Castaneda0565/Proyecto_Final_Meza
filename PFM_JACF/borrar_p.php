<?php
// Conectar a la base de datos
include("db.php");

// Verificar si se ha enviado un ID a través de la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar el producto
    $sql = "DELETE FROM productos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de administración con un mensaje de éxito
        header("Location: a_p.php?status=deleted");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
} else {
    // Si no se pasa el id en la URL, redirigir a la página de administración
    header("Location: a_p.php");
    exit();
}
?>
