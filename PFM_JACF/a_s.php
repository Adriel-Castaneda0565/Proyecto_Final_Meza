<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUCURSALES</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center text-secondary font-weight-bold p-4">DINOTIENDA-sucursales</h1>  
    
    <?php
    include("db.php");
    $sql = $conn->query("SELECT * FROM sucursal");
    ?> 

    <div class="p-3 table-responsive">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrar Nueva Sucursal
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Sucursal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="agregar_s.php" method="POST" enctype="multipart/form-data">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre de la Sucursal" required>

                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" class="form-control mb-2" placeholder="Dirección" required>

                            <label for="horario">Horarios</label>
                            <input type="text" name="horario" class="form-control mb-2" placeholder="Horario" required>

                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" class="form-control mb-2" placeholder="Teléfono" required>

                            <label for="email">Correo Electrónico</label>
                            <input type="email" name="correo" class="form-control mb-2" placeholder="Email" required>

                            <label for="foto">Imagen</label>
                            <input type="file" name="foto" class="form-control mb-2" required>

                            <label for="pag_web">Pagina web</label>
                            <input type="text" name="pag_web" class="form-control mb-2" placeholder="Pagina Web" required>

                            <label for="CP">Codigo Postal</label>
                            <input type="text" name="cp" class="form-control mb-2" placeholder="Codigo Postal" required>

                            <input type="submit" name="btnregistrar" value="Registrar" class="form-control btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-hover" class="table-stripped">
 

 <thead bg-dark text-white>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Horario</th>
                    <th scope="col">CP</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pag Web</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id_suc']; ?></td>
                        <td><img src="<?php echo $row['foto']; ?>" width="200" class="img-thumbnail" alt="Imagen sucursal"></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['horario']; ?></td>
                        <td><?php echo $row['CP']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['pag_web']; ?></td>

                        <td>
                            <a href="editar_s.php?id_suc=<?php echo $row['id_suc']; ?>" class="btn btn-primary">Editar</a>
                            <a href="borrar_s.php?id_suc=<?php echo $row['id_suc']; ?>" class="btn btn-danger">Borrar</a>
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
