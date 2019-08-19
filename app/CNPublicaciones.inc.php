<?php
class CNPublicaciones
{
  private $id;
  private $autorId;
  private $titulo;
  private $texto;
  private $imagen;
  private $estado;

  public function __construct($id, $autorId, $titulo, $texto, $imagen, $estado)
  {
    $this -> id=$id;
    $this -> autorId=$autorId;
    $this -> titulo=$titulo;//
    $this -> texto=$texto;//
    $this -> imagen=$imagen;//
    $this -> estado=$estado;//
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
  public function obtenerTexto()
  {
    return $this -> texto;
  }
  public function obtenerImagen()
  {
    return $this -> imagen;
  }
  public function obtenerEstado()
  {
    return $this -> estado;
  }
  public function changeTitulo()
  {
    $this -> titulo=$titulo;
  }
  public function changeTexto()
  {
    $this -> texto=$texto;
  }
  public function changeImagen()
  {
    $this -> imagen=$imagen;
  }
  public function changeEstado()
  {
    $this -> estado=$estado;
  }
}


 ?>
