<?php
$P=0;
$titulo="Enviando Correo";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
include_once "app/enviarCorreo.inc.php";
include_once "app/repositorioUsuario.inc.php";
include_once "app/conexion.inc.php";
include_once "app/redireccion.inc.php";
conexion::openConection();
$usuario=repositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $_SESSION["id_usuario"]);
enviarCorreo::verificacion($usuario->obtenerEmail(), CORREO);

?>