<?php
$P=5;
$titulo="OpenSource";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
if(!isset($_SESSION["nombre_usuario"]))
{
    ?>
    <br><br>
    <h1 class="text-center"><a href="<?php echo LOGIN; ?>">Inicia cesión para acceder aquí</a></h1>
    <?php
}
else{
    
}
?>
<?php
 include_once "Plantillas/cierre.php";
?>