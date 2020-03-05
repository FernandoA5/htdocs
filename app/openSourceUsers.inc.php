<?php
class openSourceUsers{
    private $id;
    private $idUsuario;
    private $puntos;
    private $rango;

    public function __construct($id, $idUsuario, $puntos, $rango)
    {
        $this -> id = $id;
        $this -> idUsuario = $idUsuario;
        $this -> puntos = $puntos;
        $this -> rango = $rango;
    }
    public function obtenerId()
    {
        return $this -> id;
    }
    public function obtenerIdUsuario()
    {
        return $this -> idUsuario;
    }
    public function obtenerPuntos()
    {
        return $this -> puntos;
    }
    public function obtenerRango()
    {
        return $this -> rango;
    }
}
?>