<?php
// Conectar a la base de datos
include("db.php");

// Verificar si se ha enviado un ID a través de la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el producto específico para editarlo
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recibir los datos del formulario de edición
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $id_prov = $_POST['id_prov'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $id_suc = $_POST['id_suc'];

        // Maneja el archivo subido (imagen), si se ha enviado uno nuevo
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $imagen = $_FILES['imagen'];
            $nombre_imagen = $imagen['name'];
            $ruta_imagen = 'img/' . $nombre_imagen;
            move_uploaded_file($imagen['tmp_name'], $ruta_imagen);

            // Actualizar imagen en la base de datos
            $sql_update = "UPDATE productos SET id = '$id', nombre = '$nombre', categoria = '$categoria', id_prov = '$id_prov', cantidad = '$cantidad', precio = '$precio', descripcion = '$descripcion', id_suc = '$id_suc', imagen = '$ruta_imagen' WHERE id = $id";
        } else {
            // Si no se seleccionó nueva imagen, no actualizar la columna imagen
            $sql_update = "UPDATE productos SET id = '$id', nombre = '$nombre', categoria = '$categoria', id_prov = '$id_prov', cantidad = '$cantidad', precio = '$precio', descripcion = '$descripcion', id_suc = '$id_suc' WHERE id = $id";
        }

        // Ejecutar la actualización
        if ($conn->query($sql_update) === TRUE) {
            header("Location: a_p.php?status=updated");
            exit();
        } else {
            echo "Error al actualizar el producto: " . $conn->error;
        }
    }
} else {
    // Si no se pasa el id en la URL, redirigir a la página de administración
    header("Location: admin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Editar Producto</h1>

        <form action="editar_p.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" name="categoria" value="<?php echo $row['categoria']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="id_prov" class="form-label">Id Proveedor</label>
                <input type="text" class="form-control" name="id_prov" value="<?php echo $row['id_prov']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" name="cantidad" value="<?php echo $row['cantidad']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" value="<?php echo $row['precio']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?php echo $row['descripcion']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="id_suc" class="form-label">Id Sucursal</label>
                <input type="text" class="form-control" name="id_suc" value="<?php echo $row['id_suc']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen">
                <img src="<?php echo $row['imagen']; ?>" width="100" alt="Imagen actual">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
