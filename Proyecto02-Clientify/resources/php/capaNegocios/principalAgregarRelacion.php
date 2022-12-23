<?php
session_start();
$ruta = dirname(__DIR__);
require_once($ruta.'\capaDatos\usuarioEmpresa.php');
$relacion = new relacionDatos('localhost','root','','portalingeniasi');
$empresa= $_GET['idEmpresa'];
$idUsuario = $_SESSION['idUsuario'];
echo($relacion->insertRelacion($empresa, $idUsuario));