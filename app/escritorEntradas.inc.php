<?php
include_once "conexion.inc.php";
include_once "repositorioUsuario.inc.php";
include_once "entradas.inc.php";
include_once "repositorioEntradas.inc.php";
include_once "app/palabrasRaras.inc.php";
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
                  <h4 class="text-justify"><?php echo nl2br(self::resumir($entradas[$i]->obtenerTexto())); ?></h4>
                  <div class="text-left">
                    <form id="formEditar" role="form" method="post" action="<?php echo SERVIDOR.$_SERVER["REQUEST_URI"]; ?>">
                    <a class="btn btn-continuarLeyendo btn-sm" href="<?php echo BLOGS."/".$entradas[$i]->obtenerTitulo();?>" role="button">Continua Leyendo</a>
                    <button id="btn-love<?php
                      echo $entradas[$i]->obtenerId();
                      ?>" type="submit" name="btn-love<?php
                      echo $entradas[$i]->obtenerId();
                      ?>" class="btn btn-love btn-sm" title="<?php
                      echo $entradas[$i]->obtenerLikes();
                      ?>"><span class="glyphicon glyphicon-heart"></span>
                    </button>
                    </form>

                        <?php
                        $idUnica="btn-love".$entradas[$i]->obtenerId();
                        if(isset($_POST[$idUnica]))
                        {
                          repositorioEntradas::addirLike(conexion::getConection(), $entradas[$i], $_SESSION["id_usuario"], $idUnica); 
                        }
                        $_POST[$idUnica]=null;
                        unset($_POST[$idUnica]);
              ?>
                  </div>
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
  public static function escribirComentarios($conection, $idEntrada)
  {
    ?>
    HOLI
    <?php
  }
  public static function resumir($texto)
  {
    $longMax=400;
    $resultado ="";
    if(strlen($texto)>=$longMax)
    {/*
      for($i=0; $i<$longMax; $i++)
      {
        $resultado .=substr($texto, $i, 1);
      }*/
      $resultado=substr($texto, 0, $longMax);
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
    {/*
      for($i=0; $i<$longMax;$i++)
      {
        $resultado.=substr($titulo, $i, 1);
      }*/
      $resultado=substr($titulo, 0, $longMax);
      $resultado.="...";
    }
    else {
      $resultado=$titulo;
    }
    return $resultado;
  }
}
 ?>
