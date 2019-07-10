<?php
class barColores
{
  public $P;
  public static function Bcolores($P)
  {


    $TotUsers=RepositorioUsuario::getUsers(conexion::getConection());

    if($P==0)
    {

      echo '<li><a href="' .  SOLUTIONS . '" title="Hard Level Solutions">Solutions</a></li>';
      echo '<li><a href="' . GAMES . '" title="Hard Level Games">Games</a></li>';
      echo '<li><a href="' . LEARNING . '" title="Hard Level Learning">Learning</a></li>';
      echo '<li><a href="' . BLOGS .'" title="Blogs">Blogs</a></li>';
    }
    if($P==1)
    {
      echo '<li><a href="' .  SOLUTIONS . '" style="color:white;" title="Hard Level Solutions">Solutions</a></li>';
      echo '<li><a href="' . GAMES . '" title="Hard Level Games">Games</a></li>';
      echo '<li><a href="' . LEARNING . '" title="Hard Level Learning">Learning</a></li>';
      echo '<li><a href="' . BLOGS .'" title="Blogs">Blogs</a></li>';
    }
    if($P==2)
    {
      echo '<li><a href="' .  SOLUTIONS . '"  title="Hard Level Solutions">Solutions</a></li>';
      echo '<li><a href="' . GAMES . '" style="color:white;" title="Hard Level Games">Games</a></li>';
      echo '<li><a href="' . LEARNING . '" title="Hard Level Learning">Learning</a></li>';
      echo '<li><a href="' . BLOGS .'" title="Blogs">Blogs</a></li>';
    }

    if($P==3)
    {
      echo '<li><a href="' .  SOLUTIONS . '"  title="Hard Level Solutions">Solutions</a></li>';
      echo '<li><a href="' . GAMES . '"  title="Hard Level Games">Games</a></li>';
      echo '<li><a href="' . LEARNING . '" style="color:white;" title="Hard Level Learning">Learning</a></li>';
      echo '<li><a href="' . BLOGS .'" title="Blogs">Blogs</a></li>';
    }
    if($P==4)
    {
      echo '<li><a href="' .  SOLUTIONS . '"  title="Hard Level Solutions">Solutions</a></li>';
      echo '<li><a href="' . GAMES . '"  title="Hard Level Games">Games</a></li>';
      echo '<li><a href="' . LEARNING . '" title="Hard Level Learning">Learning</a></li>';
      echo '<li><a href="' . BLOGS .'" style="color:white;" title="Blogs">Blogs</a></li>';
    }

  }

}

 ?>
