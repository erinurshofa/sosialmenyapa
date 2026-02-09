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
 // $dataProvider = new ArrayDataProvider([
 //        'allModels' => $ruta['ruta'],
 //    ]);
?>
<div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-lg"><?=$usia['title_pie']?></h4>
                            
                                        <?php
               $kecamatan1=$usia['usia'][0]['usia0_5'];
               $kecamatan2=$usia['usia'][1]['usia0_5'];
               $kecamatan3=$usia['usia'][2]['usia0_5'];
               $kecamatan4=$usia['usia'][3]['usia0_5'];
               $kecamatan5=$usia['usia'][4]['usia0_5'];
               $kecamatan6=$usia['usia'][5]['usia0_5'];
               $kecamatan7=$usia['usia'][6]['usia0_5'];
               $kecamatan8=$usia['usia'][7]['usia0_5'];
               $kecamatan9=$usia['usia'][8]['usia0_5'];
               $kecamatan10=$usia['usia'][9]['usia0_5'];
               $kecamatan11=$usia['usia'][10]['usia0_5'];
               $kecamatan12=$usia['usia'][11]['usia0_5'];
               $kecamatan13=$usia['usia'][12]['usia0_5'];
               $kecamatan14=$usia['usia'][13]['usia0_5'];
               $kecamatan15=$usia['usia'][14]['usia0_5'];
               $kecamatan16=$usia['usia'][15]['usia0_5'];
               $kecamatan17=$usia['usia'][16]['usia0_5'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 0 - 5 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
                // 'data'=>$datausia0_5,
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
               $kecamatan1=$usia['usia'][0]['usia6_12'];
               $kecamatan2=$usia['usia'][1]['usia6_12'];
               $kecamatan3=$usia['usia'][2]['usia6_12'];
               $kecamatan4=$usia['usia'][3]['usia6_12'];
               $kecamatan5=$usia['usia'][4]['usia6_12'];
               $kecamatan6=$usia['usia'][5]['usia6_12'];
               $kecamatan7=$usia['usia'][6]['usia6_12'];
               $kecamatan8=$usia['usia'][7]['usia6_12'];
               $kecamatan9=$usia['usia'][8]['usia6_12'];
               $kecamatan10=$usia['usia'][9]['usia6_12'];
               $kecamatan11=$usia['usia'][10]['usia6_12'];
               $kecamatan12=$usia['usia'][11]['usia6_12'];
               $kecamatan13=$usia['usia'][12]['usia6_12'];
               $kecamatan14=$usia['usia'][13]['usia6_12'];
               $kecamatan15=$usia['usia'][14]['usia6_12'];
               $kecamatan16=$usia['usia'][15]['usia6_12'];
               $kecamatan17=$usia['usia'][16]['usia6_12'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 6 - 12 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
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
               $kecamatan1=$usia['usia'][0]['usia13_15'];
               $kecamatan2=$usia['usia'][1]['usia13_15'];
               $kecamatan3=$usia['usia'][2]['usia13_15'];
               $kecamatan4=$usia['usia'][3]['usia13_15'];
               $kecamatan5=$usia['usia'][4]['usia13_15'];
               $kecamatan6=$usia['usia'][5]['usia13_15'];
               $kecamatan7=$usia['usia'][6]['usia13_15'];
               $kecamatan8=$usia['usia'][7]['usia13_15'];
               $kecamatan9=$usia['usia'][8]['usia13_15'];
               $kecamatan10=$usia['usia'][9]['usia13_15'];
               $kecamatan11=$usia['usia'][10]['usia13_15'];
               $kecamatan12=$usia['usia'][11]['usia13_15'];
               $kecamatan13=$usia['usia'][12]['usia13_15'];
               $kecamatan14=$usia['usia'][13]['usia13_15'];
               $kecamatan15=$usia['usia'][14]['usia13_15'];
               $kecamatan16=$usia['usia'][15]['usia13_15'];
               $kecamatan17=$usia['usia'][16]['usia13_15'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 13 - 15 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
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
               $kecamatan1=$usia['usia'][0]['usia16_18'];
               $kecamatan2=$usia['usia'][1]['usia16_18'];
               $kecamatan3=$usia['usia'][2]['usia16_18'];
               $kecamatan4=$usia['usia'][3]['usia16_18'];
               $kecamatan5=$usia['usia'][4]['usia16_18'];
               $kecamatan6=$usia['usia'][5]['usia16_18'];
               $kecamatan7=$usia['usia'][6]['usia16_18'];
               $kecamatan8=$usia['usia'][7]['usia16_18'];
               $kecamatan9=$usia['usia'][8]['usia16_18'];
               $kecamatan10=$usia['usia'][9]['usia16_18'];
               $kecamatan11=$usia['usia'][10]['usia16_18'];
               $kecamatan12=$usia['usia'][11]['usia16_18'];
               $kecamatan13=$usia['usia'][12]['usia16_18'];
               $kecamatan14=$usia['usia'][13]['usia16_18'];
               $kecamatan15=$usia['usia'][14]['usia16_18'];
               $kecamatan16=$usia['usia'][15]['usia16_18'];
               $kecamatan17=$usia['usia'][16]['usia16_18'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 16 - 18 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
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
               $kecamatan1=$usia['usia'][0]['usia19_25'];
               $kecamatan2=$usia['usia'][1]['usia19_25'];
               $kecamatan3=$usia['usia'][2]['usia19_25'];
               $kecamatan4=$usia['usia'][3]['usia19_25'];
               $kecamatan5=$usia['usia'][4]['usia19_25'];
               $kecamatan6=$usia['usia'][5]['usia19_25'];
               $kecamatan7=$usia['usia'][6]['usia19_25'];
               $kecamatan8=$usia['usia'][7]['usia19_25'];
               $kecamatan9=$usia['usia'][8]['usia19_25'];
               $kecamatan10=$usia['usia'][9]['usia19_25'];
               $kecamatan11=$usia['usia'][10]['usia19_25'];
               $kecamatan12=$usia['usia'][11]['usia19_25'];
               $kecamatan13=$usia['usia'][12]['usia19_25'];
               $kecamatan14=$usia['usia'][13]['usia19_25'];
               $kecamatan15=$usia['usia'][14]['usia19_25'];
               $kecamatan16=$usia['usia'][15]['usia19_25'];
               $kecamatan17=$usia['usia'][16]['usia19_25'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 19 - 25 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
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
               $kecamatan1=$usia['usia'][0]['usia26_30'];
               $kecamatan2=$usia['usia'][1]['usia26_30'];
               $kecamatan3=$usia['usia'][2]['usia26_30'];
               $kecamatan4=$usia['usia'][3]['usia26_30'];
               $kecamatan5=$usia['usia'][4]['usia26_30'];
               $kecamatan6=$usia['usia'][5]['usia26_30'];
               $kecamatan7=$usia['usia'][6]['usia26_30'];
               $kecamatan8=$usia['usia'][7]['usia26_30'];
               $kecamatan9=$usia['usia'][8]['usia26_30'];
               $kecamatan10=$usia['usia'][9]['usia26_30'];
               $kecamatan11=$usia['usia'][10]['usia26_30'];
               $kecamatan12=$usia['usia'][11]['usia26_30'];
               $kecamatan13=$usia['usia'][12]['usia26_30'];
               $kecamatan14=$usia['usia'][13]['usia26_30'];
               $kecamatan15=$usia['usia'][14]['usia26_30'];
               $kecamatan16=$usia['usia'][15]['usia26_30'];
               $kecamatan17=$usia['usia'][16]['usia26_30'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 26 - 30 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
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
               $kecamatan1=$usia['usia'][0]['usia31_40'];
               $kecamatan2=$usia['usia'][1]['usia31_40'];
               $kecamatan3=$usia['usia'][2]['usia31_40'];
               $kecamatan4=$usia['usia'][3]['usia31_40'];
               $kecamatan5=$usia['usia'][4]['usia31_40'];
               $kecamatan6=$usia['usia'][5]['usia31_40'];
               $kecamatan7=$usia['usia'][6]['usia31_40'];
               $kecamatan8=$usia['usia'][7]['usia31_40'];
               $kecamatan9=$usia['usia'][8]['usia31_40'];
               $kecamatan10=$usia['usia'][9]['usia31_40'];
               $kecamatan11=$usia['usia'][10]['usia31_40'];
               $kecamatan12=$usia['usia'][11]['usia31_40'];
               $kecamatan13=$usia['usia'][12]['usia31_40'];
               $kecamatan14=$usia['usia'][13]['usia31_40'];
               $kecamatan15=$usia['usia'][14]['usia31_40'];
               $kecamatan16=$usia['usia'][15]['usia31_40'];
               $kecamatan17=$usia['usia'][16]['usia31_40'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 31 - 40 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
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
               $kecamatan1=$usia['usia'][0]['usia41_50'];
               $kecamatan2=$usia['usia'][1]['usia41_50'];
               $kecamatan3=$usia['usia'][2]['usia41_50'];
               $kecamatan4=$usia['usia'][3]['usia41_50'];
               $kecamatan5=$usia['usia'][4]['usia41_50'];
               $kecamatan6=$usia['usia'][5]['usia41_50'];
               $kecamatan7=$usia['usia'][6]['usia41_50'];
               $kecamatan8=$usia['usia'][7]['usia41_50'];
               $kecamatan9=$usia['usia'][8]['usia41_50'];
               $kecamatan10=$usia['usia'][9]['usia41_50'];
               $kecamatan11=$usia['usia'][10]['usia41_50'];
               $kecamatan12=$usia['usia'][11]['usia41_50'];
               $kecamatan13=$usia['usia'][12]['usia41_50'];
               $kecamatan14=$usia['usia'][13]['usia41_50'];
               $kecamatan15=$usia['usia'][14]['usia41_50'];
               $kecamatan16=$usia['usia'][15]['usia41_50'];
               $kecamatan17=$usia['usia'][16]['usia41_50'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 41 - 50 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
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
               $kecamatan1=$usia['usia'][0]['usia51_60'];
               $kecamatan2=$usia['usia'][1]['usia51_60'];
               $kecamatan3=$usia['usia'][2]['usia51_60'];
               $kecamatan4=$usia['usia'][3]['usia51_60'];
               $kecamatan5=$usia['usia'][4]['usia51_60'];
               $kecamatan6=$usia['usia'][5]['usia51_60'];
               $kecamatan7=$usia['usia'][6]['usia51_60'];
               $kecamatan8=$usia['usia'][7]['usia51_60'];
               $kecamatan9=$usia['usia'][8]['usia51_60'];
               $kecamatan10=$usia['usia'][9]['usia51_60'];
               $kecamatan11=$usia['usia'][10]['usia51_60'];
               $kecamatan12=$usia['usia'][11]['usia51_60'];
               $kecamatan13=$usia['usia'][12]['usia51_60'];
               $kecamatan14=$usia['usia'][13]['usia51_60'];
               $kecamatan15=$usia['usia'][14]['usia51_60'];
               $kecamatan16=$usia['usia'][15]['usia51_60'];
               $kecamatan17=$usia['usia'][16]['usia51_60'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 51 - 60 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
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
               $kecamatan1=$usia['usia'][0]['usia61_110'];
               $kecamatan2=$usia['usia'][1]['usia61_110'];
               $kecamatan3=$usia['usia'][2]['usia61_110'];
               $kecamatan4=$usia['usia'][3]['usia61_110'];
               $kecamatan5=$usia['usia'][4]['usia61_110'];
               $kecamatan6=$usia['usia'][5]['usia61_110'];
               $kecamatan7=$usia['usia'][6]['usia61_110'];
               $kecamatan8=$usia['usia'][7]['usia61_110'];
               $kecamatan9=$usia['usia'][8]['usia61_110'];
               $kecamatan10=$usia['usia'][9]['usia61_110'];
               $kecamatan11=$usia['usia'][10]['usia61_110'];
               $kecamatan12=$usia['usia'][11]['usia61_110'];
               $kecamatan13=$usia['usia'][12]['usia61_110'];
               $kecamatan14=$usia['usia'][13]['usia61_110'];
               $kecamatan15=$usia['usia'][14]['usia61_110'];
               $kecamatan16=$usia['usia'][15]['usia61_110'];
               $kecamatan17=$usia['usia'][16]['usia61_110'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia 61 - 110 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
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
               $kecamatan1=$usia['usia'][0]['usialebih_110'];
               $kecamatan2=$usia['usia'][1]['usialebih_110'];
               $kecamatan3=$usia['usia'][2]['usialebih_110'];
               $kecamatan4=$usia['usia'][3]['usialebih_110'];
               $kecamatan5=$usia['usia'][4]['usialebih_110'];
               $kecamatan6=$usia['usia'][5]['usialebih_110'];
               $kecamatan7=$usia['usia'][6]['usialebih_110'];
               $kecamatan8=$usia['usia'][7]['usialebih_110'];
               $kecamatan9=$usia['usia'][8]['usialebih_110'];
               $kecamatan10=$usia['usia'][9]['usialebih_110'];
               $kecamatan11=$usia['usia'][10]['usialebih_110'];
               $kecamatan12=$usia['usia'][11]['usialebih_110'];
               $kecamatan13=$usia['usia'][12]['usialebih_110'];
               $kecamatan14=$usia['usia'][13]['usialebih_110'];
               $kecamatan15=$usia['usia'][14]['usialebih_110'];
               $kecamatan16=$usia['usia'][15]['usialebih_110'];
               $kecamatan17=$usia['usia'][16]['usialebih_110'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
               $persen1=($kecamatan1/$total)*100;
               $persen2=($kecamatan2/$total)*100;
               $persen3=($kecamatan3/$total)*100;
               $persen4=($kecamatan4/$total)*100;
               $persen5=($kecamatan5/$total)*100;
               $persen6=($kecamatan6/$total)*100;
               $persen7=($kecamatan7/$total)*100;
               $persen8=($kecamatan8/$total)*100;
               $persen9=($kecamatan9/$total)*100;
               $persen10=($kecamatan10/$total)*100;
               $persen11=($kecamatan11/$total)*100;
               $persen12=($kecamatan12/$total)*100;
               $persen13=($kecamatan13/$total)*100;
               $persen14=($kecamatan14/$total)*100;
               $persen15=($kecamatan15/$total)*100;
               $persen16=($kecamatan16/$total)*100;
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase DTKS Usia Lebih Dari 110 Tahun Per Kecamatan Sekota Semarang'],
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
                'data' => [
                    [$usia['usia'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$usia['usia'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$usia['usia'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$usia['usia'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$usia['usia'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$usia['usia'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$usia['usia'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$usia['usia'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$usia['usia'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$usia['usia'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$usia['usia'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$usia['usia'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$usia['usia'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$usia['usia'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$usia['usia'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$usia['usia'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$usia['usia'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
                ],
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