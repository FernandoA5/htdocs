<?php
include_once "app/config.inc.php";
class validadorCode
{
    private $avisoInicio;
    private $avisoCierre;
    private $codigo;

    private $errorCodigo;
    public function __construct($codigo)
    {
        $this -> avisoInicio="<br><div class='alert-danger text-center' role='alert'>";
        $this -> avisoCierre="</div>";
        $this -> codigo="";
        $this -> errorCodigo=$this ->validarCodigo($codigo);
    }
    private function variableIniciada($variable)
    {
        if(isset($variable) && !empty($variable))
            return true;
        else
            return false;
    }
    private function validarCodigo($codigo)
    {
        
        if(!$this->variableIniciada($codigo))
        {
            return "Escribe tu código";
        }
        else{
            if(CODIGO!=$codigo)
            {
                return "Código invalido";
            }
        }
        return "";
    }
    public function getCodigo()
    {
        return $this-> codigo;
    }
    public function getFailCode()
    {
        return $this-> errorCodigo;
    }
    public function showCode()
    {
        if($this-> errorCodigo=="")
        {
            echo 'value="'.$this-> codigo . '"';
        }
    }
    public function showErrorCodigo()
    {
        if($this -> errorCodigo !="")
        {
            echo $this -> avisoInicio . $this -> errorCodigo . $this-> avisoCierre;
        }
    }
    public function codigoValido()
    {
        if($this-> errorCodigo==="")
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