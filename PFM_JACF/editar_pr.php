<?php
// Conectar a la base de datos
include("db.php");

// Verificar si se ha enviado un ID a través de la URL
if (isset($_GET['id_prov'])) {
    $id = $_GET['id_prov'];

    // Consultar el proveedor específico para editarlo
    $sql = "SELECT * FROM proveedores WHERE id_prov = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recibir los datos del formulario de edición
        $nombre = $_POST['nombre'];
        $ubicacion = $_POST['ubicacion'];
        $telefono = $_POST['telf'];
        $horario = $_POST['horario'];
        $email = $_POST['email'];

        // Maneja el archivo subido (imagen), si se ha enviado uno nuevo
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $imagen = $_FILES['imagen'];
            $nombre_imagen = $imagen['name'];
            $ruta_imagen = 'imagenes/' . $nombre_imagen;
            move_uploaded_file($imagen['tmp_name'], $ruta_imagen);

            // Actualizar imagen en la base de datos
            $sql_update = "UPDATE proveedores SET nombre = '$nombre', direccion = '$direccion', telefono = '$telefono', correo = '$correo', stock = '$stock', calificacion = '$calificacion', imagen = '$nombre_imagen' WHERE id = $id";
        } else {
            // Si no se seleccionó nueva imagen, no actualizar la columna imagen
            $sql_update = "UPDATE proveedores SET nombre = '$nombre', ubicacion = '$ubicacion', telf = '$telefono', horario = '$horario', email = '$email' WHERE id_prov = $id";
        }

        // Ejecutar la actualización
        if ($conn->query($sql_update) === TRUE) {
            header("Location: a_pr.php?status=updated");
            exit();
        } else {
            echo "Error al actualizar el proveedor: " . $conn->error;
        }
    }
} else {
    // Si no se pasa el id en la URL, redirigir a la página de administración
    header("Location: a_pr.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Editar Proveedor</h1>

        <form action="editar_pr.php?id_prov=<?php echo $row['id_prov']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
    <label for="id_prov" class="form-label">ID del Proveedor</label>
    <input type="text" class="form-control" name="id_prov" value="<?php echo $row['id_prov']; ?>" required>
</div>

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre del Proveedor</label>
    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" required>
</div>

<div class="mb-3">
    <label for="ubicacion" class="form-label">Ubicación</label>
    <input type="text" class="form-control" name="ubicacion" value="<?php echo $row['ubicacion']; ?>" required>
</div>

<div class="mb-3">
    <label for="telf" class="form-label">Teléfono</label>
    <input type="text" class="form-control" name="telf" value="<?php echo $row['telf']; ?>" required>
</div>

<div class="mb-3">
    <label for="horario" class="form-label">Horario</label>
    <input type="text" class="form-control" name="horario" value="<?php echo $row['horario']; ?>" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Correo Electrónico</label>
    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
</div>

            <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
