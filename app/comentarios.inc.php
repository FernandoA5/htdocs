<?php
class comentarios
{
  private $id;
  private $autorId;
  private $entradaId;
  private $titulo;
  private $texto;
  private $fecha;
  private $activa;
  private $likes;

  public function __construct($id, $autorId, $entradaId, $titulo, $texto, $fecha, $activa, $likes)
  {
    $this -> id=$id;
    $this -> autorId=$autorId;
    $this -> entradaId=$entradaId;
    $this -> titulo=$titulo;//
    $this -> texto=$texto;//
    $this -> fecha=$fecha;
    $this -> activa=$activa;//
    $this -> likes=$likes;//
  }
  public function obtenerId()
  {
    return $this -> id;
  }
  public function obtenerAutorId()
  {
    return $this -> autorId;
  }
  public function obtenerEntradaId()
  {
    return $this -> entradaId;
  }
  public function obtenerTitulo()
  {
    return $this -> titulo;
  }
  public function obtenerTexto()
  {
    return $this -> texto;
  }
  public function obtenerFecha()
  {
    return $this -> fecha;
  }
  public function obtenerActiva()
  {
    return $this -> activa;
  }
  public function obtenerLikes()
  {
    return $this -> likes;
  }

  public function changeTitulo()
  {
    $this -> titulo=$titulo;
  }
  public function changeTexto()
  {
    $this -> texto=$texto;
  }
  public function changeActiva()
  {
    $this -> activa=$activa;
  }
  public function changeLikes()
  {
    $this -> likes =$likes;
  }

}

 ?>
