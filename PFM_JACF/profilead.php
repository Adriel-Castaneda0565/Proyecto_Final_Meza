
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
session_start();

include('db.php');



if (!isset($_SESSION['dinotienda'])) {
    echo "Error: No ha iniciado sesión correctamente.";
    exit; // Detener la ejecución si no hay un usuario válido
}

$username = $_SESSION['dinotienda'];

$sql= "SELECT * FROM users WHERE username='$username'";
$resultado=mysqli_query($conn,$sql);
$datos=mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="styles.css?v=1.0">
</head>
<body>
   <div class="perfil">
        <h2>Bienvenid@, <?php echo $username; ?></h2>
         <img  style="height:200px;"src="img/admin.png"class="rounded-circle">
        <p style=" font-family: 'Courier New', Courier, monospace; font-size:30px; color: rgb(27, 16, 73);">  Bienvenid@ Administrador.</p>
        <br>
        <a href="index.php" class="btn">Regresar a la pagina</a><br><br>
        <a href="admin.php" class="btn">Modificar Base de datos</a>
    </div>
</body>
</html>