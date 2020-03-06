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
        include_once "app/repositorioOpenSource.inc.php";
        $minTemp=avatars::controlAvatars($usuario->obtenerAvatar());
        
        ?>
            <div class="container-liquid">
                <div class="row">
                    <div class="col-md-2">
                        <h1 class="text-center">
                            <a href="
                            <?php
                                echo BLOGS."/".$usuario->obtenerNombre();
                            ?>
                            " class="enlace" style="color: blue; font-size:70%">
                            <?php
                               echo $usuario->obtenerNombre();
                            ?>
                            </a>
                        <h1>
                        <img class="center-block" width="80%" src="<?php echo $minTemp;?>" alt="<?php echo HOLIERROR."imagen no encontrada" ?>">
                        <h5 style="color: 339FFF; font-weight: bold" class="text-center"> 
                        PUNTOS
                        </h5>
                        <?php
                        conexion::openConection(); 
                        $usuarioOS=repositorioOpenSource::obtenerUsuarioPorId(conexion::getConection(), $usuario->obtenerId());
                        conexion::closeConection();
                        ?>
                        <h5 style="color:
                        <?php
                            $puntos=$usuarioOS->obtenerPuntos();
                            if($puntos==0)
                            {
                                echo "red";
                            }
                            else
                            {
                                echo "#30EB03";
                            }    
                            ?>; font-weight:bold" class="text-center">
                            <?php
                                echo $puntos;
                            ?>
                        </h5>
                    </div>
                    
                    <div class="col-md-8">
                    
                    </div>
                    <div class="col-md-2">
                        TABLA DE USUARIOS
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