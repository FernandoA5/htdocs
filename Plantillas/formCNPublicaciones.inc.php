<?php
class formCNPublicaciones
{
  public function formCNPVacio()
  {
    ?>
    <div class="form-group">
      <input type="texto" name="titulo" placeholder="Titula tu anuncio" class="form-control"/>
      <br>
      <textarea class="form-control" rows="4" name="texto"></textarea>
    </div>
    <?php
  }
  public function formCNPValidado()
  {
    echo HOLI." Validado";
  }
}
 ?>
