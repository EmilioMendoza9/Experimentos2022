<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css"> 
    <link rel="stylesheet" href="./css/miEstilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="./resources/js/iniciarSesion.js"></script>
</head>
<body>
    <header>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form action="./resources/php/iniciarSesion.php" id="formInicio" method="POST" class="col-4 bg-secondary text-center rounded-3 mt-5 p-5 pt-3">
                <h3 class="fw-bold">INICIO DE SESIÓN</h3>
                <input type="text" class="col-9 mb-3" placeholder="Correo" name="txtCorreo" id="txtCorreo">
                <input type="text" class="col-9" placeholder="Contraseña" name="txtContra" id="txtContra">
                <div class="mt-3">
                    <!-- <input type="button" value="Iniciar sesión" id="btnIniciar"> -->
                    <input type="submit" id="btnIniciar" value="Iniciar sesión" class="col-7 btn btn-success fw-bold border border-dark">
                </div>
                <div class="container pt-2">
                    <a href="olvideContra.html" class="text-white text-decoration-none">Olvide contraseña</a>
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>