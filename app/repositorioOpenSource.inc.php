<?php
class repositorioOpenSource{
    public static function registrarUsuario($conection, $usuario)
    {
        $usuarioInsertado = false;
        if(isset($conection))
        {
            try{
                include_once "openSourceUsers.inc.php";
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
}
?>