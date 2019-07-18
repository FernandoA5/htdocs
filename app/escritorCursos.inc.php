<?php

  include_once "app/repositorioCursos.inc.php";
  include_once "app/conexion.inc.php";
  include_once "app/repositorioUsuario.inc.php";
  include_once "app/usuario.inc.php";
  include_once "app/cursos.inc.php";
  conexion::openConection();
  $res=0;
  if(empty($_POST["busqueda"]))
  {
    $todos=repositorioCursos::todosCursos(conexion::getConection());
    //$usuario= RepositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), cursos::obtenerAutorId());
    $numCursos=count($todos);
    for($i=0; $i<$numCursos; $i++)
    {
      $res=1;
      ?>
      <div class="container" style="background-color:#0B0B3B">
        <div class="row">
          <div class="col-md-2">
            <br>
            <img src="<?php echo RUTAMINIATURAS.$todos[$i]->obtenerMiniatura(); ?>" alt="Miniatura" width="100%">
            <br><br>
          </div>
          <div class="col-md-10">
            <a href="<?php echo LEARNING."/".$todos[$i]->obtenerTitulo(); ?>"><h2 style="color:white"><?php echo $todos[$i]->obtenerTitulo(); ?></h2></a>
            <h4 style="color:white"><?php
            $usuario= RepositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $todos[$i]->obtenerAutorId());
            echo $usuario->obtenerNombre();
            ?>
          </h4>

            <h4 style="color:white"><?php echo $todos[$i]->obtenerTexto(); ?></h4>
            <h5 style="color:gray"><?php echo $todos[$i]->obtenerVistas(); ?></h5>
          </div>

        </div>
      </div>
      <br>
      <?php

    }
  }
if(isset($_POST["buscar"]))
{
  $todos=repositorioCursos::todosCursos(conexion::getConection());
  $total=count($todos);
  $palabras=array();
  $coin=0;
  //VARIAS PALABRAS
  for($i=0; $i<$total; $i++)
  {
    $word=explode(" ", $todos[$i]->obtenerTitulo());
    if(count($word)>1)
    {
      $coin=$i;
    }
    for($j=0; $j<count($word); $j++)
    {
      if(count($word)>1)
      {
        if($word[$j]==$_POST["busqueda"])
        {
          $curso=repositorioCursos::buscarCurso(conexion::getConection(), $todos[$coin]->obtenerTitulo());
          if(isset($curso))
          {
              $res=1;
              $usuario= RepositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $_SESSION["id_usuario"]);
              ?>
              <div class="container" style="background-color:#0B0B3B">
                <div class="row">
                  <div class="col-md-2">
                    <br>
                    <img src="<?php echo RUTAMINIATURAS.$curso->obtenerMiniatura(); ?>" alt="Miniatura" width="100%">
                    <br><br>
                  </div>
                  <div class="col-md-10">
                    <a href="<?php echo LEARNING."/".$curso->obtenerTitulo(); ?>"><h2 style="color:white"><?php echo $curso->obtenerTitulo(); ?></h2></a>
                    <h4 style="color:white"><?php echo $usuario->obtenerNombre();   ?></h4>
                    <h4 style="color:white"><?php echo $curso->obtenerTexto(); ?></h4>
                    <h5 style="color:gray"><?php echo $curso->obtenerVistas(); ?></h5>
                  </div>

                </div>
              </div>
              <br>
              <?php
          }
        }
      }
    }
  }

  //SOLO UNA PALABRA
  for($i=0; $i<$total; $i++)
  {
    $palabras[$i]=$todos[$i]->obtenerTitulo();
    if($palabras[$i]==$_POST["busqueda"])
    {
      $curso=repositorioCursos::buscarCurso(conexion::getConection(), $todos[$i]->obtenerTitulo());
      if(isset($curso))
      {
          $res=1;

          $usuario= RepositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $_SESSION["id_usuario"]);
          ?>
          <div class="container" style="background-color:#0B0B3B">
            <div class="row">
              <div class="col-md-2">
                <br>
                <img src="<?php echo RUTAMINIATURAS.$curso->obtenerMiniatura(); ?>" alt="Miniatura" width="100%">
                <br><br>
              </div>
              <div class="col-md-10">
                <a href="<?php echo LEARNING."/".$curso->obtenerTitulo(); ?>"><h2 style="color:white"><?php echo $curso->obtenerTitulo(); ?></h2></a>
                <h4 style="color:white"><?php echo $usuario->obtenerNombre();   ?></h4>
                <h4 style="color:white"><?php echo $curso->obtenerTexto(); ?></h4>
                <h5 style="color:gray"><?php echo $curso->obtenerVistas(); ?></h5>
              </div>

            </div>
          </div>
          <br>
          <?php

      }
    }
  }




  if($res==0)
  {

      ?>
      <div class="container" style="background-color:#0B0B3B">
        <div class="row">
          <div class="col-md-12">
              <h2 style="color:white;  " align="center">No se ha encontrado Nada</h2>
          </div>

        </div>
      </div>
      <br>
      <?php

  }
}

conexion::closeConection();
 ?>
