<?php
  class controlSesion
  {
    public static function iniciarSesion($idUsuario, $nombreUsuario, $suscripcion)
    {
      if(session_id()=="")
      {
        session_start();
      }
      $_SESSION["id_usuario"]=$idUsuario;
      $_SESSION["nombre_usuario"]=$nombreUsuario;
      $_SESSION["suscripcion_usuario"]=$suscripcion;
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
      if(isset($_SESSION["suscripcion_usuario"]))
      {
        unset($_SESSION["suscripcion_usuario"]);
      }
      session_destroy();
    }
    public static function sesionIniciada()
    {
      if(session_id()=="")
      {
        session_start();
      }
      if(isset($_SESSION["id_usuario"]) && isset($_SESSION["nombre_usuario"]) && isset($_SESSION["suscripcion_usuario"]))
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
