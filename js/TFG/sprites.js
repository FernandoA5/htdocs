function sprite(ruta, idSobreZero, posicioneEnHoja)
{
  var elementosRuta = ruta.split("/");   
  this.rutaHojaOrigen = "imagenes/TFG/mapas/"+elementosRuta[elementosRuta.length - 1];
  this.idSobreZero = idSobreZero;
  this.idSobreUno = idSobreZero+1;
  this.posicioneEnHoja= posicioneEnHoja;
}