<?php
$P=4;
$titulo="Blogs";
  include_once "Plantillas/head.php";
  include_once "Plantillas/bar.php";
  include_once "app/escritorUsuarios.inc.php";
  include_once "app/conexion.inc.php";

  conexion::openConection();
  escritorUsuarios::escribirUsuario(conexion::getConection());
  conexion::closeConection();
?>

<?php
  include_once "Plantillas/cierre.php";
 ?>
