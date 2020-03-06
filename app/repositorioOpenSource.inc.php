<?php
include_once "openSourceUsers.inc.php";
class repositorioOpenSource{
    public static function registrarUsuario($conection, $usuario)
    {
        $usuarioInsertado = false;
        if(isset($conection))
        {
            try{
                $sql="INSERT INTO opensourceusers(idUsuario, puntos, rango) VALUES(:idUsuario, :puntos, :rango)";
                $sentencia=$conection->prepare($sql);

                $idUsuarioTemp=$usuario->obtenerId();
                $puntosTemp=0;
                $rangoTemp=1;

                $sentencia->bindParam(":idUsuario", $idUsuarioTemp, PDO::PARAM_STR);
                $sentencia->bindParam(":puntos", $puntosTemp, PDO::PARAM_STR);
                $sentencia->bindParam(":rango", $rangoTemp, PDO::PARAM_STR);
                $usuarioInsertado= $sentencia->execute();
            }catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }

        }
        return $usuarioInsertado;
    }
    public static function obtenerUsuarioPorId($conection, $id)
    {
        $usuarioOS=null;
        if(isset($conection))
        {
            try{
                $sql="SELECT * FROM opensourceusers WHERE idUsuario=:id";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":id", $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetch();
                if(!empty($resultado))
                {
                    $usuarioOS= new openSourceUsers($resultado["id"], $resultado["idUsuario"], $resultado["puntos"], $resultado["rango"]);
                }
                else{
                    echo HOLIERROR . "RESULTADO VACIO";
                }
            }catch(PDOException $ex)
            {
                print HOLIERROR . $ex->getMessage();
            }
        }
        return $usuarioOS;
    }
}
?>