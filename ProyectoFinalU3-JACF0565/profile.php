<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location:login.php");exit;
}
$username=$_SESSION['login_user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>BIenvenido,<?php echo$username;?></h2>
        <p>Esta es tu pagina de perfil.</p>
    </div>
</body>
</html>
