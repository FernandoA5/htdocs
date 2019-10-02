<?php
include_once "likesUsuariosEntradas.inc.php";
class repositorioLikesUsuariosEntradas{
    public static function consultar($conection, $idEntrada, $idUsuario)
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
                    foreach($resultado as $fila)
                    {
                        $likesUE=new likesUsuariosEntradas($fila["id"], $fila["idEntrada"], $fila["idUsuario"]);
                    }
                    if($idUsuario==$likesUE->obtenerIdUsuario())
                    {
                        return true;
                    }
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
                //AÑADIR REGISTRO DE USUARIO
                $sql="INSERT INTO likesusuariosentradas(idEntrada, idUsuario) VALUES(:idEntrada, :idUsuario)";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":idEntrada", $idEntrada,PDO::PARAM_STR);
                $sentencia->bindParam(":idUsuario", $idUsuario,PDO::PARAM_STR);
                $sentencia->execute();
                
                ?>
                <script type="text/javascript">
                    //REACTIVAR CUANDO NO SE ESTEN HACIENDO PRUEBAS
                    window.location.replace("<?php echo SERVIDOR.$_SERVER["REQUEST_URI"]; ?>");
                </script>
                <?php
            }catch(PDOExceptio $ex)
            {
                print HOLIERROR. $ex->getMessage();
            }
        }
    }
    public static function sumarPuntos($conection, $entrada)
    {
        if(isset($conection))
        {
            try{
                $sql="UPDATE usuarios SET puntos=:puntos WHERE id=:id";
                $sentencia=$conection->prepare($sql);
                //obtener puntos actuales
                include_once "repositorioUsuario.inc.php";
                $usuario=repositorioUsuario::obtenerUsuarioPorId($conection, $entrada->obtenerAutorId());
                $tempPuntos= $usuario->obtenerPuntos();
                $tempId=$entrada->obtenerAutorId();
                $tempPuntos+=5;
                $sentencia->bindParam(":puntos", $tempPuntos, PDO::PARAM_STR);
                $sentencia->bindParam(":id", $tempId, PDO::PARAM_STR);
                $sentencia->execute();
            }   catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }         
        }
    }
    public static function restarPuntos()
    {

    }
}

?>
