<div class="form-grup">
  <input type="text" name="titulo" placeholder="¿Cuál es el titulo del curso?" class="form-control" <?php $validador->showTitle();?>>
  <?php
  $validador ->showErrorTitulo();
   ?>
</div><br>
<div class="form-group">
  <textarea name="texto" rows="4" cols="80" class="form-control" placeholder="¿De que trata el curso?"><?php $validador->showText(); ?></textarea>
  <?php
  $validador ->showErrorTexto();
   ?>
</div>
<div class="form-grup">
  <label for="miniaturaSubida" id="etiquetaMin" class="center-block" align="center">Sube la Miniatura</label>
  <input type="file" name="miniaturaSubida" id="miniaturaSubida" class="boton_subir">
</div><br>
<button type="submit" name="send2" class="btn btn-primary btn-sm center-block">Publicar</button>
