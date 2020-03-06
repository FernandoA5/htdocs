<?php
class enviarCorreo{
    public static function verificacion($mail, $estado)
    {
        if($estado==1)
        {
            $contenido='
            <html>
                <head>
                    <link href="https://www.hard-level.com/css/bootstrap.min.css" rel="stylesheet">
                    
                </head>
                <body>
                    <div class="container" style="background-color:#FAFAFA">
                    <div class="row">
                        <div class="col-md-12" style="background-color:#0B0B3B" align="center">
                        <a href="#">
                        <img draggable="true" src="http://www.hard-level.com/imagenes/portadaF.png" width="100%" class="center-block">
                        </a>
                        </div>
                    </div>
                    <div class="row">
                        <h2 style="font-family:arial; color: blue" class="text-center">Tu registo está completo</h2><br>
                        <h5 class="text-center">
                        Felicitaciones tu perfíl se ha completado exitosamente,<br> 
                        presiona el enlace para confirmar tu correo.
                        </h5><br>
                        <h5 class="text-center">
                        <a href="https://www.hard-level.com/MyBlog">
                            Confirma tu correo aquí
                        </a>
                        </h5>
                    </div>
                    </div>
                </body>
            </html>
            ';
            $asunto="Confirmacion de correo";
            if(mail($mail, $asunto, $contenido))
            {
                include_once "app/redireccion.inc.php";
                //redireccion::redirigir(MYBLOG);
                echo $mail;
                echo $asunto;
                echo $contenido;
            }

        }
    }
}

?>