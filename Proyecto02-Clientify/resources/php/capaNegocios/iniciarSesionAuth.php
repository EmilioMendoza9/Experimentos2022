<?php
$ruta = dirname(__DIR__);
require_once($ruta.'\capaDatos\usuario.php');
require_once($ruta.'\capaDatos\empresa.php');

$usuarioObj = new usuarioDatos('localhost','root','','portalingeniasi');
$empresaObj = new empresaDatos('localhost','root','','portalingeniasi');
$correo = $_POST['txtCorreo'];
$clave = $_POST['txtContra'];
$usuarioValido = $usuarioObj->consultarUsuario($correo, $correo);
if(isset($usuarioValido) && count($usuarioValido) == 1){
    if(password_verify($clave, $usuarioValido[0]["clave"])){
        session_unset();
        session_start();
        $_SESSION['idUsuario'] = $usuarioValido[0]['id'];
        $_SESSION['correoUsuario'] = $usuarioValido[0]['correo'];
        $_SESSION['telefonoUsuario'] = $usuarioValido[0]['telefono'];
        $_SESSION['nombresUsuario'] = $usuarioValido[0]['nombres'];
        $_SESSION['apellidosUsuario'] = $usuarioValido[0]['apellidos'];
        $_SESSION['idClientifyUsuario'] = $usuarioValido[0]['idClientify'];
        $_SESSION['tipoUsuario'] = $usuarioValido[0]['tipo'];

        if($_SESSION['tipoUsuario'] == "Dueño"){
            $empresa = $empresaObj->consultarEmpresaPorDueño($_SESSION['correoUsuario']);
            $_SESSION['idEmpresa'] = $empresa[0]['id'];
            $_SESSION['razonSocial'] = $empresa[0]['razonSocial'];
            echo 10;
        }
        else{
            echo 0;
        }
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