function paletaSprites(datosSprites)
{
    this.rutaImagen = datosSprites.image;
    this.anchoImagen = parseInt(datosSprites.imagewidth);
    this.altoImagen = parseInt(datosSprites.imageheight);

    this.anchoSprites = parseInt(datosSprites.tilewidth);
    this.altoSprites = parseInt(datosSprites.tileheight);

    this.primerSpriteSobreUno= parseInt(datosSprites.firstgid);
    this.anchoImagenMedidoEnSprites = this.anchoImagen / this.anchoSprites;
    this.altoImagenMedidoEnSprites = this.altoImagen / this.altoSprites;
    this.totalSprites = this.anchoImagenMedidoEnSprites * this.altoImagenMedidoEnSprites;

    this.sprites = [];
    for(s=0; s<this.totalSprites; s++)
    {
        var idActualSobreZero = this.primerSpriteSobreUno -1 +s;
        this.sprites.push(new sprite(this.rutaImagen, idActualSobreZero, this.obtenerPosiscionDesdeIdSprite(idActualSobreZero)));
    }
    paletaSprites.prototype.obtenerPosiscionDesdeIdSprite = function(idSpriteSobreZero){
        var y = Math.floor(idSpriteSobreZero / this.anchoImagenMedidoEnSprites);
        var x = idSpriteSobreZero % this.altoImagenMedidoEnSprites;
        return new punto(x*this.anchoSprites,y*this.altoSprites);
    }
}