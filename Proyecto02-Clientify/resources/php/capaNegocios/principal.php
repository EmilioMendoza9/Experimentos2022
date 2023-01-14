<?php
$ruta = dirname(__DIR__);
require_once($ruta.'\capaDatos\empresa.php');

$empresa = new empresaDatos('localhost','root','','portalingeniasi');
$usuarioValido = $empresa->consultarEmpresas();
if(isset($usuarioValido) && count($usuarioValido) > 0){
    if($clave == $usuarioValido[0]["clave"]){
        session_unset();
        session_start();
        $_SESSION['idUsuario'] = $usuarioValido[0]['id'];
        $_SESSION['correoUsuario'] = $usuarioValido[0]['correo'];
        $_SESSION['telefonoUsuario'] = $usuarioValido[0]['telefono'];
        $_SESSION['nombresUsuario'] = $usuarioValido[0]['nombres'];
        $_SESSION['apellidosUsuario'] = $usuarioValido[0]['apellidos'];
        $_SESSION['idClientifyUsuario'] = $usuarioValido[0]['idClientify'];
        $_SESSION['tipoUsuario'] = $usuarioValido[0]['tipo'];
        echo 0;
    }
    else{
        //Contraseña incorrecta
        echo 2;
    }
}
else{
    //No hay usuarios con este telefono o correo
    echo 1;
}