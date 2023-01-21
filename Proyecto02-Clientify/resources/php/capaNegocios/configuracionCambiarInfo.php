<?php
session_start();
$ruta = dirname(__DIR__);
require_once($ruta.'\capaDatos\usuario.php');

$confObj = new usuarioDatos('localhost','root','','portalingeniasi');
if(isset($_POST["txtCorreo"]) && $_POST["txtCorreo"] != "")
    $correo = $_POST["txtCorreo"];
if(isset($_POST["txtTelefono"]) && $_POST["txtTelefono"] != "")
    $telefono = $_POST["txtTelefono"];
if(isset($_POST["txtNombres"]) && $_POST["txtNombres"] != "")
    $nombres = $_POST["txtNombres"];
if(isset($_POST["txtApellidos"]) && $_POST["txtApellidos"] != "")
    $apellidos = $_POST["txtApellidos"];

if(!isset($correo)){
    $correo = $_SESSION["correoUsuario"];
}
if(!isset($telefono)){
    $telefono = $_SESSION["telefonoUsuario"];
}
if(!isset($nombres)){
    $nombres = $_SESSION["nombresUsuario"];
}
if(!isset($apellidos)){
    $apellidos = $_SESSION["apellidosUsuario"];
}

$_SESSION["correoUsuario"] = $correo;
$_SESSION["telefonoUsuario"] = $telefono;
$_SESSION["nombresUsuario"] = $nombres;
$_SESSION["apellidossuario"] = $apellidos;
echo $confObj->cambiarInfoPersonal($_SESSION["idUsuario"], $correo, $telefono, $nombres, $apellidos);