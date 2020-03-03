<div class="form-group">
  <input type="text" name="titulo" placeholder="¿Cuál es el titulo del capitulo?" class="form-control" <?php $validador->showTitle(); ?>/>
  <?php
  $validador -> showErrorTitulo();
   ?>
</div>
<div class="form-group">
  <input type="text" name="ruta" placeholder="¿Cuál es la ruta del capitulo?" class="form-control" <?php $validador->showRuta(); ?>/>
  <?php $validador->showErrorRuta(); ?>
</div>
<button type="submit" name="send" class="btn btn-primary btn-sm center-block">Añadir</button>
