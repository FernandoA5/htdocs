<?php
include_once "Plantillas/head.php";
$P=4;
include_once "Plantillas/bar.php";
 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-2">

     </div>
     <div class="col-md-8" style="background-color:white">
       <?php
       include_once "app/entradas.inc.php"; include_once "app/repositorioEntradas.inc.php"; include_once "app/conexion.inc.php";
       $page = parse_url($_SERVER["REQUEST_URI"]);
       $ruta=$page["path"];
       $partesRuta=explode("/", $ruta);
       include_once "app/palabrasRaras.inc.php";
       $titulo=palabrasRaras::arreglar($partesRuta[2]);
       
       conexion::openConection();
       $entrada=repositorioEntradas::obtenerEntradaPorTitulo(conexion::getConection(), $titulo);
       if(!empty($entrada))
       {
         ?>
         <br><br>
         <div class="col-sm-1">
         </div>
         <div class="col-sm-10">
           <h3 class="text-left"><?php echo $entrada->obtenerTitulo(); ?></h3>
           <?php
           include_once "app/repositorioUsuario.inc.php"; include_once "app/usuario.inc.php";
           $usuario=repositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $entrada->obtenerAutorId());
            ?>
           <h5 style="color:#585858"><?php echo $usuario->obtenerNombre(); ?></h5>
           <h6 style="color:#BDBDBD"><?php echo $entrada->obtenerFecha(); ?></h6>
           <br>
           <p class="text-justify">
             <?php 
             echo nl2br($entrada->obtenerTexto()); ?>
           </p>
           <br><br>
         </div>
         <div class="col-sm-1">
         </div>

         <?php
         conexion::closeConection();
       }
       else {
         echo HOLIERROR;
       }
        ?>
     </div>
     <div class="col-md-2">


     </div>
   </div>
   <br><br>
 </div>
 <?php
include_once "Plantillas/cierre.php"
  ?>
