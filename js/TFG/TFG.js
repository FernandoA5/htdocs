


var inicio={
    iniciadores: [
      maquinaEstados.iniciar(),
      teclado.iniciar(),
      mando.iniciar(),
      mainBucle.iterar()
    ],
    iniciarJuego:function(){
      inicio.encadenarInicios(inicio.iniciadores.shift());
    },
    encadenarInicios: function(iniciador){
      if(iniciador)
      {
        iniciador(() => inicio.encadenarInicios(this.iniciadores.shift()));
      }
    }
};
document.addEventListener("DOMContentLoaded", function() {
  inicio.iniciarJuego();
}, false);

