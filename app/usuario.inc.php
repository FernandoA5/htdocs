<?php
class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $fecha_registro;
    private $activo;
    private $suscripcion;
    private $puntos;
    private $avatar;
    
    public function __construct($id, $nombre, $email, $password, $fecha_registro, $activo, $suscripcion, $puntos, $avatar)
    {
      $this -> id=$id;
      $this -> nombre=$nombre;
      $this -> email=$email;
      $this -> password=$password;
      $this -> fecha_registro=$fecha_registro;
      $this -> activo=$activo;
      $this -> suscripcion=$suscripcion;
      $this -> puntos=$puntos;
      $this -> avatar=$avatar;
    }
    public function obtenerId()
    {
      return $this -> id;
    }
    public function obtenerNombre()
    {
      return $this -> nombre;
    }
    public function obtenerPassword()
    {
      return $this -> password;
    }
    public function obtenerEmail()
    {
      return $this -> email;
    }
    public function obtenerFechaRegistro()
    {
      return $this -> fecha_registro;
    }
    public function obtenerActivo()
    {
      return $this -> activo;
    }
    public function obtenerSuscripcion()
    {
      return $this -> suscripcion;
    }
    public function obtenerPuntos()
    {
      return $this -> puntos;
    }
    public function obtenerAvatar()
    {
      return $this -> avatar;
    }
    public function changeNombre()
    {
      $this -> nombre =$nombre;
    }
    public function changePassword()
    {
      $this -> password =$password;
    }
    public function changeEmail()
    {
      $this -> email =$email;
    }
    public function changeActivo()
    {
      $this -> activo =$activo;
    }
    public function changeSuscripcion()
    {
      $this -> suscripcion =$suscripcion;
    }
    public function changePuntos()
    {
      $this -> puntos =$puntos;
    }
    public function changeAvatar()
    {
      $this -> avatar=$avatar;
    }

}


 ?>
