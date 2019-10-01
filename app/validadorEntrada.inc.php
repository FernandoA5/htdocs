<?php
include_once "entradas.inc.php";
include_once "repositorioEntradas.inc.php";
include_once "palabrasRaras.inc.php";
class validadorEntradas
{
  private $avisoInicio;
  private $avisoCierre;
  private $titulo;
  private $texto;

  private $errorTitulo;
  private $errorTexto;
  public function __construct($titulo, $texto)
  {
    $this -> avisoInicio="<br><div class='alert-danger text-center' role='alert'>";
    $this -> avisoCierre="</div>";
    $this -> titulo= "";
    $this -> texto= "";
    $this -> errorTitle=$this ->validarTitulo($titulo);
    $this -> errorText=$this ->validarTexto($texto);

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
    if(!$this -> variableIniciada($titulo))
    {
      return "Escribe un titulo";
    }
    else {
        if(palabrasRaras::encontrarTags($titulo)==true)
        {
          $this -> titulo =$titulo;
        }
        else{
          return "Caracter Invalido";
        }
        if(!strpos($titulo, "?"))
        {
          $this -> titulo =$titulo;
        }
        else{
          return "Caracter Invalido";
        }
        
    }
    return "";
  }
  private function validarTexto($texto)
  {
    if(!$this ->variableIniciada($texto))
    {
      return "Escribe algo";
    }
    else {
      
        $this -> texto=$texto;
      
    }
    return "";
  }
  public function getTitle()
  {
    return $this -> titulo;
  }
  public function getText()
  {
    return $this -> texto;
  }
  public function getFailTitle()
  {
    return $this -> errorTitle;
  }
  public function getFailText()
  {
    return $this -> errorText;
  }
  public function showTitle()
  {
    if($this -> errorTitle =="")
    {
      echo 'value="'. $this -> titulo .'"';
    }
  }
  public function showText()
  {
    if($this -> errorText =="")
    {
      echo $this -> texto;
    }
  }
  public function showErrorTitle()
  {
    if($this -> errorTitle !="")
    {
      echo $this -> avisoInicio . $this -> errorTitle . $this-> avisoCierre;
    }
  }
  public function showErrorText()
  {
    if($this -> errorText!="")
    {
      echo $this -> avisoInicio . $this -> errorText . $this -> avisoCierre;
    }
  }
  public function entradaValida()
  {
    if($this-> errorTitle==="" && $this-> errorText==="")
    {
      return true;
    }
    else
    {
      return false;
    }
  }

}
 ?>
