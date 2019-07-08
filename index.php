<?php
include_once "app/config.inc.php";

$page = parse_url($_SERVER["REQUEST_URI"]);
$ruta=$page["path"];
$partesRuta=explode("/", $ruta);
//echo $partesRuta[1];
if($partesRuta[1]=="")
{
  include_once "vistas/home.php";
}
if($partesRuta[1]=="Learning")
{
  include_once "vistas/Learning.php";
}
if($partesRuta[1]=="Solutions")
{
  include_once "vistas/Solutions.php";
}
if($partesRuta[1]=="Games")
{
  include_once "vistas/Games.php";
}
if($partesRuta[1]=="Blogs")
{
  include_once "vistas/Blogs.php";
}
if($partesRuta[1]=="Registrar")
{
  include_once "vistas/Registrar.php";
}
if($partesRuta[1]=="RegistroA")
{
  include_once "vistas/RegistroA.php";
}
if($partesRuta[1]=="Login")
{
  include_once "vistas/Login.php";
}

  ?>

  <?

?>
