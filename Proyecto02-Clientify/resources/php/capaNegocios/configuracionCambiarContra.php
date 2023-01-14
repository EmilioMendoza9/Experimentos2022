<?php
session_start();
$ruta = dirname(__DIR__);
require_once($ruta.'\capaDatos\usuario.php');

$confObj = new usuarioDatos('localhost','root','','portalingeniasi');
$clave1 = $_POST['txtContra1'];

$clave1 = password_hash($clave1, PASSWORD_DEFAULT);
echo $confObj->cambiarContraseña($_SESSION['idUsuario'], $clave1);