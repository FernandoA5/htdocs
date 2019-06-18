<?php
$page;
$page=$_SERVER["REQUEST_URI"];

if($page=="/")
{
  include_once "Plantillas/home.php";
}
if($page=="Plantillas/Learning.php")
{
  echo "HOLI";
}
  include_once "Plantillas/home.php";

  ?>

  <?

?>
