<?php
class likesUsuariosEntradas{
    private $id;
    private $idEntradas;
    private $idUsuario;
    
    public function __construct($id, $idEntradas, $idUsuario)
    {
        $this-> id=$id;
        $this-> idEntradas=$idEntradas;
        $this-> idUsuario=$idUsuario;
    }
    public function obtenerId(){
        return $this->id;
    }
    public function obtenerIdEntradas()
    {
        return $this->idEntradas;
    }
    public function obtenerIdUsuario()
    {
        return $this -> idUsuario;
    }
}
?>