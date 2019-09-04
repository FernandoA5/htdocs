<?php
include_once "programa.inc.php";
class validadorProgramas
{
  private $titulo;
  private $descripcion;
  private $ruta;
  private $imagen;
  private $errorTitulo;
  private $errorDescripcion;
  private $errorRuta;
  private $errorImagen;
  private $avisoInicio;
  private $avisoCierre;
  public function __construct($titulo, $descripcion, $ruta, $imagen)
  {
    $this -> avisoInicio="<br><div class='alert-danger text center' role='alert'>";
    $this -> avisoCierre="</div>";
    $this -> titulo="";
    $this -> descripcion="";
    $this -> ruta="";
    $this -> imagen="";
  }
  public function variableIniciada($variable)
  {
    if(isset($variable) && !empty($variable))
    {
      return true;
    }
    else {
      return false;
    }
  }
  public function validarTitulo($titulo)
  {
    if(!$this-> variableIniciada($titulo))
    {
      return "Escribe un titulo";
    }
    else {
      $this -> titulo =$titulo;
    }
  }
}
 ?>
