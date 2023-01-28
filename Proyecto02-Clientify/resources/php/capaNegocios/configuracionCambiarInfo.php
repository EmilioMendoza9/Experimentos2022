<?php
session_start();
$ruta = dirname(__DIR__);
require_once($ruta.'\capaDatos\usuario.php');
$confObj = new usuarioDatos('localhost','root','','portalingeniasi');

$cambio = false;
if(isset($_POST["txtCorreo"]) && $_POST["txtCorreo"] != ""){
    $correo = $_POST["txtCorreo"];
    if($correo != $_SESSION["correoUsuario"])
        $cambio = true;
}
else{
    $correo = $_SESSION["correoUsuario"];
}
if(isset($_POST["txtTelefono"]) && $_POST["txtTelefono"] != ""){
    $telefono = $_POST["txtTelefono"];
    if($telefono != $_SESSION["telefonoUsuario"])
        $cambio = true;
}
else{
    $telefono = $_SESSION["telefonoUsuario"];
}
if(isset($_POST["txtNombres"]) && $_POST["txtNombres"] != ""){
    $nombres = $_POST["txtNombres"];
    if($nombres != $_SESSION["nombresUsuario"])
        $cambio = true;
}
else{
    $nombres = $_SESSION["nombresUsuario"];
}
if(isset($_POST["txtApellidos"]) && $_POST["txtApellidos"] != ""){
    $apellidos = $_POST["txtApellidos"];
    if($apellidos != $_SESSION["apellidosUsuario"])
        $cambio = true;
} 
else {
    $apellidos = $_SESSION["apellidosUsuario"];
}
if($cambio){
    $_SESSION["correoUsuario"] = $correo;
    $_SESSION["telefonoUsuario"] = $telefono;
    $_SESSION["nombresUsuario"] = $nombres;
    $_SESSION["apellidosUsuario"] = $apellidos;
    echo $confObj->cambiarInfoPersonal($_SESSION["idUsuario"], $correo, $telefono, $nombres, $apellidos);
}
else{
    echo 1;
}

