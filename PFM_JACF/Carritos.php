<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link rel="stylesheet" href="styles.css?v=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
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
            <?php
        include("db.php");
        session_start();
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['dinotienda'])) {
        // Si no ha iniciado sesión, mostrar el enlace para registrarse
        echo '<a href="inicio.php" class="btn"><button>Inicio de sesion</button></a>';
        } else {
            $username = htmlspecialchars($_SESSION['dinotienda']);
        // Si ha iniciado sesión, mostrar el nombre del usuario y el enlace para cerrar sesión


        // Cambia el enlace de perfil según el usuario
        if ($username === "Adriel") {?><li class="nav-item"><?php
            echo '<a style="color:#20d2d8" href="profilead.php" class="btn"><p" class="bienvenido">Bienvenid@, ' . $username . '</p></a>';
        } else {?><li class="nav-item"><?php
            echo '<a style="color:#20d2d8" href="profile.php" class="btn"><p" class="bienvenido">Bienvenid@, ' . $username . '</p></a>';
        }

        // Botón para cerrar sesión?><li class="nav-item"><?php
        echo '<a href="cerrarsesion.php" class="btn"><button><img style="width:30px;" src="img/logou.png"></button></a>';
    }?>
            <li><a href="carrito.php" class="btn-c"><button><img style="width:30px;" src="img/calito.png"></button></a></li> 
        </ul>
    </nav>

        
    </header>
<!--Carrucel-->

    <!--Productos-->

    <div class="productos">
        <?php
        include("db.php");
        $categoria="Carros";
        if($categoria=="Carros"){
        $sql=$conn->query("SELECT *FROM productos WHERE categoria='$categoria'");
        while($datos=$sql->fetch_object()){?>
        <div class="ss">
        <div class="nombre-p"><?=htmlspecialchars($datos->nombre)?></div>
        <img src="<?=htmlspecialchars($datos->imagen)?>" alt="" class="imagen-p">
        <div class="desc"><?=htmlspecialchars($datos->descripcion)?></div>
        <div class="precio-p">$<?=htmlspecialchars($datos->precio)?></div><br>
        <div class="id-p">$<?=htmlspecialchars($datos->id)?></div><br>
        <a class="boton-cart" href='carrito.php?id=<?=htmlspecialchars($datos->id)?>'>Agregar a carrito</a>
        </div>
        <?php   
        }
    }
        ?>
       
    </div>



    <footer class="pie-pagina" style="margin-top: 100px;">
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