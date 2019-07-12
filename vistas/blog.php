<?php
$P=4;
$nombre=$titulo;
include_once "app/conexion.inc.php";
include_once "app/usuario.inc.php";
include_once "app/repositorioUsuario.inc.php";
include_once "app/avatars.inc.php";
include_once "app/redireccion.inc.php";

include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
conexion::openConection();
$usuario= repositorioUsuario::obtenerUsuarioPorNombre(conexion::getConection(), $nombre);

if($nombre==$_SESSION["nombre_usuario"])
{
  echo HOLI;
  redireccion::redirigir(MYBLOG);
}
$minTemp=avatars::controlAvatars($usuario->obtenerAvatar());
 ?>
 <div class="container-fluid">
   <div class="row">
     <div class="col-md-2">
       <?php

        ?>
        <div class="col-md-1">

        </div>
        <div class="col-md-10">
          <img src="<?php echo $minTemp; ?>" alt="<?php echo HOLIERROR. "No encontrada"; ?>" width="100%"><br>
          <h3 class="text-center" style="color:#0B0B61"><?php echo $usuario->obtenerNombre(); ?></h3>
          <h4 class="text-center" style="color:#0080FF"><?php echo $usuario->obtenerPuntos(); ?></h4>
        </div>
        <div class="col-md-1">

        </div>
     </div>
     <div class="col-md-7">
       <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">En Mente</h3>
         </div>
         <div class="panel-body">

         </div>
       </div>
     </div>
     <div class="col-md-3">

     </div>
   </div>
 </div>
 <?php
 include_once "Plantillas/cierre.php";
  ?>
