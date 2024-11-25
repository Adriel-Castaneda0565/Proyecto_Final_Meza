<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="cart.css?ver=<?= time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        // Si ha iniciado sesión, mostrar el nombre del usuario y el enlace para cerrar sesión
        echo '<a href="profile.php"><p class="bienvenido">Bienvenid@, ' . htmlspecialchars($_SESSION['dinotienda']) . '</p></a>';
        echo '<p><br></p>';
        echo '<a href="cerrarsesion.php" class="btn"><button><img style="width:30px;" src="img/logou.png"></button></a>';
    }?>
        </ul>
    </nav>

        
    </header>
  
<?php

error_reporting(0);
include("db.php");
$usuario = $_SESSION['dinotienda'];
error_reporting(E_ALL);
// Obtener el ID del usuario desde la base de datos
$sql_user = "SELECT id FROM users WHERE username = '$usuario'";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
    $user_data = $result_user->fetch_assoc();
    $id_usuario = $user_data['id'];
} else {
    //si no a iniciado sesion
    echo "<input type=\"checkbox\" id=\"btn-popup\" checked>";
    echo "<div class=\"popup-contr\">";
    echo "<div class=\"popup-cont\">";
    echo "<h3>USUARIO SIN REGISTRAR</h3><p>Parece que aun no has iniciado sesion</p>";
    echo "<h3>Ya tienes un usuario?</h3>",'<a href="login.php" class="btn"><button>Inicio de sesion</button></a>';
    echo "<h3>Nuevo Usuario?</h3>",'<a href="register.php" class="btn"><button>Registrar</button></a>';
    echo '<br><br><a href="index.php" class="btn-v"><button>Volver</button></a>';
    echo "</div>";
    echo "</div>";
    //no permite que se ejecute lo demas
    exit();
}

// Verificar si se ha pasado un ID de producto para añadir al carrito
if (isset($_GET['id'])) {
    $producto_id = intval($_GET['id']);

    $sql = "SELECT * FROM productos WHERE id = '$producto_id'";
    $resultado = $conn->query($sql);
    //si existe el producto y(&&) el resultado es mayor a 0
    if ($resultado && $resultado->num_rows > 0) {
        $sqlCarrito = "SELECT cantidad FROM carrito WHERE productoid = '$producto_id' AND usuarioid = '$id_usuario'";
        $resultadoCarrito = $conn->query($sqlCarrito);
        //si el producto existe en la cuanta del usuario y(&&) la cantidad es mayor a 0
        if ($resultadoCarrito && $resultadoCarrito->num_rows > 0) {
            $carrito = $resultadoCarrito->fetch_assoc();
            $cantidad = $carrito['cantidad'] + 1;
            $sql_update = "UPDATE carrito SET cantidad = $cantidad WHERE productoid = '$producto_id'AND usuarioid = ' $id_usuario'";
            $conn->query($sql_update);
        } else {
            $numero_aleatorio = mt_rand(1, 10);   
            $fecha_p = date('Y-m-d');
            //si aun no existe se agrega con una cantidad con valor 1
            $sqlInsert = "INSERT INTO carrito (usuarioid, productoid, cantidad,id_emp,estado) VALUES ('$id_usuario', '$producto_id', 1,'$numero_aleatorio','en espera')";
            $conn->query($sqlInsert);
            //si aun no existe se agrega con una cantidad con valor 1
         
        }
        //regresa para que puedas seguir agregando productos
        header("location:carrito.php");
    }
}

$totalg = 0;

// si se dio click en el boton con nombre 'delete'
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM carrito WHERE productoid = $id AND usuarioid = $id_usuario";
    $conn->query($sql);
}



// si se dio click en el boton con nombre 'decrementar'
if (isset($_POST['decrementar'])) {
    $id = $_POST['id'];
    $sqlc = "SELECT cantidad FROM carrito WHERE productoid = '$id' AND usuarioid = '$id_usuario'";
    $result = $conn->query($sqlc);
    if ($result) {
        $row = $result->fetch_assoc();
        $cantidad = $row['cantidad'] - 1;
        $sql_update = "UPDATE carrito SET cantidad = $cantidad WHERE productoid = '$id' AND usuarioid = '$id_usuario'";
        $conn->query($sql_update);
        //si la cantidad es menor a 1 se elimina
        if ($cantidad < 1) {
            $sql = "DELETE FROM carrito WHERE productoid = $id AND usuarioid = $id_usuario";
            $conn->query($sql);
        }
    }
}

// si se dio click en el boton con nombre 'incrementar'
if (isset($_POST['incrementar'])) {
    $id = $_POST['id'];
    $sqlc = "SELECT cantidad FROM carrito WHERE productoid = '$id' AND usuarioid = '$id_usuario'";
    $result = $conn->query($sqlc);
    if ($result) {
        $row = $result->fetch_assoc();
        $cantidad = $row['cantidad'] + 1;
        $sql_update = "UPDATE carrito SET cantidad = $cantidad WHERE productoid = '$id' AND usuarioid = '$id_usuario'";
        $conn->query($sql_update);
    }
}

//conexion con la tabla carrito que se encuentra relacionada con la tabla productos
$sql_compras = "SELECT c.*, p.nombre AS productos_nombre, p.descripcion AS productos_descripcion, p.precio AS productos_precio, p.imagen AS productos_imagen
                FROM carrito c
                JOIN productos p ON c.productoid = p.id
                WHERE c.usuarioid = $id_usuario";
$result_compras = $conn->query($sql_compras);
// si hay productos en la tabla carrito

if ($result_compras->num_rows > 0) {
    echo "<div class=\"t-cart\">";
    echo "<h2>Tus productos en CARRITO</h2>";
    echo "</div>";
    echo "<table border='3'>";
    echo "<tr>";
    echo "<th>Imagen</th>";
    echo "<th>Nombre</th>";
    echo "<th>Descripción</th>";
    echo "<th>Cantidad</th>";
    echo "<th>Precio Individual</th>";
    echo "<th>Total</th>";
    echo "<th></th>";
    echo "</tr>";
    //escribe los datos de cada producto existente en la tabla carrito
    while ($pcarrito = $result_compras->fetch_assoc()) {
        //variable que multiplica el valor de los productos por la cantidad de estos
        $total = $pcarrito['cantidad'] * $pcarrito['productos_precio'];
        //acumulador que suma el precio de los preductos
        $totalg += $total;
        ?>

        <tr>
            <!-- se agregan a la tabla los datos de cada producto  -->
            <td><img src="<?= htmlspecialchars($pcarrito['productos_imagen']) ?>" alt="Producto" width="100"></td>
            <td><?= htmlspecialchars($pcarrito['productos_nombre']) ?></td>
            <td><?= htmlspecialchars($pcarrito['productos_descripcion']) ?></td>
            <td>
                 <!-- + -->
                 <form action="" method="POST" >
                    <input type="hidden" name="id" value="<?= $pcarrito['productoid'] ?>">
                    <button type="submit" name="incrementar">+</button>
                </form>
                <?= htmlspecialchars($pcarrito['cantidad']) ?>
                <!-- - -->
                <form action="" method="POST" >
                    <input type="hidden" name="id" value="<?= $pcarrito['productoid'] ?>">
                    <button type="submit" name="decrementar">-</button>
                </form> 
            </td>
            <!-- (number_formar) agrega los decimales y se le asigna al final el numero de estos (2) -->
            <td>$<?= number_format($pcarrito['productos_precio'], 2) ?></td>
            <td>$<?= number_format($total, 2) ?></td>
            <td>
                <!-- ELIMINA -->
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $pcarrito['productoid'] ?>">
                    <button type="submit" name="delete">Quitar del carrito</button>
                </form>
            </td>
        </tr>
        <?php
    }
    echo "<tr>";
    echo "<td colspan='5' style='text-align:right;'><strong>Total General:</strong></td>";
    echo "<td colspan='2'>$" . number_format($totalg, 2) . "</td>";
    echo "</tr>";
    $iva = $totalg * 0.16;
    $precioiva = $totalg + $iva;
    echo "<tr>";
    echo "<td colspan='5' style='text-align:right;'><strong>IVA:</strong></td>";
    echo "<td colspan='2'>$" . number_format($iva, 2) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan='5' style='text-align:right;'><strong>Total con IVA:</strong></td>";
    echo "<td colspan='2'>$" . number_format($precioiva, 2) . "</td>";
    echo "</tr>";
    echo "</table>";
    ?>
    <div class="d-grid">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2">
    Finalizar Compra
</button>

<!-- El Modal -->
<div class="modal" id="myModal2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ticket</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php 
          echo "<tr>";
          echo "<td colspan='5' style='text-align:right;'><strong>Total General:</strong></td>";
          echo "<td colspan='2'>$" . number_format($totalg, 2) . "</td>";
          echo "</tr>"; 
        ?> <br>
        <?php
          $iva = $totalg * 0.16;
          $precioiva = $totalg + $iva;
          echo "<tr>";
          echo "<td colspan='5' style='text-align:right;'><strong>IVA:</strong></td>";
          echo "<td colspan='2'>$" . number_format($iva, 2) . "</td>";
          echo "</tr>";
          echo "<tr>";?> <br>
        <?php
          echo "<td colspan='5' style='text-align:right;'><strong>Total con IVA:</strong></td>";
          echo "<td colspan='2'>$" . number_format($precioiva, 2) . "</td>";
          echo "</tr>";
        ?>

        <!-- Selección del Método de Pago -->
        <div class="form-group mt-3">
          <label for="metodoPago">Seleccione Método de Pago:</label>
          <select id="metodoPago" class="form-control">
            <option value="Tarjeta">Tarjeta</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Transferencia">Transferencia</option>
          </select>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <!-- Botón de Pagar -->
        <button id="btnPagar" type="button" class="btn btn-primary">
            Pagar
        </button>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById("btnPagar").addEventListener("click", function() {
    const metodo = document.getElementById("metodoPago").value;
    const precioiva = <?php echo $precioiva; ?>; // Usar la variable PHP directamente en JavaScript

    if (!metodo) {
        alert("Por favor, seleccione un método de pago.");
        return;
    }

    // Enviar los datos al servidor para actualizar el estado y los detalles del pago
    fetch("actualizar_estado.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            metodo: metodo,
            total: precioiva // El total con IVA
        })
    })
    .then(response => response.text())
    .then(data => {
        if (data === "success") {
            alert("Pago realizado con éxito.");
            window.location.href = "index.php"; // Redirigir al inicio o a donde corresponda
        } else {
            alert("Error al procesar el pago: " + data);
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
});
</script>

      </div>
      
  <?php ?>
  <br><br><br><br>
  </div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
        <h4 class="modal-title">Ticket</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
     <?php 
    echo "<tr>";
    echo "<td colspan='5' style='text-align:right;'><strong>Total General:</strong></td>";
    echo "<td colspan='2'>$" . number_format($totalg, 2) . "</td>";
    echo "</tr>"; ?> <br><?php
    $iva = $totalg * 0.16;
    $precioiva = $totalg + $iva;
    echo "<tr>";
    echo "<td colspan='5' style='text-align:right;'><strong>IVA:</strong></td>";
    echo "<td colspan='2'>$" . number_format($iva, 2) . "</td>";
    echo "</tr>";
    echo "<tr>";?> <br><?php
    echo "<td colspan='5' style='text-align:right;'><strong>Total con IVA:</strong></td>";
    echo "<td colspan='2'>$" . number_format($precioiva, 2) . "</td>";
    echo "</tr>";?>
      

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn bg-success" data-bs-dismiss="modal">PAGAR</button>
    </div>
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
    </footer> <div class="box">
    <h2>Con precios jurasicos<br>desde el cretacico hasta tu casa</h2>

        </div>
    </div> 
    </div>
    </div>
    <?php
} else {
    echo "<p>Aun no se han agregado productos a este carrito.</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
?>


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