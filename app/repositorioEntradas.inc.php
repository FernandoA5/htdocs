<?php
include_once "config.inc.php";
include_once "conexion.inc.php";
include_once "entradas.inc.php";

class repositorioEntradas
{
  public static function insertarEntrada($conection, $entrada)
  {
    $entradaInsertada=null;
    if($isset($conection))
    {
      try {
        include_once "entradas.inc.php";
        $sql="INSERT INTO entradas(autorId, titulo, texto, fecha, activa, likes) VALUES(:autorId, :titulo, :texto, NOW(), 1, 0)";
        $sentencia=$conection->prepare($sql);
        $autorTemp=$entrada->obtenerAutorId();
        $tituloTemp=$entrada->obtenerTitulo();
        $textoTemp=$entrada->obtenerTexto();

        $sentencia->bindParam(":autorId", $autorTemp, PDO::PARAM_STR);
        $sentencia->bindParam(":titulo", $tituloTemp, PDO::PARAM_STR);
        $sentencia->bindParam(":texto", $textoTemp, PDO::PARAM_STR);
        $entradaInsertada=$sentencia->execute();

      } catch (PDOException $ex) {
        print HOLIERROR.$ex->getMessage();
      }

    }
    return $entradaInsertada;
  }
}

 ?>
