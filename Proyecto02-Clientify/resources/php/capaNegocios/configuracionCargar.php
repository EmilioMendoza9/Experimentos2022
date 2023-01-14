<?php
session_start();
$ruta = dirname(__DIR__);
require_once($ruta.'\capaDatos\configuracion.php');

$confObj = new configuracionDatos('localhost','root','','portalingeniasi');
$res = $confObj->consultarUsuario($_SESSION['idUsuario']);
echo json_encode($res[0]);