<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVEEDORES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="text-center text-secondary font-weight-bold p-4">DINOTIENDA-proveedores</h1>  

    <?php
    include("db.php");
    $sql = $conn->query("SELECT * FROM proveedores");
    ?> 

    <div class="p-3 table-responsive">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrar Nuevo Proveedor
        </button>

        <div class="login-box">
            <a href="index.php" class="btn btn-secondary mb-2">Regresar a la página principal</a>
            <a href="admin.php" class="btn btn-secondary mb-2">Regresar a la Administrador</a>
        </div>

        <!-- Modal para agregar proveedor -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Proveedor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="agregar_pr.php" method="POST" enctype="multipart/form-data">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre del Proveedor" required>

                            <label for="ubicacion">Ubicacion</label>
                            <input type="text" name="ubicacion" class="form-control mb-2" placeholder="Ubicacion" required>

                            <label for="telf">Teléfono</label>
                            <input type="text" name="telf" class="form-control mb-2" placeholder="Teléfono" required>

                            <label for="horario">Horario </label>
                            <input type="text" name="horario" class="form-control mb-2" placeholder="Horario" required>

                            <label for="email">Stock</label>
                            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

                            <input type="submit" name="btnregistrar" value="Registrar" class="form-control btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de proveedores -->
        <table class="table table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id_prov']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['ubicacion']; ?></td>
                        <td><?php echo $row['telf']; ?></td>
                        <td><?php echo $row['horario']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="editar_pr.php?id_prov=<?php echo $row['id_prov']; ?>" class="btn btn-primary">Editar</a>
                            <a href="borrar_pr.php?id_prov=<?php echo $row['id_prov']; ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                <?php 
                }
                ?>                     
            </tbody>
        </table>       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
