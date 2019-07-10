<?php
include_once "usuario.inc.php";
include_once "repositorioUsuario.inc.php";

class validadorLogin
{
    private $usuario;
    private $error;

    public function __construct($email, $clave, $conection)
    {
      $this -> error ="";
      if(!$this ->variableIniciada($email) || !$this ->variableIniciada($clave))
      {
        $this ->usuario=null;
        $this ->error="Ingresa tu Email y tu Contraseña";
      }
      else {
        $this ->usuario = RepositorioUsuario::obtenerUsuarioPorEmail($conection, $email);

        if(is_null($this-> usuario) || !password_verify($clave, $this ->usuario ->obtenerPassword()))
        {
          $this-> error ="Datos Incorrectos<br>";

        }
      }
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
    public function obtenerUsuario()
    {
      return $this -> usuario;
    }
    public function obtenerError()
    {
      return $this -> error;
    }
    public function mostrarError()
    {
      if($this -> error !="")
      {
        echo "<br><div class='alert alert-danger' role='alert'>";
        echo $this-> error;
        echo "</div><br>";
      }
    }
}

 ?>
