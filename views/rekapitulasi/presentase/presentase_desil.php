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
                            <h4 class="mb-lg"><?=$desil['title_pie']?></h4>
                            
                                        <?php
               $kecamatan1=$desil['desil'][0]['desil1'];
               $kecamatan2=$desil['desil'][1]['desil1'];
               $kecamatan3=$desil['desil'][2]['desil1'];
               $kecamatan4=$desil['desil'][3]['desil1'];
               $kecamatan5=$desil['desil'][4]['desil1'];
               $kecamatan6=$desil['desil'][5]['desil1'];
               $kecamatan7=$desil['desil'][6]['desil1'];
               $kecamatan8=$desil['desil'][7]['desil1'];
               $kecamatan9=$desil['desil'][8]['desil1'];
               $kecamatan10=$desil['desil'][9]['desil1'];
               $kecamatan11=$desil['desil'][10]['desil1'];
               $kecamatan12=$desil['desil'][11]['desil1'];
               $kecamatan13=$desil['desil'][12]['desil1'];
               $kecamatan14=$desil['desil'][13]['desil1'];
               $kecamatan15=$desil['desil'][14]['desil1'];
               $kecamatan16=$desil['desil'][15]['desil1'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16;
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
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Desil 1 Miskin Per Kecamatan Sekota Semarang'],
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
                'keys'=> ['name', 'y', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data' => [
                    [$desil['desil'][0]['kecamatan'], round($persen1,1),false],
                    [$desil['desil'][1]['kecamatan'], round($persen2,1),false],
                    [$desil['desil'][2]['kecamatan'], round($persen3,1),false],
                    [$desil['desil'][3]['kecamatan'], round($persen4,1),false],
                    [$desil['desil'][4]['kecamatan'], round($persen5,1),false],
                    [$desil['desil'][5]['kecamatan'], round($persen6,1),false],
                    [$desil['desil'][6]['kecamatan'], round($persen7,1),false],
                    [$desil['desil'][7]['kecamatan'], round($persen8,1),false],
                    [$desil['desil'][8]['kecamatan'], round($persen9,1),false],
                    [$desil['desil'][9]['kecamatan'], round($persen10,1),false],
                    [$desil['desil'][10]['kecamatan'], round($persen11,1),false],
                    [$desil['desil'][11]['kecamatan'], round($persen12,1),false],
                    [$desil['desil'][12]['kecamatan'], round($persen13,1),false],
                    [$desil['desil'][13]['kecamatan'], round($persen14,1),false],
                    [$desil['desil'][14]['kecamatan'], round($persen15,1),false],
                    [$desil['desil'][15]['kecamatan'], round($persen16,1),false],

                ],
                // 'data'=>$datadesil1,
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
               $kecamatan1=$desil['desil'][0]['desil2'];
               $kecamatan2=$desil['desil'][1]['desil2'];
               $kecamatan3=$desil['desil'][2]['desil2'];
               $kecamatan4=$desil['desil'][3]['desil2'];
               $kecamatan5=$desil['desil'][4]['desil2'];
               $kecamatan6=$desil['desil'][5]['desil2'];
               $kecamatan7=$desil['desil'][6]['desil2'];
               $kecamatan8=$desil['desil'][7]['desil2'];
               $kecamatan9=$desil['desil'][8]['desil2'];
               $kecamatan10=$desil['desil'][9]['desil2'];
               $kecamatan11=$desil['desil'][10]['desil2'];
               $kecamatan12=$desil['desil'][11]['desil2'];
               $kecamatan13=$desil['desil'][12]['desil2'];
               $kecamatan14=$desil['desil'][13]['desil2'];
               $kecamatan15=$desil['desil'][14]['desil2'];
               $kecamatan16=$desil['desil'][15]['desil2'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16;
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
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Desil 2 Miskin Per Kecamatan Sekota Semarang'],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data' => [
                    [$desil['desil'][0]['kecamatan'], round($persen1,1),false],
                    [$desil['desil'][1]['kecamatan'], round($persen2,1),false],
                    [$desil['desil'][2]['kecamatan'], round($persen3,1),false],
                    [$desil['desil'][3]['kecamatan'], round($persen4,1),false],
                    [$desil['desil'][4]['kecamatan'], round($persen5,1),false],
                    [$desil['desil'][5]['kecamatan'], round($persen6,1),false],
                    [$desil['desil'][6]['kecamatan'], round($persen7,1),false],
                    [$desil['desil'][7]['kecamatan'], round($persen8,1),false],
                    [$desil['desil'][8]['kecamatan'], round($persen9,1),false],
                    [$desil['desil'][9]['kecamatan'], round($persen10,1),false],
                    [$desil['desil'][10]['kecamatan'], round($persen11,1),false],
                    [$desil['desil'][11]['kecamatan'], round($persen12,1),false],
                    [$desil['desil'][12]['kecamatan'], round($persen13,1),false],
                    [$desil['desil'][13]['kecamatan'], round($persen14,1),false],
                    [$desil['desil'][14]['kecamatan'], round($persen15,1),false],
                    [$desil['desil'][15]['kecamatan'], round($persen16,1),false],

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
               $kecamatan1=$desil['desil'][0]['desil3'];
               $kecamatan2=$desil['desil'][1]['desil3'];
               $kecamatan3=$desil['desil'][2]['desil3'];
               $kecamatan4=$desil['desil'][3]['desil3'];
               $kecamatan5=$desil['desil'][4]['desil3'];
               $kecamatan6=$desil['desil'][5]['desil3'];
               $kecamatan7=$desil['desil'][6]['desil3'];
               $kecamatan8=$desil['desil'][7]['desil3'];
               $kecamatan9=$desil['desil'][8]['desil3'];
               $kecamatan10=$desil['desil'][9]['desil3'];
               $kecamatan11=$desil['desil'][10]['desil3'];
               $kecamatan12=$desil['desil'][11]['desil3'];
               $kecamatan13=$desil['desil'][12]['desil3'];
               $kecamatan14=$desil['desil'][13]['desil3'];
               $kecamatan15=$desil['desil'][14]['desil3'];
               $kecamatan16=$desil['desil'][15]['desil3'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16;
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
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Desil 3 Miskin Per Kecamatan Sekota Semarang'],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data' => [
                    [$desil['desil'][0]['kecamatan'], round($persen1,1),false],
                    [$desil['desil'][1]['kecamatan'], round($persen2,1),false],
                    [$desil['desil'][2]['kecamatan'], round($persen3,1),false],
                    [$desil['desil'][3]['kecamatan'], round($persen4,1),false],
                    [$desil['desil'][4]['kecamatan'], round($persen5,1),false],
                    [$desil['desil'][5]['kecamatan'], round($persen6,1),false],
                    [$desil['desil'][6]['kecamatan'], round($persen7,1),false],
                    [$desil['desil'][7]['kecamatan'], round($persen8,1),false],
                    [$desil['desil'][8]['kecamatan'], round($persen9,1),false],
                    [$desil['desil'][9]['kecamatan'], round($persen10,1),false],
                    [$desil['desil'][10]['kecamatan'], round($persen11,1),false],
                    [$desil['desil'][11]['kecamatan'], round($persen12,1),false],
                    [$desil['desil'][12]['kecamatan'], round($persen13,1),false],
                    [$desil['desil'][13]['kecamatan'], round($persen14,1),false],
                    [$desil['desil'][14]['kecamatan'], round($persen15,1),false],
                    [$desil['desil'][15]['kecamatan'], round($persen16,1),false],

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
               $kecamatan1=$desil['desil'][0]['desil4'];
               $kecamatan2=$desil['desil'][1]['desil4'];
               $kecamatan3=$desil['desil'][2]['desil4'];
               $kecamatan4=$desil['desil'][3]['desil4'];
               $kecamatan5=$desil['desil'][4]['desil4'];
               $kecamatan6=$desil['desil'][5]['desil4'];
               $kecamatan7=$desil['desil'][6]['desil4'];
               $kecamatan8=$desil['desil'][7]['desil4'];
               $kecamatan9=$desil['desil'][8]['desil4'];
               $kecamatan10=$desil['desil'][9]['desil4'];
               $kecamatan11=$desil['desil'][10]['desil4'];
               $kecamatan12=$desil['desil'][11]['desil4'];
               $kecamatan13=$desil['desil'][12]['desil4'];
               $kecamatan14=$desil['desil'][13]['desil4'];
               $kecamatan15=$desil['desil'][14]['desil4'];
               $kecamatan16=$desil['desil'][15]['desil4'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16;
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
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Desil 4 Miskin Per Kecamatan Sekota Semarang'],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data' => [
                    [$desil['desil'][0]['kecamatan'], round($persen1,1),false],
                    [$desil['desil'][1]['kecamatan'], round($persen2,1),false],
                    [$desil['desil'][2]['kecamatan'], round($persen3,1),false],
                    [$desil['desil'][3]['kecamatan'], round($persen4,1),false],
                    [$desil['desil'][4]['kecamatan'], round($persen5,1),false],
                    [$desil['desil'][5]['kecamatan'], round($persen6,1),false],
                    [$desil['desil'][6]['kecamatan'], round($persen7,1),false],
                    [$desil['desil'][7]['kecamatan'], round($persen8,1),false],
                    [$desil['desil'][8]['kecamatan'], round($persen9,1),false],
                    [$desil['desil'][9]['kecamatan'], round($persen10,1),false],
                    [$desil['desil'][10]['kecamatan'], round($persen11,1),false],
                    [$desil['desil'][11]['kecamatan'], round($persen12,1),false],
                    [$desil['desil'][12]['kecamatan'], round($persen13,1),false],
                    [$desil['desil'][13]['kecamatan'], round($persen14,1),false],
                    [$desil['desil'][14]['kecamatan'], round($persen15,1),false],
                    [$desil['desil'][15]['kecamatan'], round($persen16,1),false],

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
               $kecamatan1=$desil['desil'][0]['desil4plus'];
               $kecamatan2=$desil['desil'][1]['desil4plus'];
               $kecamatan3=$desil['desil'][2]['desil4plus'];
               $kecamatan4=$desil['desil'][3]['desil4plus'];
               $kecamatan5=$desil['desil'][4]['desil4plus'];
               $kecamatan6=$desil['desil'][5]['desil4plus'];
               $kecamatan7=$desil['desil'][6]['desil4plus'];
               $kecamatan8=$desil['desil'][7]['desil4plus'];
               $kecamatan9=$desil['desil'][8]['desil4plus'];
               $kecamatan10=$desil['desil'][9]['desil4plus'];
               $kecamatan11=$desil['desil'][10]['desil4plus'];
               $kecamatan12=$desil['desil'][11]['desil4plus'];
               $kecamatan13=$desil['desil'][12]['desil4plus'];
               $kecamatan14=$desil['desil'][13]['desil4plus'];
               $kecamatan15=$desil['desil'][14]['desil4plus'];
               $kecamatan16=$desil['desil'][15]['desil4plus'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16;
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
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Desil 4 Plus Miskin Per Kecamatan Sekota Semarang'],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'allowPointSelect'=> true,
                'keys'=> ['name', 'y', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data' => [
                    [$desil['desil'][0]['kecamatan'], round($persen1,1),false],
                    [$desil['desil'][1]['kecamatan'], round($persen2,1),false],
                    [$desil['desil'][2]['kecamatan'], round($persen3,1),false],
                    [$desil['desil'][3]['kecamatan'], round($persen4,1),false],
                    [$desil['desil'][4]['kecamatan'], round($persen5,1),false],
                    [$desil['desil'][5]['kecamatan'], round($persen6,1),false],
                    [$desil['desil'][6]['kecamatan'], round($persen7,1),false],
                    [$desil['desil'][7]['kecamatan'], round($persen8,1),false],
                    [$desil['desil'][8]['kecamatan'], round($persen9,1),false],
                    [$desil['desil'][9]['kecamatan'], round($persen10,1),false],
                    [$desil['desil'][10]['kecamatan'], round($persen11,1),false],
                    [$desil['desil'][11]['kecamatan'], round($persen12,1),false],
                    [$desil['desil'][12]['kecamatan'], round($persen13,1),false],
                    [$desil['desil'][13]['kecamatan'], round($persen14,1),false],
                    [$desil['desil'][14]['kecamatan'], round($persen15,1),false],
                    [$desil['desil'][15]['kecamatan'], round($persen16,1),false],

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