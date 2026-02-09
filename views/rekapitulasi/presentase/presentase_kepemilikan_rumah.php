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
                            <h4 class="mb-lg"><?=$kepemilikan_rumah['title_pie']?></h4>

                          
                                        <?php
               $kecamatan1=$kepemilikan_rumah['kepemilikan_rumah'][0]['miliksendiri'];
               $kecamatan2=$kepemilikan_rumah['kepemilikan_rumah'][1]['miliksendiri'];
               $kecamatan3=$kepemilikan_rumah['kepemilikan_rumah'][2]['miliksendiri'];
               $kecamatan4=$kepemilikan_rumah['kepemilikan_rumah'][3]['miliksendiri'];
               $kecamatan5=$kepemilikan_rumah['kepemilikan_rumah'][4]['miliksendiri'];
               $kecamatan6=$kepemilikan_rumah['kepemilikan_rumah'][5]['miliksendiri'];
               $kecamatan7=$kepemilikan_rumah['kepemilikan_rumah'][6]['miliksendiri'];
               $kecamatan8=$kepemilikan_rumah['kepemilikan_rumah'][7]['miliksendiri'];
               $kecamatan9=$kepemilikan_rumah['kepemilikan_rumah'][8]['miliksendiri'];
               $kecamatan10=$kepemilikan_rumah['kepemilikan_rumah'][9]['miliksendiri'];
               $kecamatan11=$kepemilikan_rumah['kepemilikan_rumah'][10]['miliksendiri'];
               $kecamatan12=$kepemilikan_rumah['kepemilikan_rumah'][11]['miliksendiri'];
               $kecamatan13=$kepemilikan_rumah['kepemilikan_rumah'][12]['miliksendiri'];
               $kecamatan14=$kepemilikan_rumah['kepemilikan_rumah'][13]['miliksendiri'];
               $kecamatan15=$kepemilikan_rumah['kepemilikan_rumah'][14]['miliksendiri'];
               $kecamatan16=$kepemilikan_rumah['kepemilikan_rumah'][15]['miliksendiri'];
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
        'title' => ['text' => 'Presentase Kepemilikan Rumah Milik Sendiri Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
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
                    [$kepemilikan_rumah['kepemilikan_rumah'][0]['kecamatan'], round($persen1,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][1]['kecamatan'], round($persen2,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][2]['kecamatan'], round($persen3,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][3]['kecamatan'], round($persen4,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][4]['kecamatan'], round($persen5,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][5]['kecamatan'], round($persen6,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][6]['kecamatan'], round($persen7,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][7]['kecamatan'], round($persen8,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][8]['kecamatan'], round($persen9,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][9]['kecamatan'], round($persen10,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][10]['kecamatan'], round($persen11,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][11]['kecamatan'], round($persen12,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][12]['kecamatan'], round($persen13,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][13]['kecamatan'], round($persen14,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][14]['kecamatan'], round($persen15,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kepemilikan_rumah['kepemilikan_rumah'][0]['kontrak'];
               $kecamatan2=$kepemilikan_rumah['kepemilikan_rumah'][1]['kontrak'];
               $kecamatan3=$kepemilikan_rumah['kepemilikan_rumah'][2]['kontrak'];
               $kecamatan4=$kepemilikan_rumah['kepemilikan_rumah'][3]['kontrak'];
               $kecamatan5=$kepemilikan_rumah['kepemilikan_rumah'][4]['kontrak'];
               $kecamatan6=$kepemilikan_rumah['kepemilikan_rumah'][5]['kontrak'];
               $kecamatan7=$kepemilikan_rumah['kepemilikan_rumah'][6]['kontrak'];
               $kecamatan8=$kepemilikan_rumah['kepemilikan_rumah'][7]['kontrak'];
               $kecamatan9=$kepemilikan_rumah['kepemilikan_rumah'][8]['kontrak'];
               $kecamatan10=$kepemilikan_rumah['kepemilikan_rumah'][9]['kontrak'];
               $kecamatan11=$kepemilikan_rumah['kepemilikan_rumah'][10]['kontrak'];
               $kecamatan12=$kepemilikan_rumah['kepemilikan_rumah'][11]['kontrak'];
               $kecamatan13=$kepemilikan_rumah['kepemilikan_rumah'][12]['kontrak'];
               $kecamatan14=$kepemilikan_rumah['kepemilikan_rumah'][13]['kontrak'];
               $kecamatan15=$kepemilikan_rumah['kepemilikan_rumah'][14]['kontrak'];
               $kecamatan16=$kepemilikan_rumah['kepemilikan_rumah'][15]['kontrak'];
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
        'title' => ['text' => 'Presentase Kepemilikan Rumah Kontrak Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
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
                    [$kepemilikan_rumah['kepemilikan_rumah'][0]['kecamatan'], round($persen1,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][1]['kecamatan'], round($persen2,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][2]['kecamatan'], round($persen3,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][3]['kecamatan'], round($persen4,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][4]['kecamatan'], round($persen5,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][5]['kecamatan'], round($persen6,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][6]['kecamatan'], round($persen7,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][7]['kecamatan'], round($persen8,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][8]['kecamatan'], round($persen9,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][9]['kecamatan'], round($persen10,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][10]['kecamatan'], round($persen11,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][11]['kecamatan'], round($persen12,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][12]['kecamatan'], round($persen13,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][13]['kecamatan'], round($persen14,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][14]['kecamatan'], round($persen15,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kepemilikan_rumah['kepemilikan_rumah'][0]['bebas'];
               $kecamatan2=$kepemilikan_rumah['kepemilikan_rumah'][1]['bebas'];
               $kecamatan3=$kepemilikan_rumah['kepemilikan_rumah'][2]['bebas'];
               $kecamatan4=$kepemilikan_rumah['kepemilikan_rumah'][3]['bebas'];
               $kecamatan5=$kepemilikan_rumah['kepemilikan_rumah'][4]['bebas'];
               $kecamatan6=$kepemilikan_rumah['kepemilikan_rumah'][5]['bebas'];
               $kecamatan7=$kepemilikan_rumah['kepemilikan_rumah'][6]['bebas'];
               $kecamatan8=$kepemilikan_rumah['kepemilikan_rumah'][7]['bebas'];
               $kecamatan9=$kepemilikan_rumah['kepemilikan_rumah'][8]['bebas'];
               $kecamatan10=$kepemilikan_rumah['kepemilikan_rumah'][9]['bebas'];
               $kecamatan11=$kepemilikan_rumah['kepemilikan_rumah'][10]['bebas'];
               $kecamatan12=$kepemilikan_rumah['kepemilikan_rumah'][11]['bebas'];
               $kecamatan13=$kepemilikan_rumah['kepemilikan_rumah'][12]['bebas'];
               $kecamatan14=$kepemilikan_rumah['kepemilikan_rumah'][13]['bebas'];
               $kecamatan15=$kepemilikan_rumah['kepemilikan_rumah'][14]['bebas'];
               $kecamatan16=$kepemilikan_rumah['kepemilikan_rumah'][15]['bebas'];
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
        'title' => ['text' => 'Presentase Kepemilikan Rumah Bebas Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
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
                    [$kepemilikan_rumah['kepemilikan_rumah'][0]['kecamatan'], round($persen1,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][1]['kecamatan'], round($persen2,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][2]['kecamatan'], round($persen3,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][3]['kecamatan'], round($persen4,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][4]['kecamatan'], round($persen5,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][5]['kecamatan'], round($persen6,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][6]['kecamatan'], round($persen7,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][7]['kecamatan'], round($persen8,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][8]['kecamatan'], round($persen9,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][9]['kecamatan'], round($persen10,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][10]['kecamatan'], round($persen11,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][11]['kecamatan'], round($persen12,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][12]['kecamatan'], round($persen13,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][13]['kecamatan'], round($persen14,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][14]['kecamatan'], round($persen15,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kepemilikan_rumah['kepemilikan_rumah'][0]['dinas'];
               $kecamatan2=$kepemilikan_rumah['kepemilikan_rumah'][1]['dinas'];
               $kecamatan3=$kepemilikan_rumah['kepemilikan_rumah'][2]['dinas'];
               $kecamatan4=$kepemilikan_rumah['kepemilikan_rumah'][3]['dinas'];
               $kecamatan5=$kepemilikan_rumah['kepemilikan_rumah'][4]['dinas'];
               $kecamatan6=$kepemilikan_rumah['kepemilikan_rumah'][5]['dinas'];
               $kecamatan7=$kepemilikan_rumah['kepemilikan_rumah'][6]['dinas'];
               $kecamatan8=$kepemilikan_rumah['kepemilikan_rumah'][7]['dinas'];
               $kecamatan9=$kepemilikan_rumah['kepemilikan_rumah'][8]['dinas'];
               $kecamatan10=$kepemilikan_rumah['kepemilikan_rumah'][9]['dinas'];
               $kecamatan11=$kepemilikan_rumah['kepemilikan_rumah'][10]['dinas'];
               $kecamatan12=$kepemilikan_rumah['kepemilikan_rumah'][11]['dinas'];
               $kecamatan13=$kepemilikan_rumah['kepemilikan_rumah'][12]['dinas'];
               $kecamatan14=$kepemilikan_rumah['kepemilikan_rumah'][13]['dinas'];
               $kecamatan15=$kepemilikan_rumah['kepemilikan_rumah'][14]['dinas'];
               $kecamatan16=$kepemilikan_rumah['kepemilikan_rumah'][15]['dinas'];
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
        'title' => ['text' => 'Presentase Kepemilikan Rumah Dinas Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
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
                    [$kepemilikan_rumah['kepemilikan_rumah'][0]['kecamatan'], round($persen1,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][1]['kecamatan'], round($persen2,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][2]['kecamatan'], round($persen3,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][3]['kecamatan'], round($persen4,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][4]['kecamatan'], round($persen5,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][5]['kecamatan'], round($persen6,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][6]['kecamatan'], round($persen7,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][7]['kecamatan'], round($persen8,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][8]['kecamatan'], round($persen9,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][9]['kecamatan'], round($persen10,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][10]['kecamatan'], round($persen11,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][11]['kecamatan'], round($persen12,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][12]['kecamatan'], round($persen13,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][13]['kecamatan'], round($persen14,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][14]['kecamatan'], round($persen15,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kepemilikan_rumah['kepemilikan_rumah'][0]['lainnya'];
               $kecamatan2=$kepemilikan_rumah['kepemilikan_rumah'][1]['lainnya'];
               $kecamatan3=$kepemilikan_rumah['kepemilikan_rumah'][2]['lainnya'];
               $kecamatan4=$kepemilikan_rumah['kepemilikan_rumah'][3]['lainnya'];
               $kecamatan5=$kepemilikan_rumah['kepemilikan_rumah'][4]['lainnya'];
               $kecamatan6=$kepemilikan_rumah['kepemilikan_rumah'][5]['lainnya'];
               $kecamatan7=$kepemilikan_rumah['kepemilikan_rumah'][6]['lainnya'];
               $kecamatan8=$kepemilikan_rumah['kepemilikan_rumah'][7]['lainnya'];
               $kecamatan9=$kepemilikan_rumah['kepemilikan_rumah'][8]['lainnya'];
               $kecamatan10=$kepemilikan_rumah['kepemilikan_rumah'][9]['lainnya'];
               $kecamatan11=$kepemilikan_rumah['kepemilikan_rumah'][10]['lainnya'];
               $kecamatan12=$kepemilikan_rumah['kepemilikan_rumah'][11]['lainnya'];
               $kecamatan13=$kepemilikan_rumah['kepemilikan_rumah'][12]['lainnya'];
               $kecamatan14=$kepemilikan_rumah['kepemilikan_rumah'][13]['lainnya'];
               $kecamatan15=$kepemilikan_rumah['kepemilikan_rumah'][14]['lainnya'];
               $kecamatan16=$kepemilikan_rumah['kepemilikan_rumah'][15]['lainnya'];
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
        'title' => ['text' => 'Presentase Kepemilikan Rumah Lainnya Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
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
                    [$kepemilikan_rumah['kepemilikan_rumah'][0]['kecamatan'], round($persen1,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][1]['kecamatan'], round($persen2,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][2]['kecamatan'], round($persen3,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][3]['kecamatan'], round($persen4,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][4]['kecamatan'], round($persen5,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][5]['kecamatan'], round($persen6,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][6]['kecamatan'], round($persen7,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][7]['kecamatan'], round($persen8,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][8]['kecamatan'], round($persen9,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][9]['kecamatan'], round($persen10,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][10]['kecamatan'], round($persen11,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][11]['kecamatan'], round($persen12,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][12]['kecamatan'], round($persen13,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][13]['kecamatan'], round($persen14,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][14]['kecamatan'], round($persen15,1),false],
                    [$kepemilikan_rumah['kepemilikan_rumah'][15]['kecamatan'], round($persen16,1),false],
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
            