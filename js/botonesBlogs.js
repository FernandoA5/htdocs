var bDbtn=document.getElementById("btnDavid");

var bFbtn=document.getElementById("btnFernando");
var bElbtn=document.getElementById("btnElias");

bDbtn.addEventListener("click", blogYogi);

bFbtn.addEventListener("click", blogFernando);
bElbtn.addEventListener("click", blogElias);

function blogElias()
{
  window.location.replace("BlogElias.html");
}
function blogYogi()
{
  window.location.replace("BlogDavid.html");
}

function blogFernando()
{
  window.location.replace("Fblog.php");
}
