
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
session_start();

include('db.php');





$username = $_SESSION['dinotienda'];

$sql= "SELECT * FROM users WHERE username='$username'";
$resultado=mysqli_query($conn,$sql);
$datos=mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css?ver=<?= time(); ?>">
</head>
<header class="header">
        <div class="logo">
            <a href="index.php"><img src="img/logo1.png"></a>
        </div>

    <nav><ul class="nav">
            <li><a href="index.php">Inicio</a>
            <li><a href="Productos.php">Productos</a>
                <ul>
                    <li><a href="Peluches.php">Peluches</a></li>
                    <li><a href="Figuras.php">Figuras</a></li>
                    <li><a href="Carritos.php">Carritos</a></li>
                </ul>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="sucursal.php">Sucursal</a></li>
            <li><a href="carrito.php" class="btn-c"><button><img style="width:30px;" src="img/calito.png"></button></a></li> 
        </ul>
    </nav>

        <?php ?>
    </header>
<body>
   <div class="perfil">
        <h2>Bienvenid@, <?php echo $username; ?></h2>
         <img  style="height:200px;"src="img/default.jpg "class="rounded-circle">
        <p style=" font-family: 'Courier New', Courier, monospace; font-size:30px; color: rgb(27, 16, 73);">Te damos la bienvenida a la dinotienda,<br> esperamos que encuentres todo lo que buscas.</p>
        <br>
        <a href="index.php" class="btn">Regresar</a>
        <?php  echo '<a href="cerrarsesion.php" class="btn">cerrar sesion</a>'; ?>
    </div>

    <footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="#">
                    <img src="img/logo1.png" alt="logo footer">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p>Fundador:Jesus Adriel Castañeda Franco</p>
            <p>Centro de Bachillerato Tecnologico industrial y de servicios</p>
        </div>
        <div class="box">
            <h2>Con precios jurasicos<br>desde el cretacico hasta tu casa</h2>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy;2024 <b>DINOTIENDA</b>-Todos los Derechos Reservados</small>
    </div>
    </footer>

</body>
</html>