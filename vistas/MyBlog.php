<?php
$P=4;
$titulo="MyBlog";
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <?php
      echo $_SESSION["nombre_usuario"];
       ?>
    </div>
    <div class="col-md-7">
      <div class="panel panel-primary">

      </div>
    </div>
    <div class="col-md-4">

    </div>
  </div>
</div>



 <?php
 include_once "Plantillas/cierre.php";
  ?>
