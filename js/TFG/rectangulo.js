function rectangulo(x, y, ancho, alto)
{
    this.x=x;
    this.y=y;
    this.ancho=ancho;
    this.alto=alto;
    this.id="r"+x+y;

}
rectangulo.prototype.insetarDOM = function(){
  var div = "<div id='" +this.id+ "'></div>";
  var html= document.getElementById("juego").innerHTML;
  var color= "#"+ Math.floor(Math.random() * 16777215).toString(16);
}
