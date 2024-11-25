<?php
// Conexión a la base de datos y lógica para insertar los datos...
if (isset($_POST['btnregistrar'])) {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $telefono = $_POST['telf'];
    $horario = $_POST['horario'];
    $email = $_POST['email'];

    // Conexión a la base de datos
    include("db.php");

    // Consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO proveedores (nombre, ubicacion, telf, horario, email) 
            VALUES ('$nombre', '$ubicacion', '$telefono', '$horario', '$email')";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        // Redirige a la página de administración después de insertar el proveedor
        header("Location: a_pr.php?status=added"); // Reemplaza con la URL correcta para visualizar proveedores
        exit(); // Es importante llamar a exit() después de header() para detener el script.
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h1 class="text-center mb-4">Registrar Nuevo Proveedor</h1>

        <form action="agregar_pr.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_prov" class="form-label">ID del Proveedor</label>
                <input type="number" name="id_prov" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Proveedor</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telf" class="form-label">Teléfono</label>
                <input type="text" name="telf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="horario" class="form-label">Horario</label>
                <input type="text" name="horario" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button type="submit" name="btnregistrar" class="btn btn-primary">Registrar Proveedor</button>
        </form>

        <div class="mt-3">
            <a href="visualizar_proveedores.php" class="btn btn-secondary">Volver al listado de proveedores</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
