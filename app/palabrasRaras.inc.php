<?php
  class palabrasRaras
  {
    public static function arreglar($pal)
    {
      include_once "repositorioEntradas.inc.php";
      //include_once "conexion.inc.php";
      //conexion::
      $chars[0]="%C3%B1"; $rep[0]="ñ";
      $chars[32]="A1";$chars[1]="A9";$chars[2]="AD";$chars[3]="B3";$chars[4]="BA";
      $chars[5]="A0";$chars[6]="A8";$chars[7]="AC";$chars[8]="B2";$chars[9]="B9";
      $chars[10]="81";$chars[11]="89";$chars[12]="8D";$chars[13]="93";$chars[14]="9A";
      $chars[15]="80";$chars[16]="88";$chars[17]="8C";$chars[18]="92";$chars[19]="99";
      $chars[20]="20";$chars[21]="C3";$chars[22]="%";$chars[23]="84";$chars[24]="8B";
      $chars[25]="8F";$chars[26]="96";$chars[27]="9C";$chars[28]="B1";$chars[29]="91";
      $chars[30]="3E";$chars[31]="3C";
      $rep[32]="á";$rep[1]="é";$rep[2]="í";$rep[3]="ó";$rep[4]="ú";
      $rep[5]="à";$rep[6]="è";$rep[7]="ì";$rep[8]="ò";$rep[9]="ù";
      $rep[10]="Á";$rep[11]="É";$rep[12]="Í";$rep[13]="Ó";$rep[14]="Ú";
      $rep[15]="À";$rep[16]="È";$rep[17]="Ì";$rep[18]="Ò";$rep[19]="Ù";
      $rep[20]=" ";$rep[21]="";$rep[22]="";$rep[23]="Ä";$rep[24]="Ë";
      $rep[25]="Ï";$rep[26]="Ö";$rep[27]="Ü";$rep[28]="ñ";$rep[29]="Ñ";
      $rep[30]=">";$rep[31]="<";
      
      for($i=0;$i<sizeof($chars);$i++)
      {
        $pal=str_replace($chars[$i], $rep[$i], $pal);
        $existe=repositorioEntradas::entradaExiste(conexion::getConection(),$pal);
        if($existe)
        {
          break; 
        }
      }
      return $pal;
    }
    public function detectar($pal)
    {
      $pos=false;
      $rep[0]="á";$rep[1]="é";$rep[2]="í";$rep[3]="ó";$rep[4]="ú";
      $rep[5]="à";$rep[6]="è";$rep[7]="ì";$rep[8]="ò";$rep[9]="ù";
      $rep[10]="Á";$rep[11]="É";$rep[12]="Í";$rep[13]="Ó";$rep[14]="Ú";
      $rep[15]="À";$rep[16]="È";$rep[17]="Ì";$rep[18]="Ò";$rep[19]="Ù";

      for($i=0; $i<20; $i++)
      {
        if(strpos($pal, $rep[$i])===0)
        {
          return false;
        }
        else {
          return true;
        }

      }
    }
    public static function quitarTags($palabra)
    {
        //$palabra="<h1 style='color:blue'>HOLI</h1>";
        $r=explode("<", $palabra);
        //echo count($r);
        for($i=0;$i<count($r);$i++)
        {
          //echo $r[$i];
        }
        $nr=explode(">", $r[1]); 
        //echo count($nr);
        return $nr[1];

    }
    public static function encontrarTags($texto)
    {
      $tag[0]="<";
      $tag[1]=">";
      $tag[2]="</";
      for($i=0; $i<count($tag); $i++)
      {
        if(strpos($texto, $tag[$i])===0)
        {
          return false;
        }
        else{
          return true;
        }
      }
    }
  }
 ?>
