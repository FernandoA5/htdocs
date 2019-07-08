<?php
class RepositorioUsuario
{
  public static function getAll($conection)
  {
    $usuarios=array();
    if(isset($conection))
    {
      try {
        include_once "usuario.inc.php";
        $sql ="SELECT * FROM usuarios";
        $sentencia = $conection ->prepare($sql);
        $sentencia ->execute();
        $resultado=$sentencia ->fetchAll();
        if(count($resultado))
        {
          foreach($resultado as $fila)
          {
            $usuarios[]= new Usuario($fila["id"], $fila["nombre"], $fila["email"], $fila["password"], $fila["fechaRegistro"], $fila["activo"], $fila["suscripcion"]);
          }
        }
        else
        {
          echo HOLI . " NO HAY USUARIOS";
        }
      } catch (PDOException $ex) {
        print HOLIERROR . $ex ->getMessage();
      }

    }
    return $usuarios;
  }
  public static function getUsers($conection)
  {
    $TotUsers=null;
    try {
      if(isset($conection))
      {
        $sql="SELECT COUNT(*) total FROM usuarios";
        $sentencia=$conection ->prepare($sql);
        $sentencia ->execute();
        $resultado=$sentencia->fetch();
        $TotUsers=$resultado["total"];
      }
    } catch (PDOException $ex) {
      print HOLIERROR . $ex ->getMessage();
    }
    return $TotUsers;

  }
  public static function insertarUsuario($conection, $usuario)
  {
    $usuarioInsertado=false;
    if(isset($conection))
    {
      try {
        include_once "usuario.inc.php";
        $sql ="INSERT INTO usuarios(nombre, email, password, fechaRegistro, activo, suscripcion) VALUES(:nombre, :email, :password, NOW(), 0, 1)";
        $sentencia =$conection ->prepare($sql);

        $nombreTemp =$usuario ->obtenerNombre();
        $emailTemp=$usuario ->obtenerEmail();
        $passTemp=$usuario->obtenerPassword();

        $sentencia ->bindParam(":nombre", $nombreTemp, PDO:: PARAM_STR);
        $sentencia ->bindParam(":email", $emailTemp, PDO:: PARAM_STR);
        $sentencia ->bindParam(":password", $passTemp, PDO:: PARAM_STR);
        $usuarioInsertado = $sentencia ->execute();

      } catch (PDOException $ex) {
        print HOLIERROR . $ex ->getMessage();
      }
      return $usuarioInsertado;

    }
  }
}


 ?>
