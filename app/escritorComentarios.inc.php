<?php
include_once "repositorioComentarios.inc.php";
include_once "comentarios.inc.php";
include_once "repositorioUsuario.inc.php";
include_once "usuario.inc.php";
include_once "conexion.inc.php";
class escritorComentarios{
    public static function escribir($entrada)
    {
        conexion::openConection();
        $comentarios=repositorioComentarios::obtenerComentariosPorEntrada(conexion::getConection(), $entrada->obtenerId());
        conexion::closeConection();
        conexion::openConection();
        $usuario=repositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $entrada->obtenerAutorId());
        
        for($i=count($comentarios)-1; $i>=0; $i--)
        {
       ?>
        <div class="panel">
           <div class="panel-heading enlace">
           <a class="panel-title enlace2" style="color:white;"href="<?php echo $usuario->obtenerNombre() ?>">
              <?php
              echo $usuario->obtenerNombre();   
              ?>
           </a>
           </div>
           <div class="panel-body">
                <h6 style="color:#6E6E6E">
                    <?php
                        echo $comentarios[$i]->obtenerFecha();
                    ?>
                </h6>
                <h5 style="font-family:Lato">
                    <?php
                    echo $comentarios[$i]->obtenerTexto();
                    ?>
                </h5>
           </div>
        </div>
       <?php 
        }
    }
}
?>