<?php
$P=0;
$titulo ="Página No Encontrada";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
include_once "app/config.inc.php";

 ?>
<div align="center">
  <br>
  <h1><?php echo HOLI . ": Página no encontrada"; ?></h1>
  <a href="<?php echo SERVIDOR; ?>">Volver a Inicio</a>
</div>
<?php
include_once "Plantillas/cierre.php";
 ?>
