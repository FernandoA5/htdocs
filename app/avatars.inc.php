<?php
include_once "config.inc.php";
class avatars
{
  public static function controlAvatars($avatar)
  {
    return  RUTAAVATARS.$avatar.".png";
  }
}

 ?>
