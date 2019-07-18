<?php
  class capitulo
  {
    private $id;
    private $cursoId;
    private $titulo;
    private $ruta;
    private $fecha;
    private $vistas;

    public function __construct($id, $cursoId, $titulo, $ruta, $fecha, $vistas)
    {
        $this -> id =$id;
        $this -> cursoId =$cursoId;
        $this -> titulo=$titulo;//
        $this -> ruta=$ruta;//
        $this -> fecha=$fecha;
        $this -> vistas=$vistas;//
    }
    public function obtenerId()
    {
      return $this -> id;
    }
    public function obtenerCursoId()
    {
      return $this -> cursoId;
    }
    public function obtenerTitulo()
    {
      return $this -> titulo;
    }
    public function obtenerRuta()
    {
      return $this -> ruta;
    }
    public function obtenerFecha()
    {
      return $this -> fecha;
    }
    public function obtenerVistas()
    {
      return $this -> vistas;
    }
    public function changeTitulo()
    {
      $this -> titulo =$titulo;
    }
    public function changeRuta()
    {
      $this -> ruta =$ruta;
    }
    public function changeVistas()
    {
      $this -> vistas=$vistas;
    }
  }

 ?>
