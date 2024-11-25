<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR DATABASE: DINOTIENDA</title>
    <link rel="stylesheet" href="styles.css?ver=<?= time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
   
      
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

    </header>
<body >
    <div class="cont-admin" style="font-family: 'Yatra One', serif;">
<center><h2>BASE DE DATOS</h2></center>
    <div class="admin">
       
        
        
            <a href="a_p.php" class="ss"class="btna">Productos</a>
        
        
   
            <a href="a_s.php" class="ss" class="btna">Sucursales</a>
        
        
       
            <a href="a_e.php" class="ss" class="btna">Empleados</a>
     
        
        
            <a href="a_pr.php" class="ss" class="btna">Proveedores</a>
      
        
       
            <a href="a_c.php" class="ss" class="btna">Clientes</a>
       
    </div>
    </div>
</body>
</html>
