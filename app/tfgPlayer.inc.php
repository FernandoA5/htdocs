<?php
    class tfgPlayer
    {
        private $id;
        private $x;
        private $y;
    
        public function __construct($id, $x, $y)
        {
            $this -> id =$id;
            $this -> x=$x;
            $this -> y=$y;
        }
        public function obtenerId()
        {
            return $this->id;
        }
        public function obtenerX()
        {
            return $this ->x;
        }
        public function obtenerY()
        {
            return $this ->y;
        }
    }

?>