var ajax={
    cargarArchivo: function(ruta){
        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function(){
            /*
                O/ unsent - noiniciada
                1/ opened - conectado al servidor
                2/ HEADERS_RECIVED - peticion recibida
                3/ LOADING - procesando peticion;
                4/ DONE - peticion finalizada, respuesta preparada;
            */
            if(peticion.readyState== XMLHttpRequest.DONE)
            {
               if(peticion.status == 200)
               {
                console.log(JSON.parse(peticion.responseText));
               } else if(peticion.status == 400)
               {
                console.log("error");
               }else{
                   console.log("Resultado Inesperado");
               }
            }
        };
        peticion.open("GET", ruta, true);
        peticion.send();
    }
}