<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link rel="stylesheet" href="styles.css?v=1.0">
</head>
<body>
    <!--Barra-->
    <header class="header">
        <div class="logo">
            <a href="index.php"><img src="img/frikisaurstore.png"></a>
        </div>
    
    <nav><ul class="nav">
            <li><a href="index.php">Inicio</a>
            <li><a href="Productos.php">Productos</a>
                <ul>
                    <li><a href="Ropa.php">Ropa</a></li>
                    <li><a href="Figuras.php">Figuras</a></li>
                </ul>
            <li><a href="#">Contacto</a>
            <li><a href="carrito.php" class="btn-c"><button>carrito</button></a></li> 
        </ul>
    </nav>
        <?php
        include("db.php");
        session_start();
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['users'])) {
        // Si no ha iniciado sesión, mostrar el enlace para registrarse
        echo '<a href="inicio.php" class="btn"><button>Inicio de sesion</button></a>';
        } else {
        // Si ha iniciado sesión, mostrar el nombre del usuario y el enlace para cerrar sesión
        echo '<p class="bienvenido">Bienvenid@, ' . htmlspecialchars($_SESSION['users']) . '</p>';
        echo '<p><br></p>';
        echo '<a href="cerrarsesion.php" class="btn"><button>Cerrar Sesión</button></a>';
    }?>
    </header>

    <div class="yo">
        <img src="/img/dino.png">
    </div>
<div class="info">
    <p>NOMBRE</p><br>
    <p>Jesus Adriel Castaneda Franco</p>
    <hr aling="center" width="100%" size="3" color="black" noshade><br>
    <p>ESPECIALIDAD</p><br>
    <p>Pogramacion</p>
    <hr aling="center" width="100%" size="3" color="black" noshade><br>
    <p>SEMESTRE</p><br>
    <p>4to semestre</p>
</div>

    <!--footer-->
<footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="#">
                    <img src="img/frikisaurstore.png" alt="logo footer">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p>Fundador:Jesus Adriel Castañeda Franco</p>
            <p>Centro de Bachillerato Tecnologico industrial y de servicios</p>
        </div>
        <div class="box">
            <h2>SIGUENOS</h2>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy;2024 <b>La tienda del frikisaurio</b>-Todos los Derechos Reservados</small>
    </div>
    </footer>

</body>
</html>