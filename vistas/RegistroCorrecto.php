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
  //echo $_GET["nombre"];
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <div class="panel panel-primary">
          <div class="panel-heading" align=center>
            <h3 class="panel-title">Registro Correcto</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              Felicidades <?php echo $_GET["nombre"]; ?> te has registrado correctamente<br><br>
              <a href="<?php echo LOGIN; ?>">Iniciar Sesión</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">

      </div>
    </div>
  </div>

  <?php
}
else {
  redireccion::redirigir(SERVIDOR);
}
 ?>

<?php
include_once "Plantillas/cierre.php";
 ?>
