<?php
include_once "usuario.inc.php";
include_once "repositorioUsuario.inc.php";
include_once "conexion.inc.php";
include_once "avatars.inc.php";
  class escritorUsuarios
  {
    public static function escribirUsuario($conection)
    {
      $usuarios=RepositorioUsuario::getAll($conection);
      $num=count($usuarios);
      $pares=0; $impares=0;
      ?>
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <?php
              for($j=0;$j<$num;$j++)
              {
                if($j%2==0)
                {
                  ?>
                  <div class="row" style="background-color:white">
                      <div class="col-md-4">
                        <img src="<?php echo avatars::controlAvatars($usuarios[$j]->obtenerAvatar()); ?>" alt="" width="100%">
                      </div>
                      <div class="col-md-8"><br>
                        <a class="enlace" style="font-size:25px" href="<?php echo BLOGS."/".$usuarios[$j]->obtenerNombre(); ?>"><?php echo $usuarios[$j]->obtenerNombre();?></a>
                        <h4><?php echo $usuarios[$j]->obtenerPuntos(); ?></h4>
                      </div>
                  </div>
                  <br><br>
                  <?php
                }
              }

             ?>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-5">
            <?php
              for($j=0;$j<$num;$j++)
              {
                if($j%2!=0)
                {
                  ?>
                  <div class="row" style="background-color:white">
                      <div class="col-md-4">
                        <img src="<?php echo avatars::controlAvatars($usuarios[$j]->obtenerAvatar()); ?>" alt="HOLI" width="100%">
                      </div>
                      <div class="col-md-8"><br>
                      <a class="enlace" style="font-size:25px" href="<?php echo BLOGS."/".$usuarios[$j]->obtenerNombre(); ?>"><?php echo $usuarios[$j]->obtenerNombre();?></a>
                        <h4><?php echo $usuarios[$j]->obtenerPuntos(); ?></h4>
                      </div>
                  </div>
                  <br>
                  <?php
                }
              }
             ?>
          </div>
        </div>
      </div>
      <?php
    }
  }

 ?>
