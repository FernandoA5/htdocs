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



//SOURCES
define("RUTACSS", SERVIDOR . "/css/");
define("RUTAJS", SERVIDOR . "/js/");
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
