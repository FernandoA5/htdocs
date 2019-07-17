<?php
include_once "cursos.inc.php";
  class repositorioCursos
  {
    public static function insertarCurso($conection, $curso)
    {
      $cursoInsertado=null;
      if(isset($conection))
      {
        try {
          $sql ="INSERT INTO cursos(autorId, titulo, miniatura, ruta, texto, fecha, vistas) VALUES(:autorId, :titulo, :texto, NOW(), 0)";
          $sentencia=$conection->prepare($sql);
          $autorTemp=$curso->obtenerAutorId();
          $tituloTemp=$curso->obtenerTitulo();
          $textoTemp=$curso->obtenerTexto();

          $sentencia->bindParam(":autorId", $autorTemp, PDO::PARAM_STR);
          $sentencia->bindParam(":titulo", $tituloTemp, PDO::PARAM_STR);
          $sentencia->bindParam(":texto", $textoTemp, PDO::PARAM_STR);
          $entradaInsertada=$sentencia->execute();
        } catch (PDOException $ex) {
          print HOLIERROR . $ex->getMessage();
        }

      }
      return $cursoInsertado;
    }
    public static function buscarCurso($conection, $titulo)
    {
      $curso=null;
      if(isset($conection))
      {
        try {
          $curso=null;
          $sql="SELECT * FROM cursos WHERE titulo=:titulo";
          $sentencia=$conection ->prepare($sql);

          $sentencia->bindParam(":titulo", $titulo, PDO::PARAM_STR);
          $sentencia->execute();
          $resultado=$sentencia->fetch();
          if(!empty($resultado))
          {
            $curso=new cursos($resultado["id"], $resultado["autorId"], $resultado["titulo"], $resultado["miniatura"], $resultado["ruta"], $resultado["texto"], $resultado["fecha"], $resultado["vistas"]);
          }
        } catch (\PDOException $ex) {
          print HOLIERROR . $ex->getMessage();
        }

      }
      return $curso;
    }
    public static function todosCursos($conection)
    {
      $cursos=array();
      if(isset($conection))
      {
        try {
          $sql="SELECT * FROM cursos";
          $sentencia=$conection->prepare($sql);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          if(count($resultado))
          {
            foreach ($resultado as $fila) {
              $cursos[]=new cursos($fila["id"], $fila["autorId"], $fila["titulo"], $fila["miniatura"], $fila["ruta"], $fila["texto"], $fila["fecha"], $fila["vistas"]);
            }
          }
          else {
            echo HOLI . "NO HAY CURSOS";
          }
        } catch (PDOException $ex) {
          print HOLI . $ex->getMessage();
        }

      }
      return $cursos;
    }
  }
 ?>
