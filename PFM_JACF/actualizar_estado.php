<?php
include("db.php");
session_start();

$usuario = $_SESSION['dinotienda'];
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['metodo'])) {
    echo "no_payment_method";
    exit();
}

$metodo = $data['metodo'];

// Obtener el ID del usuario desde la base de datos
$sql_user = "SELECT id FROM users WHERE username = '$usuario'";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
    $user_data = $result_user->fetch_assoc();
    $id_usuario = $user_data['id'];

    // Calcular el total general (con IVA incluido)
    $sql_total = "SELECT SUM(carrito.cantidad * productos.Precio) AS total_general
                  FROM carrito
                  JOIN productos ON carrito.productoid = productos.id
                  WHERE carrito.usuarioid = '$id_usuario'";
    $result_total = $conn->query($sql_total);

    if ($result_total && $result_total->num_rows > 0) {
        $row = $result_total->fetch_assoc();
        $total_general = $row['total_general'];

        // Calcular el IVA y el total con IVA
        $iva = $total_general * 0.16;
        $precioiva = $total_general + $iva;

        // Actualizar el estado, fecha de entrega, total y método de pago
        $sql_update = "UPDATE carrito 
                       SET estado = 'pagado', 
                           total = '$precioiva',
                           metodo = '$metodo'
                       WHERE usuarioid = '$id_usuario' AND estado != 'pagado'";

        if ($conn->query($sql_update)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error_calculating_total";
    }
} else {
    echo "user_not_found";
}
?>