<?php
class escritorCapitulos
{
  public static function escribir($capitulos, $curso)
  {

    ?>
    <script>
    var rutaC;
    </script>
    <?php
    if($_SESSION["suscripcion_usuario"]==1 || !isset($_SESSION["suscripcion_usuario"]))
    {
      for($i=0; $i<3; $i++)
      {
        ?>
          <button id="capitulo<?php echo $i; ?>" name="capitulo" class="capitulo-btn">
            <?php echo $capitulos[$i]->obtenerTitulo(); ?>
          </button>
        <?php
      }?>
      <script>
       <?php
       $j=array();
      for ($i=0; $i <3 ; $i++)
      {
          ?>
          var boton<?php echo $i; ?>=document.getElementById("capitulo<?php echo $i; ?>");var i;
          boton<?php echo $i;?>.addEventListener("click", elegido<?php echo $i; ?>);
          function elegido<?php echo $i; ?>()
          {
             document.getElementById("iframe").src="<?php echo YOUTUBE.$capitulos[$i]->obtenerRuta(); ?>";
          }
          <?php
      }

       ?>
      </script>
      <?php
    }
    if($_SESSION["suscripcion_usuario"]>1)
    {
      for($i=0; $i<count($capitulos); $i++)
      {
        ?>
          <button id="capitulo<?php echo $i; ?>" name="capitulo" class="capitulo-btn">
            <?php echo $capitulos[$i]->obtenerTitulo(); ?>
          </button>
        <?php
      }?>
      <script>
       <?php
       $j=array();
      for ($i=0; $i <count($capitulos) ; $i++)
      {
          ?>
          var boton<?php echo $i; ?>=document.getElementById("capitulo<?php echo $i; ?>");var i;
          boton<?php echo $i;?>.addEventListener("click", elegido<?php echo $i; ?>);
          function elegido<?php echo $i; ?>()
          {
             document.getElementById("iframe").src="<?php echo YOUTUBE.$capitulos[$i]->obtenerRuta(); ?>";
          }
          <?php
      }

       ?>
      </script>
      <?php
    }

  }
  public function escribirComentarios($conection, $comentarios)
  {
    if(isset($conection))
    {
      $usuario=array();
      $num=count($comentarios);
      for($i=$num-1; $i>=0;$i--)
      {
        $usuario[$i]=repositorioUsuario::obtenerUsuarioPorId($conection, $comentarios[$i]->obtenerAutorId());
        ?>

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $usuario[$i]->obtenerNombre();;?></h3>
          </div>
          <div class="panel-body">
            <?php
            echo $comentarios[$i]->obtenerTexto();
             ?>
          </div>
        </div>

        <?php
      }
    }
  }
}

 ?>
