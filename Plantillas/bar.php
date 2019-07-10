<body style="background-color:white">

<nav class="navbar navbar-inverse navbar-static-top">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Este boton despliega la barra de navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" style="color:white" href="<?php echo SERVIDOR; ?>" title="Hard Level">
      Hard Level
    </a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
      <?php
      include_once "app/conexion.inc.php";
      conexion::openConection();

      include_once "app/repositorioUsuario.inc.php";
        include_once "Plantillas/barcolores.php";
        barColores::Bcolores($P);
        conexion::closeConection();
       ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a>
          <?php
          include_once "app/conexion.inc.php";
          conexion::openConection();
          include_once "app/repositorioUsuario.inc.php";
          $TotUsers=RepositorioUsuario::getUsers(conexion::getConection());
          echo "USUARIOS: " . $TotUsers;
          conexion::closeConection();
           ?>
      </a></li>
      <?php
      include_once "app/controlSesion.inc.php";
      if(!controlSesion::sesionIniciada())
      {
        ?>
        <li><a href="<?php echo REGISTRAR; ?>">
          Registrar
        </a></li>
        <li><a href=" <?php echo LOGIN; ?>">
          Entrar
        </a></li>
        <?php
      }
      else {
        ?>
        <li><a href="<?php echo MYBLOG; ?>">
          <?php echo $_SESSION["nombre_usuario"] ?>
        </a></li>

        <?php
      } ?>

    </ul>
  </div>
</div>

</nav>
