<?php
class formComentarios{
    public static function formVacio()
    {
        ?>
            <div class="form-group">
                <textarea class="form-control" name="texto" cols="30" rows="4" placeholder="¿Qué piensas al respecto?"></textarea>
                
                <br>
                <div class="text-right">
                <button type="submit" name="sendComentario" class="btn btn-primary btn-sm text-left">Publicar</button>
                </div>
            </div>
        <?php
    }
    public static function formValidado($validador)
    {
        ?>
            <div class="form-group">
                <textarea class="form-control" name="texto" cols="30" rows="4" placeholder="¿Qué piensas al respecto?"><?php echo $validador->showText(); ?></textarea><?php echo $validador->showErrorText(); ?>
                <br>
                <div class="text-right">
                <button type="submit" name="sendComentario" class="btn btn-primary btn-sm text-left">Publicar</button>
                </div>
            </div>
        <?php
    }
}
?>