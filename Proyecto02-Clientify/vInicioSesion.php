<?php
session_start();
if(isset($_SESSION['idUsuario'])){
    header('Location:/Experimentos/Proyecto02-Clientify/vPrincipal.php');
}
require_once('./resources/php/clientifyApi.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="resources/css/miEstilo.css">
    <script src="resources/js/iniciarSesion.js"></script>
    <title>Inicio sesión</title>
</head>



<body>
    <header></header>
    <main>
        <article class="d-flex justify-content-center">
            <form action="resources/php/capaNegocios/iniciarSesionAuth.php" id="formInicio" method="POST" class="col-4 bg-secondary text-center rounded-3 mt-5 p-5 pt-3">
                <h3 class="fw-bold text-white">INICIO DE SESIÓN</h3>
                    <!--  <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"> -->
                <input type="email" class="col-9 mb-3" placeholder="Correo" name="txtCorreo" id="txtCorreo" minlength="4" maxlength="50">
                <input type="password" class="col-9 mb-3" placeholder="Contraseña" name="txtContra" id="txtContra" minlength="8" maxlength="20">
                <div class="mx-auto">
                    <input type="checkbox" id="cbMostrarContra"><label for="">Mostrar contraseña</label>
                </div>
                <div class="mt-3">
                    <input type="submit" id="btnIniciar" value="Iniciar sesión" class="col-7 btn btn-success fw-bold border border-dark">
                    <input type="button" id="btnRegistrar" value="Registrarse" class="col-7 btn btn-success fw-bold border border-dark mt-2">
                </div>
                <!-- EN PROCESO-->
                <div class="container pt-2">
                    <a href="#" class="text-white text-decoration-none">Olvide contraseña</a>
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
</body>
</html>