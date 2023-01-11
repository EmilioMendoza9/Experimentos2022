<?php
require_once('resources\php\capaDatos\usuario.php');
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="resources/css/miEstilo.css">
    <title>Perfil</title>
</head>
<body>
<header class="clearfix border p-2">
    <div class="d-flex justify-content-between">
        <div>
            <!-- Menu laretal -->
            <button class="btn bg-primary bg-gradient text-white fs-4" onclick="openLeftMenu()">&#9776;</button>
            <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
            <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">&times;</button>
              <a href="vPerfil.php" class="w3-bar-item w3-button">Perfil</a>
              <a href="vPrincipal.php" class="w3-bar-item w3-button">Temas de interés</a>
              <a href="vConfiguracion.php" class="w3-bar-item w3-button">Configuración</a>
            </div>
        </div>
        <?php
            echo('<h3 class="mx-auto fw-bold">Bienvenido: '.$_SESSION['nombresUsuario'].'</h3>');
        ?>
        <?php
            if(isset($_SESSION['idUsuario'])){
                echo("<button class='btn bg-danger bg-gradient text-white float-end mt-3' id='btnCerrarS'><strong>Cerrar sesión</strong></button>");
            }
            else{
                echo("<button class='btn bg-success bg-gradient text-white float-end mt-3' id='btnAbrirS'><strong>Iniciar sesion</strong></button>");
            }
        ?>
    </div>
  </header>
    <main class="col-9 mx-auto bg-secondary bg-opacity-25 p-2">
        <?php
            $sesion = new usuarioDatos('localhost','root','','portalingeniasi');
            $usuario = $sesion->consultarUsuarioID($_SESSION['idUsuario']);
            if(isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == "Cliente"){
                echo('
                    <h3 class="ms-4"><span class="fw-bold">Nombre:</span> '.$_SESSION["nombresUsuario"].'</h3>
                    <h3 class="ms-4"><span class="fw-bold">Apellidos:</span> '.$_SESSION["apellidosUsuario"].'</h3>
                    <h3 class="ms-4"><span class="fw-bold">Telefono:</span> '.$_SESSION['telefonoUsuario'].'</h3>
                    <h3 class="ms-4"><span class="fw-bold">Correo:</span> '.$_SESSION["correoUsuario"].'</h3>
                    <h3 class="ms-4"><span class="fw-bold">Fecha de nacimiento:</span> '.$usuario[0]['fechaNacimiento'].'</h3>
                ');
            }
            else{
                echo('
                    <h3><span class="fw-bold">Nombre:</span> '.$_SESSION["nombresUsuario"].'</h3>
                    <h3><span class="fw-bold">Apellidos:</span> '.$_SESSION["apellidosUsuario"].'</h3>
                    <h3><span class="fw-bold">Correo dueño:</span> '.$_SESSION["correoUsuario"].'</h3>
                    <h3><span class="fw-bold">Razon social:</span></h3>
                    <h3><span class="fw-bold">Telefono:</span></h3>
                    <h3><span class="fw-bold">Correo:</span></h3>
                    <h3><span class="fw-bold">Pagina web:</span></h3>
                ');
            }
        ?>
    </main>
    <footer>
    </footer>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="resources/js/btnCerrarSesion.js"></script>
    <script>
    function openLeftMenu() {
      document.getElementById("leftMenu").style.display = "block";
    }

    function closeLeftMenu() {
      document.getElementById("leftMenu").style.display = "none";
    }
</script>
</body>
</html>