<?php
include_once "comentarios.inc.php";
include_once "repositorioComentarios.inc.php";
class validadorComentario{
    private $avisoInicio;
    private $avisoCierre;
    private $texto;
    private $errorTexto;
    public function __construct($texto)
    {
        $this-> avisoInicio="<br><div class='alert-danger text-center' role='alert'>";
        $this-> avisoCierre="</div>";
        $this-> texto="";
        $this-> errorTexto=$this-> validarTexto($texto);

    }
    public function variableIniciada($variable)
    {
        if(isset($variable) && !empty($variable))
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function validarTexto($texto)
    {
        if(!$this-> variableIniciada($texto))
        {
            return "No has escrito Nada";
        }
        else{
            $this -> texto=$texto;
        }
        return "";
    }
    public function getText()
    {
        return $this -> texto;
    }
    public function getErrorText()
    {
        return $this-> errorTexto;
    }
    public function showText()
    {
        if($this-> errorTexto=="")
        {
            echo "value='".$this-> texto. "'";
        }
    }
    public function showErrorText()
    {
        echo $this-> avisoInicio. $this-> errorTexto . $this-> avisoCierre;
    }
    public function comentarioVacio()
    {
        if($this -> errorTexto==="" && $this-> errorRuta==="")
        {
            return true;
        }
        else{
            return false;
        }
    }
}
?>