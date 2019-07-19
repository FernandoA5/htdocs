<?php
$P=3;
  include_once "Plantillas/head.php";
  include_once "Plantillas/bar.php";
  include_once "app/config.inc.php";
  include_once "app/conexion.inc.php";
  include_once "app/cursos.inc.php";
  include_once "app/repositorioCursos.inc.php";
 ?>

 <div class="container-liquid">
   <div class="row">
     <div class="col-md-8">
       <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">
           <?php
           echo $existe->obtenerTitulo();
            ?>
          </h3>
         </div>
         <div class="panel-body">
           <script type="text/javascript">

           </script>
         </div>
       </div>
       <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">Comentarios</h3>
         </div>
       </div>
     </div>
     <div class="col-md-4">
       <?php
       include_once "app/redireccion.inc.php";
       include_once "app/usuario.inc.php";
       include_once "app/repositorioUsuario.inc.php";
       include_once "app/conexion.inc.php";
       include_once "app/capitulo.inc.php";
       include_once "app/repositorioCursos.inc.php";
       include_once "app/validadorCapitulo.inc.php";
       $si=true;
       conexion::openConection();
       if(isset($_POST["send"]))
       {

         $validador = new validadorCapitulo($_POST["titulo"], $_POST["ruta"]);
         if($validador->capituloValido())
         {
           $si=true;
           $capitulo = new capitulo("", $existe->obtenerId(), $validador->getTitle(), $validador->getRuta(), "");
           $capituloInsertado = repositorioCursos::insertarCapitulo(conexion::getConection(), $capitulo);
           if($capituloInsertado)
           {
             $_POST["send"]=null;
             redireccion::redirigir(LEARNING."/".$existe->obtenerTitulo());
           }
         }
         else {
           $si=false;
         }
       }
       $usuario=repositorioUsuario::obtenerUsuarioPorNombre(conexion::getConection(), $_SESSION["nombre_usuario"]);
       if($usuario->obtenerSuscripcion()==3)
       {
         ?>
         <div class="panel-success">
           <?php
           if($si)
           {
             ?>
              <div class="panel-heading" style="background-color:#088A08 !important; color:white;">
             <?php
           }
           else {
              ?><div class="panel-heading" style="background-color:#B40404 !important; color:white;"><?php
           }
            ?>

             <h3 class="panel-title">Añadir Capitulo</h3>
           </div>
           <div class="panel-body" style="background-color:white">
             <form role="form" method="post" action="<?php echo LEARNING."/".$existe->obtenerTitulo(); ?>">
               <?php
               if(!isset($_POST["send"]))
               {
                 include_once "Plantillas/formCapituloVacio.inc.php";
               }
               else {
                 include_once "Plantillas/formCapituloValidado.inc.php";
               }
                ?>
             </form>
           </div>
         </div><br>
         <?php
       }
       conexion::closeConection();
        ?>
       <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">Capitulos</h3>
         </div>
         <div class="panel-body">
           Escritor Capitulos
         </div>
       </div>

     </div>
   </div>

 </div>
 <?php
 include_once "Plantillas/cierre.php";
  ?>
