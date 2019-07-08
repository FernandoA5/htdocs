<?php
  $P=0;
  $titulo="Registrar";
  include_once "Plantillas/head.php";
  include_once "Plantillas/bar.php";

  include_once "app/validadorR.inc.php";

  if (isset($_POST["send"]))
  {
  $validador = new ValidadorRegistro($_POST["nombre"], $_POST["email"], $_POST["pass1"], $_POST["pass2"]);
  }
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading" align="center">
          <h3 class="panel-title">Registrar</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="<?php echo REGISTRAR; ?>">

              <?php
              if (isset($_POST["send"]))
              {
              include_once "Plantillas/registroValidado.inc.php";
              }
              else{
                include_once "Plantillas/registroVacio.inc.php";
              }
               ?>
          </div>
          </form>
        <br>
          <div class="row">
            <div class="col-md-12">
              <div class="text-center">
                <a href="#">¿Ya tienes cuenta?</a>
              </div><br>
              <div class="text-center">
                <a href="#">¿Olvidaste tu contraseña?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php
  include_once "Plantillas/cierre.php";
 ?>
