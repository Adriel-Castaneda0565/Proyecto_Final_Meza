<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLEADOS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center text-secondary font-weight-bold p-4">DINOTIENDA-empleados</h1>  
    
    <?php
    include("db.php");
    $sql = $conn->query("SELECT * FROM empleados");
    ?> 

    <div class="p-3 table-responsive">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrar Nuevo Empleado
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Empleado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="agregar_e.php" method="POST">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre del Empleado" required>

                            <label for="apellido">apellido</label>
                            <input type="text" name="apellido" class="form-control mb-2" placeholder="Apellido" required>

                            <label for="sueldo">Sueldo</label>
                            <input type="text" name="sueldo" class="form-control mb-2" placeholder="Sueldo" required>

                            <label for="celular">Celular</label>
                            <input type="text" name="celular" class="form-control mb-2" placeholder="Celular" required>

                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" class="form-control mb-2" placeholder="Direccion" required>

                            <label for="sexo">Sexo</label>
                            <input type="text" name="sexo" class="form-control mb-2" placeholder="Sexo" required>

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
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Sueldo</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id_emp']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['sueldo']; ?></td>
                        <td><?php echo $row['celular']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['sexo']; ?></td>
                        <td>
                            <a href="editar_e.php?id_emp=<?php echo $row['id_emp']; ?>" class="btn btn-primary">Editar</a>
                            <a href="borrar_e.php?id_emp=<?php echo $row['id_emp']; ?>" class="btn btn-danger">Borrar</a>
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
