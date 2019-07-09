<?php
include_once "app/config.inc.php";

$page = parse_url($_SERVER["REQUEST_URI"]);
$ruta=$page["path"];
$partesRuta=explode("/", $ruta);
$encontrada=0;
//echo $partesRuta[1];
if($partesRuta[1]=="")
{
  include_once "vistas/home.php";
  $encontrada=1;
}
if($partesRuta[1]=="Learning")
{
  include_once "vistas/Learning.php";
  $encontrada=1;
}
if($partesRuta[1]=="Solutions")
{
  include_once "vistas/Solutions.php";
  $encontrada=1;
}
if($partesRuta[1]=="Games")
{
  include_once "vistas/Games.php";
  $encontrada=1;
}
if($partesRuta[1]=="Blogs")
{
  include_once "vistas/Blogs.php";
  $encontrada=1;
}
if($partesRuta[1]=="Registrar")
{
  include_once "vistas/Registrar.php";
  $encontrada=1;
}
if($partesRuta[1]=="RegistroCorrecto")
{
  include_once "vistas/RegistroCorrecto.php";
  $encontrada=1;
}
if($partesRuta[1]=="Login")
{
  include_once "vistas/Login.php";
  $encontrada=1;
}



if($encontrada==0)
{
  include_once "vistas/404.php";
}

  ?>

  <?

?>
