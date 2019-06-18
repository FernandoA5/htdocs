<html lang="es" dir="ltr">
 <head>
   <meta charset="utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   <meta name="viewport" content="width=device-width, initial-scale=1"/>

   <link href="../css/estilos.css" rel="stylesheet" >
   <link href="../css/bootstrap.min.css" rel="stylesheet">

   <?php
   if(!isset($titulo)||empty($title))
   {

     $titulo="Hard Level";
     ?>
     <title><?php echo $titulo; ?></title>
     <?php

  }

     ?>
     <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124437972-2"></script>
     <script>
       window.dataLayer = window.dataLayer || [];
       function gtag(){dataLayer.push(arguments);}
       gtag('js', new Date());
       gtag('config', 'UA-124437972-2');
     </script>
 </head>
