<?php
class redireccion{
  public static function redirigir($url)
  {
    header("location:" . $url, true, 301);
    exit();
  }
}


 ?>
