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
  public static function entradaExiste($conection, $titulo)
  {
    $entradaExiste=true;
    if(isset($conection))
    {
      try {
          include_once "entradas.inc.php";
          $sql="SELECT * FROM entradas WHERE titulo = :titulo";
          $sentencia=$conection->prepare($sql);
          $sentencia->bindParam(":titulo", $titulo, PDO::PARAM_STR);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          if(count($resultado))
          {
            $entradaExiste=true;
          }
          else{
            $entradaExiste=false;
          }
      } catch (PDOException $ex) {
        print HOLIERROR . $ex->getMessage();
      }
      return $entradaExiste;
    }
  }
  public static function obtenerEntradaPorTitulo($conection, $titulo)
  {
    $entrada=null;
    if(isset($conection))
    {
      try {
        $sql="SELECT * FROM entradas WHERE titulo= :titulo";
        $sentencia=$conection->prepare($sql);
        $sentencia->bindParam(":titulo", $titulo, PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetch();
        if(!empty($resultado))
        {
          $entrada= new entradas($resultado["id"], $resultado["autorId"], $resultado["titulo"], $resultado["texto"], $resultado["fecha"], $resultado["activa"], $resultado["likes"]);
        }
        else{
          echo HOLIERROR . "RESULTADO VACIO";
        }
      } catch (PDOException $ex) {
        print HOLIERROR . $ex ->getMessage();
      }
    }
    return $entrada;
  }
  public static function obtenerEntradaPorId($conection, $id)
  {
    $entrada = null;
    if(isset($conection))
    {
      try{
        $sql="SELECT * FROM entradas WHERE id=:id";
        $sentencia=$conection->prepare($sql);
        $sentencia->bindParam(":id", $id, PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetch();
        if(!empty($resultado))
        {
          
          $entrada= new entradas($resultado["id"], $resultado["autorId"], $resultado["titulo"], $resultado["texto"], $resultado["fecha"], $resultado["activa"], $resultado["likes"]);
        }
        else{
          echo HOLIERROR. "RESULTADO VACIO";
        }
      }catch(PDOException $ex)
      {
        print HOLIERROR.$ex->getMessage();
      }
    }
    return $entrada;
  }
  public static function añadirLike($conection, $entrada, $idUsuario, $idUnica)
  {
    if(isset($conection))
    {
      try{
        include_once "likesUsuariosEntradas.inc.php";
        include_once "repositorioLikesUsuariosEntradas.inc.php";
        if(repositorioLikesUsuariosEntradas::consultar($conection, $entrada->obtenerId(), $_SESSION["id_usuario"]))
        {
          
          //DISLIKE
          
        }
        else
        {
          
          $sql="UPDATE entradas SET likes = :likes WHERE id=:idEntrada";
          $sentencia=$conection->prepare($sql);
          $likes=$entrada->obtenerLikes();
          $likes++;
          $idEntradaTemp=$entrada->obtenerId();
          $sentencia->bindParam(":likes", $likes, PDO::PARAM_STR);
          $sentencia->bindParam(":idEntrada", $idEntradaTemp, PDO::PARAM_STR);
          $sentencia->execute();
          repositorioLikesUsuariosEntradas::push($conection, $entrada->obtenerId(), $_SESSION["id_usuario"]);
          
          //SUMAR PUNTOS
          include_once "entradas.inc.php"; include_once "repositorioEntradas.inc.php";
          $entrada=repositorioEntradas::obtenerEntradaPorId($conection, $entrada->obtenerId());
          
          repositorioLikesUsuariosEntradas::sumarPuntos($conection, $entrada);

        }
      }catch(PDOException $ex)
      {
        print HOLIERROR.$ex->getMessage();
      }
    }
  }

}

 ?>
