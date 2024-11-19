<?php
$servername="localhost";
$username="root";
$password="";
$dbname="frikisaurio";
//crear conexion
$conn=new mysqli($servername,$username,$password,$dbname);
//Verificar la conexion
if($conn->connect_error){
    die("Connection Failed:".$conn->connect_error);
}
?>