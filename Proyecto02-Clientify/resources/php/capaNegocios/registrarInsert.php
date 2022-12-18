<?php
$ruta = dirname(__DIR__);
require_once($ruta.'\capaDatos\usuario.php');
$usuario = new usuarioDatos('localhost','root','','portalingeniasi');

echo 2;