<?php
class funcionesJs
{
    public static function player($player)
    {
        ?>
        <script>
            var div = '<div id="' + 1 + '"></div>';
            var html = document.getElementById("juego").innerHTML;
            document.getElementById("juego").innerHTML = html + div;
            document.getElementById("1").style.position = "absolute";
            document.getElementById("1").style.left = <?php 
            echo $player->obtenerX();
            ?> + "px";
            document.getElementById("1").style.background = "url(imagenes/avatars/01.png)";
            document.getElementById("1").style.top =  <?php 
            echo $player->obtenerY();
            ?> + "px";
            document.getElementById("1").style.width = 64 + "px";
            document.getElementById("1").style.height = 64+ "px";
        </script>
    <?php
    }
    
    public static function moverse()
    {
        ?>
            script
        <?php
    }
}
?>
