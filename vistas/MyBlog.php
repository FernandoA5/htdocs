<?php
$P=4;
$titulo="MyBlog";
include_once "app/repositorioUsuario.inc.php";
include_once "app/conexion.inc.php";
include_once "app/config.inc.php";
include_once "app/avatars.inc.php";
include_once "app/redireccion.inc.php";

include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";

if(!isset($_SESSION["nombre_usuario"]))
{
  redireccion::redirigir(SERVIDOR);
}
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <?php

      conexion::openConection();
      $usuario=repositorioUsuario::obtenerUsuarioPorNombre(conexion::getConection(), $_SESSION["nombre_usuario"]);
      $minTemp=avatars::controlAvatars($usuario->obtenerAvatar());
      //echo "<br>" . $minTemp;
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
      <?php
      include_once "app/escritorEntradas.inc.php";
      escritorEntradas::escribir();
       ?>
    </div>
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">En Mente</h3>
        </div>
        <div class="panel-body">
          <form>
            <div class="form-group">
              <input type="text" id="titulo" value="" placeholder="¿Tienes una idea?" class="form-control">
            </div>
            <div class="form-group">
              <textarea class="form-control" id="texto "rows="3" placeholder="¿Qué tienes en mente?"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm center-block" action="<?php echo MYBLOG; ?>">Publicar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



 <?php
 include_once "Plantillas/cierre.php";
  ?>
