<?php
include_once "config.inc.php";
include_once "conexion.inc.php";
include_once "entradas.inc.php";

class repositorioEntradas
{
  public static function insertarEntrada($conection, $entrada)
  {
    $entradaInsertada=null;
    if(isset($conection))
    {
      try {
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
  public static function obtenerEntradasPorUsuario($conection, $autorId)
  {
    $entradas=array();
    if(isset($conection))
    {
      try {
        $sql="SELECT * FROM entradas WHERE autorId=:autorId";
        $sentencia=$conection->prepare($sql);
        $sentencia->bindParam(":autorId", $autorId, PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll();
        if(count($resultado))
        {
          foreach($resultado as $fila)
          {
            $entradas[]= new entradas($fila["id"], $fila["autorId"], $fila["titulo"], $fila["texto"], $fila["fecha"], $fila["activa"], $fila["likes"]);
          }
        }
      } catch (PDOException $ex) {
        print HOLIERROR.$ex->getMessage();
      }

    }
    return $entradas;
  }
}

 ?>
