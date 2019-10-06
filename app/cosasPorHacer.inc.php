<?php
class cosasPorHacer{
    private $id;
    private $idUsuario;
    private $actividad;
    private $fecha;
    private $estado;
    private $top;
    public function __construct($id, $idUsuario, $actividad, $fecha, $estado, $top)
    {
        $this-> id =$id;
        $this-> idUsuario=$idUsuario;
        $this-> actividad=$actividad;
        $this-> fecha=$fecha;
        $this-> estado=$estado;
        $this-> top=$top;
    }    
    public function obtenerId()
    {
        return $this-> id;
    }
    public function obtenerIdUsuario()
    {
        return $this-> idUsuario;
    }
    public function obtenerActividad()
    {
        return $this-> actividad;
    }
    public function obtenerFecha()
    {
        return $this-> fecha;
    }
    public function obtenerEstado()
    {
        return $this-> estado;
    }
    public function obtenerTop()
    {
        return $this-> top;
    }
    public function changeActividad()
    {
        $this-> actividad = $actividad;
    }
    public function changeEstado()
    {
        $this-> estado = $estado;
    }
    public function changeTop()
    {
        $this-> top= $top;
    }

}
?>