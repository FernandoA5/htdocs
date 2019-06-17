<html lang="es" dir="ltr">
 <head>
   <meta charset="utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   <meta name="viewport" content="width-device-width, initial-scale=1"/>

   <link rel="stylesheet" href="css/estilos.css">
   <link href="css/bootstrap.min.css" rel="stylesheet"/>

   <?php
   if(!isset($titulo)||empty($title))
   {

     $titulo="Hard Level";
     ?>
     <title><?php echo $titulo; ?></title>
     <?php

  }
  
     ?>

 </head>
</html>
