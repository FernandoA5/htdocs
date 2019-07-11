<?php
abstract class calc
{
  abstract public function calculate($param);

  protected function getConst()
  {
    return 4;
  }
}
class fixedCalc extends calc
{
    public function calculate($param)
    {
      return $this -> getConst() + $param;
    }
}
$obj = new FixedCalc();
echo $obj-> calculate(38);

 ?>
