function capaMapaTiles(datosCapa, indiceZ, anchoDeLosTiles, altoDeLosTiles, paletaSprites)
{
    this.anchoEnTiles = parseInt(datosCapa.width);
    this.altoEnTiles = parseInt(datosCapa.height);
    this.x = parseInt(datosCapa.x);
    this.y = parseInt(datosCapa.y);
    this.z = indiceZ
    this.tiles = [];
    for(y=0; y<this.altoEnTiles; y++)
    {
        for(x=0; x<this.anchoEnTiles; x++)
        {

        }
    }
}