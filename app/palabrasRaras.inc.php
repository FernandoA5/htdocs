<?php
  class palabrasRaras
  {
    public function arreglar($pal)
    {

      $chars[0]="A1";$chars[1]="A9";$chars[2]="AD";$chars[3]="B3";$chars[4]="BA";
      $chars[5]="A0";$chars[6]="A8";$chars[7]="AC";$chars[8]="B2";$chars[9]="B9";
      $chars[10]="81";$chars[11]="89";$chars[12]="8D";$chars[13]="93";$chars[14]="9A";
      $chars[15]="80";$chars[16]="88";$chars[17]="8C";$chars[18]="92";$chars[19]="99";
      $chars[20]="%20";$chars[21]="%";$chars[22]="C3";
      $rep[0]="á";$rep[1]="é";$rep[2]="í";$rep[3]="ó";$rep[4]="ú";
      $rep[5]="à";$rep[6]="è";$rep[7]="ì";$rep[8]="ò";$rep[9]="ù";
      $rep[10]="Á";$rep[11]="É";$rep[12]="Í";$rep[13]="Ó";$rep[14]="Ú";
      $rep[15]="À";$rep[16]="È";$rep[17]="Ì";$rep[18]="Ò";$rep[19]="Ù";
      $rep[20]=" ";$rep[21]="";$rep[22]="";

      for($i=0;$i<23;$i++)
      {
        if(strpos($pal, $chars[$i]))
        {
          $pal=str_replace($chars[$i], $rep[$i], $pal);
        }
        $pal=$pal;
      }
      /*
        $word=str_replace("A1", "á", $pal);
        $word=str_replace("%C3%", "", $word);
        $word=str_replace("20", " ",$word);
*/

      return $pal;
    }
  }
 ?>
