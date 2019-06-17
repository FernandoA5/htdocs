var mtsDABst=document.getElementById("btnDABst");
var mtsDbtn=document.getElementById("btnDmts");
var mtsDframe=document.getElementById("btnDFrame");
var mtsDframe1=document.getElementById("btnDFrame1");

mtsDbtn.addEventListener("click", downloadMTS);
mtsDABst.addEventListener("click", downloadAboost);
mtsDframe.addEventListener("click", downloadFrame);
mtsDframe1.addEventListener("click", downloadFrame);
//LINKS
var linkMTS;
linkMTS="https://mega.nz/?fbclid=IwAR2qmlDSQVficZJ8iQLPHHCvhKL_w2D3PSm6Z-FTsB0I1Owf0APoD_1FbrE#!uLQgQAZA!WIhONyNBQp22qq6op1QPUCnXdaACW5hRLKW8xTId8gw";
var linkABst;
linkABst="https://mega.nz/?fbclid=IwAR3JJkoAFOFiQv8arJ4dDVjD_lORc9eTYgp8X3WlJHQ8fu3Xt8JTBv3uxOE#!DChFgAZb!llMPURT1RyL5MRFAMlx3K-GLtDMqS9H3fBcmtshwbvE";
var linkFrame;
linkFrame="https://www.microsoft.com/en-us/download/details.aspx?id=30653&fbclid=IwAR2EiVUzxAje-e2nFeS_UytQLX9P0yfuBwaKOVMzuHbx-5bXNJWbjN3n43k";
function downloadMTS()
{
  window.location.replace(linkMTS);
}
function downloadAboost()
{
  window.location.replace(linkABst);
}
function downloadFrame()
{
  window.location.replace(linkFrame);
}
