<?php
  include_once "comentarios.inc.php";
  class validadorComentariosCapitulo
  {
    private $texto;
    private $avisoInicio;
    private $avisoCierre;
    private $errorTexto;
    public function __construct($texto)
    {
      $this -> avisoInicio="<br><div class='alert-danger text-center' role='alert'>";
      $this -> avisoCierre= "</div>";
      $this -> texto=$texto;
      $this -> errorTexto=$this->validarTexto($texto);

    }
    private function VariableIniciada($variable)
    {
      if(isset($variable) && !empty($variable))
      {
        return true;
      }
      else {
        return false;
      }
    }
    private function validarTexto($texto)
    {
      if(!$this->VariableIniciada($texto))
      {
        return "Olvidaste escribir algo";
      }
      else
      {
        $this -> texto=$texto;
      }
      return "";
    }
    public function getTexto()
    {
      return $this-> texto;
    }
    public function getErrorText()
    {
      return $this -> errorTexto;
    }
    public function showTexto()
    {
      if($this -> errorTexto=="")
      {
        echo $this-> texto;
      }
    }
    public function showErrorTexto()
    {
      if($this-> errorTexto!="")
      {
        echo $this-> avisoInicio. $this-> errorTexto. $this-> avisoCierre;
      }
    }
    public function comentarioValido()
    {
      if($this -> errorTexto==="")
      {
        return true;
      }
      else {
        return false;
      }
    }
  }
 ?>
