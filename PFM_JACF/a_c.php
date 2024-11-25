<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTES</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center text-secondary font-weight-bold p-4">DINOTIENDA-clientes</h1>  
    
    <?php
    include("db.php");
    $sql = $conn->query("SELECT * FROM users");
    ?> 

    <div class="p-3 table-responsive">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrar Nuevo Cliente
        </button>

        <div class="login-box">
            <a href="index.php" class="btn btn-secondary mb-2">Regresar a la página principal</a>
            <a href="admin.php" class="btn btn-secondary mb-2">Regresar a la Administrador</a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Cliente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="agregar_c.php" method="POST" enctype="multipart/form-data">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control mb-2" placeholder="Username del Cliente" required>

                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control mb-2" placeholder="Contraseña" required>

                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre del Cliente" required>

                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" class="form-control mb-2" placeholder="Teléfono" required>

                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" class="form-control mb-2" placeholder="Dirección" required>


                            <input type="submit" name="btnregistrar" value="Registrar" class="form-control btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">celular</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Fecha de Registro</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['celular']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a href="editar_c.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
                            <a href="borrar_c.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Borrar</a>
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
