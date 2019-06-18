<?php
class barColores
{
  public $P;
  public function Bcolores($P)
  {
    if($P==0)
    {
      echo '<li><a href="HardLevelSolutions.php" title="Hard Level Solutions">Solutions</a></li>';
      echo '<li><a href="HardLevelGames.php" title="Hard Level Games">Games</a></li>';
      echo '<li><a href="../Plantillas/Learning.php" title="Hard Level Learning">Learning</a></li>';
      echo '<li><a href="Blogs.php" title="Blogs">Blogs</a></li>';
    }
    if($P==1)
    {
      echo '<li><a href="HardLevelSolutions.php" style="color:white" title="Hard Level Solutions">Solutions</a></li>';
      echo '<li><a href="HardLevelGames.php" title="Hard Level Games">Games</a></li>';
      echo '<li><a href="HardLevelLearning.php" title="Hard Level Learning">Learning</a></li>';
      echo '<li><a href="Blogs.php" title="Blogs">Blogs</a></li>';
    }
    if($P==2)
    {
      echo '<li><a href="HardLevelSolutions.php" title="Hard Level Solutions">Solutions</a></li>';
      echo '<li><a href="HardLevelGames.php" style="color:white" title="Hard Level Games">Games</a></li>';
      echo '<li><a href="HardLevelLearning.php" title="Hard Level Learning">Learning</a></li>';
      echo '<li><a href="Blogs.php" title="Blogs">Blogs</a></li>';
    }

    if($P==3)
    {
      echo '<li><a href="HardLevelSolutions.php" title="Hard Level Solutions">Solutions</a></li>';
      echo '<li><a href="HardLevelGames.php" title="Hard Level Games">Games</a></li>';
      echo '<li><a href="HardLevelLearning.php" style="color:white" title="Hard Level Learning">Learning</a></li>';
      echo '<li><a href="Blogs.php" title="Blogs">Blogs</a></li>';
    }
    if($P==4)
    {
      echo '<li><a href="HardLevelSolutions.php" title="Hard Level Solutions">Solutions</a></li>';
      echo '<li><a href="HardLevelGames.php" title="Hard Level Games">Games</a></li>';
      echo '<li><a href="HardLevelLearning.php" title="Hard Level Learning">Learning</a></li>';
      echo '<li><a href="Blogs.php" style="color:white" title="Blogs">Blogs</a></li>';
    }
  }

}

 ?>
