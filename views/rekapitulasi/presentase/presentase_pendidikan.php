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
                            <h4 class="mb-lg"><?=$pendidikan['title_pie']?></h4>

                                        <?php
               $kecamatan1=$pendidikan['pendidikan'][0]['sd'];
               $kecamatan2=$pendidikan['pendidikan'][1]['sd'];
               $kecamatan3=$pendidikan['pendidikan'][2]['sd'];
               $kecamatan4=$pendidikan['pendidikan'][3]['sd'];
               $kecamatan5=$pendidikan['pendidikan'][4]['sd'];
               $kecamatan6=$pendidikan['pendidikan'][5]['sd'];
               $kecamatan7=$pendidikan['pendidikan'][6]['sd'];
               $kecamatan8=$pendidikan['pendidikan'][7]['sd'];
               $kecamatan9=$pendidikan['pendidikan'][8]['sd'];
               $kecamatan10=$pendidikan['pendidikan'][9]['sd'];
               $kecamatan11=$pendidikan['pendidikan'][10]['sd'];
               $kecamatan12=$pendidikan['pendidikan'][11]['sd'];
               $kecamatan13=$pendidikan['pendidikan'][12]['sd'];
               $kecamatan14=$pendidikan['pendidikan'][13]['sd'];
               $kecamatan15=$pendidikan['pendidikan'][14]['sd'];
               $kecamatan16=$pendidikan['pendidikan'][15]['sd'];
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
        'title' => ['text' => 'Presentase Pendidikan SD Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
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
                    [$pendidikan['pendidikan'][0]['kecamatan'], round($persen1,1),false],
                    [$pendidikan['pendidikan'][1]['kecamatan'], round($persen2,1),false],
                    [$pendidikan['pendidikan'][2]['kecamatan'], round($persen3,1),false],
                    [$pendidikan['pendidikan'][3]['kecamatan'], round($persen4,1),false],
                    [$pendidikan['pendidikan'][4]['kecamatan'], round($persen5,1),false],
                    [$pendidikan['pendidikan'][5]['kecamatan'], round($persen6,1),false],
                    [$pendidikan['pendidikan'][6]['kecamatan'], round($persen7,1),false],
                    [$pendidikan['pendidikan'][7]['kecamatan'], round($persen8,1),false],
                    [$pendidikan['pendidikan'][8]['kecamatan'], round($persen9,1),false],
                    [$pendidikan['pendidikan'][9]['kecamatan'], round($persen10,1),false],
                    [$pendidikan['pendidikan'][10]['kecamatan'], round($persen11,1),false],
                    [$pendidikan['pendidikan'][11]['kecamatan'], round($persen12,1),false],
                    [$pendidikan['pendidikan'][12]['kecamatan'], round($persen13,1),false],
                    [$pendidikan['pendidikan'][13]['kecamatan'], round($persen14,1),false],
                    [$pendidikan['pendidikan'][14]['kecamatan'], round($persen15,1),false],
                    [$pendidikan['pendidikan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$pendidikan['pendidikan'][0]['sdtidak'];
               $kecamatan2=$pendidikan['pendidikan'][1]['sdtidak'];
               $kecamatan3=$pendidikan['pendidikan'][2]['sdtidak'];
               $kecamatan4=$pendidikan['pendidikan'][3]['sdtidak'];
               $kecamatan5=$pendidikan['pendidikan'][4]['sdtidak'];
               $kecamatan6=$pendidikan['pendidikan'][5]['sdtidak'];
               $kecamatan7=$pendidikan['pendidikan'][6]['sdtidak'];
               $kecamatan8=$pendidikan['pendidikan'][7]['sdtidak'];
               $kecamatan9=$pendidikan['pendidikan'][8]['sdtidak'];
               $kecamatan10=$pendidikan['pendidikan'][9]['sdtidak'];
               $kecamatan11=$pendidikan['pendidikan'][10]['sdtidak'];
               $kecamatan12=$pendidikan['pendidikan'][11]['sdtidak'];
               $kecamatan13=$pendidikan['pendidikan'][12]['sdtidak'];
               $kecamatan14=$pendidikan['pendidikan'][13]['sdtidak'];
               $kecamatan15=$pendidikan['pendidikan'][14]['sdtidak'];
               $kecamatan16=$pendidikan['pendidikan'][15]['sdtidak'];
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
        'title' => ['text' => 'Presentase Pendidikan SD Tidak Sekolah Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
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
                    [$pendidikan['pendidikan'][0]['kecamatan'], round($persen1,1),false],
                    [$pendidikan['pendidikan'][1]['kecamatan'], round($persen2,1),false],
                    [$pendidikan['pendidikan'][2]['kecamatan'], round($persen3,1),false],
                    [$pendidikan['pendidikan'][3]['kecamatan'], round($persen4,1),false],
                    [$pendidikan['pendidikan'][4]['kecamatan'], round($persen5,1),false],
                    [$pendidikan['pendidikan'][5]['kecamatan'], round($persen6,1),false],
                    [$pendidikan['pendidikan'][6]['kecamatan'], round($persen7,1),false],
                    [$pendidikan['pendidikan'][7]['kecamatan'], round($persen8,1),false],
                    [$pendidikan['pendidikan'][8]['kecamatan'], round($persen9,1),false],
                    [$pendidikan['pendidikan'][9]['kecamatan'], round($persen10,1),false],
                    [$pendidikan['pendidikan'][10]['kecamatan'], round($persen11,1),false],
                    [$pendidikan['pendidikan'][11]['kecamatan'], round($persen12,1),false],
                    [$pendidikan['pendidikan'][12]['kecamatan'], round($persen13,1),false],
                    [$pendidikan['pendidikan'][13]['kecamatan'], round($persen14,1),false],
                    [$pendidikan['pendidikan'][14]['kecamatan'], round($persen15,1),false],
                    [$pendidikan['pendidikan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$pendidikan['pendidikan'][0]['smp'];
               $kecamatan2=$pendidikan['pendidikan'][1]['smp'];
               $kecamatan3=$pendidikan['pendidikan'][2]['smp'];
               $kecamatan4=$pendidikan['pendidikan'][3]['smp'];
               $kecamatan5=$pendidikan['pendidikan'][4]['smp'];
               $kecamatan6=$pendidikan['pendidikan'][5]['smp'];
               $kecamatan7=$pendidikan['pendidikan'][6]['smp'];
               $kecamatan8=$pendidikan['pendidikan'][7]['smp'];
               $kecamatan9=$pendidikan['pendidikan'][8]['smp'];
               $kecamatan10=$pendidikan['pendidikan'][9]['smp'];
               $kecamatan11=$pendidikan['pendidikan'][10]['smp'];
               $kecamatan12=$pendidikan['pendidikan'][11]['smp'];
               $kecamatan13=$pendidikan['pendidikan'][12]['smp'];
               $kecamatan14=$pendidikan['pendidikan'][13]['smp'];
               $kecamatan15=$pendidikan['pendidikan'][14]['smp'];
               $kecamatan16=$pendidikan['pendidikan'][15]['smp'];
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
        'title' => ['text' => 'Presentase Pendidikan SMP Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
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
                    [$pendidikan['pendidikan'][0]['kecamatan'], round($persen1,1),false],
                    [$pendidikan['pendidikan'][1]['kecamatan'], round($persen2,1),false],
                    [$pendidikan['pendidikan'][2]['kecamatan'], round($persen3,1),false],
                    [$pendidikan['pendidikan'][3]['kecamatan'], round($persen4,1),false],
                    [$pendidikan['pendidikan'][4]['kecamatan'], round($persen5,1),false],
                    [$pendidikan['pendidikan'][5]['kecamatan'], round($persen6,1),false],
                    [$pendidikan['pendidikan'][6]['kecamatan'], round($persen7,1),false],
                    [$pendidikan['pendidikan'][7]['kecamatan'], round($persen8,1),false],
                    [$pendidikan['pendidikan'][8]['kecamatan'], round($persen9,1),false],
                    [$pendidikan['pendidikan'][9]['kecamatan'], round($persen10,1),false],
                    [$pendidikan['pendidikan'][10]['kecamatan'], round($persen11,1),false],
                    [$pendidikan['pendidikan'][11]['kecamatan'], round($persen12,1),false],
                    [$pendidikan['pendidikan'][12]['kecamatan'], round($persen13,1),false],
                    [$pendidikan['pendidikan'][13]['kecamatan'], round($persen14,1),false],
                    [$pendidikan['pendidikan'][14]['kecamatan'], round($persen15,1),false],
                    [$pendidikan['pendidikan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$pendidikan['pendidikan'][0]['smptidak'];
               $kecamatan2=$pendidikan['pendidikan'][1]['smptidak'];
               $kecamatan3=$pendidikan['pendidikan'][2]['smptidak'];
               $kecamatan4=$pendidikan['pendidikan'][3]['smptidak'];
               $kecamatan5=$pendidikan['pendidikan'][4]['smptidak'];
               $kecamatan6=$pendidikan['pendidikan'][5]['smptidak'];
               $kecamatan7=$pendidikan['pendidikan'][6]['smptidak'];
               $kecamatan8=$pendidikan['pendidikan'][7]['smptidak'];
               $kecamatan9=$pendidikan['pendidikan'][8]['smptidak'];
               $kecamatan10=$pendidikan['pendidikan'][9]['smptidak'];
               $kecamatan11=$pendidikan['pendidikan'][10]['smptidak'];
               $kecamatan12=$pendidikan['pendidikan'][11]['smptidak'];
               $kecamatan13=$pendidikan['pendidikan'][12]['smptidak'];
               $kecamatan14=$pendidikan['pendidikan'][13]['smptidak'];
               $kecamatan15=$pendidikan['pendidikan'][14]['smptidak'];
               $kecamatan16=$pendidikan['pendidikan'][15]['smptidak'];
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
        'title' => ['text' => 'Presentase Pendidikan SMP Tidak Sekolah Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
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
                    [$pendidikan['pendidikan'][0]['kecamatan'], round($persen1,1),false],
                    [$pendidikan['pendidikan'][1]['kecamatan'], round($persen2,1),false],
                    [$pendidikan['pendidikan'][2]['kecamatan'], round($persen3,1),false],
                    [$pendidikan['pendidikan'][3]['kecamatan'], round($persen4,1),false],
                    [$pendidikan['pendidikan'][4]['kecamatan'], round($persen5,1),false],
                    [$pendidikan['pendidikan'][5]['kecamatan'], round($persen6,1),false],
                    [$pendidikan['pendidikan'][6]['kecamatan'], round($persen7,1),false],
                    [$pendidikan['pendidikan'][7]['kecamatan'], round($persen8,1),false],
                    [$pendidikan['pendidikan'][8]['kecamatan'], round($persen9,1),false],
                    [$pendidikan['pendidikan'][9]['kecamatan'], round($persen10,1),false],
                    [$pendidikan['pendidikan'][10]['kecamatan'], round($persen11,1),false],
                    [$pendidikan['pendidikan'][11]['kecamatan'], round($persen12,1),false],
                    [$pendidikan['pendidikan'][12]['kecamatan'], round($persen13,1),false],
                    [$pendidikan['pendidikan'][13]['kecamatan'], round($persen14,1),false],
                    [$pendidikan['pendidikan'][14]['kecamatan'], round($persen15,1),false],
                    [$pendidikan['pendidikan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$pendidikan['pendidikan'][0]['sma'];
               $kecamatan2=$pendidikan['pendidikan'][1]['sma'];
               $kecamatan3=$pendidikan['pendidikan'][2]['sma'];
               $kecamatan4=$pendidikan['pendidikan'][3]['sma'];
               $kecamatan5=$pendidikan['pendidikan'][4]['sma'];
               $kecamatan6=$pendidikan['pendidikan'][5]['sma'];
               $kecamatan7=$pendidikan['pendidikan'][6]['sma'];
               $kecamatan8=$pendidikan['pendidikan'][7]['sma'];
               $kecamatan9=$pendidikan['pendidikan'][8]['sma'];
               $kecamatan10=$pendidikan['pendidikan'][9]['sma'];
               $kecamatan11=$pendidikan['pendidikan'][10]['sma'];
               $kecamatan12=$pendidikan['pendidikan'][11]['sma'];
               $kecamatan13=$pendidikan['pendidikan'][12]['sma'];
               $kecamatan14=$pendidikan['pendidikan'][13]['sma'];
               $kecamatan15=$pendidikan['pendidikan'][14]['sma'];
               $kecamatan16=$pendidikan['pendidikan'][15]['sma'];
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
        'title' => ['text' => 'Presentase Pendidikan SMA Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
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
                    [$pendidikan['pendidikan'][0]['kecamatan'], round($persen1,1),false],
                    [$pendidikan['pendidikan'][1]['kecamatan'], round($persen2,1),false],
                    [$pendidikan['pendidikan'][2]['kecamatan'], round($persen3,1),false],
                    [$pendidikan['pendidikan'][3]['kecamatan'], round($persen4,1),false],
                    [$pendidikan['pendidikan'][4]['kecamatan'], round($persen5,1),false],
                    [$pendidikan['pendidikan'][5]['kecamatan'], round($persen6,1),false],
                    [$pendidikan['pendidikan'][6]['kecamatan'], round($persen7,1),false],
                    [$pendidikan['pendidikan'][7]['kecamatan'], round($persen8,1),false],
                    [$pendidikan['pendidikan'][8]['kecamatan'], round($persen9,1),false],
                    [$pendidikan['pendidikan'][9]['kecamatan'], round($persen10,1),false],
                    [$pendidikan['pendidikan'][10]['kecamatan'], round($persen11,1),false],
                    [$pendidikan['pendidikan'][11]['kecamatan'], round($persen12,1),false],
                    [$pendidikan['pendidikan'][12]['kecamatan'], round($persen13,1),false],
                    [$pendidikan['pendidikan'][13]['kecamatan'], round($persen14,1),false],
                    [$pendidikan['pendidikan'][14]['kecamatan'], round($persen15,1),false],
                    [$pendidikan['pendidikan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$pendidikan['pendidikan'][0]['smatidak'];
               $kecamatan2=$pendidikan['pendidikan'][1]['smatidak'];
               $kecamatan3=$pendidikan['pendidikan'][2]['smatidak'];
               $kecamatan4=$pendidikan['pendidikan'][3]['smatidak'];
               $kecamatan5=$pendidikan['pendidikan'][4]['smatidak'];
               $kecamatan6=$pendidikan['pendidikan'][5]['smatidak'];
               $kecamatan7=$pendidikan['pendidikan'][6]['smatidak'];
               $kecamatan8=$pendidikan['pendidikan'][7]['smatidak'];
               $kecamatan9=$pendidikan['pendidikan'][8]['smatidak'];
               $kecamatan10=$pendidikan['pendidikan'][9]['smatidak'];
               $kecamatan11=$pendidikan['pendidikan'][10]['smatidak'];
               $kecamatan12=$pendidikan['pendidikan'][11]['smatidak'];
               $kecamatan13=$pendidikan['pendidikan'][12]['smatidak'];
               $kecamatan14=$pendidikan['pendidikan'][13]['smatidak'];
               $kecamatan15=$pendidikan['pendidikan'][14]['smatidak'];
               $kecamatan16=$pendidikan['pendidikan'][15]['smatidak'];
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
        'title' => ['text' => 'Presentase Pendidikan SMA Tidak Sekolah Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
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
                    [$pendidikan['pendidikan'][0]['kecamatan'], round($persen1,1),false],
                    [$pendidikan['pendidikan'][1]['kecamatan'], round($persen2,1),false],
                    [$pendidikan['pendidikan'][2]['kecamatan'], round($persen3,1),false],
                    [$pendidikan['pendidikan'][3]['kecamatan'], round($persen4,1),false],
                    [$pendidikan['pendidikan'][4]['kecamatan'], round($persen5,1),false],
                    [$pendidikan['pendidikan'][5]['kecamatan'], round($persen6,1),false],
                    [$pendidikan['pendidikan'][6]['kecamatan'], round($persen7,1),false],
                    [$pendidikan['pendidikan'][7]['kecamatan'], round($persen8,1),false],
                    [$pendidikan['pendidikan'][8]['kecamatan'], round($persen9,1),false],
                    [$pendidikan['pendidikan'][9]['kecamatan'], round($persen10,1),false],
                    [$pendidikan['pendidikan'][10]['kecamatan'], round($persen11,1),false],
                    [$pendidikan['pendidikan'][11]['kecamatan'], round($persen12,1),false],
                    [$pendidikan['pendidikan'][12]['kecamatan'], round($persen13,1),false],
                    [$pendidikan['pendidikan'][13]['kecamatan'], round($persen14,1),false],
                    [$pendidikan['pendidikan'][14]['kecamatan'], round($persen15,1),false],
                    [$pendidikan['pendidikan'][15]['kecamatan'], round($persen16,1),false],
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
                 