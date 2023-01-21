<?php
  
    echo('
            <div class="d-flex justify-content-between">
                <div>
                    <!-- Menu laretal -->
                    <button class="btn bg-primary bg-gradient text-white fs-4" onclick="openLeftMenu()">&#9776;</button>
                    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
                    <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">&times;</button>
                    <a href="vPerfil.php" class="w3-bar-item w3-button">Perfil</a>
                    ');
                    if($_SESSION['tipoUsuario'] == "Dueño"){
                        echo('<a href="vSeguidores.php" class="w3-bar-item w3-button">Seguidores</a>');
                    }
                    echo('
                    <a href="vPrincipal.php" class="w3-bar-item w3-button">Temas de interés</a>
                    <a href="vConfiguracion.php" class="w3-bar-item w3-button">Configuración</a>
                    </div>
                    </div>
                    ');
                    echo('<h3 class="mx-auto fw-bold">Bienvenido: '.$_SESSION['nombresUsuario'].'</h3>');
                    if(isset($_SESSION['idUsuario'])){
                        echo("<button class='btn bg-danger bg-gradient text-white float-end mt-3' id='btnCerrarS'><strong>Cerrar sesión</strong></button>");
                    }
                    else{
                        echo("<button class='btn bg-success bg-gradient text-white float-end mt-3' id='btnAbrirS'><strong>Iniciar sesion</strong></button>");
                    }
    echo('
            </div>
    ');
  
?>