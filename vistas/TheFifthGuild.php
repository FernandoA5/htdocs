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

 conexion::openConection();
 $conexion=conexion::getConection();
 if(isset($conexion))
 {
  try{
    $sql="SELECT * FROM usuarios WHERE id=1";
    $sentencia=$conexion->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    if(!empty($resultado))
    {
      foreach($resultado as $fila)
      {
        $usuario = new Usuario($fila["id"], $fila["nombre"], $fila["email"], $fila["password"], $fila["fechaRegistro"], $fila["activo"], $fila["suscripcion"], $fila["puntos"], $fila["avatar"]);
      }
      echo $usuario->obtenerNombre();
    }
    //ACTUALIZAR DATO
    /*$sql = "UPDATE usuarios SET nombre = 'Dios' WHERE id = 1";
    $sentencia=$conexion->prepare($sql);
    $sentencia->execute();*/
  }catch(PDOException $ex){
    print HOLIERROR.$ex->getMessage();
  }
 }
  /*$sql = "SELECT * FROM agenda WHERE id = $id" 
  $result = mysql_query($sql);
  $sql = "UPDATE agenda SET nombre='$nombre', direccion='$direccion',".
     "telefono='$telefono', email='$email'";
 include_once "app/cargadorArchivosjs.inc.php";*/
  include_once "Plantillas/cierre.php";
  ?>

