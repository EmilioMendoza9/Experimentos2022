<?php
session_start();
require_once('resources\php\capaDatos\empresa.php');
require_once('resources\php\capaDatos\usuario.php');
$usuario = new usuarioDatos('localhost', 'root', '', 'portalingeniasi');
$empresa = new empresaDatos('localhost','root','','portalingeniasi');
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
<main>
  <?php
    if(isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == "Dueño"){    
      $clientes = $empresa->consultarClientes($_SESSION['correoUsuario']);
      if(count($clientes) > 0){
        echo('
          <div class="d-flex justify-content-around">
            <h3><strong>Empresa: </strong>'.$clientes[0]["razonSocial"].'</h3>
            <h3><strong>Seguidores: </strong>'.count($clientes).'</h3>
          </div>
        ');
      }
      else{
        echo('
          <div class="d-flex justify-content-around">
            <h3><strong>Empresa: </strong>Empresa</h3>
            <h3><strong>Seguidores: </strong>0</h3>
          </div>
        ');
      }
    }
  ?>
  
  <table class="w-75 bg-success bg-opacity-50 mx-auto mt-3 rounded rounded-3">
    <tbody>
      <?php
        if(isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == "Cliente"){
          //CABECERA
          echo('
            <tr class="bg-success bg-opacity-75">
              <th class="py-3 text-center">Compañia</th>
              <th class="py-3 text-center">Telefono</th>
              <th class="py-3 text-center">Correo</th>
              <th class="py-3 text-center">Pagina web</th>
              <th class="py-3 text-center">Acción</th>
            </tr>
          ');

          $suscritos = $usuario->consultarEmpresasSuscritas($_SESSION['idUsuario']);
          $empresas = $empresa->consultarEmpresas();
          if(isset($empresas) && count($empresas) > 0){
            for ($i=0; $i < count($empresas); $i++) {
              $siguiendo = false;
              echo ('<tr class="border-bottom">
                <td class="py-4 text-center fw-bold">' . $empresas[$i]['razonSocial'] . '</td>
                <td class="py-4 text-center">' . $empresas[$i]['telefono'] . '</td>
                <td class="py-4 text-center">' . $empresas[$i]['correo'] . '</td>
                <td class="py-4 text-center">' . $empresas[$i]['paginaWeb'] . '</td>
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
                    <button id="btnSeguir'.($i + 1).'" class="btn bg-success bg-gradient text-white" value="'.$empresas[$i]["id"].'">Siguiendo</button>
                  </td>
                ');
              }
              else{
                echo ('
                  <td class="py-3 text-center">
                    <button id="btnSeguir'.($i + 1).'" class="btn bg-success bg-opacity-75 bg-gradient text-white" value="'.$empresas[$i]["id"].'">Seguir</button>
                  </td>
                ');
              }
              echo ('</tr>');
            }
          }
          else{
            echo('<td colspan=99>No hay empresas registradas.</td>');
          }
        }
        else{
          echo('
            <th class="py-3 text-center">Nombre completo</th>
            <th class="py-3 text-center">Telefono</th>
            <th class="py-3 text-center">Correo</th>
            <th class="py-3 text-center">Fecha de nacimiento</th>
          ');
          //AGREGAR CLIENTES DATOS  
        }
      ?>  
    </tbody>
  </table>
</main>
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