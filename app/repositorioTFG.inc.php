<?php
class repositorioTFG{
    public static function buscarJugador($conexion, $idUsuario)
    {
        if(isset($conexion))
        {
            $player = null;
            try{
                $sql="SELECT * FROM tfg WHERE idUsuario = :id";
                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam("id", $idUsuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetchAll();
                if(!empty($resultado))
                {
                    foreach($resultado as $fila)
                    {
                        $player = new tfgPlayer($fila["idUsuario"], $fila["x"], $fila["y"]);
                    }
                }
                else{
                    echo "Bienvenido Nuevo Usuario";
                    echo "<br>";
                    echo "Registrando En la base de Datos";
                    echo "<br>";
                    self::registrarUsuario($conexion, $idUsuario);
                }
               return $player; 
            }catch(PDOException $ex){
                print HOLIERROR.$ex->getMessage();
            }
        }
    }
    public static function obtenerPosicionX($conexion, $idUsuario)
    {

    }
    public static function obtenerPosicionY($conexion, $idUsuario)
    {

    }
    public static function actualizarPosicion($conexion, $idUsuario)
    {

    }
    public static function registrarUsuario($conexion, $idUsuario)
    {
        if(isset($conexion))
        {
            try{
                $sql="INSERT INTO tfg(idUsuario, x, y) VALUES(:idUsuario, 100, 100)";
                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
                $sentencia->execute();
            }
            catch(PDOException $ex)
            {
                print HOLIERROR . $ex->getMessage();
            }
        }
    }
}
?>