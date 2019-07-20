<?php
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
}

 ?>
