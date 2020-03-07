<?php
class formNuevaClave{
    public static function formVacio()
    {
        ?>
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <input type="password" id="clave1" name="clave1" value="" placeholder="Ingresa una nueva contraseña" class="form-control text-center" required autofocus><br>
            <input type="password" id="clave2" name="clave2" value="" placeholder="Repite la contraseña" class="form-control text-center" required><br>
            <button type="submit" name="enviar" class="btn btn-primary btn-sm center-block form-control">
                Establecer
            </button>
        </div>
        <div class="col-sm-1"></div>
        <?php
    }
    public static function formValidado($validador)
    {
        ?>
        <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <input type="password" id="clave1" name="clave1" value="" placeholder="Ingresa una nueva contraseña" class="form-control text-center" required autofocus>
                <?php
                    $validador->showErrorClave1();
                ?>
                <br>
                <input type="password" id="clave2" name="clave2" value="" placeholder="Repite la contraseña" class="form-control text-center" required>
                <?php
                    $validador->showErrorClave2();
                ?>
                <br>
                <button type="submit" name="enviar" class="btn btn-primary btn-sm center-block form-control">
                    Establecer
                </button>
            </div>
        <div class="col-sm-1"></div>
        <?php
    }
}
?>