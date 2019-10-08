<?php
class agenda
{
    private $id;
    private $idUsuario;
    private $actividad;
    private $estado;
    private $dia;
    private $mes;
    private $year;
    public function __construct($id, $idUsuario, $actividad, $estado, $dia, $mes, $year)
    {
        $this -> id=$id;
        $this -> idUsuario=$idUsuario;
        $this -> actividad=$actividad; //
        $this -> estado=$estado; //
        $this -> dia=$dia;
        $this -> mes=$mes;
        $this -> year=$year;
    }
    public function obtenerId()
    {
        return $this -> id;
    }
    public function obtenerIdUsuario()
    {
        return $this -> idUsuario;
    }
    public function obtenerActividad()
    {
        return $this -> actividad;
    }
    public function obtenerEstado()
    {
        return $this -> estado;
    }
    public function obtenerDia()
    {
        return $this -> dia;
    }
    public function obtenerMes()
    {
        return $this -> mes;
    }
    public function obtenerYear()
    {
        return $this -> year;
    }
    public function changeActividad()
    {
        $this-> actividad=$actividad;
    }
    public function changeEstado()
    {
        $this-> estado=$estado;
    }
}
?>