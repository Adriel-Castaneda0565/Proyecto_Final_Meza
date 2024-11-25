<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir datos del formulario
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Cifrado de la contraseña
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];
    $email=$_POST['email'];
    $created_at = date('Y-m-d H:i:s'); // Fecha actual

    // Insertar datos en la base de datos
    $sql = "INSERT INTO clientes (username, password, created_at, nombre,apellido, celular, direccion, email) 
            VALUES ('$username', '$password', '$created_at', '$nombre','$apellido', '$celular', '$direccion', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: a_c.php?status=added");
        exit();
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
    <title>Registrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Registrar Nuevo Cliente</h1>

        <form action="agregar_c.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" required>
</div>

<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required>
</div>

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" required>
</div>

<div class="mb-3">
    <label for="celular" class="form-label">Celular</label>
    <input type="text" class="form-control" name="celular" required>
</div>

<div class="mb-3">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" name="direccion" required>
</div>

<div class="mb-3">
    <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
    <input type="date" class="form-control" name="fecha_nac" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" required>
</div>

            <button type="submit" class="btn btn-primary">Registrar Cliente</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
