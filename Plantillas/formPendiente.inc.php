<?php
class formPendiente{
    public static function formVacio()
    {
        ?>
        <div class="col-sm-9">
        <input type="text" id="pendiente" name="pendiente" value="" placeholder="¿Qué tienes que hacer?" class="form-control">
        </div>
        <div class="col-sm-3">
        <button type="submit" name="sendPendiente" class="btn btn-primary btn-sm center-block form-control">Push</button>
        </div>
        <?php
    }
    public static function formValidado()
    {
        ?>
        <div class="col-sm-9">
        <input type="text" id="pendiente" name="pendiente" value="" placeholder="¿Qué tienes que hacer?" class="form-control">
        </div>
        <div class="col-sm-3">
        <button type="submit" name="sendPendiente" class="btn btn-primary btn-sm center-block form-control">Push</button>
        </div>
        <?php
    }
}
?>