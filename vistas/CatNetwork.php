<?php
$P=1;
  include_once "Plantillas/head.php";
  include_once "Plantillas/bar.php";

  include_once "app/conexion.inc.php";
  include_once "app/usuario.inc.php";
  include_once "app/repositorioUsuario.inc.php";
  ?>
  <?php
  if(!empty($_SESSION))
  {
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div align="center">
            <img src="<?php echo RUTAAVATARS."0.png" ?>" alt="Imagen de perfil" width="100%">
            <h3>
              <?php
              conexion::openConection();
              $usuario=RepositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $_SESSION["id_usuario"]);
              echo $usuario->obtenerNombre();
               ?>
            <h4 style="color:skyblue;">
                <?php
                echo $usuario->obtenerPuntos();
                 ?>
            </h4>

          </div>
        </div>
        <div class="col-md-6 ">
          <div align="center">
            escritor de Publicaciones
          </div>
        </div>
        <div class="col-md-3">
          formulario de publicar<br>
          publicidad
        </div>
      </div>
    </div>
    <?php
  }
  else {
    echo "Inicia Cesion para accedera aquí";
  }
   ?>

  <?php
  include_once "Plantillas/cierre.php";
 ?>
