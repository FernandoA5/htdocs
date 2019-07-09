<?php
$P=0;
$titulo="Registro Correcto";

include_once "app/config.inc.php";
include_once "app/conexion.inc.php";
include_once "app/repositorioUsuario.inc.php";
include_once "app/redireccion.inc.php";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";

if($_GET["nombre"] && !empty($_GET["nombre"]))
{
  echo $_GET["nombre"];
}
else {
  redireccion::redirigir(SERVIDOR);
}
 ?>

<?php
include_once "Plantillas/cierre.php";
 ?>
