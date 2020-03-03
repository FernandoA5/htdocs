var teclas= {UP:38, DOWN:40, LEFT:37, RIGHT:39};
document.addEventListener("keyup", dibujarTeclado);
var cuadrito = document.getElementById("area_de_dibujo");
var papel=cuadrito.getContext("2d");

dibujarLinea("red", 100, 100, 200, 200, papel);

function dibujarLinea (color, xinicial, yinicial, xfinal, yfinal, lienzo)
{
  lienzo.beginPath();
  lienzo.strokeStyle =color;
  lienzo.moveTo(xinicial, yinicial);
  lienzo.lineTo(xfinal, yfinal);
  lienzo.stroke();
  lienzo.closePath();
}
function dibujarTeclado()
{
  
}
