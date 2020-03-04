<?php
$P=5;
$titulo="Code";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
include_once "app/redireccion.inc.php";
include_once "app/repositorioUsuario.inc.php";
if(!isset($_SESSION["nombre_usuario"]))
{
    redireccion::redirigir(SERVIDOR);
}
else{
    conexion::openConection();
    $usuario=repositorioUsuario::obtenerUsuarioPorNombre(conexion::getConection(), $_SESSION["nombre_usuario"]);
    if($usuario->obtenerSuscripcion()==5 || $usuario->obtenerSuscripcion()==3)
    {
        redireccion::redirigir(OPENSOURCE);
    }
}
?>
<div class="container">
    <div class=row>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                        <h3 class="panel-title text-center" style="color:white">
                            Ingresa tu código
                        </h3>
                </div>
                <form role="form" method="post" action="<?php echo CODE; ?>">
                <div class="panel-body text-center">
                <?php
                include_once "Plantillas/formCode.inc.php";
                include_once "app/validadorCode.inc.php";
                include_once "app/conexion.inc.php";
                if(isset($_POST["sendCode"]))
                {
                    conexion::openConection();
                    $validador=new validadorCode($_POST["codigo"]);
                    if($validador->codigoValido())
                    {
                        $conection=conexion::getConection();
                        if(isset($conection))
                        {
                            try{
                                $sql="UPDATE usuarios SET suscripcion = :suscripcion WHERE id=:idUsuario";
                                $sentencia=$conection->prepare($sql);
                                //BINDPARAM
                                $nS=5;
                                $idTemp=$_SESSION["id_usuario"];
                                $sentencia->bindParam(":suscripcion", $nS, PDO::PARAM_STR);
                                $sentencia->bindParam(":idUsuario", $idTemp, PDO::PARAM_STR);
                                $sentencia->execute();
                                redireccion::redirigir(OPENSOURCE);
                            }catch(PDOException $ex)
                            {
                                print HOLIERROR.$ex->getMessage();
                            }
                            
                        }
                    }
                }
                
                if(isset($_POST["sendCode"]))
                    formCode::formValidado($validador);
                else
                    formCode::formVacio();
                ?>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
<?php
include_once "Plantillas/Cierre.php";
?>