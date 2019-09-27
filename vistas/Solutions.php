<?php
$P=1;
$titulo="Solutions";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
include_once "app/usuario.inc.php";
include_once "app/repositorioUsuario.inc.php";
include_once "app/conexion.inc.php";
//echo HOLI;
conexion::openConection();
$s="12"; $h="30"; $a="center";
if(isset($_SESSION["nombre_usuario"]))
{
  $usuario=repositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $_SESSION["id_usuario"]);
  if($usuario->obtenerSuscripcion()==3)
  {
    $s="8";
    $h="18";
    $a="left";
  }
}
?>
<div class="container">
  <div class="row">
    <div class="col-md-<?php echo $s;?>">
      <div class="panel-primary">
        <div class="panel-heading">
          <h1 class="panel-title" align="<?php echo $a;?>" style="font-size:<?php echo $h;?>" >Hard-Level Solutions</h3>
        </div>
        <div class="panel-body" style="background-color:white">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <div class="col-md-4">
                  <a href="<?php echo CATNETWORK; ?>">CatNetwork</a>
                </div>
              </div>

            </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-4">
        <?php
        if(isset($_SESSION["nombre_usuario"]))
        {
          $usuario=repositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $_SESSION["id_usuario"]);
          if(isset($usuario) && $usuario->obtenerSuscripcion()==3)
          {
            ?>
            <div class="panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Añadir Programa</h3>
              </div>
              <div class="panel-body" style="background-color:white">
                <form role="form" method="post" action="<?php echo SOLUTIONS; ?>">
                  <?php
                  include_once "Plantillas/formProgramas.inc.php";
                  if(isset($_POST["send"]))
                  {
                    formProgramas::formValidado();
                  }
                  else {
                    formProgramas::formVacio();
                  }
                   ?>
                </form>
              </div>
            </div>
            <?php
          }
        }
        conexion::closeConection();
         ?>
    </div>

  </div>
</div>



<?php
include_once "Plantillas/cierre.php";
 ?>
