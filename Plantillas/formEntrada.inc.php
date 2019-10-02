<?php
class formEntrada{
    public static function formVacio()
    {
        ?>
            <div class="form-group">
            <input id="titulo" type="text" name="titulo" value="" placeholder="Publica algo" class="form-control">
            </div>
            <div class="form-group">
            <textarea  id="texto" class="form-control" name="texto" rows="3" placeholder="Desarrolla tu idea"></textarea>
            </div>
            <button type="submit" name="send" class="btn btn-primary btn-sm center-block">Publicar</button>
        <?php
    }
    public static function formValidado($validador)
    {
        ?>
        <div class="form-group">
        <input id="titulo" type="text" name="titulo" placeholder="¿Tienes una idea?" class="form-control" <?php $validador->showTitle(); ?>>
        <?php
        $validador ->showErrorTitle();
        ?>
        </div>
        <div class="form-group">
        <textarea id="texto" class="form-control" name="texto" rows="3" placeholder="¿Qué tienes en mente?"><?php $validador->showText();?></textarea>
        <?php
        $validador ->showErrorText();
        ?>
        </div>
        <button type="submit" name="send" class="btn btn-primary btn-sm center-block">Publicar</button>

        <?php
    }
    public static function formEdicion($titulo, $texto)
    {
        ?>
            <div class="form-group" id="formulario">
            <input id="titulo" type="text" name="titulo" placeholder="Publica algo" class="form-control" value="<?php
                echo $titulo;
            ?>">
            </div>
            <div class="form-group">
            <textarea  id="texto" class="form-control" name="texto" rows="3" placeholder="Desarrolla tu idea"><?php echo $texto; ?>
            </textarea>
            </div>
            <button type="submit" name="sendEdicion" class="btn btn-editar btn-sm center-block">Guardar</button>
            
        <?php
    }
    public static function formEdicionValidado($validador)
    {
        ?>
            <div class="form-group" id="formulario">
            <input id="titulo" type="text" name="titulo" placeholder="Publica algo" class="form-control" <?php
                $validador->showTitle();
            ?>>
            <?php $validador->showErrorTitle(); ?>
            </div>
            <div class="form-group">
            <textarea  id="texto" class="form-control" name="texto" rows="3" placeholder="Desarrolla tu idea">
                <?php
                $validador->showText();
                ?>
            </textarea>
            <?php $validador->showErrorText(); ?>
            </div>
            <button type="submit" name="sendEdicion" class="btn btn-editarError btn-sm center-block">Publicar</button>
        <?php
    }
}
?>