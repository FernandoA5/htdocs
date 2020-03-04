<?php
$P=5;
$titulo="Code";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
?>
<div class="container">
    <div class=row>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                        <h3 class="panel-title text-center" style="color:white">
                            Ingresa tú código
                        </h3>
                </div>
                <div class="panel-body text-center">
                <?php
                include_once "Plantillas/formCode.inc.php";
                if(isset($_POST["sendCode"]))
                    formCode::formValidado();
                else
                    formCode::formVacio();
                ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
<?php
include_once "Plantillas/Cierre.php";
?>