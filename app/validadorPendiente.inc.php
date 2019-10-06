<?php
class validadorPendiente
{
    private $avisoInicio;
    private $avisoCierre;
    private $actividad;
    private $errorActividad;
    public function __construct($actividad)
    {
        $this-> avisoInicio ="<br><div class='alert-danger text-center' role='alert'>";
        $this-> avisoCierre="</div>";
        $this-> actividad="";
        $this-> errorActividad=$this-> validarActividad($actividad);
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
    public function validarActividad($actividad)
    {
        if(!$this-> variableIniciada($actividad))
        {
            return "No has escrito nada";
        }
        else{
            $this-> actividad=$actividad;
        }
        return "";
    }
    public function getActividad()
    {
        return $this -> actividad;
    }
    public function getErrorActividad()
    {
        return $this -> errorActividad;
    }
    public function showActividad()
    {
        if($this-> errorActividad=="")
        {   
            echo "value='".$this-> actividad. "'";
        }
    }
    public function showErrorActividad()
    {
        if($this-> errorActividad !="")
        {
            echo $this-> avisoInicio. $this-> errorActividad . $this-> avisoCierre;

        }
    }
    public function actividadValida()
    {
        if($this-> errorActividad==="")
        {
            return true;
        }
        else{
            return false;
        }
    }
}
?>