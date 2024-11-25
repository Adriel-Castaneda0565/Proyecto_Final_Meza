<?php
// Conectar a la base de datos
include("db.php");

// Verificar si se ha enviado un ID a través de la URL
if (isset($_GET['id_emp'])) {
    $id = $_GET['id_emp'];

    // Consultar el empleado específico para editarlo
    $sql = "SELECT * FROM empleados WHERE id_emp = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recibir los datos del formulario de edición
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sueldo = $_POST['sueldo'];
        $celular = $_POST['celular'];
        $direccion = $_POST['direccion'];
        $sexo = $_POST['sexo'];

        // Actualizar los datos del empleado
        $sql_update = "UPDATE empleados SET nombre = '$nombre', apellido = '$apellido', sueldo = '$sueldo', celular = '$celular', direccion = '$direccion', sexo = '$sexo' WHERE id_emp = $id";

        // Ejecutar la actualización
        if ($conn->query($sql_update) === TRUE) {
            header("Location: a_e.php?status=updated");
            exit();
        } else {
            echo "Error al actualizar el empleado: " . $conn->error;
        }
    }
} else {
    // Si no se pasa el id en la URL, redirigir a la página de administración
    header("Location: a_e.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Editar Empleado</h1><form action="editar_e.php?id_emp=<?php echo $row['id_emp']; ?>" method="POST" enctype="multipart/form-data">
     <div class="mb-3">
    <label for="id_emp" class="form-label">ID Empleado</label>
    <input type="text" class="form-control" name="id_emp" value="<?php echo $row['id_emp']; ?>" required>
</div>

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" required>
</div>

<div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="apellido" value="<?php echo $row['apellido']; ?>" required>
</div>

<div class="mb-3">
    <label for="sueldo" class="form-label">Sueldo</label>
    <input type="text" class="form-control" name="sueldo" value="<?php echo $row['sueldo']; ?>" required>
</div>

<div class="mb-3">
    <label for="celular" class="form-label">Celular</label>
    <input type="text" class="form-control" name="celular" value="<?php echo $row['celular']; ?>" required>
</div>

<div class="mb-3">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion']; ?>" required>
</div>

<div class="mb-3">
    <label for="sexo" class="form-label">Sexo</label>
    <input type="text" class="form-control" name="sexo" value="<?php echo $row['sexo']; ?>" required>
</div>

            <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
