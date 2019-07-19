<?php
  include_once "capitulo.inc.php";
  include_once "repositorioCursos.inc.php";
  class validadorCapitulo
  {
    private $avisoInicio;
    private $avisoCierre;
    private $titulo;
    private $ruta;
    private $errorTitulo;
    private $errorTexto;
    public function __construct($titulo, $ruta)
    {
      $this -> avisoInicio="<br><div class='alert-danger text-center' role='alert'>";
      $this -> avisoCierre="</div>";
      $this -> titulo ="";
      $this -> ruta="";
      $this -> errorTitulo=$this->validarTitulo($titulo);
      $this -> errorRuta=$this->validarRuta($ruta);
    }
    private function variableIniciada($variable)
    {
      if(isset($variable) && !empty($variable))
      {
        return true;
      }
      else {
        return false;
      }
    }
    private function validarTitulo($titulo)
    {
      if(!$this->variableIniciada($titulo))
      {
        return "Escribe un titulo";
      }
      else {
        $this-> titulo=$titulo;
      }
      return "";
    }
    private function validarRuta($ruta)
    {
      if(!$this->variableIniciada($ruta))
      {
        return "Ingresa la ruta del curso";
      }
      else {
        $this -> ruta=$ruta;
      }
      return "";
    }
    public function getTitle()
    {
      return $this -> titulo;
    }
    public function getRuta()
    {
      return $this -> ruta;
    }
    public function getErrorTitle()
    {
      return $this -> errorTitulo;
    }
    public function getErrorRuta()
    {
      return $this -> errorRuta;
    }
    public function showTitle()
    {
      if($this-> errorTitulo=="")
      {
        echo "value='".$this-> titulo . "'";
      }
    }
    public function showRuta()
    {
      if($this-> errorRuta=="")
      {
        echo "value='".$this-> ruta . "'";
      }
    }
    public function showErrorTitulo()
    {
      if($this-> errorTitulo!="")
      {
        echo $this-> avisoInicio . $this-> errorTitulo . $this-> avisoCierre;
      }
    }
    public function showErrorRuta()
    {
      if($this-> errorRuta!="")
      {
        echo $this-> avisoInicio . $this-> errorRuta . $this-> avisoCierre;
      }
    }
    public function capituloValido()
    {
      if($this -> errorTitulo ==="" && $this -> errorRuta ==="")
      {
        return true;
      }
      else {
        return false;
      }
    }
  }

 ?>
