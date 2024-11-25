<?php
include("db.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_suc = $_POST['id_suc'];
    $foto = $_FILES['foto'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $horario = $_POST['horario'];
    $CP = $_POST['CP'];
    $pag_web = $_POST['pag_web'];
    $email=$_POST['email'];
    $telefono=$_POST['telefono'];

    // Manejar la imagen
    $nombre_foto = $foto['name'];
    $ruta_foto = 'img/' . $nombre_foto;
    move_uploaded_file($foto['tmp_name'], $ruta_foto);

    // Insertar en la base de datos
    $sql = "INSERT INTO sucursal (id_suc, foto, nombre, direccion, horario, CP, pag_web,email,telefono) 
            VALUES ('$id_suc', '$ruta_foto', '$nombre', '$direccion', '$horario', '$CP', '$pag_web','$email','$telefono')";
    if ($conn->query($sql) === TRUE) {
        header("Location: a_s.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<div class="container my-4">
    <h1>Agregar Sucursal</h1>
    <form action="agregar_s.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="horario" class="form-label">Horario</label>
            <input type="text" name="horario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="CP" class="form-label">Código Postal</label>
            <input type="text" name="CP" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">telefono</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
</body>
</html>