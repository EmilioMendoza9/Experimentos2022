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
    <title>Registrar usuario</title>
</head>



<body>
    <header></header>
    <main>
        <article class="d-flex justify-content-center">
            <form class="col-4 bg-secondary text-center rounded-3 mt-5 p-5 pt-3" id="formRegistrar" method="POST">
                <h3 class="fw-bold">REGISTRARSE</h3>
                <p class="text-center text-light fw-bold">Llene los campos para crear una cuenta.</p>
                <label for="correo" class="d-block text-white fw-bold col-4">Correo:</label>
                <input class="col-9 mb-3" id="txtCorreo" name="txtCorreo" placeholder="Correo" type="text">
                <label for="telefono" class="d-block text-white fw-bold col-4">Telefono:</label>
                <input class="col-9 mb-3" id="txtTelefono" name="txtTelefono" placeholder="Telefono" type="text">
                <label for="contraseña" class="d-block text-white fw-bold col-4">Contraseña:</label>
                <input class="col-9 mb-3" id="txtClave" name="txtClave" placeholder="Contraseña" type="text">
                <label for="contraseña2" class="d-block text-white fw-bold col-5">Repetir contraseña:</label>
                <input class="col-9 mb-3" id="txtClave2" name="txtClave2" placeholder="Repetir contraseña" type="text">
                <label for="Nombres" class="d-block text-white fw-bold col-4">Nombres:</label>
                <input class="col-9 mb-3" id="txtNombres" name="txtNombres" placeholder="Nombres" type="text">
                <label for="Apellidos" class="d-block text-white fw-bold col-4">Apellidos:</label>
                <input class="col-9 mb-3" id="txtApellidos" name="txtApellidos" placeholder="Apellidos" type="text">
                <div class="mt-3">
                    <input class="col-7 btn btn-success fw-bold border border-dark" type="submit" id="btnRegistrarse" value="Confirmar">
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="resources/js/btnCerrarSesion.js"></script>
    <script src="resources/js/registrar.js"></script>
</body>
</html>