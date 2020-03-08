<?php
$P=0;
$titulo="Nueva Clave";
    include_once "Plantillas/head.php";
    include_once "Plantillas/bar.php";

    include_once "app/validadorNuevaClave.inc.php";
    include_once "app/redireccion.inc.php";
    include_once "app/conexion.inc.php";
    include_once "app/repositorioUsuario.inc.php";
    include_once "app/repositorioRecuperacionClave.inc.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">
                            Ingresa una nueva contraseña
                        </h3>
                    </div><?php 
                    $page=parse_url($_SERVER["REQUEST_URI"]);
                    $ruta= SERVIDOR.$page["path"];
                    $partesRuta=explode("/", $ruta);
                    $partesRuta[4];

                    conexion::openConection();
                    $peticion=repositorioRecuperacionClave::buscarPeticion(conexion::getConection(), $partesRuta[4]);
                    
                    conexion::closeConection();
                    ?>
                    <div class="panel-body">
                        <form role="form" action="<?php echo $ruta; ?>" method="post">
                            <?php
                            $validador=null;
                                
                                if(isset($_POST["enviar"]))
                                {
                                    conexion::openConection();
                                    $validador= new validadorNuevaClave($_POST["clave1"], $_POST["clave2"]);
                                    if($validador->claveValida())
                                    {
                                        //CAMBIAR CLAVE
                                        $usuario=repositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $peticion->obtenerIdUsuario());
                                        $cambiar=repositorioUsuario::cambiarClave(conexion::getConection(), $usuario, password_hash($validador->obtenerClave(), PASSWORD_DEFAULT));
                                        if($cambiar)
                                        {
                                               //BORRAR URL SECRETA
                                            $eliminada=repositorioRecuperacionClave::eliminarUrl(conexion::getConection(), $partesRuta[4]);
                                            if($eliminada)
                                            {
                                                redireccion::redirigir(LOGIN);
                                            }
                                        }
                                    }
                                    else{
                                        //TAMBIEN FUNCIONA
                                        echo HOLIERROR;
                                    }
                                }
                                include_once "Plantillas/formNuevaClave.inc.php";
                                if(!isset($_POST["enviar"]))
                                {
                                    formNuevaClave::formVacio();
                                }    
                                else{
                                    formNuevaClave::formValidado($validador);
                                }
                            ?>
                        </form> 
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    
<?php
    include_once "Plantillas/cierre.php";
?>
