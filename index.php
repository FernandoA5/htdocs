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
if($partesRuta[1]=="Learning" && count($partesRuta)==2)
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
if($partesRuta[1]=="OpenSource")
{
  include_once "vistas/OpenSource.php";
  $encontrada=1;
}
if($partesRuta[1]=="Code")
{
  include_once "vistas/openSourceCode.php";
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
if($partesRuta[1]=="WebFamily")
{
  include_once "vistas/WebFamily.php";
  $encontrada=1;
}
if($partesRuta[1]=="CatNetwork")
{
  include_once "vistas/CatNetwork.php";
  $encontrada=1;
}
if($partesRuta[1]=="onlineGame")
{
  include_once "vistas/onlineGame.php";
  $encontrada=1;
}
if($partesRuta[1]=="TheFifthGuild")
{
  include_once "vistas/TheFifthGuild.php";
  $encontrada=1;
  //include_once "app/cargadorArchivosjs.inc.php";
}
if($partesRuta[1]=="Agenda")
{
  include_once "vistas/agenda.php";
  $encontrada=1;
}
if($partesRuta[1]=="test")
{
  include_once "vistas/test.php";
  $encontrada=1;
}
if($partesRuta[1]=="recuperarClave")
{
  include_once "vistas/recuperarClave.php";
  $encontrada=1;
}
if($partesRuta[1]=="generarUrl")
{
  include_once "scripts/generarUrl.inc.php";
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
      else {
        include_once "app/repositorioEntradas.inc.php";
        conexion::openConection();
        $existe=repositorioEntradas::entradaExiste(conexion::getConection(), $partesRuta[2]);
        
        if($existe)
        {
          include_once "vistas/Entrada.php";
          $encontrada=1;
        }
        else {
          $arreglada= palabrasRaras::arreglar($partesRuta[2]);
          $existe=repositorioEntradas::entradaExiste(conexion::getConection(), $arreglada);
          
          if($existe)
          {
            include_once "vistas/Entrada.php";
            $encontrada=1;
          }
          else {
              $encontrada=0;
          }
        }
      }
    }
    conexion::closeConection();
  }
  if($partesRuta[1]=="Learning")
  {
    include_once "app/cursos.inc.php";
    include_once "app/repositorioCursos.inc.php";
    include_once "app/conexion.inc.php";
    include_once "app/palabrasRaras.inc.php";
    conexion::openConection();
    $existe=repositorioCursos::buscarCurso(conexion::getConection(), $partesRuta[2]);
    if($existe)
    {
      $titulo=$partesRuta[2];
      include_once "vistas/Curso.php";
      $encontrada=1;
    }
    else {
      $arreglada=palabrasRaras::arreglar($partesRuta[2]);
      $existe=repositorioCursos::buscarCurso(conexion::getConection(), $arreglada);
      if($existe)
      {
        $titulo=$arreglada;
        include_once "vistas/Curso.php";
        $encontrada=1;
      }
      else {
        $arreglada2=palabrasRaras::arreglar($arreglada);
        $existe=repositorioCursos::buscarCurso(conexion::getConection(), $arreglada2);
        //echo $arreglada2;
        if($existe)
        {
          $titulo=$arreglada2;
          include_once "vistas/Curso.php";
          $encontrada=1;
        }
        else {
          $encontrada=0;
        }
      }
    }
    conexion::closeConection();
  }
  if($partesRuta[1]=="recuperar")
  {
    include_once "app/repositorioRecuperacionClave.inc.php";
    include_once "app/conexion.inc.php";
    conexion::openConection();
    $existe=repositorioRecuperacionClave::buscarPeticion(conexion::getConection(), $partesRuta[2]);
    if($existe)
    {
      include_once "vistas/nuevaClave.php";
      $encontrada=1;
    }
  }
  if($partesRuta[1]=="confirmar")
  {
    include_once "app/repositorioConfirmarCorreo.inc.php";
    include_once "app/conexion.inc.php";
    
    conexion::openConection();
    $existe=repositorioConfirmarCorreo::buscarPeticion(conexion::getConection(), $partesRuta[2]);
    if($existe)
    {
      include_once "scripts/cuentaConfiramda.inc.php";  
      $encontrada=1;
    }
  }
}




if($encontrada==0)
{
  include_once "vistas/404.php";
}

  ?>

  <?

?>
