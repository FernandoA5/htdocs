//namespace
//main loop
var mainBucle= {
  idEjecucion:null,
  ultimoRegistro: 0,
  aps: 0,
  fps: 0,
  iterar: function(registroTemporal){
    mainBucle.idEjecucion=window.requestAnimationFrame(mainBucle.iterar);

    mainBucle.actualizar(registroTemporal);
    mainBucle.dibujar();
    if(registroTemporal - mainBucle.ultimoRegistro>999)
    {
      mainBucle.ultimoRegistro=registroTemporal;
      console.log("APS: "+ mainBucle.aps + " FPS:" + mainBucle.fps);
      mainBucle.aps=0;
      mainBucle.fps=0;
    }
  },
  detener: function(){

  },
  actualizar: function(registroTemporal){
    mainBucle.aps++;
  },
  dibujar: function(registroTemporal){
    mainBucle.fps++;
  }
}
