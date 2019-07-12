<div class="form-group">
  <input type="text" name="titulo" placeholder="¿Tienes una idea?" class="form-control" <?php $validador->showTitle(); ?>>
  <?php
  $validador ->showErrorTitle()
   ?>
</div>
<div class="form-group">
  <textarea class="form-control" name="texto" rows="5" placeholder="¿Qué tienes en mente?"><?php $validador->showText();?></textarea>
  <?php
  $validador ->showErrorText();
   ?>
</div>
<button type="submit" name="send" class="btn btn-primary btn-sm center-block">Publicar</button>
