<?php
 function stringAleatorio($longitud)
 {
     $caracteres="0123456789abcdefghijklmnopqrstuvwxyz";
     $numeroCaracteres=strlen($caracteres);
     $stringAleatorio="";
     for($i=0; $i<$longitud; $i++)
     {
        $stringAleatorio.=$caracteres[rand(0, $numeroCaracteres-1)];
     }
     return $stringAleatorio;
 }
if(isset($_POST["enviarEmail"]))
{
    $email=$_POST["email"];
    include_once "app/repositorioUsuario.inc.php";
    include_once "app/conexion.inc.php";
    include_once "app/repositorioRecuperacionClave.inc.php";
    include_once "app/redireccion.inc.php";
    include_once "app/enviarCorreo.inc.php";
    conexion::openConection();
    if(repositorioUsuario::emailExiste(conexion::getConection(), $email))
    {
        $usuario=repositorioUsuario::obtenerUsuarioPorEmail(conexion::getConection(), $email);
        $nombre=$usuario->obtenerNombre();    
        $stringAleatorio=stringAleatorio(10);
        $urlSecreta=hash("sha256",$stringAleatorio.$nombre);
        $peticion=repositorioRecuperacionClave::generarPeticion(conexion::getConection(), $usuario->obtenerId(), $urlSecreta);
        if($peticion)
        {
            $url="www.hard-level-com/recuperacion".$urlSecreta;
            enviarCorreo::cambiarContraseña($email, CORREO, "www.hard-level.com/recuperar/".$urlSecreta);
         //   redireccion::redirigir(SERVIDOR);
        }
    }
    conexion::closeConection();
    

}

?>