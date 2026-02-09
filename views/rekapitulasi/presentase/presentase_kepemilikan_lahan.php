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
                            <h4 class="mb-lg"><?=$kepemilikan_lahan['title_pie']?></h4>

                      
                                        <?php
               $kecamatan1=$kepemilikan_lahan['kepemilikan_lahan'][0]['miliksendiri'];
               $kecamatan2=$kepemilikan_lahan['kepemilikan_lahan'][1]['miliksendiri'];
               $kecamatan3=$kepemilikan_lahan['kepemilikan_lahan'][2]['miliksendiri'];
               $kecamatan4=$kepemilikan_lahan['kepemilikan_lahan'][3]['miliksendiri'];
               $kecamatan5=$kepemilikan_lahan['kepemilikan_lahan'][4]['miliksendiri'];
               $kecamatan6=$kepemilikan_lahan['kepemilikan_lahan'][5]['miliksendiri'];
               $kecamatan7=$kepemilikan_lahan['kepemilikan_lahan'][6]['miliksendiri'];
               $kecamatan8=$kepemilikan_lahan['kepemilikan_lahan'][7]['miliksendiri'];
               $kecamatan9=$kepemilikan_lahan['kepemilikan_lahan'][8]['miliksendiri'];
               $kecamatan10=$kepemilikan_lahan['kepemilikan_lahan'][9]['miliksendiri'];
               $kecamatan11=$kepemilikan_lahan['kepemilikan_lahan'][10]['miliksendiri'];
               $kecamatan12=$kepemilikan_lahan['kepemilikan_lahan'][11]['miliksendiri'];
               $kecamatan13=$kepemilikan_lahan['kepemilikan_lahan'][12]['miliksendiri'];
               $kecamatan14=$kepemilikan_lahan['kepemilikan_lahan'][13]['miliksendiri'];
               $kecamatan15=$kepemilikan_lahan['kepemilikan_lahan'][14]['miliksendiri'];
               $kecamatan16=$kepemilikan_lahan['kepemilikan_lahan'][15]['miliksendiri'];
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
        'title' => ['text' => 'Presentase Kepemilikan Lahan Milik Sendiri Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kepemilikan_lahan['subtitle']
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
                    [$kepemilikan_lahan['kepemilikan_lahan'][0]['kecamatan'], round($persen1,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][1]['kecamatan'], round($persen2,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][2]['kecamatan'], round($persen3,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][3]['kecamatan'], round($persen4,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][4]['kecamatan'], round($persen5,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][5]['kecamatan'], round($persen6,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][6]['kecamatan'], round($persen7,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][7]['kecamatan'], round($persen8,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][8]['kecamatan'], round($persen9,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][9]['kecamatan'], round($persen10,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][10]['kecamatan'], round($persen11,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][11]['kecamatan'], round($persen12,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][12]['kecamatan'], round($persen13,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][13]['kecamatan'], round($persen14,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][14]['kecamatan'], round($persen15,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kepemilikan_lahan['kepemilikan_lahan'][0]['milikorang'];
               $kecamatan2=$kepemilikan_lahan['kepemilikan_lahan'][1]['milikorang'];
               $kecamatan3=$kepemilikan_lahan['kepemilikan_lahan'][2]['milikorang'];
               $kecamatan4=$kepemilikan_lahan['kepemilikan_lahan'][3]['milikorang'];
               $kecamatan5=$kepemilikan_lahan['kepemilikan_lahan'][4]['milikorang'];
               $kecamatan6=$kepemilikan_lahan['kepemilikan_lahan'][5]['milikorang'];
               $kecamatan7=$kepemilikan_lahan['kepemilikan_lahan'][6]['milikorang'];
               $kecamatan8=$kepemilikan_lahan['kepemilikan_lahan'][7]['milikorang'];
               $kecamatan9=$kepemilikan_lahan['kepemilikan_lahan'][8]['milikorang'];
               $kecamatan10=$kepemilikan_lahan['kepemilikan_lahan'][9]['milikorang'];
               $kecamatan11=$kepemilikan_lahan['kepemilikan_lahan'][10]['milikorang'];
               $kecamatan12=$kepemilikan_lahan['kepemilikan_lahan'][11]['milikorang'];
               $kecamatan13=$kepemilikan_lahan['kepemilikan_lahan'][12]['milikorang'];
               $kecamatan14=$kepemilikan_lahan['kepemilikan_lahan'][13]['milikorang'];
               $kecamatan15=$kepemilikan_lahan['kepemilikan_lahan'][14]['milikorang'];
               $kecamatan16=$kepemilikan_lahan['kepemilikan_lahan'][15]['milikorang'];
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
        'title' => ['text' => 'Presentase Kepemilikan Lahan Milik Orang Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kepemilikan_lahan['subtitle']
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
                    [$kepemilikan_lahan['kepemilikan_lahan'][0]['kecamatan'], round($persen1,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][1]['kecamatan'], round($persen2,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][2]['kecamatan'], round($persen3,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][3]['kecamatan'], round($persen4,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][4]['kecamatan'], round($persen5,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][5]['kecamatan'], round($persen6,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][6]['kecamatan'], round($persen7,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][7]['kecamatan'], round($persen8,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][8]['kecamatan'], round($persen9,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][9]['kecamatan'], round($persen10,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][10]['kecamatan'], round($persen11,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][11]['kecamatan'], round($persen12,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][12]['kecamatan'], round($persen13,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][13]['kecamatan'], round($persen14,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][14]['kecamatan'], round($persen15,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kepemilikan_lahan['kepemilikan_lahan'][0]['tanahnegara'];
               $kecamatan2=$kepemilikan_lahan['kepemilikan_lahan'][1]['tanahnegara'];
               $kecamatan3=$kepemilikan_lahan['kepemilikan_lahan'][2]['tanahnegara'];
               $kecamatan4=$kepemilikan_lahan['kepemilikan_lahan'][3]['tanahnegara'];
               $kecamatan5=$kepemilikan_lahan['kepemilikan_lahan'][4]['tanahnegara'];
               $kecamatan6=$kepemilikan_lahan['kepemilikan_lahan'][5]['tanahnegara'];
               $kecamatan7=$kepemilikan_lahan['kepemilikan_lahan'][6]['tanahnegara'];
               $kecamatan8=$kepemilikan_lahan['kepemilikan_lahan'][7]['tanahnegara'];
               $kecamatan9=$kepemilikan_lahan['kepemilikan_lahan'][8]['tanahnegara'];
               $kecamatan10=$kepemilikan_lahan['kepemilikan_lahan'][9]['tanahnegara'];
               $kecamatan11=$kepemilikan_lahan['kepemilikan_lahan'][10]['tanahnegara'];
               $kecamatan12=$kepemilikan_lahan['kepemilikan_lahan'][11]['tanahnegara'];
               $kecamatan13=$kepemilikan_lahan['kepemilikan_lahan'][12]['tanahnegara'];
               $kecamatan14=$kepemilikan_lahan['kepemilikan_lahan'][13]['tanahnegara'];
               $kecamatan15=$kepemilikan_lahan['kepemilikan_lahan'][14]['tanahnegara'];
               $kecamatan16=$kepemilikan_lahan['kepemilikan_lahan'][15]['tanahnegara'];
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
               $persen15=($kecamatan16/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Kepemilikan Lahan Tanah Negara Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kepemilikan_lahan['subtitle']
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
                    [$kepemilikan_lahan['kepemilikan_lahan'][0]['kecamatan'], round($persen1,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][1]['kecamatan'], round($persen2,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][2]['kecamatan'], round($persen3,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][3]['kecamatan'], round($persen4,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][4]['kecamatan'], round($persen5,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][5]['kecamatan'], round($persen6,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][6]['kecamatan'], round($persen7,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][7]['kecamatan'], round($persen8,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][8]['kecamatan'], round($persen9,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][9]['kecamatan'], round($persen10,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][10]['kecamatan'], round($persen11,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][11]['kecamatan'], round($persen12,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][12]['kecamatan'], round($persen13,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][13]['kecamatan'], round($persen14,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][14]['kecamatan'], round($persen15,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kepemilikan_lahan['kepemilikan_lahan'][0]['lainnya'];
               $kecamatan2=$kepemilikan_lahan['kepemilikan_lahan'][1]['lainnya'];
               $kecamatan3=$kepemilikan_lahan['kepemilikan_lahan'][2]['lainnya'];
               $kecamatan4=$kepemilikan_lahan['kepemilikan_lahan'][3]['lainnya'];
               $kecamatan5=$kepemilikan_lahan['kepemilikan_lahan'][4]['lainnya'];
               $kecamatan6=$kepemilikan_lahan['kepemilikan_lahan'][5]['lainnya'];
               $kecamatan7=$kepemilikan_lahan['kepemilikan_lahan'][6]['lainnya'];
               $kecamatan8=$kepemilikan_lahan['kepemilikan_lahan'][7]['lainnya'];
               $kecamatan9=$kepemilikan_lahan['kepemilikan_lahan'][8]['lainnya'];
               $kecamatan10=$kepemilikan_lahan['kepemilikan_lahan'][9]['lainnya'];
               $kecamatan11=$kepemilikan_lahan['kepemilikan_lahan'][10]['lainnya'];
               $kecamatan12=$kepemilikan_lahan['kepemilikan_lahan'][11]['lainnya'];
               $kecamatan13=$kepemilikan_lahan['kepemilikan_lahan'][12]['lainnya'];
               $kecamatan14=$kepemilikan_lahan['kepemilikan_lahan'][13]['lainnya'];
               $kecamatan15=$kepemilikan_lahan['kepemilikan_lahan'][14]['lainnya'];
               $kecamatan16=$kepemilikan_lahan['kepemilikan_lahan'][15]['lainnya'];
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
        'title' => ['text' => 'Presentase Kepemilikan Lahan Lainnya Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kepemilikan_lahan['subtitle']
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
                    [$kepemilikan_lahan['kepemilikan_lahan'][0]['kecamatan'], round($persen1,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][1]['kecamatan'], round($persen2,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][2]['kecamatan'], round($persen3,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][3]['kecamatan'], round($persen4,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][4]['kecamatan'], round($persen5,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][5]['kecamatan'], round($persen6,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][6]['kecamatan'], round($persen7,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][7]['kecamatan'], round($persen8,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][8]['kecamatan'], round($persen9,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][9]['kecamatan'], round($persen10,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][10]['kecamatan'], round($persen11,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][11]['kecamatan'], round($persen12,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][12]['kecamatan'], round($persen13,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][13]['kecamatan'], round($persen14,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][14]['kecamatan'], round($persen15,1),false],
                    [$kepemilikan_lahan['kepemilikan_lahan'][15]['kecamatan'], round($persen16,1),false],
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
             