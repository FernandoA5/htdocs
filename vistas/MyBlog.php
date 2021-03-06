<?php
$P=4;
$titulo="MyBlog";
include_once "app/repositorioUsuario.inc.php";
include_once "app/conexion.inc.php";
include_once "app/config.inc.php";
include_once "app/avatars.inc.php";
include_once "app/redireccion.inc.php";

include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";

if(!isset($_SESSION["nombre_usuario"]))
{
  redireccion::redirigir(SERVIDOR);
}
 ?>
<div class="container-liquid">
  <div class="row">
    <div class="col-md-2">
      <?php
      conexion::openConection();
      $usuario=repositorioUsuario::obtenerUsuarioPorNombre(conexion::getConection(), $_SESSION["nombre_usuario"]);
      $minTemp=avatars::controlAvatars($usuario->obtenerAvatar());
      conexion::closeConection();
      include_once "app/escritorEntradas.inc.php";
      include_once "app/validadorEntrada.inc.php";
      //echo "<br>" . $minTemp;
       ?>
       <div class="row">
         <div class="col-md-1">
         </div>
         <div class="col-md-10">
           <img src="<?php echo $minTemp; ?>" alt="<?php echo "No encontrada"; ?>" width="100%"><br>
           <h3 class="text-center" style="color:#0B0B61"><?php echo $usuario->obtenerNombre(); ?></h3>
           <h4 class="text-center" style="color:#0080FF"><?php echo $usuario->obtenerPuntos(); ?></h4>
           <h6 class="text-center"><a href="<?php echo AGENDA ?>" class="enlace" style="color:#0080FF">Agenda</a></h6>
           <?php
              if($usuario->obtenerSuscripcion()!=5 && $usuario->obtenerSuscripcion()!=3)
              {
                ?>
                  <h6 class="text-center"><a href="<?php echo CODE; ?>"class="enlace" style="color:#333CFF">Â¿Eres miembro de openSource?</a></h6>
                <?php
              }
           ?>
         </div>
         <div class="col-md-1">
         </div>
       </div>
       <?php
       if($usuario->obtenerSuscripcion()==3)
       {
         ?>
         <div class="row">
           <div class="col-md-12">
            <h3 width="100%" style="background-color:#0B0B63; color:white; font-family:Agency Fb" class="text-center">Cursos<h3>
              <?php
              include_once "app/cursos.inc.php";
              include_once "app/repositorioCursos.inc.php";
              conexion::openConection();
              repositorioCursos::escribirCursos(repositorioCursos::cursosUsuario(conexion::getConection(), $usuario->obtenerId()));
              conexion::closeConection();
               ?>
           </div>
         </div>
         <?php
       }
        ?>
    </div>
    <div class="col-md-6">
      <?php
      include_once "app/escritorEntradas.inc.php";
      include_once "app/validadorEntrada.inc.php";
      include_once "app/validadorCurso.inc.php";
      //VALIDACION ENTRADAS
      if(isset($_POST["send"]))
      {
        conexion::openConection();
        $validador = new validadorEntradas($_POST["titulo"], $_POST["texto"]);
        if($validador->entradaValida())
        { 
          $entrada = new entradas("", $_SESSION["id_usuario"], $validador->getTitle(), $validador->getText(), "", 1, 0);
          $entradaInsertada = repositorioEntradas::insertarEntrada(conexion::getConection(), $entrada);
          if($entradaInsertada)
          {
            ?>
            <script type="text/javascript">
              window.location.replace("<?php echo MYBLOG; ?>");
            </script>
            <?php
          }
        }
        conexion::closeConection();
      } ?>
      <?php
        if($usuario->obtenerActivo()==0)
        {
          ?>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">
                Aun no confirmas tu correo
              </h3>
            </div>
            <div class="panel-body">
                <h4>
                  Clic <a href="<?php echo TESTING;?>" class="enlace">aquí</a> para hacerlo
                </h4>
            </div>  
          </div>
          <?php
        }
      ?>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">En Mente</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="<?php echo MYBLOG; ?>">
            <?php
            include_once "Plantillas/formEntrada.inc.php";
            if(isset($_POST["send"]))
            {
             formEntrada::formValidado($validador);
            }
            else
            { 
              formEntrada::formVacio();
            }
             ?>
          </form>
        </div>
      </div>
      <div>
        <?php
        include_once "app/escritorEntradas.inc.php";
        include_once "app/validadorEntrada.inc.php";
        include_once "app/validadorCurso.inc.php";
        conexion::openConection();
        escritorEntradas::escribir(conexion::getConection(), $usuario->obtenerId());
        conexion::closeConection();
         ?>
      </div>
    </div>
    <div class="col-md-4">
      <?php
      if($usuario->obtenerSuscripcion()==3)
      {
        ?>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Publicar Curso</h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="<?php echo MYBLOG; ?>" enctype="multipart/form-data">
              <?php
              if(!isset($_POST["send2"]))
              {
                include_once "Plantillas/formCursoVacio.inc.php";
              }
              if(isset($_POST["send2"]))
              {
                conexion::openConection();

                //VALIDACION IMAGEN
                if(isset($_POST["send2"]) && !empty($_FILES["miniaturaSubida"]["tmp_name"]))
                {
                  $directorio=DIRECTORIORAIZ. '/imagenes/'.'miniaturas/';
                  $carpetaObjetivo=$directorio.basename($_FILES["miniaturaSubida"]["name"]);
                  $subidaCorrecta=1;
                  $tipoImagen=pathinfo($carpetaObjetivo, PATHINFO_EXTENSION);

                  $comprobacion= getimagesize($_FILES["miniaturaSubida"]["tmp_name"]);
                  if($comprobacion!=false)
                  {
                    $subidaCorrecta=1;
                  }
                  else {
                    $subidaCorrecta=0;
                  }
                  if($_FILES["miniaturaSubida"]["size"]>5000000)
                  {
                    echo "<br><div class='alert-danger' align='center'role='alert'>Imagen demaciado grande</div>";
                    $subidaCorrecta=0;
                  }
                  if($tipoImagen!="jpg" && $tipoImagen!="png" && $tipoImagen!="jpeg" && $tipoImagen!="gif")
                  {
                      echo "<br><div class='alert-danger' align='center' role='alert'>Formato Invalido</div>";
                      $subidaCorrecta=0;
                  }
                  if($subidaCorrecta==0)
                  {
                    echo "<br><div class='alert-danger' align='center' role='alert'>El archivo no es invalido</div>";
                  }
                  else {
                    if(move_uploaded_file($_FILES["miniaturaSubida"]["tmp_name"], DIRECTORIORAIZ."/imagenes/miniaturas/".$_POST["titulo"].".".$tipoImagen))
                    {
                    //  echo "<br><div class='alert-success' align='center' role='alert'>Todo Cool ".basename($_FILES["miniaturaSubida"]["name"]) . " subido" ;
                    //  echo "</div>";
                    }
                    else {
                      echo "<br><div class='alert-danger' align='center' role='alert'>Ha ocurrido un error</div>";
                    }
                  }
                }
                //VALIDADOR
                  $validador=new validadorCursos($_POST["titulo"], $_POST["texto"], $_FILES["miniaturaSubida"]["name"]);
                  $ruta=$validador->getTitle();
                  if($validador->cursoValido())
                  {
                    $curso= new cursos("", $_SESSION["id_usuario"], $validador->getTitle(), $tipoImagen, $ruta, $validador->getText(), "", 0);
                    $cursoInsertado=repositorioCursos::insertarCurso(conexion::getConection(), $curso);
                    if($cursoInsertado)
                    {
                      $_POST["send2"]=null;
                      ?>
                      <div class="alert-success text-center" role="alert">
                        Curso Creado Exitosamente
                      </div>
                      <script>
                        window.location.replace(<?php echo RUTALEARNING; ?>);
                      </script>
                      <?php
                    }
                  }
                  conexion::closeConection();
                  include_once "Plantillas/formCursoValidado.inc.php";
              }


               ?>
            </form>
          </div>
        </div>
        <?php
      }
       ?>
        <div class="panel-group" id="accordion">
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title" style="color:white">
                    <a class="desplegar" href="#collapse1" data-toggle="collapse" data-parent="#acordion">
                      Cosas Por Hacer
                    </a>
                  </h3>
                </div>
                <div class="panel-collapse collapse in" id="collapse1">
                    <div class="panel-body text-center" style="background-color:#045FB4">
                          <form action="<?php echo MYBLOG?>" role="form" method="post">
                            <?php
                            include_once "app/cosasPorHacer.inc.php";
                            include_once "app/validadorPendiente.inc.php";
                            include_once "app/repositorioPendientes.inc.php";
                            conexion::openConection();
                            $top=repositorioPendientes::obtenerTop(conexion::getConection(), $usuario->obtenerId());
                            if(isset($_POST["sendPendiente"]))
                            {
                              
                              
                              $validador=new validadorPendiente($_POST["pendiente"]);
                              if($validador-> actividadValida())
                              {
                                $top++;
                                $actividadInsertada=repositorioPendientes::push(conexion::getConection(), $validador->getActividad(),$top);
                                if(!$actividadInsertada)
                                {
                                  echo HOLIERROR;
                                }
                                else{
                                  redireccion::redirigir(MYBLOG);
                                }
                              }
                            }
                              include_once "Plantillas/formPendiente.inc.php";
                              if(isset($_POST["sendPendiente"]))
                              {
                                formPendiente::formValidado();  
                              }
                              else{
                                formPendiente::formVacio();
                              }
                              conexion::closeConection();
                            ?>
                            </form>
                            
                            <form action="<?php echo MYBLOG?>" role="form" method="post">
                              <?php
                              conexion::openConection();
                              $pendientes=repositorioPendientes::cargarPendientes(conexion::getConection(), $usuario->obtenerId());
                              if(isset($_POST["sendActividad"]))
                              {
                                repositorioPendientes::pop(conexion::getConection(), $_POST["actividadTop"]);
                                redireccion::redirigir(MYBLOG);
                              }
                              if(count($pendientes))
                              {
                                //$top=0;
                                ?>
                                <br><br>
                                <?php
                                repositorioPendientes::escribir(conexion::getConection(), $usuario->obtenerId(), $top);
                              }
                              else{
                                //$top=0;
                                ?>
                                <br><br>
                                <button class="btn control-panel capitulo-btn" style="font-size:25px">NO TIENES PENDIENTES</button>
                                <?php
                              }
                              conexion::closeConection();
                              ?>
                           </form>
                    </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading">
                <h3 class="panel-title" style="color:white">
                    <a class="desplegar" href="#collapse2" data-toggle="collapse" data-parent="#acordion">
                      Cosas hechas
                    </a>
                  </h3>
                </div>
                <div class="panel-collapse collapse in" id="collapse2">
                  <div class="panel-body text-center" style="background-color:#2EFE2E">
                      <form action="<?php echo MYBLOG?>" role="form" method="post">
                            <?php
                              conexion::openConection();
                              $done=repositorioPendientes::cargarDone(conexion::getConection(), $usuario->obtenerId());
                              if(count($done))
                              {
                                repositorioPendientes::escribirDone(conexion::getConection(), $usuario->obtenerId());
                              }
                            ?>
                      </form>
                  </div>  
                </div>
              </div>  
        </div>
    </div>
  </div>
</div>



 <?php
 include_once "Plantillas/cierre.php";
  ?>
