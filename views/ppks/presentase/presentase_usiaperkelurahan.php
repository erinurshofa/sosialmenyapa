<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\Bdtart;
use app\models\Kecamatan;
use app\models\Dokumen;
use app\models\Bdtrt;
use miloschuman\highcharts\Highcharts;


$datausia0_5=array();
$datausia6_12=array();
$datausia13_15=array();
$datausia16_18=array();
$datausia19_25=array();
$datausia26_30=array();
$datausia31_40=array();
$datausia41_50=array();
$datausia51_60=array();
$datausia61_110=array();
$datausialebih_110=array();
foreach ($usiaperkelurahan['usiaperkelurahan'] as $key => $value) {
  $datausia0_5[]=$value['usia0_5'];
  $datausia6_12[]=$value['usia6_12'];
  $datausia13_15[]=$value['usia13_15'];
  $datausia16_18[]=$value['usia16_18'];
  $datausia19_25[]=$value['usia19_25'];
  $datausia26_30[]=$value['usia26_30'];
  $datausia31_40[]=$value['usia31_40'];
  $datausia41_50[]=$value['usia41_50'];
  $datausia51_60[]=$value['usia51_60'];
  $datausia61_110[]=$value['usia61_110'];
  $datausialebih_110[]=$value['usialebih_110'];
}
$total0_5=array_sum($datausia0_5);
$total6_12=array_sum($datausia6_12);
$total13_15=array_sum($datausia13_15);
$total16_18=array_sum($datausia16_18);
$total19_25=array_sum($datausia19_25);
$total26_30=array_sum($datausia26_30);
$total31_40=array_sum($datausia31_40);
$total41_50=array_sum($datausia41_50);
$total51_60=array_sum($datausia51_60);
$total61_110=array_sum($datausia61_110);
$totallebih_110=array_sum($datausialebih_110);
($totallebih_110<=0)?$totallebih_110=1:(int)$totallebih_110;
$data0_5=array();
$data6_12=array();
$data13_15=array();
$data16_18=array();
$data19_25=array();
$data26_30=array();
$data31_40=array();
$data41_50=array();
$data51_60=array();
$data61_110=array();
$datalebih_110=array();
// $data=array();
foreach ($usiaperkelurahan['usiaperkelurahan'] as $key => $value) {
  $kelurahan=$value['kelurahan'];
  $persen0_5=round(($value['usia0_5']/$total0_5)*100,1);
  $persen6_12=round(($value['usia6_12']/$total6_12)*100,1);
  $persen13_15=round(($value['usia13_15']/$total13_15)*100,1);
  $persen16_18=round(($value['usia16_18']/$total16_18)*100,1);
  $persen19_25=round(($value['usia19_25']/$total19_25)*100,1);
  $persen26_30=round(($value['usia26_30']/$total26_30)*100,1);
  $persen31_40=round(($value['usia31_40']/$total31_40)*100,1);
  $persen41_50=round(($value['usia41_50']/$total41_50)*100,1);
  $persen51_60=round(($value['usia51_60']/$total51_60)*100,1);
  $persen61_110=round(($value['usia61_110']/$total61_110)*100,1);
  $persenlebih_110=round(($value['usialebih_110']/$totallebih_110)*100,1);
  $usia0_5=$value['usia0_5'];
  $usia6_12=$value['usia6_12'];
  $usia13_15=$value['usia13_15'];
  $usia16_18=$value['usia16_18'];
  $usia19_25=$value['usia19_25'];
  $usia26_30=$value['usia26_30'];
  $usia31_40=$value['usia31_40'];
  $usia41_50=$value['usia41_50'];
  $usia51_60=$value['usia51_60'];
  $usia61_110=$value['usia61_110'];
  $usialebih_110=$value['usialebih_110'];
  $opsi=false;
  $data0_5[]=array($kelurahan,$persen0_5,$usia0_5,$opsi);
  $data6_12[]=array($kelurahan,$persen6_12,$usia6_12,$opsi);
  $data13_15[]=array($kelurahan,$persen13_15,$usia13_15,$opsi);
  $data16_18[]=array($kelurahan,$persen16_18,$usia16_18,$opsi);
  $data19_25[]=array($kelurahan,$persen19_25,$usia19_25,$opsi);
  $data26_30[]=array($kelurahan,$persen26_30,$usia26_30,$opsi);
  $data31_40[]=array($kelurahan,$persen31_40,$usia31_40,$opsi);
  $data41_50[]=array($kelurahan,$persen41_50,$usia41_50,$opsi);
  $data51_60[]=array($kelurahan,$persen51_60,$usia51_60,$opsi);
  $data61_110[]=array($kelurahan,$persen61_110,$usia61_110,$opsi);
  $datalebih_110[]=array($kelurahan,$persenlebih_110,$usialebih_110,$opsi);
}
?>
<div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-lg"><?=$usiaperkelurahan['title_pie']?></h4>
<?php

         
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 0 - 5 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data'=>$data0_5,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);


                                        ?>
            
              <?php
              
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 6 - 12 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data'=>$data6_12,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);
?>
                                   
              <?php
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 13 - 15 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data'=>$data13_15,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);
?>                                    
              <?php
               
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 16 - 18 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data'=>$data16_18,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);


                                        ?>
                                    
<?php
    
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 19 - 25 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a','selected', 'sliced'],
                'name' => 'Kecamatan',
                'data'=>$data19_25,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);
?>
<?php
               
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 26 - 30 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data'=>$data26_30,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);
?>
<?php
               
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 31 - 40 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data'=>$data31_40,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);
?>
<?php
               
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 41 - 50 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
               'data'=>$data41_50,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);
?>
<?php
               
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 51 - 60 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data'=>$data51_60,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);
?>
<?php
               
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 61 - 110 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
               'data'=>$data61_110,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);
?>
<?php
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia Lebih Dari 110 Tahun Per Kelurahan'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
        ],
        'styledMode'=> true,
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data'=>$datalebih_110,
                'showInLegend'=> true,
                "dataLabels" => [
                    "enabled"=> true,
                    "format" => "{point.name}: {point.y} %"
                ]
            ]
        ],
    ],
]);
?>
                                    </div>
                                </div>