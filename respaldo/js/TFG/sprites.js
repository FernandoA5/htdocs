function sprite(ruta, idSobreZero, posicionEnHoja)
{
  var elementosRuta = ruta.split("/");   
  this.rutaHojaOrigen = "imagenes/TFG/mapas/" + elementosRuta[elementosRuta.length - 1];
  
  this.idSobreZero = idSobreZero;
  this.idSobreUno = idSobreZero+1;
  this.posicionEnHoja= posicionEnHoja;
}