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
conexion::closeConection();
function stringAleatorio()
{
    $caracteres="0123456789abcdefghijklmnopqrstuvwxyz";
    $numeroCaracteres=strlen($caracteres);
    $stringAleatorio="";
    for($i=0; $i<$numeroCaracteres; $i++)
    {
        $stringAleatorio.=$caracteres[rand(0, $numeroCaracteres-1)];
    } 
    return $stringAleatorio;
}



enviarCorreo::verificacion($usuario->obtenerEmail(), CORREO);

?>