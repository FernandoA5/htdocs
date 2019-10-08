<?php
$P=4;
include_once "Plantillas/head.php";
include_once "Plantillas/bar.php";
?>
<div class="container">
    <div class="row">
        <div class="panel-group" id="acorrding">
            <?php
                $mes=date("n");//MES ACTUAL EN NUMERO
                $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                $year=date("Y");//AÑO ACTUAL
                $diaSemana=date("D");//DIA DE LA SEMANA POR INICIALES
                $dias=date("t");//DIAS DEL MES ACTUAL NUMERO
                $visiesto=date("L");//AÑO BISIESTO TRUE O FALSE
                if(!$visiesto)
                {
                    $diasMeses=array(5, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);      
                }
                else{
                    $diasMeses=array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);      
                }
                
                echo $diaSemana;
                for($i=-1; $i<2; $i++)
                {
                    ?>
                        <div class="panel">
                        <div class="panel-heading panel-agenda text-center">
                            <h3 class="panel-title">
                            <a style="color:white" class="noDecoration" href="#collapse<?php echo $i; ?>" data-toggle="collapse" data-parent="#acordion">
                            <?php echo $year+$i;   ?>
                            </a>
                            </h3>
                        </div>
                        <div class="panel-collapse collapse <?php
                            if($year+$i==$year)
                            {
                                echo "in";
                            }
                        ?>" id="collapse<?php echo $i; ?>">
                            <?php
                                for($j=0; $j<12; $j++)
                                {
                                    ?>
                                        <div class="panel">
                                            <div class="panel-heading  panel-mes text-center">
                                                <h3 class="panel-title">
                                                    <a class="noDecoration" href="#collapse<?php echo $i.$j; ?>" data-toggle="collapse" data-parent="#acordion">
                                                        <?php echo $meses[$j];?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="panel-collapse collapse <?php if($j+1==$mes && $year+$i==$year) echo "in"; ?>" id="collapse<?php echo $i.$j; ?>">
                                                    <div class="panel-body">
                                                        <?php
                                                        for($d=1; $d<=$diasMeses[$j];)
                                                        {
                                                            ?>
                                                                    <div class="row">
                                                                    <?php
                                                                        for($k=0; $k<3; $k++)
                                                                        {
                                                                            ?>
                                                                                <div class="col-sm-4">
                                                                                <?php
                                                                                        if($d<=$diasMeses[$j])
                                                                                        {
                                                                                            ?>
                                                                                            <div  style="border-style:solid; border-width: 1px;">
                                                                                                <h2>
                                                                                                    <?php
                                                                                                        echo "&nbsp".$d;
                                                                                                    ?>
                                                                                                </h2>
                                                                                            </div>
                                                                                            <?php
                                                                                        }
                                                                                        $d++;
                                                                                        ?>
                                                                                </div>
                                                                            <?php
                                                                        }
                                                                        ?> 
                                                                    </div><br>
                                                                    <div class="row">
                                                                        <?php
                                                                        for($k=3; $k<7; $k++)
                                                                        {
                                                                            ?>
                                                                                <div class="col-sm-3">
                                                                                        <?php
                                                                                        if($d<=$diasMeses[$j])
                                                                                        {
                                                                                            ?>
                                                                                            <div  style="border-style:solid; border-width: 1px;">
                                                                                                <h2>
                                                                                                    <?php
                                                                                                        echo "&nbsp".$d;
                                                                                                    ?>
                                                                                                </h2>
                                                                                            </div>
                                                                                            <?php
                                                                                        }
                                                                                        $d++;
                                                                                        ?>
                                                                                </div>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    </div><br>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>
                        </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
<?php
include_once "Plantillas/cierre.php";
?>