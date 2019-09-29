var maquinaEstados = {
    estadoActual: null,
    iniciar: function(){

    },
    cambiarEstado: function(nuevoEstado){
        switch(nuevoEstado)
        {
            case listaEstados.CARGANDO:
                //Estado Actual Cargando;
                break;
            case listaEstados.MENUINICIAL:
                break;
            case listaEstados.MAPA:
                break;
            case listaEstados.NIVEL:
                break;
        }
    },
    actualizar: function ()
    {
        maquinaEstados.estadoActual.actualizar();
    },
    dibujar: function()
    {
        maquinaEstados.estadoActual.dibujar();
    }
}