<?php
$P=0;
$titulo="Registro";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";


  include_once "app/config.inc.php";
  echo $_POST["nombre"];
  echo "<br>";
  echo $_POST["email"];
  echo "<br>";
  echo $_POST["pass1"];
  echo "<br>";
  echo $_POST["pass2"];
  echo "<br>";
 ?>

<?php
include_once "Plantillas/cierre.php";
 ?>
