<?php
class formProgramas
{
  public static function formVacio()
  {
    ?>
    <div class="form-group">
      <input type="text" name="titulo" placeholder="¿Cuál es el titulo del Programa?" class="form-control">
    </div>
    <div class="form-group">
      <textarea class="form-control" rows="4" name="descripcion" placeholder="Descripción del programa"></textarea>
    </div>
    <div class="form-group">
      <input type="text" name="link" placeholder="¿Cuál es el link del Programa?" class="form-control">
    </div>
    <div class="form-group">
      <label for="imagenSubida" id="etiquetaMin" class="center-block" align="center">Sube una Imagen</label>
      <input type="file" name="imagenSubida" id="imagenSubida" class="boton_subir">
    </div>
    <?php
  }
  public static function formValidadd()
  {
    echo HOLI."VALIDADO";
  }
}
 ?>
