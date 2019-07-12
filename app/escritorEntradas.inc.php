<?php
include_once "conexion.inc.php";
include_once "repositorioUsuario.inc.php";
include_once "entradas.inc.php";
include_once "repositorioEntradas.inc.php";
class escritorEntradas
{
  public static function escribir($conection, $autorId)
  {
    if(isset($conection))
    {
      $entradas=repositorioEntradas::obtenerEntradasPorUsuario($conection, $autorId);
      if(count($entradas))
      {
        $num=count($entradas);
        for($i=$num-1;$i>=0;$i--)
        {
          if($entradas[$i]->obtenerActiva()==1)
          {
            ?>
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title" style="color:white"><?php echo $entradas[$i]->obtenerTitulo(); ?></h3>
                </div>
                <div class="panel-body">
                  <h5 style="color:gray"><?php echo $entradas[$i]->obtenerFecha(); ?></h5>
                  <h4><?php echo $entradas[$i]->obtenerTexto(); ?></h4>
                </div>
              </div>
            <?php
          }
        }
      }
      else {
        ?>
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title" style="color:white">
              Este usuario no ha publicado nada
            </h3>
          </div>
        </div>
        <?php
      }
    }
  }
}
 ?>
