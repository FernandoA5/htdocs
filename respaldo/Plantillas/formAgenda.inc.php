<?php
class formAgenda
{
    public static function formVacio()
    {
        ?>
            
            <div class="form-group">
                <input type="text" name="ruta" placeholder="¿Qué tienes que hacer?" class="form-control">
                <button type="submit" name="send" class="btn btn-primary btn-sm center-block form-control">Agendar</button>    
            </div>
            
        <?php
    }
    public static function formValidado()
    {
        ?>
            <h6>Validado</h6>
            <div class="form-group">
                <input type="text" name="ruta" placeholder="¿Qué tienes que hacer?" class="form-control">
                <button type="submit" name="send" class="btn btn-primary btn-sm center-block form-control">Agendar</button>    
            </div>
        <?php
    }
}
?>