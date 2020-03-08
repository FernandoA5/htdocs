<?php
$P=0;
$titulo="Enviando Correo";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
include_once "app/enviarCorreo.inc.php";
include_once "app/repositorioUsuario.inc.php";
include_once "app/conexion.inc.php";
include_once "app/redireccion.inc.php";
include_once "app/repositorioConfirmarCorreo.inc.php";
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
conexion::openConection();
$nombre=$usuario->obtenerNombre();
$stringAleatorio=stringAleatorio(10);
$urlSecreta=hash("sha256", $stringAleatorio.$nombre);
$peticion=repositorioConfirmarCorreo::generarPeticion(conexion::getConection(),$usuario->obtenerId(), $urlSecreta);
if($peticion)
{
    $url="www.hard-level.com/confirmar/".$urlSecreta;
    enviarCorreo::verificacion($usuario->obtenerEmail(), CORREO, $url);
}




include_once "Plantillas/cierre.php";
?>
