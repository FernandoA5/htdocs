<?php
class conexion
{
  private static $conection;
  public static function openConection()
  {
    include_once "config.inc.php";
    try {
      if(!isset($conection))
      {
        self::$conection =new PDO("mysql:host=" . NameServer . ";dbname=" . DBName, NameUser, Password);
        //self::$conection =new PDO("mysql:host=localhost; dbname=hldb", NameUser, Password);

        self::$conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$conection->exec("SET CHARACTER SET utf8");
        //echo HOLI;
      }
    } catch (PDOException $ex) {
      print (HOLIERROR . $ex -> getMessage() . "<br>");
    }

  }
  public static function closeConection()
  {
    if(isset(self::$conection))
    {
      self::$conection=null;
      //echo HOLI .  "TODO COOL";
    }
  }
  public static function getConection()
  {
    return self::$conection;
  }
}

 ?>
