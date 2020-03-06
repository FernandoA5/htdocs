<?php
class recuperacionClave{
    private $id;
    private $idUsuario;
    private $urlSecreta;
    private $fecha;

    public function __construct($id, $idUsuario, $urlSecreta, $fecha)
    {
        $this -> id = $id;
        $this -> idUsuario= $idUsuario;
        $this -> urlSecreta = $urlSecreta;
        $this -> fecha = $fecha;
    }
    public function obtenerId()
    {
        return $this -> id;
    }
    public function obtenerIdUsuario()
    {
        return $this -> idUsuario;
    }
    public function obtenerUrlSecreta()
    {
        return $this -> urlSecreta;
    }
    public function obtenerFecha()
    {
        return $this -> fecha;
    }
}
?>