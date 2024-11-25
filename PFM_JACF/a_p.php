
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS:DINOTIENDA</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
 <h1 class= "text-center text-secondary font-weight-bold p-4">DINOTIENDA-productos</h1>  
 
 
            <?php
            
               // require "bd.php";
               // require "editar.php";  
                //$sql=$conexion->query("select * from productos");
              
                //require "registraruser.php"; 
                
  include("db.php");
  $sql=$conn->query("SELECT*FROM productos");
             ?> 
        
     <div class= "p-3 table-responsive">

           <!-- Button trigger modal -->
          <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrar Nuevo
          </button>
        
          <div   class="login-box">
  <a href="index.php" class="btn btn-secondary mb-2">Regresar a la pagina principal</a>
  <a href="admin.php" class="btn btn-secondary mb-2">Regresar a la Administrador</a>
</div>
           <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Productos</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                             <div class="modal-body"><form action="agregar_p.php" method="POST" enctype="multipart/form-data">

    <label for="Nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre del Producto" required>

    <label for="precio">Precio</label>
    <input type="text" name="precio" class="form-control mb-2" placeholder="Precio" required>

    <label for="cantidad">Cantidad</label>
    <input type="text" name="cantidad" class="form-control mb-2" placeholder="Cantidad" required>

    <label for="Descripcion">Descripción</label>
    <input type="text" name="descripcion" class="form-control mb-2" placeholder="Descripción" required>

    <label for="Categoria">Categoria</label>
    <input type="text" name="categoria" class="form-control mb-2" placeholder="Categoría" required>

    <label for="id_prov">Id Proveedor</label>
    <input type="text" name="id_prov" class="form-control mb-2" placeholder="Id Proveedor" required>

    <label for="id_suc">Id Sucursal</label>
    <input type="text" name="id_suc" class="form-control mb-2" placeholder="Id Sucursal" required>

    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" class="form-control mb-2" required>

    <input type="submit" name="btnregistrar" value="Registrar" class="form-control btn btn-success">
</form>

                             </div>
                       </div>
                  </div>
            </div>

 

           <table class="table table-hover" class="table-stripped">
 

           <thead bg-dark text-white>
                    <tr>
                     <th scope="col" class= "bg-dark text-white">Id</th>
                     <th scope="col" class= "bg-dark text-white">Imagen</th>
                     <th scope="col" class= "bg-dark text-white">Nombre</th>
                     <th scope="col" class= "bg-dark text-white">Precio</th>
                     <th scope="col" class= "bg-dark text-white">Cantidad</th>
                     <th scope="col" class= "bg-dark text-white">Descripcón</th>
                     <th scope="col" class= "bg-dark text-white">Tipo</th>
                     <th scope="col" class= "bg-dark text-white">Id Proveedor</th>
                     <th scope="col" class= "bg-dark text-white">Id Sucursal</th>
                     <th scope="col" class= "bg-dark text-white"></th>
                     <th scope="col" class= "bg-dark text-white"></th>
                     </tr>


                 
               </thead>
          <tbody>
              <?php
        
             while ($row = $sql->fetch_assoc()){ 
                  
                   ?>
                   <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><img  src ="<?php echo $row['imagen']; ?>"width="200" class="img-thumbnail" alt="" srcset=""></td>
                      <td><?php echo $row['nombre']; ?></td>
                      <td><?php echo $row['precio']; ?></td>
                      <td><?php echo $row['cantidad']; ?></td>
                      <td><?php echo $row['descripcion']; ?></td>
                      <td><?php echo $row['categoria']; ?></td>
                      <td><?php echo $row['id_prov']; ?></td>
                      <td><?php echo $row['id_suc']; ?></td>
                      <td>               

                 
                             </div>
                       </div>
                  </div>
            </div> 
                 
               <a href="editar_p.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
               <a href="borrar_p.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Borrar</a>
               
                 
                           
 
            


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