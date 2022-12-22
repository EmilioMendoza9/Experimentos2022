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
    <title>Principal</title>
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
  <table class="w-75 bg-success bg-opacity-50 mx-auto mt-3 rounded rounded-3">
    <tbody>
      <?php
        if(isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == "Cliente"){
          echo('
            <tr>
              <th class="py-3 text-center">Compañia</th>
              <th class="py-3 text-center">Telefono</th>
              <th class="py-3 text-center">Correo</th>
              <th class="py-3 text-center">Pagina web</th>
              <th class="py-3 text-center">Acción</th>
            </tr>
          ');

          require_once('resources\php\capaDatos\empresa.php');
          require_once('resources\php\capaDatos\usuario.php');
          $usuario = new usuarioDatos('localhost', 'root', '', 'portalingeniasi');
          $suscritos = $usuario->consultarEmpresasSuscritas($_SESSION['idUsuario']);
          $empresa = new empresaDatos('localhost','root','','portalingeniasi');
          $empresas = $empresa->consultarEmpresas();
          if(isset($empresas) && count($empresas) > 0){
            for ($i=0; $i < count($empresas); $i++) {
              $siguiendo = false;
              echo ('<tr>
                <td class="py-3 text-center">' . $empresas[$i]['razonSocial'] . '</td>
                <td class="py-3 text-center">' . $empresas[$i]['telefono'] . '</td>
                <td class="py-3 text-center">' . $empresas[$i]['correo'] . '</td>
                <td class="py-3 text-center">' . $empresas[$i]['paginaWeb'] . '</td>
              ');
              for ($j=0; $j < count($suscritos); $j++) { 
                if($empresas[$i]['razonSocial'] == $suscritos[$j]['razonSocial']){
                  $siguiendo = true;
                  break;
                }
              }
              if($siguiendo){
                echo ('
                  <td class="py-3 text-center">
                    <button id="btnSeguir" class="btn bg-success bg-gradient text-white">Siguiendo</button>
                  </td>
                ');
              }
              else{
                echo ('
                  <td class="py-3 text-center">
                    <button id="btnSeguir" class="btn bg-success bg-opacity-75 bg-gradient text-white">Seguir</button>
                  </td>
                ');
              }
              echo ('</tr>');
            }
          }
          else{
            echo 1;
          }
        }
        else{
          echo('
            <th class="py-3 text-center">Nombre completo</th>
            <th class="py-3 text-center">Telefono</th>
            <th class="py-3 text-center">Correo</th>
            <th class="py-3 text-center">Fecha de nacimiento</th>
          ');


        }
      ?>  
    </tbody>
  </table>
  <script src="resources/js/principal.js"></script>
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