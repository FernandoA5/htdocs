<?php
$P=5;
$titulo="OpenSource";
include_once "app/repositorioUsuario.inc.php";
include_once "app/conexion.inc.php";
include_once "app/config.inc.php";
include_once "app/redireccion.inc.php";
//
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
//ENVIAR CORREO SOLO FUNCIONA EN HOSTINGER
/*$direccion="fernando.alcalacss@uanl.edu.mx";
$asunto="Testing";
$mensaje="Testeando funcion Mail";
$exito=mail($direccion, $asunto, $mensaje);
if($exito)
{
    echo HOLI." mensaje enviado";
}
else{
    echo HOLIERROR;
}*/
//VALIDANDO QUE SOLO LOS USUARIOS REGISTRADOS PUEDAN ACCEDER
if(!isset($_SESSION["nombre_usuario"]))
{
    ?>
    <br><br>
    <h1 class="text-center"><a href="<?php echo LOGIN; ?>">Inicia cesión para acceder aquí</a></h1>
    <?php
}
else{
    conexion::openConection();
    $usuario=repositorioUsuario::obtenerUsuarioPorNombre(conexion::getConection(), $_SESSION["nombre_usuario"]);
    conexion::closeConection();
    if($usuario->obtenerSuscripcion()!=3 && $usuario->obtenerSuscripcion()!=5)
    {
        echo "Nothing here to you";
    }
    else
    {
        include_once "app/avatars.inc.php";
        $minTemp=avatars::controlAvatars($usuario->obtenerAvatar());
        
        ?>
            <div class="container-liquid">
                <div class="row">
                    <div class="col-md-2">
                        <h1 class="text-center">
                            <a href="
                            <?php
                                
                            ?>
                            " class="enlace" style="color: blue; font-size:70%">
                            <?php
                               echo $usuario->obtenerNombre();
                            ?>
                            </a>
                        <h1>
                        <img class="center-block" width="80%" src="<?php echo $minTemp;?>" alt="<?php echo HOLIERROR."imagen no encontrada" ?>">
                    </div>
                </div>
            </div>
        <?php
    }

}
//OBTENIENDO USUARIO POR EL NOMBRE EN LA CESIÓN

?>
<?php
 include_once "Plantillas/cierre.php";
?>