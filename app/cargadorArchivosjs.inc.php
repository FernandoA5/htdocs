<?php
include_once "config.inc.php";

$fecha = new DateTime();
$fuentesJavaScript = array(
    RUTAJSTFG."rectangulo.js",
    RUTAJSTFG."punto.js",
    RUTAJSTFG."paletaSprites.js",
    RUTAJSTFG."sprites.js",
    RUTAJSTFG."tile.js",
    RUTAJSTFG."ajax.js",
    RUTAJSTFG."teclado.js",
    RUTAJSTFG."mando.js",
    RUTAJSTFG."mainBucle.js",
    RUTAJSTFG."dimensiones.js",
    RUTAJSTFG."TFG.js"
);

foreach($fuentesJavaScript as $fuente)
{

    echo "<script src=".$fuente."?".$fecha->getTimestamp()."></script>";
    echo nl2br("\n");
}

?>