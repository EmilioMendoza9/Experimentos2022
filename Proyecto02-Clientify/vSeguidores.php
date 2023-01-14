<?php
session_start();
require_once('resources\php\capaDatos\empresa.php');
require_once('resources\php\capaDatos\usuario.php');
require_once('resources\php\capaDatos\usuarioEmpresa.php');
$usuario = new usuarioDatos('localhost', 'root', '', 'portalingeniasi');
$empresa = new empresaDatos('localhost','root','','portalingeniasi');
$relacion = new relacionDatos('localhost','root','','portalingeniasi');
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
    <title>Seguidores</title>
</head>
<body>

<?php
  require_once('gMenu.php');
?>
<main>
  <?php
    $clientes = $empresa->consultarClientes($_SESSION['correoUsuario']);
    if(count($clientes) > 0){
      echo('
        <div class="d-flex justify-content-around">
          <h3><strong>Empresa: </strong>'.$_SESSION['razonSocial'].'</h3>
          <h3><strong>Seguidores: </strong>'.count($clientes).'</h3>
        </div>
      ');
    }
    else{
      echo('
        <div class="d-flex justify-content-around">
          <h3><strong>Empresa: </strong>'.$_SESSION['razonSocial'].'</h3>
          <h3><strong>Seguidores: </strong>0</h3>
        </div>
      ');
    }
  ?>
  
  <table class="w-75 bg-success bg-opacity-50 mx-auto mt-3 rounded rounded-3">
    <tbody>
      <?php
          $seguidores = $relacion->seguidores($_SESSION['idEmpresa'], $_SESSION['razonSocial']);

          echo('
            <tr class="bg-success bg-opacity-75">
              <th class="py-3 text-center">Nombre completo</th>
              <th class="py-3 text-center">Telefono</th>
              <th class="py-3 text-center">Correo</th>
              <th class="py-3 text-center">Fecha de nacimiento</th>
              <th class="py-3 text-center">Estado</th>
            </tr>
          ');
          for ($i=0; $i < count($seguidores); $i++) { 
            if($seguidores[$i]['correo'] == $_SESSION['correoUsuario']){
              echo ('<tr class="border-bottom">
                  <td class="py-4 text-center fw-bold">' . $seguidores[$i]['nombres'] .' '. $seguidores[$i]['apellidos'] . '</td>
                  <td class="py-4 text-center">' . $seguidores[$i]['telefono'] . '</td>
                  <td class="py-4 text-center">' . $seguidores[$i]['correo'] . '</td>
                  <td class="py-4 text-center">' . $seguidores[$i]['fechaNacimiento'] . '</td>
                  <td class="py-4 text-center">Dueño</td>
                </tr>
              '); 
              break;
            }
        
          
          for ($i=0; $i < count($seguidores); $i++) { 
            if($seguidores[$i]['correo'] != $_SESSION['correoUsuario']){
              echo ('<tr class="border-bottom">
                <td class="py-4 text-center fw-bold">' . $seguidores[$i]['nombres'] .' '. $seguidores[$i]['apellidos'] . '</td>
                <td class="py-4 text-center">' . $seguidores[$i]['telefono'] . '</td>
                <td class="py-4 text-center">' . $seguidores[$i]['correo'] . '</td>
                <td class="py-4 text-center">' . $seguidores[$i]['fechaNacimiento'] . '</td>
              ');
              
              if($seguidores[$i]['origen'] == $_SESSION['razonSocial']){
                echo('<td class="py-4 text-center">Cliente registrado</td>');
              }
              else{
                echo('<td class="py-4 text-center">Seguidor</td>');
              }
              echo('</tr>');
            }
        }
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