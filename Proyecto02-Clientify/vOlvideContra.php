<?php
session_start();
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
    <title>Olvide contraseña</title>
</head>
<body>
    <header>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form class="col-4 bg-secondary text-center rounded-3 mt-5 p-5 pt-3" id="formOlvide" method="POST">
                <h3 class="fw-bold">OLVIDE MI CONTRASEÑA</h3>
                <p class="text-center text-light">Le enviaremos un correo para restaurar su contraseña, ingrese su correo.</p>
                <input class="col-9 mb-3" id="txtCorreo" name="txtCorreo" placeholder="Correo" type="text">
                <div class="mt-3">
                    <input class="col-7 btn btn-success fw-bold border border-dark" type="submit" id="btnIniciar" value="Confirmar">
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./resources/js/olvideContra.js"></script>
</body>
</html>