<?php
  $P=3;
  $titulo="Learning";
  include_once "Plantillas/head.php";
  include_once "Plantillas/bar.php";
  ?>
  <div class="container" style="background-color:#0B0B3B">
    <div class="row">
      <div class="col-sm-3">
      <h2 align="left" href="<?php echo LEARNING; ?>" style="color:white; font-family:Agency Fb">HARD LEVEL LEARNING</h2>
      </div>
      <div class="col-sm-9">
          <form role="form" method="post" action="<?php echo LEARNING; ?>"><br>
              <div class="col-sm-10">
                <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="¿Qué estás buscando?" value="<?php
                if(isset($_POST["buscar"]))
                {
                  echo $_POST["busqueda"];
                }
                 ?>" autofocus><br>
              </div>
              <div class="col-sm-2 text-center" >
                <button type="submit" name="buscar" class="btn btn-bg btn-primary" style="border:none; background-color:#0B0B3B !important;"><span class="glyphicon glyphicon-search" style="color:white"></span></button>
              </div>
          </form>
      </div>
    </div>
  </div>
  <br>

  <?php
  include_once "app/escritorCursos.inc.php";

   ?>


  <?php
  include_once "Plantillas/cierre.php";
   ?>
