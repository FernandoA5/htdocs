<?php
  class repositorioCursos
  {
    public function buscarCurso($conection, $titulo)
    {
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
            $curso=new curso($resultado["id"], $resultado["autorId"], $resultado["titulo"], $resultado["miniatura"], $resultado["ruta"], $resultado["texto"], $resultado["fecha"], $resultado["vistas"]);
          }
        } catch (\PDOException $ex) {
          print HOLIERROR . $ex->getMessage();
        }

      }

    }
  }
 ?>
