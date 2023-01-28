<?php
session_start();
if(!($_SESSION['idUsuario'])){
    header('Location:/Experimentos/Proyecto02-Clientify/vIndex.php');
}
require_once('resources\php\capaDatos\usuario.php');
require_once('resources\php\capaDatos\empresa.php');
$sesion = new usuarioDatos('localhost','root','','portalingeniasi');
$dueñoEmpresa = new empresaDatos('localhost','root','','portalingeniasi');
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
        <?php
            require_once('gMenu.php');
        ?>
    </header>
    <main class="col-7 mt-5 mx-auto bg-secondary bg-opacity-25 p-2">
        <?php
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
                $res = $dueñoEmpresa->consultarEmpresaPorDueño($_SESSION['correoUsuario']);
                echo('
                    <h3><span class="fw-bold">Nombre:</span> '.$_SESSION["nombresUsuario"].'</h3>
                    <h3><span class="fw-bold">Apellidos:</span> '.$_SESSION["apellidosUsuario"].'</h3>
                    <h3><span class="fw-bold">Correo dueño:</span> '.$_SESSION["correoUsuario"].'</h3>
                    <h3><span class="fw-bold">Razon social:</span> '.$res[0]['razonSocial'].'</h3>
                    <h3><span class="fw-bold">Telefono:</span> '.$_SESSION['telefonoUsuario'].'</h3>
                    <h3><span class="fw-bold">Correo:</span> '.$_SESSION["correoUsuario"].'</h3>
                    <h3><span class="fw-bold">Pagina web:</span> '.$res[0]['paginaWeb'].'</h3>
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