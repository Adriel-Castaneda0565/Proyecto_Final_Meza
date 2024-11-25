<?php
include('db.php');

//user

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nombre=$_POST['nombre'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $apellido=$_POST['apellido'];
    $celular=$_POST['celular'];
    $direccion=$_POST['direccion'];
    $fecha_nac=$_POST['fecha_nac'];
    $email=$_POST['email'];

    //Prevenir SQL injection
    $username=$conn->real_escape_string($username);
    $password=$conn->real_escape_string($password);
    $apellido=$conn->real_escape_string($apellido);
    $celular=$conn->real_escape_string($celular);
    $direccion=$conn->real_escape_string($direccion);
    $fecha_nac=$conn->real_escape_string($fecha_nac);
    $email=$conn->real_escape_string($email);
    //Hash de la contraseña
    $password_hashed=password_hash($password,PASSWORD_BCRYPT);



$sql= "SELECT * FROM users WHERE username='$username'";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    # code...?>                                                                                                     
    <div class="login-box">
    <br><br><br><br><?php
    
  echo"Usuario existente";?>

  <br><br><br><br><br>
  <a href="register.php" class="btn">Regresar</a>
</div>
  <?php
exit();
}

else {
    
}


    $sql="INSERT INTO users(nombre,username,password,apellido,celular,direccion,fecha_nac,email)VALUES('$nombre','$username','$password_hashed','$apellido','$celular','$direccion','$fecha_nac','$email')";

    if($conn->query($sql)==TRUE){
        echo"User registered successfuly!";
        header("location: login.php");
    }else{
        echo"Error:".$sql. "<br>".$conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="style.css?ver=<?= time(); ?>">
</head>
<body>
<div class="login-box">
        <h2>Registro</h2>
        <form method="POST" action="">
        <div class="textbox">
                <input type="text" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Nombre de Usuario" name="username" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Contraseña" name="password" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Apellido" name="apellido" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Celular" name="celular" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Direccion" name="direccion" required>
            </div>
            <div class="textbox">
                <input type="date" placeholder="Fecha de nacimiento" name="fecha_nac" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Email" name="email" required>
            </div>

            <a href="index.php"><input type="submit" class="btn" value="Registrar"></a><br><br>
            <a href="inicio.php"class="btn">Volver</a><br><br><br>
        </form>

    </div>

</body>
</html>