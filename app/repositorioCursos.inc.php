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
          $sql ="INSERT INTO cursos(autorId, titulo, miniatura, ruta, texto, fecha, vistas) VALUES(:autorId, :titulo, :miniatura, :ruta, :texto, NOW(), 0)";
          $sentencia=$conection->prepare($sql);
          $autorTemp=$curso->obtenerAutorId();
          $tituloTemp=$curso->obtenerTitulo();
          $textoTemp=$curso->obtenerTexto();
          $minTemp=$curso->obtenerMiniatura();
          $rutaTemp=$curso->obtenerRuta();

          $sentencia->bindParam(":autorId", $autorTemp, PDO::PARAM_STR);
          $sentencia->bindParam(":titulo", $tituloTemp, PDO::PARAM_STR);
          $sentencia->bindParam(":miniatura", $minTemp, PDO::PARAM_STR);
          $sentencia->bindParam(":ruta", $rutaTemp, PDO::PARAM_STR);
          $sentencia->bindParam(":texto", $textoTemp, PDO::PARAM_STR);
          $cursoInsertado=$sentencia->execute();
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
    public static function cursosUsuario($conection, $autorId)
    {
      $cursos=array();
      if(isset($conection))
      {
        try {
          $sql="SELECT * FROM cursos WHERE autorId=:autorId";
          $sentencia =$conection->prepare($sql);
          $sentencia->bindParam("autorId", $autorId, PDO::PARAM_STR);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          if(!empty($resultado))
          {
            foreach($resultado as $fila)
            {
              $cursos[]= new cursos($fila["id"], $fila["autorId"], $fila["titulo"], $fila["miniatura"], $fila["ruta"], $fila["texto"], $fila["fecha"], $fila["vistas"]);
            }
          }
          else
          {
            echo "No ha publicado Cursos";
          }
        } catch (PDOException $ex) {
          print HOLIERROR.$ex->getMessage();
        }

      }
      return $cursos;
    }
    public static function escribirCursos($cursos)
    {
      $num= count($cursos);
      for($i=0; $i<$num; $i++)
      {
        ?>
        <h4 class="text-center"><?php echo $cursos[$i]->obtenerTitulo(); ?></h4>

        <?php
      }
    }
    //CAPITULOS
    public function insertarCapitulo($conection, $capitulo)
    {
      $capituloInsertado=null;
      if(isset($conection))
      {
        try {
          $sql="INSERT INTO capitulos(cursoId, titulo, ruta, fecha) VALUES(:cursoId, :titulo, :ruta, NOW())";
          $sentencia=$conection->prepare($sql);
          $cursoIdTemp=$capitulo->obtenerCursoId();
          $tituloTemp=$capitulo->obtenerTitulo();
          $rutaTemp=$capitulo->obtenerRuta();

          $sentencia->bindParam(":cursoId", $cursoIdTemp, PDO::PARAM_STR);
          $sentencia->bindParam(":titulo", $tituloTemp, PDO::PARAM_STR);
          $sentencia->bindParam(":ruta", $rutaTemp, PDO::PARAM_STR);

          $capituloInsertado=$sentencia->execute();

        } catch (PDOException $ex) {
          print HOLIERROR.$ex->getMessage();
        }

      }
      return $capituloInsertado;
    }
    public function todosCapitulos($conection, $cursoId)
    {
      $capitulos=array();
      if(isset($conection))
      {
        try {
          $sql="SELECT * FROM capitulos WHERE cursoId=:cursoId";
          $sentencia=$conection->prepare($sql);
          $sentencia->bindParam(":cursoId", $cursoId, PDO::PARAM_STR);
          $sentencia->execute();
          $resultado=$sentencia->fetchAll();
          if(!empty($resultado))
          {
            foreach($resultado as $fila)
            {
              $capitulos[]=new capitulo($fila["id"], $fila["cursoId"], $fila["titulo"], $fila["ruta"], $fila["fecha"]);
            }
          }
          else {
            echo "Aun no hay capitulos publicados";
          }

        } catch (PDOException $ex) {
          print HOLIERROR . $ex->getMessage();
        }

      }
      return $capitulos;
    }
  }
 ?>
