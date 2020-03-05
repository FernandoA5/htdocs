<?php
class formCode{
    public static function formVacio()
    {
        ?>
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <br>
                <input type="text" id="codigo" name="codigo" value="" placeholder="Ingresa tu código" class="form-control text-center" required autofocus><br>
                <button type="submit" name="sendCode" class="btn btn-primary btn-sm center-block form-control">Enviar</button>
            </div>
            <div class="col-sm-2"></div>
        <?php
    }
    public static function formValidado($validador)
    {
        ?>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <br>
            <input type="text" id="codigo" name="codigo" value="" placeholder="Ingresa tu código" class="form-control text-center" <?php $validador->showCode(); ?>>
            <?php
                $validador->showErrorCodigo();
            ?><br>
            <button type="submit" name="sendCode" class="btn btn-primary btn-sm center-block form-control">Enviar</button>
            
        </div>
        <div class="col-sm-2"></div>
        <?php
    }
}
?>