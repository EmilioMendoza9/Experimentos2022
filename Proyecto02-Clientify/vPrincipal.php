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
    <title>Principal</title>
</head>



<body>
    <header class="clearfix border p-2">
        <?php
            require_once('gMenu.php');
        ?>
    </header>
    <main>
        <table class="w-75 bg-success bg-opacity-50 mx-auto mt-3 rounded rounded-3">
            <tbody>
                <?php
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
                    if(isset($suscritos) && count($suscritos) > 0){
                        for ($i=0; $i < count($suscritos); $i++) {
                            echo ('<tr class="border-bottom">
                                <td class="py-4 text-center fw-bold">' . $suscritos[$i]['razonSocial'] . '</td>
                                <td class="py-4 text-center">' . $suscritos[$i]['telefono'] . '</td>
                                <td class="py-4 text-center">' . $suscritos[$i]['correo'] . '</td>
                                <td class="py-4 text-center">' . $suscritos[$i]['paginaWeb'] . '</td>
                            ');
                            if(isset($suscritos[$i]['idUsuario'])){
                                echo ('
                                    <td class="py-3 text-center">
                                        <button id="btnSeguir'.($i + 1).'" class="btn bg-success bg-gradient text-white" value="'.$suscritos[$i]["id"].'">Siguiendo</button>
                                    </td>
                                ');
                            }
                            else{
                                echo ('
                                <td class="py-3 text-center">
                                    <button id="btnSeguir'.($i + 1).'" class="btn bg-success bg-opacity-75 bg-gradient text-white" value="'.$suscritos[$i]["id"].'">Seguir</button>
                                </td>
                                ');
                            }
                            echo ('</tr>');
                        }
                    }
                    else{
                        echo('<td colspan=99>No hay empresas registradas.</td>');
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