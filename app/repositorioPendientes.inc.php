<?php
class repositorioPendientes{
    public static function push($conection, $actividad, $top)
    {   
        $actividadInsertada=null;
        if(isset($conection))
        {
            try{
                $sql="INSERT INTO cosasporhacer(idUsuario, actividad, fecha, estado, tope) VALUES(:idUsuario, :actividad, NOW(), 1,:tope)";
                $sentencia=$conection->prepare($sql);
                $idUsuario=$_SESSION["id_usuario"];
                $sentencia->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
                $sentencia->bindParam(":actividad", $actividad, PDO::PARAM_STR);
                $sentencia->bindParam(":tope", $top, PDO::PARAM_STR);
                $actividadInsertada=$sentencia->execute();    
            }catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }
        }
        return $actividadInsertada;
    }
    public static function pop($conection, $idActividad)
    {
        $poped=null;
        if(isset($conection))
        {   
            try
            {
                $sql="UPDATE cosasporhacer SET estado = :estado WHERE id=:idActividad";
                $sentencia=$conection->prepare($sql);
                $estado=0;
                $sentencia->bindParam(":estado", $estado, PDO::PARAM_STR);
                $sentencia->bindParam(":idActividad", $idActividad, PDO::PARAM_STR);
                $poped=$sentencia->execute();
                
            }
            catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }
        }
        return $poped;
    }
    public static function obtenerTop($conection, $idUsuario)
    {
        $top=0;
        if(isset($conection))
        {
            $pendientesTop=self::cargarPendientes($conection, $idUsuario);
            if(count($pendientesTop))
            {
                for($i=0; $i<count($pendientesTop); $i++)
                {
                    if($pendientesTop[$i]->obtenerEstado()==1)
                    {
                        if($pendientesTop[$i]->obtenerTop()>$top)
                        {
                            $top=$pendientesTop[$i]->obtenerTop();
                        }
                    }
                }
            }
        }
        return $top;
    }
    public static function cargarPendientes($conection, $idUsuario)
    {
        $pendientes=array();
        if(isset($conection))
        {
            
            try{
                $sql="SELECT * FROM cosasporhacer WHERE(idUsuario=:idUsuario) AND estado=:estado";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
                $estado="1";
                $sentencia->bindParam(":estado", $estado, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetchAll();
                if(count($resultado))
                {
                    foreach($resultado as $fila)
                    {
                        $pendientes[]= new cosasPorHacer($fila["id"], $fila["idUsuario"], $fila["actividad"], $fila["fecha"], $fila["estado"], $fila["tope"]);
                    }
                }
            }catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }

        }
        return $pendientes;
    }
    public static function cargarDone($conection, $idUsuario)
    {
        $cargadas=array();
        if(isset($conection))
        {
            $sql="SELECT * FROM cosasporhacer WHERE (idUsuario=:idUsuario) AND estado LIKE :estado";
            $sentencia=$conection->prepare($sql);
            $sentencia->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
            $estado="0";
            $sentencia->bindParam(":estado", $estado, PDO::PARAM_STR);
            $sentencia->execute();
            $resultado=$sentencia->fetchAll();
            if(count($resultado))
            {
                foreach($resultado as $fila)
                {
                    $cargadas[]= new cosasPorHacer($fila["id"], $fila["idUsuario"], $fila["actividad"], $fila["fecha"], $fila["estado"], $fila["tope"]);
                }
            }
        }
        return $cargadas;
    }
    public static function escribir($conection, $idUsuario, $top)
    {
        $pendientes=self::cargarPendientes($conection, $idUsuario);
        if(isset($conection))
        {
        
            for($i=count($pendientes)-1; $i>=0; $i--)
            {
                if($top==$pendientes[$i]->obtenerTop())
                {
                ?>
                <button class="btn control-panel capitulo-btn pop" type="submit" name="sendActividad" style="font-size:24px" title="<?php 
                    echo "Top: ".$top;
                ?>" id="<?php echo "actividad".$i; ?>"><?php 
                echo $pendientes[$i]->obtenerActividad();
                ?>
                </button>
                <input   style="visibility:hidden; height:0px" type="text" name="actividadTop" value="<?php echo $pendientes[$i]->obtenerId();?>">
                <?php
                }
                else{
                    ?>
                    <a class="btn control-panel capitulo-btn" style="font-size:24px" id="<?php echo "actividad".$i; ?>"><?php 
                        echo $pendientes[$i]->obtenerActividad();
                    ?></a>
                    <?php
                }
            }
        }
    }
    public static function escribirDone($conection, $idUsuario)
    {
        $done=self::cargarDone($conection, $idUsuario);
        if(isset($conection))
        {
            for($i=count($done)-1; $i>=0; $i--)
            {
                ?>
                    <a class="btn control-panel done-btn" style="font-size:24px" id="<?php echo "actividad".$i; ?>"><?php 
                        echo $done[$i]->obtenerActividad();
                    ?></a>
                <?php
            }
        }
    }
}
?>