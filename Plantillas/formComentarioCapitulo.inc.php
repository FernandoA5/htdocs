<?php
  class formComentarioCapitulo
  {
    public static function formVacio()
    {
      ?>
      <div class="form-group">
        <textarea class="form-control" rows="4" name="comentario" placeholder="¿Qué tienes en mente?"></textarea>
      </div>
      <div class="form-group" align="right">
        <button type="submit" name="sendC" class="btn btn-primary btn-md">Publicar</button>
      </div>
      <?php
    }
    public static function formValidado($validador)
    {
      ?>
      <div class="form-group">
        <textarea class="form-control" rows="4" name="comentario" placeholder="¿Qué tienes en mente?"></textarea>
        <?php $validador->showErrorTexto(); ?>
      </div>
      <div class="form-group" align="right">
        <button type="submit" name="sendC" class="btn btn-primary btn-md">Publicar</button>
      </div>
      <?php
    }

  }
 ?>
