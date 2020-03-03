function mapa(objetoJSON){
    this.posicion = new punto(0,0);
    this.posicionActualizada= new punto(0,0);

    this.anchoMedidoEnTiles = parseInt(objetoJSON.width);
    this.altoMedidoEnTiles = parseInt(objetoJSON.height);
    this.anchoDeLosTiles = parseInt(objetoJSON.tilewidth);
    this.altoDeLosTiles = parseInt(objetoJSON.tileheight);

    this.paletasSprites = [];
    console.log(objetoJSON);
    this.iniciarPaletasSprites(objetoJSON.tilesets)
    this.capasTiles = [];
    this.iniciarCapas(objetoJSON.layers)

    this.iniciarRejilla();

}
mapa.prototype.iniciarPaletasSprites=function(datosCapas)
{
    for(i=0; i<datosCapas.lenght(); i++)
    {
        this.paletasSprites.push(new paletaSprites(datosCapas[i]));
    }
}
mapa.prototype.iniciarCapas=function(datosCapas)
{
    for(i=0; i<datosCapas.length; i++)
    {
        switch(datosCapas[i].type)
        {
            case "tilelayer":{
                this.capasTiles.push(new capaMapaTiles(datosCapas[i], i, this.anchoDeLosTiles, this.altoDeLosTiles, this.paletasSprites));
            }
                break;
            case "objectgroup":
                break;
        }
    }
}
mapa.prototype.iniciarRejilla=function()
{
    var anchoMapaEnPixeles = this.anchoMedidoEnTiles * this.anchoDeLosTiles;
    var altoMapaEnPixeles = this.altoMedidoEnTiles * this.altoDeLosTiles;
    var html="";
    for(ct=0; ct<this.capasTiles.length; ct++)
    {
        for(t = 0; t < this.capasTiles[ct].tiles.length; t++)
        {
            if(this.capasTiles[ct].tiles[t]==null)
            {
                continue;
            }
            var tileActual = this.capasTiles[ct].tiles[t];
            html+=tileActual.html;
        }
    }
    document.getElementById("mapa").innerHTML = html;
    for(ct=0; ct<this.capasTiles.length; ct++)
    {
        for(t = 0; t < this.capasTiles[ct].tiles.length; t++)
        {
            if(this.capasTiles[ct].tiles[t]==null)
            {
                
                continue;
            }
            var tileActual = this.capasTiles[ct].tiles[t];
            tileActual.aplicarEstilos();
        }
    }
    document.getElementsByTagName("body")[0].style.overflow = "hidden";
}
mapa.prototype.actualizar=function(){
    
}
mapa.prototype.dibujar=function(){

}