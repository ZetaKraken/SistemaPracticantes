<?php
require_once "modelos/db.php";
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","root","","db_practicantes");
echo "aun sigo aca bb";
$consulta="SELECT*FROM usuarios where usuario='$usuario' and contrasena='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    echo "llegue aca bb";
    header("location:indexplantilla.php");

}else{
  echo "Error en Usuario o Contraseña";
    ?>
    <?php
    include("./index.php");

    ?>
    <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
