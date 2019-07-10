<?php
  class controlSesion
  {
    public static function iniciarSesion($idUsuario, $nombreUsuario)
    {
      if(session_id()=="")
      {
        session_start();
      }
      $_SESSION["id_usuario"]=$idUsuario;
      $_SESSION["nombre_usuario"]=$nombreUsuario;
    }


    public function cerrarSesion()
    {
      if(session_id()=="")
      {
        session_start();
      }
      if(isset($_SESSION["id_usuario"]))
      {
        unset($_SESSION["id_usuario"]);
      }
      if(isset($_SESSION["nombre_usuario"]))
      {
        unset($_SESSION["nombre_usuario"]);
      }
      session_destroy();
    }
    public static function sesionIniciada()
    {
      if(session_id()=="")
      {
        session_start();
      }
      if(isset($_SESSION["id_usuario"]) && isset($_SESSION["nombre_usuario"]))
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
