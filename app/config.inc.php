<?php
//SERVIDOR
define("NameServer", "localhost");
define("NameUser", "root");
define("Password", "");
define("DBName", "hldb");

//RUTAS
define("SERVIDOR", "http://localhost");
define("LEARNING", "/Learning");
define("SOLUTIONS", "/Solutions");
define("GAMES", "/Games");
define("BLOGS", "/Blogs");
define("REGISTRAR", "/Registrar");
define("REGISTROCORRECTO", "/RegistroCorrecto");
define("LOGIN", "/Login");
define("MYBLOG", "/MyBlog");
define("LOGOUT", "/Logout");
define("YOUTUBE", "https://www.youtube.com/embed/");
define("WEBFAMILY", "/WebFamily");
define("CATNETWORK", "/CatNetwork");
define("ONLINE", "/onlineGame");
define("TFG", "/TheFifthGuild");


define("RUTALEARNING", SERVIDOR.LEARNING);
//SOURCES
define("RUTACSS", SERVIDOR . "/css/");
define("RUTAJS", SERVIDOR . "/js/");
define("RUTAJSTFG", SERVIDOR."/js/TFG/");
define("RUTAIMAGENES", SERVIDOR . "/imagenes/");
define("RUTAPLANTILLAS", SERVIDOR .  "/Plantillas/");
define("RUTAAPP", SERVIDOR . "/app/");
define ("RUTAAVATARS", RUTAIMAGENES. "avatars/");
define("RUTAMINIATURAS", RUTAIMAGENES. "miniaturas/");
//define("DIRECTORIORAIZ", realpath(dirname(_FILE_)."/..")); php5
define("DIRECTORIORAIZ", realpath(__DIR__."/..")); //php7

//define("REGISTRAR", SERVIDOR . "/Plantillas/");

define("HOLI", "HOLI: ");
define("HOLIERROR", "HOLI, QUE MAL PLAN: ");
 ?>
