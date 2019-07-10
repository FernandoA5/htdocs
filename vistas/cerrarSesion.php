<?php
include_once "app/controlSesion.inc.php";
include_once "app/redireccion.inc.php";

controlSesion::cerrarSesion();
redireccion::redirigir(SERVIDOR);
 ?>
