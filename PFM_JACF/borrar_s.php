<?php
include("db.php");

if (isset($_GET['id_suc'])) {
    $id = $_GET['id_suc'];
    $query = "DELETE FROM sucursal WHERE id_suc = $id";
    $conn->query($query);
}

header("Location: a_s.php");
exit();
?>
