<?php
    include_once "app/confirmarCorreo.inc.php";
    include_once "app/repositorioConfirmarCorreo.inc.php";
    include_once "app/conexion.inc.php";
    include_once "app/repositorioUsuario.inc.php";
    include_once "app/usuario.inc.php";
    include_once "app/redireccion.inc.php";

    //CAMBIAR ESTATUS DE CUENTA
         
    $page=parse_url($_SERVER["REQUEST_URI"]);
    $ruta=$page["path"];
    $partesRuta=explode("/", $ruta);
    conexion::openConection();
        //BUSCAR PETICION
    $peticion=repositorioConfirmarCorreo::buscarPeticion(conexion::getConection(), $partesRuta[2]);
    if(isset($peticion))
    {
        //OBTENIENDO USUARIO CON LA URL
        $usuario=repositorioUsuario::obtenerUsuarioPorId(conexion::getConection(), $peticion->obtenerIdUsuario());
        //ACTIVANDO USUARIO EN LA BASE DE DATOS
        $activada=repositorioUsuario::activarCuenta(conexion::getConection(), $usuario->obtenerId());
        if($activada)
        {   //ELIMINAR URL DE LA BASE DE DATOS
            $eliminarUrl=repositorioConfirmarCorreo::eliminarUrl(conexion::getConection(), $partesRuta[2]);
            if($eliminarUrl)
            {
                //REDIRIGIR A PAGINA DE BLOG
                redireccion::redirigir(MYBLOG);
            }
        }
    }
    else{
        echo HOLIERROR;
    }
    


?>