<?php
include_once "recuperacionClave.inc.php";
class repositorioRecuperacionClave{
    public static function generarPeticion($conection, $idUsuario, $urlSecreta)
    {
        $peticion=null;
        if(isset($conection))
        {   
            try
            {
                  
                $sql="INSERT INTO recuperacionclave(idUsuario, urlSecreta, fecha) VALUES(:idUsuario, :urlSecreta, NOW())";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
                $sentencia->bindParam(":urlSecreta", $urlSecreta, PDO::PARAM_STR);
                $peticion=$sentencia->execute();
            }catch(PDOException $ex)
            {
                print HOLIERRROR.$ex->getMessage();
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
                $sql=" SELECT * FROM recuperacionClave WHERE urlSecreta=:urlSecreta";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":urlSecreta", $urlSecreta, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetch();
                if(!empty($resultado))
                {
                    $peticion= new recuperacionClave($resultado["id"], $resultado["idUsuario"], $resultado["urlSecreta"], $resultado["fecha"]);   
                }
            }catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }
        }
        return $peticion;
    }
}

?>