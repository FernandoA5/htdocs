<?php
include_once "confirmarCorreo.inc.php";
class repositorioConfirmarCorreo{
    public static function generarPeticion($conection, $idUsuario, $urlSecreta)
    {
        $peticion=null;
        if(isset($conection))
        {
            try
            {
                $sql="INSERT INTO confirmarcorreo(idUsuario, urlSecreta, fecha) VALUES(:idUsuario, :urlSecreta, NOW())";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
                $sentencia->bindParam(":urlSecreta", $urlSecreta, PDO::PARAM_STR);
                $peticion=$sentencia->execute();
            }catch(PDOException $ex)
            {   
                print HOLIERROR.$ex->getMessage();
            }
        }
        return $peticion;
    }
    public static function buscarPeticion($conection, $urlSecreta)
    {
        $peticion=null;
        if(isset($conection))
        {
            try{
                $sql="SELECT * FROM confirmarcorreo WHERE urlSecreta=:urlSecreta";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":urlSecreta", $urlSecreta, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetch();
                if(!empty($resultado))
                {
                    $peticion= new confirmarCorreo($resultado["id"], $resultado["idUsuario"], $resultado["urlSecreta"], $resultado["fecha"]);
                }
            }catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }
        }
        return $peticion;
    }
    public static function eliminarUrl($conection, $urlSecreta)
    {
        $eliminada=false;
        if(isset($conection))
        {
            try{
                $sql="DELETE FROM confirmarcorreo WHERE urlSecreta=:urlSecreta";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":urlSecreta", $urlSecreta, PDO::PARAM_STR);
                if($sentencia->execute())
                {
                    $eliminada=true;
                }
            }catch(PDOException $ex)
            {
                print HOLIERRO.$ex->getMessage();
            }
        }
        return $eliminada;
    }
}
?>