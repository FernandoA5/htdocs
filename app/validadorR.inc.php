<?php
class ValidadorRegistro
{
  private $avisoInicio;
  private $avisoCierre;
  private $nombre;
  private $email;
  private $clave;


  private $error_n;
  private $error_e;
  private $error_p1;
  private $error_p2;

  public function __construct($nombre, $email, $pass1, $pass2)
  {
    $this -> avisoInicio="<br><div class='alert-danger' role='alert'>";
    $this -> avisoCierre="</div>";
    $this -> nombre ="";
    $this -> email="";
    $this -> clave="";
    $this -> error_n = $this ->validarNombre($nombre);
    $this -> error_e =$this ->validarEmail($email);
    $this -> error_p1 =$this ->validarClave1($pass1);
    $this -> error_p2 =$this ->validarClave2($pass1, $pass2);
    if($this -> error_p1 ==="" && $this -> error_p2 ==="")
    {
      $this -> clave =$pass1;
    }
  }
  private function VariableIniciada($variable)
  {
    if(isset($variable) && !empty($variable))
    {
      return true;
    }else {
      return false;
    }
  }
  private function validarNombre($nombre)
  {
    if(!$this -> VariableIniciada($nombre))
    {
      return "¡Epa! Escribe un nombre";
    }
    else {
      $this -> nombre =$nombre;
    }/*
    if(strlen($nombre)<6)
    {
      return "El nombre debe tener mas de 3 caracteres";
    }
    if(strlen($nombre)>24)
    {
      return "El nombre solo puede tener menos de 24 caracteres";
    }*/
    return "";
  }
  private function validarEmail($email)
  {
    if(!$this -> VariableIniciada($email))
    {
      return "¡Epa! Escribe tu email";
    }
    else {
      $this -> email=$email;
    }
    return "";
  }

  private function validarClave1($pass1)
  {
    if(!$this ->VariableIniciada($pass1))
    {
      return "¡Epa! Escribe una contraseña";
    }
    return "";
  }
  private function validarClave2($pass1, $pass2)
  {
    if(!$this ->VariableIniciada($pass1))
    {
      return "¡Epa! Escribe una contraseña";
    }
    if(!$this ->VariableIniciada($pass2))
    {
      return "¡Epa! Repite la contraseña";
    }
    if($pass1 != $pass2)
    {
      return "La contraseña no coincide";
    }
    return "";
  }
  public function getName()
  {
    return $this -> nombre;
  }
  public function getEmail()
  {
    return $this -> email;
  }
  public function getPass()
  {
    return $this -> clave;
  }
  public function getFailName()
  {
    return $this -> error_n;
  }
  public function getFailEmail()
  {
    return $this -> error_e;
  }
  public function getFailPass1()
    {
      return $this -> error_p1;
  }
  public function getFailPass2()
  {
    return $this -> error_p2;
  }
  public function showname()
  {
    if($this -> nombre !="")
    {
      echo 'value="'.$this ->nombre . '"';
    }
  }
  public function showErrorName()
  {
    if($this -> error_n !="")
    {
      echo $this -> avisoInicio . $this-> error_n . $this -> avisoCierre;
    }
  }

  public function showemail()
  {
    if ($this -> email !="")
    {
      echo 'value="' . $this -> email . '"';
    }
  }
  public function showErrorEmail()
  {
    if($this -> error_e !=="")
    {
      echo $this -> avisoInicio . $this -> error_e . $this -> avisoCierre;
    }
  }
  public function showErrorClave1()
  {
    if($this -> error_p1 !=="")
    {
      echo $this -> avisoInicio . $this -> error_p1 . $this -> avisoCierre;
    }
  }
  public function showErrorClave2()
  {
    if($this -> error_p2 !=="")
    {
      echo $this -> avisoInicio . $this -> error_p2 . $this -> avisoCierre;
    }
  }
  public function registroValido()
  {
    if($this -> error_n ==="" && $this -> error_e ==="" && $this -> error_p1 ==="" && $this -> error_p2 ==="")
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
