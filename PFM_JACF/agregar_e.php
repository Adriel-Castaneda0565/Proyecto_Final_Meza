<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sueldo = $_POST['sueldo'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];
    $sexo = $_POST['sexo'];


    // Insertar en la base de datos
    $sql = "INSERT INTO empleados (nombre, apellido, sueldo, celular, direccion, sexo) 
            VALUES ('$nombre', '$apellido', '$sueldo', '$celular', '$direccion', '$sexo')";
    if ($conn->query($sql) === TRUE) {
        header("Location: a_e.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h1>Agregar Empleado</h1>
        <form action="agregar_e.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">

            <label for="id_emp" class="form-label">ID Empleado</label>
            <input type="text" name="id_emp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sueldo" class="form-label">Sueldo</label>
            <input type="text" name="sueldo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" name="celular" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <input type="text" name="sexo" class="form-control" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</body>
</html>
