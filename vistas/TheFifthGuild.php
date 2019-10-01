<?php
$P=2;
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";

 ?>
 <div id="juego">
 <div id="mapa"></div>
 </div>
 
 <?php
 include_once "app/conexion.inc.php";
 include_once "app/config.inc.php";
 include_once "app/usuario.inc.php";
 include_once "app/repositorioTFG.inc.php";
 include_once "app/repositorioUsuario.inc.php";
 include_once "app/tfgPlayer.inc.php";
 conexion::openConection();
 $idUsuario=$_SESSION["id_usuario"];
 $player = repositorioTFG::buscarJugador(conexion::getConection(), $idUsuario);
 $x= $player->obtenerX();
 $y= $player->obtenerY();
 include_once "appJs/rectangulos.js.php";
 funcionesJs::player($player);
 $c=funcionesJs::nuevoPalabrasRaras();
 echo $c;
 //INCLUCION DE JS
 
 
    //ACTUALIZAR DATO
    /*$sql = "UPDATE usuarios SET nombre = 'Dios' WHERE id = 1";
    $sentencia=$conexion->prepare($sql);
    $sentencia->execute();*/
 

  include_once "Plantillas/cierre.php";
  ?>

