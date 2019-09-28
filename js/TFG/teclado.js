var teclado = {
  teclas: new Array(),
  iniciar: function(){
    document.onkeydown = teclado.guardarTecla;
  },
  guardarTecla: function(e){
    teclado.teclas.push(e.key);
    console.log(e.key);
    console.log("HOLI");
  },
  teclaPulsada: function(codigoTecla){
    return (teclado.teclas.indexOf(codigoTecla) !== -1) ? true:false;
  },
  reiniciar: function()
  {
    teclado.teclas= new Array();
  }
}
