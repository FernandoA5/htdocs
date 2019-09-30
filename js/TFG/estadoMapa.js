function estadoMapa(idEstado)
{
    var that=this;
    this.mapaListo=false;
    this.mapa=null;
    ajax.cargarArchivo("imagenes/TFG/mapas/desierto48.json", function(objetoJSON){
        that.mapa = new mapa(objetoJSON);
        that.mapaListo=true;
        console.log("HOLI: Mapa Cargado por ajax");
    });
}
estadoMapa.prototype.actualizar=function(){
    if(!this.mapaListo)
    {
        return;
    }
    this.mapa.actualizar();
}
estadoMapa.prototype.dibujar=function(){
    if(!this.mapaListo)
    {
        return;
    }
    this.mapa.dibujar();
}