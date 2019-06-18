<body style="background-color:white">

<nav class="navbar navbar-inverse navbar-static-top">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Este boton despliega la barra de navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" style="color:white" href="#" title="Hard Level">
      Hard Level
    </a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
      <?php
      $P=0;
      include_once "Plantillas/barcolores.php";
      barColores::Bcolores($P);
       ?>
    </ul>

  </div>
</div>

</nav>
