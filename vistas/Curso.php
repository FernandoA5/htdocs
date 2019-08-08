<?php
$P=3;
  include_once "Plantillas/head.php";
  include_once "Plantillas/bar.php";
  include_once "app/config.inc.php";
  include_once "app/conexion.inc.php";
  include_once "app/cursos.inc.php";
  include_once "app/repositorioCursos.inc.php";
  include_once "app/escritorCapitulos.inc.php";
  include_once "app/redireccion.inc.php";
  include_once "app/usuario.inc.php";
  include_once "app/repositorioUsuario.inc.php";
  include_once "app/conexion.inc.php";
  include_once "app/capitulo.inc.php";
  include_once "app/repositorioCursos.inc.php";
  include_once "app/validadorCapitulo.inc.php";

 ?>

 <div class="container-liquid">
   <div class="row">
     <div class="col-sm-8">
       <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">
           <?php
           echo $existe->obtenerTitulo();
            ?>
          </h3>
         </div>
         <div class="panel-body">
           <?php
           conexion::openConection();
           $capitulos=repositorioCursos::todosCapitulos(conexion::getConection(), $existe->obtenerId());
           if(count($capitulos)==0)
           {
             ?>
             <div class="embed-responsive embed-responsive-16by9">
               <iframe id="iframe" width="560%" height="315" src="<?php echo SERVER; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
             </div>
             <?php
           }
           else {
             ?>
             <div class="embed-responsive embed-responsive-16by9">
               <iframe id="iframe" width="560%" height="315" src="<?php echo YOUTUBE.$capitulos[0]->obtenerRuta(); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
             </div>
             <?php
           }
           conexion::closeConection();
            ?>
         </div>
       </div>
       <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">Comentarios</h3>
         </div>
         <div class="panel-body">
           <form role="form" action="<?php echo LEARNING."/".$existe->obtenerTitulo(); ?>" method="post">
             <?php
             include_once "Plantillas/formComentarioCapitulo.inc.php";
             include_once "app/validadorComentariosCapitulo.inc.php";
             include_once "app/repositorioComentarios.inc.php";
             conexion::openConection();
             if(isset($_POST["sendC"]))
             {
               $validador= new validadorComentariosCapitulo($_POST["comentario"]);
               if($validador->comentarioValido())
               {
                 $comentario = new comentariosCapitulo("", $_SESSION["id_usuario"], $existe->obtenerId(), $validador->getTexto(), "", "", "");
                 $comentarioInsertado=repositorioComentarios::insertarComentario(conexion::getConection(), $comentario);
                 if($comentarioInsertado)
                 {
                   ?>
                   <script type="text/javascript">
                     window.location.replace("<?php echo LEARNING."/".$existe->obtenerTitulo(); ?>");
                   </script>
                   <?php
                 }
               }
             }
             conexion::closeConection();
             if(isset($_POST["sendC"]))
             {
               formComentarioCapitulo::formValidado($validador);
             }
             else {
               formComentarioCapitulo::formVacio();
             }
              ?>
           </form>
         </div>
       </div>
       <?php
       conexion::openConection();
       $comentarios=repositorioComentarios::obtenerComentariosCurso(conexion::getConection(), $existe->obtenerId());
       escritorCapitulos::escribirComentarios(conexion::getConection(), $comentarios);
       conexion::closeConection();
        ?>

     </div>
     <div class="col-sm-4">
       <?php

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
             ?>
             <script type="text/javascript">
               window.location.replace("<?php echo LEARNING."/".$existe->obtenerTitulo(); ?>");
             </script>
             <?php
           }
         }
         else {
           $si=false;
         }
       }
       if(isset($_SESSION["nombre_usuario"]))
       {

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
       }

       conexion::closeConection();
        ?>
       <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">Capitulos</h3>
         </div>
         <div class="panel-body" style="background-color:#045FB4">
           <?php
           if(isset($_SESSION["nombre_usuario"]))
           {
             conexion::openConection();
             //$capitulos=repositorioCursos::todosCapitulos(conexion::getConection(), $existe->obtenerId());
             if(count($capitulos))
             {
                escritorCapitulos::escribir($capitulos, $existe->obtenerTitulo());
             }
             conexion::closeConection();
           }
           else {
             ?>
             <h4 style="color:white">Registrate para ver los capitulos</h4>
             <script type="text/javascript">
               document.getElementById("iframe").src="#";
             </script>
             <?php
           }

            ?>
         </div>
       </div>

     </div>
   </div>
 </div>
 <?php
 include_once "Plantillas/cierre.php";
  ?>
