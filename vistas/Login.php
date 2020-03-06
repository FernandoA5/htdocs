<?php
$P=0;
include_once "app/validadorLogin.inc.php";
include_once "app/conexion.inc.php";
include_once "app/redireccion.inc.php";
include_once "app/controlSesion.inc.php";
if(controlSesion::sesionIniciada())
{
  redireccion::redirigir(SERVIDOR);
}
if(isset($_POST["login"]))
{
  conexion::openConection();
  $validador= new validadorLogin($_POST["email"], $_POST["pass"], conexion::getConection());
  if($validador-> obtenerError()=="" && !is_null($validador ->obtenerUsuario()))
  {
    controlSesion::iniciarSesion($validador->obtenerUsuario()-> obtenerId(), $validador->obtenerUsuario()->obtenerNombre(), $validador->obtenerUsuario()->obtenerSuscripcion());
    redireccion::redirigir(SERVIDOR);
  }
  else{
    echo HOLIERROR . " NO SE HA INICIADO SESIÓN";
  }
  conexion::closeConection();
}
$titulo="Login";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";

 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-4">

     </div>
     <div class="col-md-4 text-center">
       <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">Iniciar Sesión</h3>
         </div>
         <div class="panel-body">
           <form role="form" method="post" action="<?php echo LOGIN ?>">
             <label for="email" class="sr-only">Email</label>
             <input type="email" name="email" id="email" class="form-control" placeholder="Introduce tu email" <?php if(isset($_POST["login"]) && isset($_POST["email"]) && !empty($_POST["email"])){echo "value='". $_POST["email"] ."'";} ?> required autofocus><br>
             <input type="password" name="pass" id="pass" class="form-control" placeholder="Introduce tu contraseña" required><br>
             <?php
             if(isset($_POST["login"]))
             {
               $validador ->mostrarError();
             }
              ?>
             <button type="submit" name="login" class="btn btn-sm btn-primary ">Iniciar Sesión</button>
           </form>
           <br>
           <div>
             <a href="<?php echo RECUPERARCLAVE ?>">¿Olvidaste tu contraseña?</a>
           </div>
         </div>
       </div>
     </div>
     <div class="col-md-4">

     </div>
   </div>
 </div>
 <?php
 include_once "Plantillas/cierre.php";
  ?>
