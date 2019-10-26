<?php
include_once "comentarios.inc.php";
class repositorioComentarios
{
  public static function insertarComentario($conection, $comentario)
  {
    $comentarioInsertado=null;
    if(isset($conection))
    {
      try {
        $sql="INSERT INTO comentarioscursos(autorId, cursoId, texto, fecha, activa, likes) VALUES(:autorId, :cursoId, :texto, NOW(), 1, 0)";
        $sentencia=$conection->prepare($sql);
        $autorTemp=$comentario->obtenerAutorId();
        $cursoTemp=$comentario->obtenerCursoId();
        $textoTemp=$comentario->obtenerTexto();

        $sentencia->bindParam(":autorId", $autorTemp, PDO::PARAM_STR);
        $sentencia->bindParam(":cursoId", $cursoTemp, PDO::PARAM_STR);
        $sentencia->bindParam(":texto", $textoTemp, PDO::PARAM_STR);

        $comentarioInsertado=$sentencia->execute();

      } catch (PDOException $ex) {
        print HOLIERROR.$ex->getMessage();
      }

    }
    return $comentarioInsertado;

  }
  public static function obtenerComentariosCurso($conection, $cursoId)
  {
    $comentarios=array();
    if(isset($conection))
    {
      try {
        $sql="SELECT * FROM comentarioscursos WHERE cursoId=:cursoId";
        $sentencia=$conection->prepare($sql);
        $sentencia->bindParam(":cursoId", $cursoId, PDO::PARAM_STR);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll();
        if(!empty($resultado))
        {
          foreach($resultado as $fila)
          {
            $comentarios[]=new comentariosCapitulo($fila["id"], $fila["autorId"], $fila["cursoId"], $fila["texto"], $fila["fecha"], $fila["activa"], $fila["likes"]);
            
          }
        }

      } catch (PDOException $ex) {
        print HOLIERROR.$ex->getMessage();
      }

    }
    return $comentarios;
  }
  public static function insertarComentarioEntrada($conection, $texto, $usuario, $entrada)
  {
    $comentarioInsertado=null;
    if(isset($conection))
    {
        try{
          $sql="INSERT INTO comentarios(autorId, entradaId, titulo, texto, fecha, activa, likes) VALUES(:autorId, :entradaId, :titulo, :texto, NOW(), 1, 0)";
          $sentencia=$conection->prepare($sql);;
          $idUsuario = $usuario->obtenerId();
          $idEntrada= $entrada->obtenerId();
          $titulo="";
          $sentencia->bindParam(":autorId", $idUsuario, PDO::PARAM_STR);
          $sentencia->bindParam(":entradaId", $idEntrada, PDO::PARAM_STR);
          $sentencia->bindParam(":titulo", $titulo, PDO::PARAM_STR);
          $sentencia->bindParam(":texto", $texto, PDO::PARAM_STR);
          $comentarioInsertado=$sentencia->execute();
          
        }catch(PDOException $ex)
        {
          print HOLIERROR. $ex->getMessage();
        } 
      }
      return $comentarioInsertado;
    }
    public static function obtenerComentariosPorEntrada($conection, $idEntrada)
    {
      $comentarios=array();
      if(isset($conection))
      {
        try{
          $sql="SELECT * FROM comentarios WHERE entradaId=:entradaId";
          $sentencia=$conection->prepare($sql);
          $sentencia->bindParam(":entradaId", $idEntrada, PDO::PARAM_STR);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          if(count($resultado))
          {
            foreach($resultado as $fila)
            {
              $comentarios[]= new comentarios($fila["id"], $fila["autorId"], $fila["entradaId"], $fila["titulo"], $fila["texto"], $fila["fecha"], $fila["activa"], $fila["likes"]);
            }
          }
        }catch(PDOException $ex){
          print HOLIERROR.$ex->getMessage();
        }
      }
      return $comentarios;
    }
    
}

 ?>
