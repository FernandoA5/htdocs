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
                  <h3 class="panel-title" style="color:white"><?php echo self::resumirTitulo($entradas[$i]->obtenerTitulo()); ?></h3>
                </div>
                <div class="panel-body">
                  <h5 style="color:gray"><?php echo $entradas[$i]->obtenerFecha(); ?></h5>
                  <h4><?php echo nl2br(self::resumir($entradas[$i]->obtenerTexto())); ?></h4>
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
  public static function resumir($texto)
  {
    $longMax=400;
    $resultado ="";
    if(strlen($texto)>=$longMax)
    {
      for($i=0; $i<$longMax; $i++)
      {
        $resultado .=substr($texto, $i, 1);
      }
      $resultado.="...";
    }
    else {
      $resultado=$texto;
    }
    return $resultado;
  }
  public static function resumirTitulo($titulo)
  {
    $longMax=85;
    $resultado="";
    if(strlen($titulo)>=$longMax)
    {
      for($i=0; $i<$longMax;$i++)
      {
        $resultado.=substr($titulo, $i, 1);
      }
      $resultado.="...";
    }
    else {
      $resultado=$titulo;
    }
    return $resultado;
  }
}
 ?>
