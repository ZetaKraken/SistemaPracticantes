<?php 
//require_once "controladores/plantilla.controlador.php";
require_once "controladores/login.controlador.php";

$login = new Logincontrolador();
$login->login();


// $plantilla = new PlantillaControlador();
// $plantilla->plantilla();