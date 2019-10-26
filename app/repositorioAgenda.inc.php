<?php
 include_once "agenda.inc.php";
class repositorioAgenda
{
    public static function escribirActividades($conection, $actividades)
    {
        if(isset($conection))
        {
            try{
                
            }
            catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }
        }
    }
    public static function obtenerActividades($conection, $fecha)
    {   
        $actividades=array();
        $year= $fecha[0];
        $mes= $fecha[1];
        $dia= $fecha[2];
        if(isset($conection))
        {
            try{
               
                $sql="SELECT * FROM agenda WHERE :dia LIKE dia AND :dia LIKE dia AND :year LIKE year";
                $sentencia=$conection->prepare($sql);
                $sentencia->bindParam(":year", $year, PDO::PARAM_STR);
                $sentencia->bindParam(":mes", $mes, PDO::PARAM_STR);
                $sentencia->bindParam(":dia", $dia, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetchAll();
                if(!empty($resultado))
                {   
                    foreach($resultado as $fila)
                    {
                        $actividades[]= new agenda($fila["id"], $fila["idUsuario"] , $fila["actividad"], $fila["estado"], $fila["dia"], $fila["mes"],$fila["year"]);
                    }
                }
                

            }catch(PDOException $ex)
            {
                print HOLIERROR.$ex->getMessage();
            }
        }
        return $actividades;
    }
}
?>