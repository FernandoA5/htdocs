<?php
$P=1;
$titulo="Recuperar Clave";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";

?> <div class="container">
   <div class="row">
     <div class="col-md-4">

     </div>
     <div class="col-md-4 text-center">
       <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">Recupera tu Contraseña</h3>
         </div>
         <div class="panel-body"><br>
           <form role="form" method="post" action="<?php echo GENERARURL; ?>">
             <label for="email" class="sr-only">Email</label>
             <input type="email" name="email" id="email" class="form-control" placeholder="Introduce tu email" required autofocus><br>
             <button type="submit" name="enviarEmail" class="btn btn-sm btn-primary ">Enviar</button>
           </form>
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