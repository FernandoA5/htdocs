<?php
class validadorNuevaClave{
    private $avisoInicio;
    private $avisoCierre;
    private $clave1;
    private $clave2;
    private $errorClave1;
    private $errorClave2;
    public function __construct($clave1, $clave2)
    {
        $this-> avisoInicio="<br><div class='alert-danger text-center' role='alert'>";
        $this-> avisoCierre="</div>";
        $this-> clave1=$clave1;
        $this-> clave2=$clave2;
        $this-> errorClave1=$this->validarClave1($clave1);
        $this-> errorClave2=$this->validarClave2($clave1, $clave2);
    }
    private function variableIniciada($variable)
    {
        if(isset($variable) && !empty($variable))
        {
            return true;
        }
        else{
            return false;
        }
    }
    private function validarClave1($clave1)
    {
        if(!$this-> variableIniciada($clave1))
        {
            return "Escribe una clave";
        }
        else{
            $this-> titulo=$clave1;
        }
        return "";
    }
    private function validarClave2($clave1, $clave2)
    {
        if(!$this-> variableIniciada($clave2))
        {
            return "Repite la contraseña";
        }
        if(!$this-> variableIniciada($clave1))
        {
            return "Escribe una contraseña";
        }
        if($clave1!=$clave2)
        {
            return "Las contraseñas no coinciden";
        }
        return "";
    }
    public function obtenerClave()
    {
        return $this-> clave;
    }
    public function obtenerErroClave1()
    {
        return $this-> errorClave1;
    }
    public function obtenerErrorClave2()
    {
        return $this-> errorClave2;
    }
    public function showErrorClave1()
    {
        if($this-> errorClave1!=="")
        {
            echo $this -> avisoInicio . $this -> errorClave1 . $this -> avisoCierre;
        }
    }
    public function showErrorClave2()
    {
        if($this-> errorClave2!=="")
        {
            echo $this -> avisoInicio . $this -> errorClave2. $this -> avisoCierre;
        }
    }
    public function claveValida()
    {
        if($this -> errorClave1 ==="" && $this-> errorClave2 ==="")
        {
            return true;
        }
        else{
            return false;
        }
    }
}

?>