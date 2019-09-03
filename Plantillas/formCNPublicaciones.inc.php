<?php
class formCNPublicaciones
{
  public static function formCNPVacio()
  {
    ?>
    <div class="form-group">
      <input type="text" name="titulo" placeholder="Titula tu anuncio" class="form-control"/>
      <br>
      <textarea class="form-control" rows="4" name="texto"></textarea>
    </div>
    <?php
  }
  public static function formCNPValidado()
  {
    echo HOLI." Validado";
  }
}
 ?>
