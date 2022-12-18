<?php
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
    <title>Configuración</title>
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
    <main>
            <form action="p" id="formCC" method="POST" class="col-4 text-center rounded-3 mt-5 p-5 pt-3 mx-auto">
                <h3 class="fw-bold">Cambiar contraseña</h3>
                <input type="password" class="col-9 mb-3 fs-5" placeholder="Contraseña nueva" name="txtCorreo" id="txtCorreo">
                <input type="password" class="col-9 mb-3 fs-5" placeholder="Repetir contraseña nueva" name="txtContra" id="txtContra">
                <div class="mx-auto">
                    <label class="container col-6">Mostrar contraseña
                        <input type="checkbox" id="cbMostrarContra">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="mt-3">
                    <input type="submit" id="btnIniciar" value="Cambiar contraseña" class="col-5 btn btn-primary fw-bold border border-dark">
                </div>
            </form>
            
            <article class="mt-3 mx-auto col-5">
                <h3 class="fw-bold text-center">Aviso de privacidad</h3>
                <label class="container">Que las empresas tengan acceso a mis datos personales
                    <input type="checkbox" id="cbPrivacidad">
                    <span class="checkmark"></span>
                </label>
            </article>



    </main>
    <footer>
    </footer>
    <script src="./js/bootstrap.bundle.min.js"></script>
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