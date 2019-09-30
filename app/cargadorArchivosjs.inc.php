<?php
include_once "config.inc.php";

$fecha = new DateTime();
$fuentesJavaScript = array(
    
    RUTAJSTFG."rectangulo.js",
    
    RUTAJSTFG."sprites.js",
    RUTAJSTFG."tile.js",
    RUTAJSTFG."capaMapaTiles.js",
    RUTAJSTFG."paletaSprites.js",
    RUTAJSTFG."listadoEstados.js",
    RUTAJSTFG."ajax.js",
    RUTAJSTFG."estadoMapa.js",
    RUTAJSTFG."maquinaEstados.js",
    RUTAJSTFG."punto.js",
    RUTAJSTFG."mapa.js",
    RUTAJSTFG."teclado.js",
    RUTAJSTFG."mando.js",
    RUTAJSTFG."dimensiones.js",
    RUTAJSTFG."mainBucle.js",
    RUTAJSTFG."TFG.js"
);

foreach($fuentesJavaScript as $fuente)
{

    echo "<script src=".$fuente."?".$fecha->getTimestamp()."></script>";
    echo nl2br("\n");
}

?>