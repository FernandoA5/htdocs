<?php
class repositorioPendientes{
    public static function push($conection, $actividad)
    {
        $actividadInsertada=null;
        if(isset($conection))
        {
            try{
                $sql="INSERT INTO cosasporhacer(idUsuario, actividad, fecha, estado) VALUES(:idUsuario, :actividad, NOW(), 1)";
                $sentencia=$conection->prepare($sql);
                $idUsuario=$_SESSION["id_usuario"];
                $sentencia->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
                $sentencia->bindParam(":actividad", $actividad, PDO::PARAM_STR);
                $actividadInsertada=$sentencia->execute();    
            }catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }
        }
        return $actividadInsertada;
    }
    public static function cargarPendientes($conection, $idUsuario)
    {
        $pendientes=array();
        if(isset($conection))
        {
            
            try{
                $sql="SELECT * FROM cosasporhacer WHERE idUsuario=:idUsuario";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetchAll();
                if(count($resultado))
                {
                    foreach($resultado as $fila)
                    {
                        $pendientes[]= new cosasPorHacer($fila["id"], $fila["idUsuario"], $fila["actividad"], $fila["fecha"], $fila["estado"]);
                    }
                }
            }catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }

        }
        return $pendientes;
    }
    public static function escribir($conection, $idUsuario)
    {
        $pendientes=self::cargarPendientes($conection, $idUsuario);
        if(isset($conection))
        {
            for($i=count($pendientes)-1; $i>=0; $i--)
            {
                ?>
                <button class="btn control-panel capitulo-btn" type="submit" style="font-size:24px"><?php 
                    echo $pendientes[$i]->obtenerActividad();
                ?></button>
                <input   style="visibility:hidden; height:0px" type="text" name="actividad<?php echo $i; ?> value="<?php echo $pendientes[$i]->obtenerId();?>">
                <?php
                
            }
        }
    }
}
?>