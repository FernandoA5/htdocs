


document.addEventListener("DOMContentLoaded", function() {
  inicio.iniciarJuego();
}, false);
var inicio={
  iniciarJuego: function()
  {
    console.log("HOLI");
    teclado.iniciar();
    mando.iniciar();
    dimensiones.iniciar();
    inicio.recargarTiles();
    mainBucle.iterar();
  },
  recargarTiles: function ()
  {
    document.getElementById("juego").innerHTML ="";
    for(var y=0; y<dimensiones.obtenerTilesVerticales(); y++ )
    {
      for(var x = 0; x<dimensiones.obtenerTilesHorizontales(); x++)
      {
        var r = new rectangulo(x*dimensiones.sizeTiles, y*dimensiones.sizeTiles, dimensiones.sizeTiles, dimensiones.sizeTiles);
      }
    }
  },
};
