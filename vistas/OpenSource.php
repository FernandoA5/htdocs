<?php
$P=5;
$titulo="OpenSource";
include_once "app/repositorioUsuario.inc.php";
include_once "app/conexion.inc.php";
include_once "app/config.inc.php";
//
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
//VALIDANDO QUE SOLO LOS USUARIOS REGISTRADOS PUEDAN ACCEDER
if(!isset($_SESSION["nombre_usuario"]))
{
    ?>
    <br><br>
    <h1 class="text-center"><a href="<?php echo LOGIN; ?>">Inicia cesión para acceder aquí</a></h1>
    <?php
}
//OBTENIENDO USUARIO POR EL NOMBRE EN LA CESIÓN
conexion::openConection();
$usuario=repositorioUsuario::obtenerUsuarioPorNombre(conexion::getConection(), $_SESSION["nombre_usuario"]);
conexion::closeConection();

?>
<?php
 include_once "Plantillas/cierre.php";
?>