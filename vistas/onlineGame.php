<?php
$P=2;
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
include_once "Plantillas/onlineGame.inc.php";
?>
<button id="HgO" name="capitulo">Hogwarts Online</button>

 <script>
    var btnHgO=document.getElementById("HgO");
    btnHgO.addEventListener("click", HgObtn);
    function HgObtn()
    {

      alert("<?php  HogwarsOnline::player(); ?>");
    }
 </script>
