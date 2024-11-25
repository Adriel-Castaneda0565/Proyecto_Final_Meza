<?php
include("db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el cliente para editar
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $row['password']; // Mantener la contraseña si no se cambia
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $celular = $_POST['celular'];
        $direccion = $_POST['direccion'];
        $fecha_nac = $_POST['fecha_nac'];
        $email = $_POST['email'];

        // Actualizar en la base de datos
        $sql_update = "UPDATE users SET username = '$username',apellido='$apellido', password = '$password', nombre = '$nombre', celular = '$celular', direccion = '$direccion', fecha_nac = '$fecha_nac', email = '$email' WHERE id = $id";
        if ($conn->query($sql_update) === TRUE) {
            header("Location: a_c.php?status=updated");
            exit();
        } else {
            echo "Error al actualizar el cliente: " . $conn->error;
        }
    }
} else {
    header("Location: a_c.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
<form action="editar_c.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
<div class="container">
<h1 class="my-4">Editar Empleado</h1><form action="editar_c.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password (dejar vacío si no lo desea cambiar)</label>
        <input type="password" class="form-control" name="password">
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
        <label for="celular" class="form-label">Celular</label>
        <input type="text" class="form-control" name="celular" value="<?php echo $row['celular']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="fecha_nac" value="<?php echo $row['fecha_nac']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
    </div>
</div>
    <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
</form>
</body>
</html>