var mando={
   objeto: null,
   eventosDisponibles: 'ongamepadconnected' in window,
   conectado: false,
   iniciar: function(){
     if(mando.eventosDisponibles)
     {
       window.addEventListener("ongamepadconnected", mando.conectar);
       window.addEventListener("gamepaddisconnected", mando.desconectar);
     }
     else {
       mando.actualizar();
     }
   },
   conectar: function(evento){
     mando.objeto = evento.gamepad;
     mando.identificar();
   },
   desconectar: function(evento)
   {
     console.log("Mando desconectado del indice %d: %s.", evento.gamepad.index, evento.gamepad.id);
   },
   actualizar: function()
   {
     if(!mando.eventosDisponibles)
     {
       mandos= null;
       try {
         mandos= navigator.getGamepads ? navigator.getGamepads() : (navigator.webkitGetGamepads ?  navigator.webkitGetGamepads:[]);
         mando.objeto=mandos[0];
         if(!mando.conectado)
         {
           mando.conectado = true;
           mando.identificar();
         }
       } catch (ex) {

       }
     }
   },
   identificar: function()
   {

   }
 }
