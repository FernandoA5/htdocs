<?php
include_once "app/redireccion.inc.php";
class enviarCorreo{
    public static function verificacion($mail, $estado, $urlSecreta)
    {
        if($estado==1)
        {
            $contenido='Felicitaciones te has registrado exitosamente.
                        Presiona el enlace para confirmar tu correo: 
                        '.$urlSecreta;
            $asunto="Confirmacion de correo";
            if(mail($mail, $asunto, $contenido))
            {
                redireccion::redirigir(MYBLOG);
            }

        }
    }
    public static function cambiarContraseña($mail, $estado, $enlace)
    {
        if($estado==1)
        {   
            $contenido='
            Solicitaste cambiar tu contraseña, tu enlace está aquí:
            '.$enlace;
            $asunto="Cambio de clave";
            if(mail($mail, $asunto, $contenido))
            {
                redireccion::redirigir(SERVIDOR);
            }
        }
    }
}

?>
