<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Pruebas</title>
</head>
<body>
    <table class="w-75 bg-success bg-opacity-50 mx-auto mt-5 rounded rounded-3">
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
      require_once('resources/php/clientifyApi.php');
      $api = new clientifyApi('contacts/', 'd0b93d57f44241ba962888a24334ee41a0ac9d5b');
      $arre = $api->llamandoApiTokenGet();

      for ($i=0; $i < count($arre->results); $i++) { 
        echo("<tr>");
          echo("<td class='col-2 py-3 ps-2'>".$arre->results[$i]->first_name ." ".$arre->results[$i]->last_name."</td>");
          echo("<td class='col-1'>".$arre->results[$i]->company_name."</td>");
          echo("<td class='col-1'>".$arre->results[$i]->status."</td>");
          echo("<td class='col-2'>".$arre->results[$i]->owner_name."</td>");
            $tiempo = explode('T', $arre->results[$i]->created)[0];
          echo("<td class='col-1'>".$tiempo."</td>");
            $tiempo =  explode('T', $arre->results[$i]->last_contact)[0];
          echo("<td class='col-1'>".$tiempo."</td>");
          echo("<td class='col-1 pe-3'>"."
            <a href='cliente.php?id=".$arre->results[$i]->id."'>
              <button class='btn bg-secondary bg-gradient bg-opacity-75 text-white w-100'>Ver contacto</button>
            </a>".
          "</td>");
        echo("</tr>");
      }
    ?>
    </tbody>
    </table>
</body>
</html>