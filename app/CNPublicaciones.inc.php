<?php
class CNPublicaciones
{
  private $id;
  private $autorId;
  private $titulo;
  private $texto;
  private $imagen;
  private $estado;

  public function __construct($id, $autorId, $titulo, $texto, $imagen, $estado)
  {

  }

  public function oddNumbers($n)
  {
    if($n>0)
    {
      for($i=0; $i<$n;$i++)
      {
        if($n%2!=0)
        {
          echo $i;
        }
      }
    }
    else {
      echo "Parametro Invalido";
    }
  }
}


 ?>
