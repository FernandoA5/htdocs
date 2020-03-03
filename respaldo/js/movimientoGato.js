var gato = document.getElementById("gato");
gato.addEventListener("keypress", moverGato, false);


function moverGato(e)
{
  var keyCode = e.keyCode;
  if(keyCode==88)
  {
    alert("GATO");
  }
  else {
    alert("HOLA");
  }

}
