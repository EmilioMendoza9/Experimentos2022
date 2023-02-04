<?php
session_start();
if(!($_SESSION['idUsuario'])){
    header('Location:/Experimentos/Proyecto02-Clientify/vIndex.php');
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Seguidores</title>
</head>



<body>
    <header class="clearfix border p-2">
        <?php
            require_once('gMenu.php');
        ?>
    </header>
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
        <table class="w-75 mx-auto mt-3 rounded rounded-3">
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
                            echo ('<tr class="border-bottom bg-success bg-opacity-50">
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
                                if($seguidores[$i]['datosPrivados'] == 'N'){
                                    echo ('<tr class="border-bottom bg-success bg-opacity-50">
                                    <td class="py-4 text-center fw-bold">¡¡Datos privados!!  ' . $seguidores[$i]['nombres'] .' '. $seguidores[$i]['apellidos'] . '</td>
                                    <td class="py-4 text-center">' . $seguidores[$i]['telefono'] . '</td>
                                    <td class="py-4 text-center">' . $seguidores[$i]['correo'] . '</td>
                                    <td class="py-4 text-center">' . $seguidores[$i]['fechaNacimiento'] . '</td>
                                    ');    
                                }
                                else{
                                    echo ('<tr class="border-bottom bg-success bg-opacity-50">
                                        <td class="py-4 text-center fw-bold">' . $seguidores[$i]['nombres'] .' '. $seguidores[$i]['apellidos'] . '</td>
                                        <td class="py-4 text-center">' . $seguidores[$i]['telefono'] . '</td>
                                        <td class="py-4 text-center">' . $seguidores[$i]['correo'] . '</td>
                                        <td class="py-4 text-center">' . $seguidores[$i]['fechaNacimiento'] . '</td>
                                    ');    
                                }
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
                <div>
                    <!-- OPCION 1 -->
                <tr class="border-bottom bg-danger bg-opacity-50">
                    <td class="py-3 text-center fw-bold">
                        <p>Carlos Emilio Mendoza Sarmiento</p>
                        <div class="d-flex justify-content-center">
                            <i class="fa fa-warning pe-1" style="font-size:18px;color:red"></i>
                            <p><small>Este cliente solicito no utilizar sus datos</small></p>
                        </div>
                    </td>
                    <td class="py-4 text-center">- - -</td>
                    <td class="py-4 text-center">Emilio.mendoza@ingeniasi.com</td>
                    <td class="py-4 text-center">- - -</td>
                    <td class="py-4 text-center">Cliente registrado</td>
                </tr>
                <!-- OPCION 2 -->
                <tr class="border-bottom bg-warning bg-opacity-50">
                    <td class="py-3 text-center fw-bold">
                        <p>Carlos Emilio Mendoza Sarmiento</p>
                        <div class="d-flex justify-content-center">
                            <i class="fa fa-warning pe-1" style="font-size:18px;color:red"></i>
                            <p><small>Este cliente solicito no utilizar sus datos</small></p>
                        </div>
                    </td>
                    <td class="py-4 text-center">- - -</td>
                    <td class="py-4 text-center">Emilio.mendoza@ingeniasi.com</td>
                    <td class="py-4 text-center">- - -</td>
                    <td class="py-4 text-center">Cliente registrado</td>
                </tr>
                <!-- OPCION 3 -->
                <tr class="border-bottom bg-danger bg-opacity-50">
                    <td class="py-3 text-center fw-bold" colspan="99">
                        <p>Emilio.mendoza@ingeniasi.com</p>
                        <div class="d-flex justify-content-center">
                            <i class="fa fa-warning pe-1" style="font-size:18px;color:red"></i>
                            <p><small>Este cliente solicito no utilizar sus datos</small></p>
                        </div>
                    </td>
                </tr>
                <!-- OPCION 4 -->
                <tr class="border-bottom bg-danger bg-opacity-50">
                    <td class="py-3 text-center fw-bold">
                        <p>Emilio.mendoza@ingeniasi.com</p>
                        <div class="d-flex justify-content-center">
                            <i class="fa fa-warning pe-1" style="font-size:18px;color:red"></i>
                            <p><small>Este cliente solicito no utilizar sus datos</small></p>
                        </div>
                    </td>
                    <td class="py-4 text-center"></td>
                    <td class="py-4 text-center"></td>
                    <td class="py-4 text-center"></td>
                    <td class="text-center">Cliente registrado</td>
                </tr>
                <!-- OPCION 5 -->
                <tr class="border-bottom bg-danger bg-opacity-50">
                    <td class="py-4 text-center fw-bold">
                        <p>Emilio.mendoza@ingeniasi.com</p>
                    </td>
                    <td>                            
                    <div class="d-flex justify-content-center">
                        <i class="fa fa-warning pe-1" style="font-size:18px;color:red"></i>
                        <strong><p><small>Este cliente solicito no utilizar sus datos</small></p></td></strong>
                    </div>
                    <td></td>
                    <td></td>
                    <td class="py-4 text-center">Cliente registrado</td>
                </tr>
                </div>
            </tbody>
        </table>
        <button id="ocultarClientesPrivados" class="mx-auto">Ocultar clientes con datos privados</button>
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