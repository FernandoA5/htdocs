<?php
class redireccion{
  public static function redirigir($url)
  {
    ?>
    <script type="text/javascript">
        window.location.replace("<?php echo $url; ?>");
    </script>
    <?php
  }
}


 ?>
