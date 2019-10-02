<?php
include_once "Plantillas/head.php";
$P=4;
include_once "Plantillas/bar.php";
include_once "app/entradas.inc.php"; include_once "app/repositorioEntradas.inc.php"; include_once "app/conexion.inc.php";
  ?>
  
 <div class="container">
   <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <div class="col-sm-1">
                </div>
                <div id="notiSucces"class="col-sm-10 center-block text-center" style="background-color:#01DF3A; visibility:hidden">
                    <h4 style="color:white; font-weight:bold">Entrada Actualizada con exito</h4>
                </div>
                <div class="col-sm-1">
                </div>
            </div>
            <div class="col-sm-2">
            </div>
   </div>
   <div class="row" id="Hoja">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
              <div class="col-sm-1"></div>
              <div class="col-sm-10" style="background-color:white">
                    <?php
                      if(isset($_POST["sendEdicion"]))
                      {
                        ?>
                        <script>
                          document.getElementById("formEdit").style.visibility="visible";
                        </script>
                        <?php
                      }
                      else{
                        ?>

                        <?php
                      }
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
                          <div>
                          <h3 class="text-left" id="hTitulo">
                            
                            <?php echo $entrada->obtenerTitulo(). "&nbsp";
                          if($_SESSION)
                          {
                            if($entrada->obtenerAutorId()==$_SESSION["id_usuario"])
                            {
                              ?>
                              <button  id="editar" type="submit" name="editar" class="btn btn-editarEntrada btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>
                              <script>
                                var btnEditar = document.getElementById("editar");
                                btnEditar.addEventListener("click", visible);
                                function visible()
                                {
                                  document.getElementById("formEdit").style.visibility="visible";
                                  
                                }
                              </script>
                              <?php
                            }
                          }
                          ?>
                      </h3>
                      </div>
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
              <div class="col-sm-1"></div>
          </div>
          <div class="col-sm-2"> </div>
   </div>
   <br>
   <div class="row">
      <div class="col-sm-2">
      </div>
         <div class="col-sm-8">
                <div class="col-sm-1"></div>
                <div class="col-sm-10 center-block">
                    <div id="formEdit" style="visibility:hidden">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <h3 class="panel-title center-block">
                                    Editar Publicación
                                  </h3>
                              </div>
                              <div class="panel-body">
                                <form role="form" method="post" action="<?php echo SERVIDOR.$_SERVER["REQUEST_URI"]; ?>">
                                  <?php
                                  include_once "app/validadorEntrada.inc.php";
                                  include_once "app/redireccion.inc.php";
                                  
                                  if(isset($_POST["sendEdicion"]))
                                  {
                                    ?>  
                                      <script>
                                        document.getElementById("formEdit").style.visibility="visible";
                                      </script>
                                    <?php
                                    conexion::openConection();
                                    $validador = new validadorEntradas($_POST["titulo"], $_POST["texto"]);
                                    if($validador->entradaValida())
                                    {
                                      $nuevaEntrada = new entradas("", $_SESSION["id_usuario"], $validador->getTitle(), $validador->getText(), "", 1, $entrada->obtenerLikes());
                                      
                                      $entradaActualizada = repositorioEntradas::actualizarEntrada(conexion::getConection(), $nuevaEntrada->obtenerTitulo(), $nuevaEntrada->obtenerTexto(), $entrada->obtenerId());
                                      $_POST["sendEdicion"]=null;
                                      unset($_POST["sendEdicion"]);
                                      ?>
                                      <?php
                                      redireccion::redirigir(MYBLOG);
                                    }
                                    conexion::closeConection();
                                  }
                                  //$entrada=repositorioEntradas::obtenerEntradaPorTitulo(conexion::getConection(), $titulo);
                                 
                                  $titulo=$entrada->obtenerTitulo();
                                  $texto=$entrada->obtenerTexto();
                                  conexion::closeConection();
                                  include_once "Plantillas/formEntrada.inc.php";
                                  if(isset($_POST["sendEdicion"]))
                                  {
                                    formEntrada::formEdicionValidado($validador);
                                  }
                                  else{
                                    formEntrada::formEdicion($titulo, $texto);
                                  }
                                  ?>
                                  </div>
                              </div>  
                          </div>
                      </div>
                </div>
                <div class="col-sm-1"></div>
        </div>
  </div>
   <br><br>
 <?php
include_once "Plantillas/cierre.php"
  ?>
