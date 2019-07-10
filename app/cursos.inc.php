<?php
class cursos
{
  private $id;
  private $autorId;
  private $titulo;
  private $miniatura;
  private $ruta;
  private $texto;
  private $fecha;
  private $vistas;

  public function __construct($id, $autorId, $titulo, $miniatura, $ruta, $texto, $fecha, $vistas)
  {
    $this -> id=$id;
    $this -> autorId=$autorId;
    $this -> titulo=$titulo;//
    $this -> miniatura=$miniatura;//
    $this -> ruta=$ruta;//
    $this -> texto=$texto;//
    $this -> fecha=$fecha;
    $this -> vistas=$vistas;//
  }
  public function obtenerId()
  {
    return $this -> id;
  }
  public function obtenerAutorId()
  {
    return $this -> autorId;
  }
  public function obtenerTitulo()
  {
    return $this -> titulo;
  }
  public function obtenerMiniatura()
  {
    return $this -> miniatura;
  }
  public function obtenerRuta()
  {
    return $this -> ruta;
  }
  public function obtenerTexto()
  {
    return $this -> texto;
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
    $this -> titulo=$titulo;
  }
  public function changeMiniatura()
  {
    $this -> miniatura=$miniatura;
  }
  public function changeRuta()
  {
    $this -> ruta=$ruta;
  }
  public function changeTexto()
  {
    $this -> texto=$texto;
  }
  public function changeVistas()
  {
    $this -> vistas=$vistas;
  }

}

 ?>
