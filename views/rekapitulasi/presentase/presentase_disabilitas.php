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
                            <h4 class="mb-lg"><?=$disabilitas['title_pie']?></h4>

                            
                                        <?php
               $kecamatan1=$disabilitas['disabilitas'][0]['tunadaksa'];
               $kecamatan2=$disabilitas['disabilitas'][1]['tunadaksa'];
               $kecamatan3=$disabilitas['disabilitas'][2]['tunadaksa'];
               $kecamatan4=$disabilitas['disabilitas'][3]['tunadaksa'];
               $kecamatan5=$disabilitas['disabilitas'][4]['tunadaksa'];
               $kecamatan6=$disabilitas['disabilitas'][5]['tunadaksa'];
               $kecamatan7=$disabilitas['disabilitas'][6]['tunadaksa'];
               $kecamatan8=$disabilitas['disabilitas'][7]['tunadaksa'];
               $kecamatan9=$disabilitas['disabilitas'][8]['tunadaksa'];
               $kecamatan10=$disabilitas['disabilitas'][9]['tunadaksa'];
               $kecamatan11=$disabilitas['disabilitas'][10]['tunadaksa'];
               $kecamatan12=$disabilitas['disabilitas'][11]['tunadaksa'];
               $kecamatan13=$disabilitas['disabilitas'][12]['tunadaksa'];
               $kecamatan14=$disabilitas['disabilitas'][13]['tunadaksa'];
               $kecamatan15=$disabilitas['disabilitas'][14]['tunadaksa'];
               $kecamatan16=$disabilitas['disabilitas'][15]['tunadaksa'];
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
               $persen16=($kecamatan15/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Disabilitas Tunadaksa Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
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
                'keys'=> ['name', 'y', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data' => [
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$disabilitas['disabilitas'][0]['tunanetra'];
               $kecamatan2=$disabilitas['disabilitas'][1]['tunanetra'];
               $kecamatan3=$disabilitas['disabilitas'][2]['tunanetra'];
               $kecamatan4=$disabilitas['disabilitas'][3]['tunanetra'];
               $kecamatan5=$disabilitas['disabilitas'][4]['tunanetra'];
               $kecamatan6=$disabilitas['disabilitas'][5]['tunanetra'];
               $kecamatan7=$disabilitas['disabilitas'][6]['tunanetra'];
               $kecamatan8=$disabilitas['disabilitas'][7]['tunanetra'];
               $kecamatan9=$disabilitas['disabilitas'][8]['tunanetra'];
               $kecamatan10=$disabilitas['disabilitas'][9]['tunanetra'];
               $kecamatan11=$disabilitas['disabilitas'][10]['tunanetra'];
               $kecamatan12=$disabilitas['disabilitas'][11]['tunanetra'];
               $kecamatan13=$disabilitas['disabilitas'][12]['tunanetra'];
               $kecamatan14=$disabilitas['disabilitas'][13]['tunanetra'];
               $kecamatan15=$disabilitas['disabilitas'][14]['tunanetra'];
               $kecamatan16=$disabilitas['disabilitas'][15]['tunanetra'];
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
        'title' => ['text' => 'Presentase Disabilitas Tunanetra Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$disabilitas['disabilitas'][0]['tunarungu'];
               $kecamatan2=$disabilitas['disabilitas'][1]['tunarungu'];
               $kecamatan3=$disabilitas['disabilitas'][2]['tunarungu'];
               $kecamatan4=$disabilitas['disabilitas'][3]['tunarungu'];
               $kecamatan5=$disabilitas['disabilitas'][4]['tunarungu'];
               $kecamatan6=$disabilitas['disabilitas'][5]['tunarungu'];
               $kecamatan7=$disabilitas['disabilitas'][6]['tunarungu'];
               $kecamatan8=$disabilitas['disabilitas'][7]['tunarungu'];
               $kecamatan9=$disabilitas['disabilitas'][8]['tunarungu'];
               $kecamatan10=$disabilitas['disabilitas'][9]['tunarungu'];
               $kecamatan11=$disabilitas['disabilitas'][10]['tunarungu'];
               $kecamatan12=$disabilitas['disabilitas'][11]['tunarungu'];
               $kecamatan13=$disabilitas['disabilitas'][12]['tunarungu'];
               $kecamatan14=$disabilitas['disabilitas'][13]['tunarungu'];
               $kecamatan15=$disabilitas['disabilitas'][14]['tunarungu'];
               $kecamatan16=$disabilitas['disabilitas'][15]['tunarungu'];
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
        'title' => ['text' => 'Presentase Disabilitas Tunarungu Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen15,1),false],
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
<div class="tab-pane tab-pane-navigation" id="tabspiedisabilitas4">
              <?php
               $kecamatan1=$disabilitas['disabilitas'][0]['tunawicara'];
               $kecamatan2=$disabilitas['disabilitas'][1]['tunawicara'];
               $kecamatan3=$disabilitas['disabilitas'][2]['tunawicara'];
               $kecamatan4=$disabilitas['disabilitas'][3]['tunawicara'];
               $kecamatan5=$disabilitas['disabilitas'][4]['tunawicara'];
               $kecamatan6=$disabilitas['disabilitas'][5]['tunawicara'];
               $kecamatan7=$disabilitas['disabilitas'][6]['tunawicara'];
               $kecamatan8=$disabilitas['disabilitas'][7]['tunawicara'];
               $kecamatan9=$disabilitas['disabilitas'][8]['tunawicara'];
               $kecamatan10=$disabilitas['disabilitas'][9]['tunawicara'];
               $kecamatan11=$disabilitas['disabilitas'][10]['tunawicara'];
               $kecamatan12=$disabilitas['disabilitas'][11]['tunawicara'];
               $kecamatan13=$disabilitas['disabilitas'][12]['tunawicara'];
               $kecamatan14=$disabilitas['disabilitas'][13]['tunawicara'];
               $kecamatan15=$disabilitas['disabilitas'][14]['tunawicara'];
               $kecamatan16=$disabilitas['disabilitas'][15]['tunawicara'];
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
        'title' => ['text' => 'Presentase Disabilitas Tunawicara Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$disabilitas['disabilitas'][0]['tunarunguwicara'];
               $kecamatan2=$disabilitas['disabilitas'][1]['tunarunguwicara'];
               $kecamatan3=$disabilitas['disabilitas'][2]['tunarunguwicara'];
               $kecamatan4=$disabilitas['disabilitas'][3]['tunarunguwicara'];
               $kecamatan5=$disabilitas['disabilitas'][4]['tunarunguwicara'];
               $kecamatan6=$disabilitas['disabilitas'][5]['tunarunguwicara'];
               $kecamatan7=$disabilitas['disabilitas'][6]['tunarunguwicara'];
               $kecamatan8=$disabilitas['disabilitas'][7]['tunarunguwicara'];
               $kecamatan9=$disabilitas['disabilitas'][8]['tunarunguwicara'];
               $kecamatan10=$disabilitas['disabilitas'][9]['tunarunguwicara'];
               $kecamatan11=$disabilitas['disabilitas'][10]['tunarunguwicara'];
               $kecamatan12=$disabilitas['disabilitas'][11]['tunarunguwicara'];
               $kecamatan13=$disabilitas['disabilitas'][12]['tunarunguwicara'];
               $kecamatan14=$disabilitas['disabilitas'][13]['tunarunguwicara'];
               $kecamatan15=$disabilitas['disabilitas'][14]['tunarunguwicara'];
               $kecamatan16=$disabilitas['disabilitas'][15]['tunarunguwicara'];
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
        'title' => ['text' => 'Presentase Disabilitas Tunarunguwicara Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$disabilitas['disabilitas'][0]['tunanetracacat'];
               $kecamatan2=$disabilitas['disabilitas'][1]['tunanetracacat'];
               $kecamatan3=$disabilitas['disabilitas'][2]['tunanetracacat'];
               $kecamatan4=$disabilitas['disabilitas'][3]['tunanetracacat'];
               $kecamatan5=$disabilitas['disabilitas'][4]['tunanetracacat'];
               $kecamatan6=$disabilitas['disabilitas'][5]['tunanetracacat'];
               $kecamatan7=$disabilitas['disabilitas'][6]['tunanetracacat'];
               $kecamatan8=$disabilitas['disabilitas'][7]['tunanetracacat'];
               $kecamatan9=$disabilitas['disabilitas'][8]['tunanetracacat'];
               $kecamatan10=$disabilitas['disabilitas'][9]['tunanetracacat'];
               $kecamatan11=$disabilitas['disabilitas'][10]['tunanetracacat'];
               $kecamatan12=$disabilitas['disabilitas'][11]['tunanetracacat'];
               $kecamatan13=$disabilitas['disabilitas'][12]['tunanetracacat'];
               $kecamatan14=$disabilitas['disabilitas'][13]['tunanetracacat'];
               $kecamatan15=$disabilitas['disabilitas'][14]['tunanetracacat'];
               $kecamatan16=$disabilitas['disabilitas'][15]['tunanetracacat'];
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
        'title' => ['text' => 'Presentase Disabilitas Tunanetracacat Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
<div class="tab-pane tab-pane-navigation" id="tabspiedisabilitas7">
              <?php
               $kecamatan1=$disabilitas['disabilitas'][0]['tunanetrarunguwicara'];
               $kecamatan2=$disabilitas['disabilitas'][1]['tunanetrarunguwicara'];
               $kecamatan3=$disabilitas['disabilitas'][2]['tunanetrarunguwicara'];
               $kecamatan4=$disabilitas['disabilitas'][3]['tunanetrarunguwicara'];
               $kecamatan5=$disabilitas['disabilitas'][4]['tunanetrarunguwicara'];
               $kecamatan6=$disabilitas['disabilitas'][5]['tunanetrarunguwicara'];
               $kecamatan7=$disabilitas['disabilitas'][6]['tunanetrarunguwicara'];
               $kecamatan8=$disabilitas['disabilitas'][7]['tunanetrarunguwicara'];
               $kecamatan9=$disabilitas['disabilitas'][8]['tunanetrarunguwicara'];
               $kecamatan10=$disabilitas['disabilitas'][9]['tunanetrarunguwicara'];
               $kecamatan11=$disabilitas['disabilitas'][10]['tunanetrarunguwicara'];
               $kecamatan12=$disabilitas['disabilitas'][11]['tunanetrarunguwicara'];
               $kecamatan13=$disabilitas['disabilitas'][12]['tunanetrarunguwicara'];
               $kecamatan14=$disabilitas['disabilitas'][13]['tunanetrarunguwicara'];
               $kecamatan15=$disabilitas['disabilitas'][14]['tunanetrarunguwicara'];
               $kecamatan16=$disabilitas['disabilitas'][15]['tunanetrarunguwicara'];
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
        'title' => ['text' => 'Presentase Disabilitas Tunanetrarunguwicara Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$disabilitas['disabilitas'][0]['tunarunguwicaracacat'];
               $kecamatan2=$disabilitas['disabilitas'][1]['tunarunguwicaracacat'];
               $kecamatan3=$disabilitas['disabilitas'][2]['tunarunguwicaracacat'];
               $kecamatan4=$disabilitas['disabilitas'][3]['tunarunguwicaracacat'];
               $kecamatan5=$disabilitas['disabilitas'][4]['tunarunguwicaracacat'];
               $kecamatan6=$disabilitas['disabilitas'][5]['tunarunguwicaracacat'];
               $kecamatan7=$disabilitas['disabilitas'][6]['tunarunguwicaracacat'];
               $kecamatan8=$disabilitas['disabilitas'][7]['tunarunguwicaracacat'];
               $kecamatan9=$disabilitas['disabilitas'][8]['tunarunguwicaracacat'];
               $kecamatan10=$disabilitas['disabilitas'][9]['tunarunguwicaracacat'];
               $kecamatan11=$disabilitas['disabilitas'][10]['tunarunguwicaracacat'];
               $kecamatan12=$disabilitas['disabilitas'][11]['tunarunguwicaracacat'];
               $kecamatan13=$disabilitas['disabilitas'][12]['tunarunguwicaracacat'];
               $kecamatan14=$disabilitas['disabilitas'][13]['tunarunguwicaracacat'];
               $kecamatan15=$disabilitas['disabilitas'][14]['tunarunguwicaracacat'];
               $kecamatan16=$disabilitas['disabilitas'][15]['tunarunguwicaracacat'];
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
        'title' => ['text' => 'Presentase Disabilitas Tunarunguwicaracacat Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
<div class="tab-pane tab-pane-navigation" id="tabspiedisabilitas9">
              <?php
               $kecamatan1=$disabilitas['disabilitas'][0]['tunarunguwicaranetracacat'];
               $kecamatan2=$disabilitas['disabilitas'][1]['tunarunguwicaranetracacat'];
               $kecamatan3=$disabilitas['disabilitas'][2]['tunarunguwicaranetracacat'];
               $kecamatan4=$disabilitas['disabilitas'][3]['tunarunguwicaranetracacat'];
               $kecamatan5=$disabilitas['disabilitas'][4]['tunarunguwicaranetracacat'];
               $kecamatan6=$disabilitas['disabilitas'][5]['tunarunguwicaranetracacat'];
               $kecamatan7=$disabilitas['disabilitas'][6]['tunarunguwicaranetracacat'];
               $kecamatan8=$disabilitas['disabilitas'][7]['tunarunguwicaranetracacat'];
               $kecamatan9=$disabilitas['disabilitas'][8]['tunarunguwicaranetracacat'];
               $kecamatan10=$disabilitas['disabilitas'][9]['tunarunguwicaranetracacat'];
               $kecamatan11=$disabilitas['disabilitas'][10]['tunarunguwicaranetracacat'];
               $kecamatan12=$disabilitas['disabilitas'][11]['tunarunguwicaranetracacat'];
               $kecamatan13=$disabilitas['disabilitas'][12]['tunarunguwicaranetracacat'];
               $kecamatan14=$disabilitas['disabilitas'][13]['tunarunguwicaranetracacat'];
               $kecamatan15=$disabilitas['disabilitas'][14]['tunarunguwicaranetracacat'];
               $kecamatan16=$disabilitas['disabilitas'][15]['tunarunguwicaranetracacat'];
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
        'title' => ['text' => 'Presentase Disabilitas Tunarunguwicaranetracacat Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$disabilitas['disabilitas'][0]['cacatmental'];
               $kecamatan2=$disabilitas['disabilitas'][1]['cacatmental'];
               $kecamatan3=$disabilitas['disabilitas'][2]['cacatmental'];
               $kecamatan4=$disabilitas['disabilitas'][3]['cacatmental'];
               $kecamatan5=$disabilitas['disabilitas'][4]['cacatmental'];
               $kecamatan6=$disabilitas['disabilitas'][5]['cacatmental'];
               $kecamatan7=$disabilitas['disabilitas'][6]['cacatmental'];
               $kecamatan8=$disabilitas['disabilitas'][7]['cacatmental'];
               $kecamatan9=$disabilitas['disabilitas'][8]['cacatmental'];
               $kecamatan10=$disabilitas['disabilitas'][9]['cacatmental'];
               $kecamatan11=$disabilitas['disabilitas'][10]['cacatmental'];
               $kecamatan12=$disabilitas['disabilitas'][11]['cacatmental'];
               $kecamatan13=$disabilitas['disabilitas'][12]['cacatmental'];
               $kecamatan14=$disabilitas['disabilitas'][13]['cacatmental'];
               $kecamatan15=$disabilitas['disabilitas'][14]['cacatmental'];
               $kecamatan16=$disabilitas['disabilitas'][15]['cacatmental'];
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
        'title' => ['text' => 'Presentase Disabilitas Cacatmental Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$disabilitas['disabilitas'][0]['mantangangguanjiwa'];
               $kecamatan2=$disabilitas['disabilitas'][1]['mantangangguanjiwa'];
               $kecamatan3=$disabilitas['disabilitas'][2]['mantangangguanjiwa'];
               $kecamatan4=$disabilitas['disabilitas'][3]['mantangangguanjiwa'];
               $kecamatan5=$disabilitas['disabilitas'][4]['mantangangguanjiwa'];
               $kecamatan6=$disabilitas['disabilitas'][5]['mantangangguanjiwa'];
               $kecamatan7=$disabilitas['disabilitas'][6]['mantangangguanjiwa'];
               $kecamatan8=$disabilitas['disabilitas'][7]['mantangangguanjiwa'];
               $kecamatan9=$disabilitas['disabilitas'][8]['mantangangguanjiwa'];
               $kecamatan10=$disabilitas['disabilitas'][9]['mantangangguanjiwa'];
               $kecamatan11=$disabilitas['disabilitas'][10]['mantangangguanjiwa'];
               $kecamatan12=$disabilitas['disabilitas'][11]['mantangangguanjiwa'];
               $kecamatan13=$disabilitas['disabilitas'][12]['mantangangguanjiwa'];
               $kecamatan14=$disabilitas['disabilitas'][13]['mantangangguanjiwa'];
               $kecamatan15=$disabilitas['disabilitas'][14]['mantangangguanjiwa'];
               $kecamatan16=$disabilitas['disabilitas'][15]['mantangangguanjiwa'];
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
        'title' => ['text' => 'Presentase Disabilitas Mantangangguanjiwa Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$disabilitas['disabilitas'][0]['cacatfisikmental'];
               $kecamatan2=$disabilitas['disabilitas'][1]['cacatfisikmental'];
               $kecamatan3=$disabilitas['disabilitas'][2]['cacatfisikmental'];
               $kecamatan4=$disabilitas['disabilitas'][3]['cacatfisikmental'];
               $kecamatan5=$disabilitas['disabilitas'][4]['cacatfisikmental'];
               $kecamatan6=$disabilitas['disabilitas'][5]['cacatfisikmental'];
               $kecamatan7=$disabilitas['disabilitas'][6]['cacatfisikmental'];
               $kecamatan8=$disabilitas['disabilitas'][7]['cacatfisikmental'];
               $kecamatan9=$disabilitas['disabilitas'][8]['cacatfisikmental'];
               $kecamatan10=$disabilitas['disabilitas'][9]['cacatfisikmental'];
               $kecamatan11=$disabilitas['disabilitas'][10]['cacatfisikmental'];
               $kecamatan12=$disabilitas['disabilitas'][11]['cacatfisikmental'];
               $kecamatan13=$disabilitas['disabilitas'][12]['cacatfisikmental'];
               $kecamatan14=$disabilitas['disabilitas'][13]['cacatfisikmental'];
               $kecamatan15=$disabilitas['disabilitas'][14]['cacatfisikmental'];
               $kecamatan16=$disabilitas['disabilitas'][15]['cacatfisikmental'];
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
        'title' => ['text' => 'Presentase Disabilitas Cacatfisikmental Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$disabilitas['disabilitas'][0]['totalcacat'];
               $kecamatan2=$disabilitas['disabilitas'][1]['totalcacat'];
               $kecamatan3=$disabilitas['disabilitas'][2]['totalcacat'];
               $kecamatan4=$disabilitas['disabilitas'][3]['totalcacat'];
               $kecamatan5=$disabilitas['disabilitas'][4]['totalcacat'];
               $kecamatan6=$disabilitas['disabilitas'][5]['totalcacat'];
               $kecamatan7=$disabilitas['disabilitas'][6]['totalcacat'];
               $kecamatan8=$disabilitas['disabilitas'][7]['totalcacat'];
               $kecamatan9=$disabilitas['disabilitas'][8]['totalcacat'];
               $kecamatan10=$disabilitas['disabilitas'][9]['totalcacat'];
               $kecamatan11=$disabilitas['disabilitas'][10]['totalcacat'];
               $kecamatan12=$disabilitas['disabilitas'][11]['totalcacat'];
               $kecamatan13=$disabilitas['disabilitas'][12]['totalcacat'];
               $kecamatan14=$disabilitas['disabilitas'][13]['totalcacat'];
               $kecamatan15=$disabilitas['disabilitas'][14]['totalcacat'];
               $kecamatan16=$disabilitas['disabilitas'][15]['totalcacat'];
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
        'title' => ['text' => 'Presentase Disabilitas Totalcacat Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
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
                    [$disabilitas['disabilitas'][0]['kecamatan'], round($persen1,1),false],
                    [$disabilitas['disabilitas'][1]['kecamatan'], round($persen2,1),false],
                    [$disabilitas['disabilitas'][2]['kecamatan'], round($persen3,1),false],
                    [$disabilitas['disabilitas'][3]['kecamatan'], round($persen4,1),false],
                    [$disabilitas['disabilitas'][4]['kecamatan'], round($persen5,1),false],
                    [$disabilitas['disabilitas'][5]['kecamatan'], round($persen6,1),false],
                    [$disabilitas['disabilitas'][6]['kecamatan'], round($persen7,1),false],
                    [$disabilitas['disabilitas'][7]['kecamatan'], round($persen8,1),false],
                    [$disabilitas['disabilitas'][8]['kecamatan'], round($persen9,1),false],
                    [$disabilitas['disabilitas'][9]['kecamatan'], round($persen10,1),false],
                    [$disabilitas['disabilitas'][10]['kecamatan'], round($persen11,1),false],
                    [$disabilitas['disabilitas'][11]['kecamatan'], round($persen12,1),false],
                    [$disabilitas['disabilitas'][12]['kecamatan'], round($persen13,1),false],
                    [$disabilitas['disabilitas'][13]['kecamatan'], round($persen14,1),false],
                    [$disabilitas['disabilitas'][14]['kecamatan'], round($persen15,1),false],
                    [$disabilitas['disabilitas'][15]['kecamatan'], round($persen15,1),false],
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
     >