<?php
session_start();
$ruta = dirname(__DIR__);
require_once($ruta.'\capaDatos\configuracion.php');

$confObj = new configuracionDatos('localhost','root','','portalingeniasi');
echo $confObj->actualizarPrivacidad($_SESSION['idUsuario']);