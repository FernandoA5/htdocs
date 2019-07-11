<?php
  $P=3;
  $titulo="Learning";
  include_once "Plantillas/head.php";
  include_once "Plantillas/bar.php";
  ?>
  <div class="container" style="background-color:#0B0B3B">
    <div class="row">
      <div class="col-md-7">
        <form role="form" method="post" action="<?php echo LEARNING; ?>"><br>
            <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="¿Qué estás buscando?" value="" autofocus>
        </form>
      </div>
      <div class="col-md-4">
        <h2 class="text-center" style="color:white; font-family:Agency Fb">HARD LEVEL LEARNING</h2>
      </div>
      <div class="col-md-1">

      </div>
    </div>
  </div>


  <?php
  include_once "Plantillas/cierre.php";
   ?>
