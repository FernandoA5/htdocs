<?php
include_once "cursos.inc.php";
include_once "repositorioCursos.inc.php";
class validadorCursos
{
  private $avisoInicio;
  private $avisoCierre;
  private $titulo;
  private $texto;
  private $miniatura;
  private $errorTitulo;
  private $errorTexto;
  public function __construct($titulo, $texto, $miniatura)
  {
    $this -> avisoInicio="<br><div class='alert-danger text-center' role='alert'>";
    $this -> avisoCierre= "</div>";
    $this -> titulo ="";
    $this -> texto ="";
    $this -> miniatura="";
    $this -> errorTitulo = $this->validarTitulo($titulo);
    $this -> errorTexto = $this ->validarTexto($texto);
    $this -> errorMiniatura= $this ->validarMiniatura($miniatura);
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
      if(strlen($titulo)<25)
      {
        $this -> titulo =$titulo;
      }
      else {
        return "titulo demaciado largo";
      }
    }
    return "";

  }
  private function validarTexto($texto)
  {
    if(!$this -> variableIniciada($texto))
    {
      return "Escribe algo";
    }
    else {
      $this -> texto=$texto;
    }
    return "";
  }
  private function validarMiniatura($miniatura)
  {
    if(!$this -> variableIniciada($miniatura))
    {
      return "No se ha subido la miniatura";
    }
    else {
      $this -> miniatura =$miniatura;
    }
  }
  public function getTitle()
  {
    return $this -> titulo;
  }
  public function getText()
  {
    return $this -> texto;
  }
  public function getMiniatura()
  {
    return $this -> miniatura;
  }
  public function getErrorTitle()
  {
    return $this -> errorTitulo;
  }
  public function getErrorText()
  {
    return $this -> errorTexto;
  }
  public function getErrorMiniatura()
  {
    return $this -> errorMiniatura;
  }
  public function showTitle()
  {
    if($this -> errorTitulo=="")
    {
      echo 'value="'.$this -> titulo . '"';
    }
  }
  public function showText()
  {
    if($this -> errorTexto=="")
    {
      echo $this -> texto;
    }
  }
  public function showErrorTitulo()
  {
    if($this -> errorTitulo != "")
    {
      echo $this -> avisoInicio . $this -> errorTitulo . $this -> avisoCierre;
    }
  }
  public function showErrorTexto()
  {
    if($this -> errorTexto!="")
    {
      echo $this -> avisoInicio .  $this -> errorTexto . $this -> avisoCierre;
    }
  }
  public function showErrorMiniatura()
  {
    echo $this -> avisoInicio . $this -> errorMiniatura . $this -> avisoCierre;
  }
  public function cursoValido()
  {
    if($this -> errorTitulo==="" && $this -> errorTexto==="" && $this -> errorMiniatura==="")
    {
      return true;
    }
    else {
      return false;
    }
  }
}
 ?>
