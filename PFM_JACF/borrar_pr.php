<?php
include("db.php");

if (isset($_GET['id_prov'])) {
    $id = $_GET['id_prov'];
    $query = "DELETE FROM proveedores WHERE id_prov = $id";
    $conn->query($query);
}

header("Location: a_pr.php");
exit();
?>
