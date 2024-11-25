<?php
include("db.php");

if (isset($_GET['id_emp'])) {
    $id = $_GET['id_emp'];
    $query = "DELETE FROM empleados WHERE id_emp = $id";
    $conn->query($query);
}

header("Location: a_e.php");
exit();
?>
