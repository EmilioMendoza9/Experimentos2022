<?php
function validar($campo){
    if(isset($_POST[$campo])){
        if($_POST[$campo] != ""){
            return $_POST[$campo];
        }
        else{
            alerta("El sig campo se encuentra vacio: ".$campo);
        }
    }
    else{
        alerta("No existe el campo: ".$campo);
    }
}

function alerta($mensaje){
    echo($mensaje);
}

function conectarBD($correo){
    $link = mysqli_connect('localhost','w260617_emilio','PozolE27','w260617_isi');
    if(isset($link)){
        $res = mysqli_query($link, "SELECT * FROM usuario WHERE correo ='".$correo."'");
        $res = mysqli_fetch_assoc($res);
        return $res;
    }
    else{
        return NULL;
    }
}

function login(){
    $correo = validar("txtCorreo");
    $contra = validar("txtContra");

    if(isset($contra)){
        $usuario = conectarBD($correo);
        if(isset($usuario)){
            if(password_verify($contra, $usuario["password"])){
                alerta("login");
            }
            else{
                alerta("Contraseña erronea");
            }
        }
        else{
            alerta("Usuario no existe");
        }
    }else{
        alerta('No hay contraseña');
    }
}

login();
?>