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

 ?>
