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
  
 //INCLUCION DE JS
 echo '<script src="js/TFG2.0/funciones.js"></script>'
 ?>
 <script>
  //FUNCIONES
  rec = new rectangulo(<?php
    echo $x.",".$y.","."64,64".$player->obtenerId();
  ?>)
 </script>
 <script>
  var color = "red";
  var div = '<div id="' + 1 + '"></div>';
	var html = document.getElementById("juego").innerHTML;
	document.getElementById("juego").innerHTML = html + div;
	document.getElementById("1").style.position = "absolute";
  document.getElementById("1").style.left = <?php 
    echo $player->obtenerX();
  ?> + "px";
	document.getElementById("1").style.top =  <?php 
    echo $player->obtenerY();
  ?> + "px";
	document.getElementById("1").style.width = 256 + "px";
	document.getElementById("1").style.height = 256 + "px";
	document.getElementById("1").style.backgroundColor = color;
 </script>
 <?php
    //ACTUALIZAR DATO
    /*$sql = "UPDATE usuarios SET nombre = 'Dios' WHERE id = 1";
    $sentencia=$conexion->prepare($sql);
    $sentencia->execute();*/
 

  include_once "Plantillas/cierre.php";
  ?>

