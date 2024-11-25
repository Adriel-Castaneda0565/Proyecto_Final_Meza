<?php
// Conectar a la base de datos
include("db.php");

// Verificar si se ha enviado un ID a través de la URL
if (isset($_GET['id_suc'])) {
    $id_suc = $_GET['id_suc'];

    // Consultar la sucursal específica para editarla
    $sql = "SELECT * FROM sucursal WHERE id_suc = $id_suc";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recibir los datos del formulario de edición
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $horario = $_POST['horario'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $CP=$_POST['CP'];

        // Maneja el archivo subido (imagen), si se ha enviado uno nuevo
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $imagen = $_FILES['foto'];
            $nombre_imagen = $imagen['name'];
            $ruta_imagen = 'img/' . $nombre_imagen;
            move_uploaded_file($imagen['tmp_name'], $ruta_imagen);

            // Actualizar imagen en la base de datos
            $sql_update = "UPDATE sucursal SET nombre = '$nombre', direccion = '$direccion', horario = '$horario', telefono = '$telefono', email = '$email',CP='$CP', foto = '$ruta_imagen' WHERE id_suc = $id_suc";
        } else {
            // Si no se seleccionó nueva imagen, no actualizar la columna imagen
            $sql_update = "UPDATE sucursal SET nombre = '$nombre', direccion = '$direccion', horario = '$horario', telefono = '$telefono', email = '$email',CP='$CP' WHERE id_suc = $id_suc";
        }

        // Ejecutar la actualización
        if ($conn->query($sql_update) === TRUE) {
            header("Location: a_s.php?status=updated");
            exit();
        } else {
            echo "Error al actualizar la sucursal: " . $conn->error;
        }
    }
} else {
    // Si no se pasa el id en la URL, redirigir a la página de administración
    header("Location: a_s.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sucursal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Editar Sucursal</h1>

        <form action="editar_s.php?id_suc=<?php echo $row['id_suc']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Sucursal</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="horario" class="form-label">Horario de Apertura</label>
                <input type="text" class="form-control" name="horario" value="<?php echo $row['horario']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="foto">
                <img src="<?php echo $row['foto']; ?>" width="100" alt="Imagen actual">
            </div>

            <div class="mb-3">
                <label for="CP" class="form-label">Codigo Postal</label>
                <input type="text" class="form-control" name="CP" value="<?php echo $row['CP']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Sucursal</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
