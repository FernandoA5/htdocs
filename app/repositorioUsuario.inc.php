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
}


 ?>
