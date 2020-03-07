<?php
$P=0;
$titulo="Nueva Clave";
    include_once "Plantillas/head.php";
    include_once "Plantillas/bar.php";
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
                    ?>
                    <div class="panel-body">
                        <form role="form" action="<?php echo $ruta; ?>" method="post">
                            <?php
                            $validador=null;
                                include_once "app/validadorNuevaClave.inc.php";
                                include_once "app/redireccion.inc.php";
                                include_once "app/conexion.inc.php";
                                
                                if(isset($_POST["enviar"]))
                                {
                                    conexion::openConection();
                                    $validador= new validadorNuevaClave($_POST["clave1"], $_POST["clave2"]);
                                    if($validador->claveValida())
                                    {
                                        //FUNCIONA
                                    }
                                    else{
                                        //TAMBIEN FUNCIONA
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
