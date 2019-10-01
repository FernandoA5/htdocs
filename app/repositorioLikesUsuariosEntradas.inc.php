<?php
include_once "likesUsuariosEntradas.inc.php";
class repositorioLikesUsuariosEntradas{
    public static function consultar($conection, $idUsuario, $idEntrada)
    {
        
        if(isset($conection))
        {
            try
            {  
                $sql="SELECT * FROM likesusuariosentradas WHERE idEntrada=:idEntrada";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":idEntrada", $idEntrada, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetchAll();
                
                if(!empty($resultado))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }catch(PDOException $ex)
            {
                print HOLIERROR . $ex->getMessage();
            }
        }
        
    
    }
    public static function push($conection, $idEntrada,$idUsuario)
    {
        if(isset($conection))
        {
            try{
                $sql="INSERT INTO likesusuariosentradas(idEntrada, idUsuario) VALUES(:idEntrada, :idUsuario)";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":idEntrada", $idEntrada,PDO::PARAM_STR);
                $sentencia->bindParam(":idUsuario", $idUsuario,PDO::PARAM_STR);
                $sentencia->execute();
            }catch(PDOExceptio $ex)
            {
                print HOLIERROR. $ex->getMessage();
            }
        }
    }
}
?>