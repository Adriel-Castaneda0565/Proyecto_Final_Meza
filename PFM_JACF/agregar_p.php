<?php
// Conexión a la base de datos y lógica para insertar los datos...
if (isset($_POST['btnregistrar'])) {
    // Recibir los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $id_proveedor = $_POST['id_prov'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $id_sucursal = $_POST['id_suc'];

    // Maneja el archivo subido (imagen)
    if (isset($_FILES['imagen'])) {
        $imagen = $_FILES['imagen'];
        $nombre_imagen = $imagen['name'];
        $ruta_imagen = 'img/' . $nombre_imagen;

        // Mueve la imagen a la carpeta correcta
        move_uploaded_file($imagen['tmp_name'], $ruta_imagen);
    }

    // Conexión a la base de datos
    include("db.php");

    // Consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO productos (id, nombre, categoria, id_prov, cantidad, precio, descripcion, id_suc, imagen) 
            VALUES ('$id', '$nombre', '$categoria', '$id_proveedor', '$cantidad', '$precio', '$descripcion', '$id_sucursal', '$ruta_imagen')";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        // Redirige a la página de administración después de insertar el producto
        header("Location: a_p.php"); // Reemplaza "admin.php" con la URL o archivo de administración
        exit(); // Es importante llamar a exit() después de header() para detener el script.
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>