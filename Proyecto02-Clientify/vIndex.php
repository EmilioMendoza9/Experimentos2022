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
    <link rel="stylesheet" href="resources/css/miEstilo.css">
    <title>Inicio</title>
</head>
<body>
  <?php
    if(isset($_SESSION['idUsuario'])){
      echo('<h3>Bienvenido: '.$_SESSION['nombresUsuario'].'</h3>');
    }
  ?>
  
  <header class="clearfix">
  <?php
        if(isset($_SESSION['idUsuario'])){
          echo("<button class='btn bg-danger bg-gradient text-white float-end mt-3 me-5' id='btnCerrarS'><strong>Cerrar sesión</strong></button>");
        }
        else{
          echo("<button class='btn bg-success bg-gradient text-white float-end mt-3 me-5' id='btnAbrirS'><strong>Iniciar sesion</strong></button>");
        }
      ?>
  </header>
  <h2 class="mx-auto mt-5 w-25">Gestos de contactos</h2>
  <!-- <table class="w-75 bg-success bg-opacity-50 mx-auto mt-3 rounded rounded-3">
    <tbody>
      <tr>
        <th class="py-3">Nombre completo</th>
        <th class="py-3">Compañia</th>
        <th class="py-3">Estado</th>
        <th class="py-3">Propietario</th>
        <th class="py-3">Fecha creación</th>
        <th class="py-3">Ultimo contacto</th>
        <th class="py-3">Acción</th>
      </tr>
      <?php
      ?>
    </tbody>
  </table> -->
  <script src="resources/js/principal.js"></script>
</body>
</html>