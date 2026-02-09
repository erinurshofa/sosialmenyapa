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
                            <h4 class="mb-lg"><?=$kondisi_lantai['title_pie']?></h4>

                                        <?php
               $kecamatan1=$kondisi_lantai['kondisi_lantai'][0]['marmer'];
               $kecamatan2=$kondisi_lantai['kondisi_lantai'][1]['marmer'];
               $kecamatan3=$kondisi_lantai['kondisi_lantai'][2]['marmer'];
               $kecamatan4=$kondisi_lantai['kondisi_lantai'][3]['marmer'];
               $kecamatan5=$kondisi_lantai['kondisi_lantai'][4]['marmer'];
               $kecamatan6=$kondisi_lantai['kondisi_lantai'][5]['marmer'];
               $kecamatan7=$kondisi_lantai['kondisi_lantai'][6]['marmer'];
               $kecamatan8=$kondisi_lantai['kondisi_lantai'][7]['marmer'];
               $kecamatan9=$kondisi_lantai['kondisi_lantai'][8]['marmer'];
               $kecamatan10=$kondisi_lantai['kondisi_lantai'][9]['marmer'];
               $kecamatan11=$kondisi_lantai['kondisi_lantai'][10]['marmer'];
               $kecamatan12=$kondisi_lantai['kondisi_lantai'][11]['marmer'];
               $kecamatan13=$kondisi_lantai['kondisi_lantai'][12]['marmer'];
               $kecamatan14=$kondisi_lantai['kondisi_lantai'][13]['marmer'];
               $kecamatan15=$kondisi_lantai['kondisi_lantai'][14]['marmer'];
               $kecamatan16=$kondisi_lantai['kondisi_lantai'][15]['marmer'];
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
        'title' => ['text' => 'Presentase Kondisi Lantai Marmer Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
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
                    [$kondisi_lantai['kondisi_lantai'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_lantai['kondisi_lantai'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_lantai['kondisi_lantai'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_lantai['kondisi_lantai'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_lantai['kondisi_lantai'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_lantai['kondisi_lantai'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_lantai['kondisi_lantai'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_lantai['kondisi_lantai'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_lantai['kondisi_lantai'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_lantai['kondisi_lantai'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_lantai['kondisi_lantai'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_lantai['kondisi_lantai'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_lantai['kondisi_lantai'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_lantai['kondisi_lantai'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_lantai['kondisi_lantai'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_lantai['kondisi_lantai'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_lantai['kondisi_lantai'][0]['keramik'];
               $kecamatan2=$kondisi_lantai['kondisi_lantai'][1]['keramik'];
               $kecamatan3=$kondisi_lantai['kondisi_lantai'][2]['keramik'];
               $kecamatan4=$kondisi_lantai['kondisi_lantai'][3]['keramik'];
               $kecamatan5=$kondisi_lantai['kondisi_lantai'][4]['keramik'];
               $kecamatan6=$kondisi_lantai['kondisi_lantai'][5]['keramik'];
               $kecamatan7=$kondisi_lantai['kondisi_lantai'][6]['keramik'];
               $kecamatan8=$kondisi_lantai['kondisi_lantai'][7]['keramik'];
               $kecamatan9=$kondisi_lantai['kondisi_lantai'][8]['keramik'];
               $kecamatan10=$kondisi_lantai['kondisi_lantai'][9]['keramik'];
               $kecamatan11=$kondisi_lantai['kondisi_lantai'][10]['keramik'];
               $kecamatan12=$kondisi_lantai['kondisi_lantai'][11]['keramik'];
               $kecamatan13=$kondisi_lantai['kondisi_lantai'][12]['keramik'];
               $kecamatan14=$kondisi_lantai['kondisi_lantai'][13]['keramik'];
               $kecamatan15=$kondisi_lantai['kondisi_lantai'][14]['keramik'];
               $kecamatan16=$kondisi_lantai['kondisi_lantai'][15]['keramik'];
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
        'title' => ['text' => 'Presentase Kondisi Lantai Keramik Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
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
                    [$kondisi_lantai['kondisi_lantai'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_lantai['kondisi_lantai'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_lantai['kondisi_lantai'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_lantai['kondisi_lantai'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_lantai['kondisi_lantai'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_lantai['kondisi_lantai'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_lantai['kondisi_lantai'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_lantai['kondisi_lantai'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_lantai['kondisi_lantai'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_lantai['kondisi_lantai'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_lantai['kondisi_lantai'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_lantai['kondisi_lantai'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_lantai['kondisi_lantai'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_lantai['kondisi_lantai'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_lantai['kondisi_lantai'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_lantai['kondisi_lantai'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_lantai['kondisi_lantai'][0]['parket'];
               $kecamatan2=$kondisi_lantai['kondisi_lantai'][1]['parket'];
               $kecamatan3=$kondisi_lantai['kondisi_lantai'][2]['parket'];
               $kecamatan4=$kondisi_lantai['kondisi_lantai'][3]['parket'];
               $kecamatan5=$kondisi_lantai['kondisi_lantai'][4]['parket'];
               $kecamatan6=$kondisi_lantai['kondisi_lantai'][5]['parket'];
               $kecamatan7=$kondisi_lantai['kondisi_lantai'][6]['parket'];
               $kecamatan8=$kondisi_lantai['kondisi_lantai'][7]['parket'];
               $kecamatan9=$kondisi_lantai['kondisi_lantai'][8]['parket'];
               $kecamatan10=$kondisi_lantai['kondisi_lantai'][9]['parket'];
               $kecamatan11=$kondisi_lantai['kondisi_lantai'][10]['parket'];
               $kecamatan12=$kondisi_lantai['kondisi_lantai'][11]['parket'];
               $kecamatan13=$kondisi_lantai['kondisi_lantai'][12]['parket'];
               $kecamatan14=$kondisi_lantai['kondisi_lantai'][13]['parket'];
               $kecamatan15=$kondisi_lantai['kondisi_lantai'][14]['parket'];
               $kecamatan16=$kondisi_lantai['kondisi_lantai'][15]['parket'];
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
        'title' => ['text' => 'Presentase Kondisi Lantai Parket Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
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
                    [$kondisi_lantai['kondisi_lantai'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_lantai['kondisi_lantai'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_lantai['kondisi_lantai'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_lantai['kondisi_lantai'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_lantai['kondisi_lantai'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_lantai['kondisi_lantai'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_lantai['kondisi_lantai'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_lantai['kondisi_lantai'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_lantai['kondisi_lantai'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_lantai['kondisi_lantai'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_lantai['kondisi_lantai'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_lantai['kondisi_lantai'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_lantai['kondisi_lantai'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_lantai['kondisi_lantai'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_lantai['kondisi_lantai'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_lantai['kondisi_lantai'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_lantai['kondisi_lantai'][0]['ubin'];
               $kecamatan2=$kondisi_lantai['kondisi_lantai'][1]['ubin'];
               $kecamatan3=$kondisi_lantai['kondisi_lantai'][2]['ubin'];
               $kecamatan4=$kondisi_lantai['kondisi_lantai'][3]['ubin'];
               $kecamatan5=$kondisi_lantai['kondisi_lantai'][4]['ubin'];
               $kecamatan6=$kondisi_lantai['kondisi_lantai'][5]['ubin'];
               $kecamatan7=$kondisi_lantai['kondisi_lantai'][6]['ubin'];
               $kecamatan8=$kondisi_lantai['kondisi_lantai'][7]['ubin'];
               $kecamatan9=$kondisi_lantai['kondisi_lantai'][8]['ubin'];
               $kecamatan10=$kondisi_lantai['kondisi_lantai'][9]['ubin'];
               $kecamatan11=$kondisi_lantai['kondisi_lantai'][10]['ubin'];
               $kecamatan12=$kondisi_lantai['kondisi_lantai'][11]['ubin'];
               $kecamatan13=$kondisi_lantai['kondisi_lantai'][12]['ubin'];
               $kecamatan14=$kondisi_lantai['kondisi_lantai'][13]['ubin'];
               $kecamatan15=$kondisi_lantai['kondisi_lantai'][14]['ubin'];
               $kecamatan16=$kondisi_lantai['kondisi_lantai'][15]['ubin'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan15;
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
        'title' => ['text' => 'Presentase Kondisi Lantai Ubin Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
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
                    [$kondisi_lantai['kondisi_lantai'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_lantai['kondisi_lantai'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_lantai['kondisi_lantai'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_lantai['kondisi_lantai'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_lantai['kondisi_lantai'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_lantai['kondisi_lantai'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_lantai['kondisi_lantai'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_lantai['kondisi_lantai'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_lantai['kondisi_lantai'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_lantai['kondisi_lantai'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_lantai['kondisi_lantai'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_lantai['kondisi_lantai'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_lantai['kondisi_lantai'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_lantai['kondisi_lantai'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_lantai['kondisi_lantai'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_lantai['kondisi_lantai'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_lantai['kondisi_lantai'][0]['kayutinggi'];
               $kecamatan2=$kondisi_lantai['kondisi_lantai'][1]['kayutinggi'];
               $kecamatan3=$kondisi_lantai['kondisi_lantai'][2]['kayutinggi'];
               $kecamatan4=$kondisi_lantai['kondisi_lantai'][3]['kayutinggi'];
               $kecamatan5=$kondisi_lantai['kondisi_lantai'][4]['kayutinggi'];
               $kecamatan6=$kondisi_lantai['kondisi_lantai'][5]['kayutinggi'];
               $kecamatan7=$kondisi_lantai['kondisi_lantai'][6]['kayutinggi'];
               $kecamatan8=$kondisi_lantai['kondisi_lantai'][7]['kayutinggi'];
               $kecamatan9=$kondisi_lantai['kondisi_lantai'][8]['kayutinggi'];
               $kecamatan10=$kondisi_lantai['kondisi_lantai'][9]['kayutinggi'];
               $kecamatan11=$kondisi_lantai['kondisi_lantai'][10]['kayutinggi'];
               $kecamatan12=$kondisi_lantai['kondisi_lantai'][11]['kayutinggi'];
               $kecamatan13=$kondisi_lantai['kondisi_lantai'][12]['kayutinggi'];
               $kecamatan14=$kondisi_lantai['kondisi_lantai'][13]['kayutinggi'];
               $kecamatan15=$kondisi_lantai['kondisi_lantai'][14]['kayutinggi'];
               $kecamatan16=$kondisi_lantai['kondisi_lantai'][15]['kayutinggi'];
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
        'title' => ['text' => 'Presentase Kondisi Lantai Kayu Tinggi Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
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
                    [$kondisi_lantai['kondisi_lantai'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_lantai['kondisi_lantai'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_lantai['kondisi_lantai'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_lantai['kondisi_lantai'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_lantai['kondisi_lantai'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_lantai['kondisi_lantai'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_lantai['kondisi_lantai'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_lantai['kondisi_lantai'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_lantai['kondisi_lantai'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_lantai['kondisi_lantai'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_lantai['kondisi_lantai'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_lantai['kondisi_lantai'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_lantai['kondisi_lantai'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_lantai['kondisi_lantai'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_lantai['kondisi_lantai'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_lantai['kondisi_lantai'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_lantai['kondisi_lantai'][0]['sementara'];
               $kecamatan2=$kondisi_lantai['kondisi_lantai'][1]['sementara'];
               $kecamatan3=$kondisi_lantai['kondisi_lantai'][2]['sementara'];
               $kecamatan4=$kondisi_lantai['kondisi_lantai'][3]['sementara'];
               $kecamatan5=$kondisi_lantai['kondisi_lantai'][4]['sementara'];
               $kecamatan6=$kondisi_lantai['kondisi_lantai'][5]['sementara'];
               $kecamatan7=$kondisi_lantai['kondisi_lantai'][6]['sementara'];
               $kecamatan8=$kondisi_lantai['kondisi_lantai'][7]['sementara'];
               $kecamatan9=$kondisi_lantai['kondisi_lantai'][8]['sementara'];
               $kecamatan10=$kondisi_lantai['kondisi_lantai'][9]['sementara'];
               $kecamatan11=$kondisi_lantai['kondisi_lantai'][10]['sementara'];
               $kecamatan12=$kondisi_lantai['kondisi_lantai'][11]['sementara'];
               $kecamatan13=$kondisi_lantai['kondisi_lantai'][12]['sementara'];
               $kecamatan14=$kondisi_lantai['kondisi_lantai'][13]['sementara'];
               $kecamatan15=$kondisi_lantai['kondisi_lantai'][14]['sementara'];
               $kecamatan16=$kondisi_lantai['kondisi_lantai'][15]['sementara'];
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
        'title' => ['text' => 'Presentase Kondisi Lantai Sementara Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
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
                    [$kondisi_lantai['kondisi_lantai'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_lantai['kondisi_lantai'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_lantai['kondisi_lantai'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_lantai['kondisi_lantai'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_lantai['kondisi_lantai'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_lantai['kondisi_lantai'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_lantai['kondisi_lantai'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_lantai['kondisi_lantai'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_lantai['kondisi_lantai'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_lantai['kondisi_lantai'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_lantai['kondisi_lantai'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_lantai['kondisi_lantai'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_lantai['kondisi_lantai'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_lantai['kondisi_lantai'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_lantai['kondisi_lantai'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_lantai['kondisi_lantai'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_lantai['kondisi_lantai'][0]['bambu'];
               $kecamatan2=$kondisi_lantai['kondisi_lantai'][1]['bambu'];
               $kecamatan3=$kondisi_lantai['kondisi_lantai'][2]['bambu'];
               $kecamatan4=$kondisi_lantai['kondisi_lantai'][3]['bambu'];
               $kecamatan5=$kondisi_lantai['kondisi_lantai'][4]['bambu'];
               $kecamatan6=$kondisi_lantai['kondisi_lantai'][5]['bambu'];
               $kecamatan7=$kondisi_lantai['kondisi_lantai'][6]['bambu'];
               $kecamatan8=$kondisi_lantai['kondisi_lantai'][7]['bambu'];
               $kecamatan9=$kondisi_lantai['kondisi_lantai'][8]['bambu'];
               $kecamatan10=$kondisi_lantai['kondisi_lantai'][9]['bambu'];
               $kecamatan11=$kondisi_lantai['kondisi_lantai'][10]['bambu'];
               $kecamatan12=$kondisi_lantai['kondisi_lantai'][11]['bambu'];
               $kecamatan13=$kondisi_lantai['kondisi_lantai'][12]['bambu'];
               $kecamatan14=$kondisi_lantai['kondisi_lantai'][13]['bambu'];
               $kecamatan15=$kondisi_lantai['kondisi_lantai'][14]['bambu'];
               $kecamatan16=$kondisi_lantai['kondisi_lantai'][15]['bambu'];
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
        'title' => ['text' => 'Presentase Kondisi Lantai Bambu Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
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
                    [$kondisi_lantai['kondisi_lantai'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_lantai['kondisi_lantai'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_lantai['kondisi_lantai'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_lantai['kondisi_lantai'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_lantai['kondisi_lantai'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_lantai['kondisi_lantai'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_lantai['kondisi_lantai'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_lantai['kondisi_lantai'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_lantai['kondisi_lantai'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_lantai['kondisi_lantai'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_lantai['kondisi_lantai'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_lantai['kondisi_lantai'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_lantai['kondisi_lantai'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_lantai['kondisi_lantai'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_lantai['kondisi_lantai'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_lantai['kondisi_lantai'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_lantai['kondisi_lantai'][0]['kayurendah'];
               $kecamatan2=$kondisi_lantai['kondisi_lantai'][1]['kayurendah'];
               $kecamatan3=$kondisi_lantai['kondisi_lantai'][2]['kayurendah'];
               $kecamatan4=$kondisi_lantai['kondisi_lantai'][3]['kayurendah'];
               $kecamatan5=$kondisi_lantai['kondisi_lantai'][4]['kayurendah'];
               $kecamatan6=$kondisi_lantai['kondisi_lantai'][5]['kayurendah'];
               $kecamatan7=$kondisi_lantai['kondisi_lantai'][6]['kayurendah'];
               $kecamatan8=$kondisi_lantai['kondisi_lantai'][7]['kayurendah'];
               $kecamatan9=$kondisi_lantai['kondisi_lantai'][8]['kayurendah'];
               $kecamatan10=$kondisi_lantai['kondisi_lantai'][9]['kayurendah'];
               $kecamatan11=$kondisi_lantai['kondisi_lantai'][10]['kayurendah'];
               $kecamatan12=$kondisi_lantai['kondisi_lantai'][11]['kayurendah'];
               $kecamatan13=$kondisi_lantai['kondisi_lantai'][12]['kayurendah'];
               $kecamatan14=$kondisi_lantai['kondisi_lantai'][13]['kayurendah'];
               $kecamatan15=$kondisi_lantai['kondisi_lantai'][14]['kayurendah'];
               $kecamatan16=$kondisi_lantai['kondisi_lantai'][15]['kayurendah'];
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
        'title' => ['text' => 'Presentase Kondisi Lantai Kayu Rendah Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
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
                    [$kondisi_lantai['kondisi_lantai'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_lantai['kondisi_lantai'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_lantai['kondisi_lantai'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_lantai['kondisi_lantai'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_lantai['kondisi_lantai'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_lantai['kondisi_lantai'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_lantai['kondisi_lantai'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_lantai['kondisi_lantai'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_lantai['kondisi_lantai'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_lantai['kondisi_lantai'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_lantai['kondisi_lantai'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_lantai['kondisi_lantai'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_lantai['kondisi_lantai'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_lantai['kondisi_lantai'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_lantai['kondisi_lantai'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_lantai['kondisi_lantai'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_lantai['kondisi_lantai'][0]['tanah'];
               $kecamatan2=$kondisi_lantai['kondisi_lantai'][1]['tanah'];
               $kecamatan3=$kondisi_lantai['kondisi_lantai'][2]['tanah'];
               $kecamatan4=$kondisi_lantai['kondisi_lantai'][3]['tanah'];
               $kecamatan5=$kondisi_lantai['kondisi_lantai'][4]['tanah'];
               $kecamatan6=$kondisi_lantai['kondisi_lantai'][5]['tanah'];
               $kecamatan7=$kondisi_lantai['kondisi_lantai'][6]['tanah'];
               $kecamatan8=$kondisi_lantai['kondisi_lantai'][7]['tanah'];
               $kecamatan9=$kondisi_lantai['kondisi_lantai'][8]['tanah'];
               $kecamatan10=$kondisi_lantai['kondisi_lantai'][9]['tanah'];
               $kecamatan11=$kondisi_lantai['kondisi_lantai'][10]['tanah'];
               $kecamatan12=$kondisi_lantai['kondisi_lantai'][11]['tanah'];
               $kecamatan13=$kondisi_lantai['kondisi_lantai'][12]['tanah'];
               $kecamatan14=$kondisi_lantai['kondisi_lantai'][13]['tanah'];
               $kecamatan15=$kondisi_lantai['kondisi_lantai'][14]['tanah'];
               $kecamatan16=$kondisi_lantai['kondisi_lantai'][15]['tanah'];
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
        'title' => ['text' => 'Presentase Kondisi Lantai Tanah Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
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
                    [$kondisi_lantai['kondisi_lantai'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_lantai['kondisi_lantai'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_lantai['kondisi_lantai'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_lantai['kondisi_lantai'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_lantai['kondisi_lantai'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_lantai['kondisi_lantai'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_lantai['kondisi_lantai'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_lantai['kondisi_lantai'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_lantai['kondisi_lantai'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_lantai['kondisi_lantai'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_lantai['kondisi_lantai'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_lantai['kondisi_lantai'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_lantai['kondisi_lantai'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_lantai['kondisi_lantai'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_lantai['kondisi_lantai'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_lantai['kondisi_lantai'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_lantai['kondisi_lantai'][0]['lainnya'];
               $kecamatan2=$kondisi_lantai['kondisi_lantai'][1]['lainnya'];
               $kecamatan3=$kondisi_lantai['kondisi_lantai'][2]['lainnya'];
               $kecamatan4=$kondisi_lantai['kondisi_lantai'][3]['lainnya'];
               $kecamatan5=$kondisi_lantai['kondisi_lantai'][4]['lainnya'];
               $kecamatan6=$kondisi_lantai['kondisi_lantai'][5]['lainnya'];
               $kecamatan7=$kondisi_lantai['kondisi_lantai'][6]['lainnya'];
               $kecamatan8=$kondisi_lantai['kondisi_lantai'][7]['lainnya'];
               $kecamatan9=$kondisi_lantai['kondisi_lantai'][8]['lainnya'];
               $kecamatan10=$kondisi_lantai['kondisi_lantai'][9]['lainnya'];
               $kecamatan11=$kondisi_lantai['kondisi_lantai'][10]['lainnya'];
               $kecamatan12=$kondisi_lantai['kondisi_lantai'][11]['lainnya'];
               $kecamatan13=$kondisi_lantai['kondisi_lantai'][12]['lainnya'];
               $kecamatan14=$kondisi_lantai['kondisi_lantai'][13]['lainnya'];
               $kecamatan15=$kondisi_lantai['kondisi_lantai'][14]['lainnya'];
               $kecamatan16=$kondisi_lantai['kondisi_lantai'][15]['lainnya'];
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
        'title' => ['text' => 'Presentase Kondisi Lantai Lainnya Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
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
                    [$kondisi_lantai['kondisi_lantai'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_lantai['kondisi_lantai'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_lantai['kondisi_lantai'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_lantai['kondisi_lantai'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_lantai['kondisi_lantai'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_lantai['kondisi_lantai'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_lantai['kondisi_lantai'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_lantai['kondisi_lantai'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_lantai['kondisi_lantai'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_lantai['kondisi_lantai'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_lantai['kondisi_lantai'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_lantai['kondisi_lantai'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_lantai['kondisi_lantai'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_lantai['kondisi_lantai'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_lantai['kondisi_lantai'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_lantai['kondisi_lantai'][15]['kecamatan'], round($persen16,1),false],
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
                    