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
   <div class="row" id="">
            <div class="col-sm-2">
            </div>
              <div class="col-sm-8" style="background-color:white">
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
                          <h3 class="text-left" id="hTitulo">
                            <?php 
                            echo $entrada->obtenerTitulo(). "&nbsp";
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
                          </h3><br>
                          <?php
                          include_once "app/repositorioUsuario.inc.php"; include_once "app/usuario.inc.php";
                          $usuario=repositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $entrada->obtenerAutorId());
                          ?>
                      <a class="enlace" href="<?php echo $usuario->obtenerNombre(); ?>"><?php echo $usuario->obtenerNombre(); ?></a>
                      <h6 style="color:#BDBDBD"><?php echo $entrada->obtenerFecha(); ?></h6>
                      <br>
                      <p class="text-justify" style="font-family:Lato;">
                        <?php 
                        echo nl2br($entrada->obtenerTexto()); ?>
                      </p>
                      <br><br>
                    </div>
                    <?php
                    conexion::closeConection();
                  }
                  else {
                    echo HOLIERROR;
                  }
                  ?>
                  <div class="col-sm-1">
                  </div>
            </div>
          <div class="col-sm-2">
          </div>
   </div><br>
   <div class="row">
      <div class="col-sm-2 center-block">
      </div>
         <div class="col-sm-8">
                    <div id="formEdit" style="visibility:hidden">
                          <div class="panel-group" id="accordion">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <h3 class="panel-title center-block">
                                    <a id="desplegar" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    Editar Publicacion
                                    </a>
                                  </h3>
                              </div>
                              <div id="collapse1" class="panel-collapse collapse">
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
                      <div class="col-sm-2"></div>
                </div>
        </div>
        <?php 
          ///A?ADIR ENTRADS RECOMENDADAS
        ?>
        <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <div class="panel-group" id="accordion">
          <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title center-block">
                      <a  id="desplegar" href="#collapse2" data-toggle="collapse" data-parent="#acordion">
                        Comentarios
                      </a>
                    </h3>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        
                    </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-sm-2"></div>
        </div>
        
  </div>
   <br><br>
 <?php
include_once "Plantillas/cierre.php"
  ?>
