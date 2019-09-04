<?php
class programas{
  private $id;
  private $titulo;//
  private $descripcion;//
  private $ruta;//
  private $fecha;
  private $imagen;//

  public function __construct($id, $tiutlo, $descripcion, $ruta, $fecha, $imagen)
  {
    $this -> id=$id;
    $this -> titulo=$titulo;
    $this -> descripcion=$descripcion;
    $this -> ruta=$ruta;
    $this -> fecha=$fecha;
    $this -> imagen=$imagen;
  }
  public function obtenerId()
  {
    return $this -> id;
  }
  public function obtenerTitulo()
  {
    return $this -> titulo;
  }
  public function obtenerDescripcion()
  {
    return $this -> descripcion;
  }
  public function obtenerRuta()
  {
    return $this -> ruta;
  }
  public function obtenerFecha()
  {
    return $this -> fecha;
  }
  public function obtenerImagen()
  {
    return $this -> imagen;
  }
  public function changeTitulo()
  {
    $this -> titulo=$titulo;
  }
  public function changeDescripcion()
  {
    $this -> descripcion=$descripcion;
  }
  public function changeRuta()
  {
    $this -> ruta=$ruta;
  }
  public function changeImagen()
  {
    $this -> imagen=$imagen;
  }
}
 ?>
