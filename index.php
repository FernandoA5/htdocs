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
if($partesRuta[1]=="Blogs" && count($partesRuta)==2)
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
if($partesRuta[1]=="MyBlog")
{
  include_once "vistas/MyBlog.php";
  $encontrada=1;
}
if($partesRuta[1]=="Logout")
{
  include_once "vistas/cerrarSesion.php";
  $encontrada=1;
}
if(!empty($partesRuta[2]))
{
  if($partesRuta[1]=="Blogs")
  {
    include_once "app/usuario.inc.php";
    include_once "app/repositorioUsuario.inc.php";
    include_once "app/conexion.inc.php";
    include_once "app/palabrasRaras.inc.php";
    conexion::openConection();
    $existe=RepositorioUsuario::nombreExiste(conexion::getConection(),$partesRuta[2]);
    if($existe)
    {
      $titulo=$partesRuta[2];
      include_once "vistas/blog.php";
      $encontrada=1;
    }
    else{
      $arreglada= palabrasRaras::arreglar($partesRuta[2]);
      $existe=RepositorioUsuario::nombreExiste(conexion::getConection(), $arreglada);
      if($existe)
      {
        $titulo=$arreglada;
        include_once "vistas/blog.php";
        $encontrada=1;
      }
    }
    conexion::closeConection();
  }
}




if($encontrada==0)
{
  include_once "vistas/404.php";
}

  ?>

  <?

?>
