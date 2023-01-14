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
<?php
  require_once('gMenu.php');
?>
    <main>
            <form action="" id="formInfoPersonal" method="POST" class="col-6 text-center rounded-3 mt-3 p-5 pt-3 mx-auto">
                <h3 class="fw-bold">Datos personales</h3>
                <div class="d-flex justify-content-center">
                    <div>
                        <input type="text" class="col-9 mb-3 fs-5" placeholder="Correo" name="txtCorreo" id="txtCorreo">
                        <input type="text" class="col-9 mb-3 fs-5" placeholder="Telefono" name="txtTelefono" id="txtTelefono">
                    </div>
                    <div>
                        <input type="text" class="col-9 mb-3 fs-5" placeholder="Nombres" name="txtNombres" id="txtNombres">
                        <input type="text" class="col-9 mb-3 fs-5" placeholder="Apellidos" name="txtApellidos" id="txtApellidos">
                    </div>
                </div>
                <div class="mt-3">
                    <input type="submit" id="btnCambiar" value="Cambiar información" class="col-5 btn btn-primary fw-bold border border-dark">
                </div>
            </form>
            <form action="" id="formCC" method="POST" class="col-4 text-center rounded-3 mt-3 p-5 pt-3 mx-auto">
                <h3 class="fw-bold">Cambiar contraseña</h3>
                <input type="password" class="col-9 mb-3 fs-5" placeholder="Contraseña nueva" name="txtContra1" id="txtContra1">
                <input type="password" class="col-9 mb-3 fs-5" placeholder="Repetir contraseña nueva" name="txtContra2" id="txtContra2">
                <div class="mx-auto">
                    <label class="container col-6">Mostrar contraseña
                        <input type="checkbox" id="cbMostrarContra">
                        <span class="checkmark mt-1"></span>
                    </label>
                </div>
                <div class="mt-3">
                    <input type="submit" id="btnCC" value="Cambiar contraseña" class="col-5 btn btn-primary fw-bold border border-dark">
                </div>
            </form>
            
            <article class="mt-5 mx-auto col-5">
                <h3 class="fw-bold text-center">Aviso de privacidad</h3>
                <label class="container col-7">Que las empresas tengan acceso a mis datos personales
                    <input type="checkbox" id="cbPrivacidad">
                    <span class="checkmark mt-2"></span>
                </label>
            </article>
        <!--
            <article class="mt-5 mx-auto col-5">
                <h3 class="fw-bold text-center">Modo oscuro</h3>
                <label class="container col-7">Activar modo oscuro
                    <input type="checkbox" id="cbModoOscuro">
                    <span class="checkmark mt-2"></span>
                </label>
            </article>
        -->


    </main>
    <footer>
    </footer>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="resources/js/btnCerrarSesion.js"></script>
    <script src="resources/js/configuracion.js"></script>
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