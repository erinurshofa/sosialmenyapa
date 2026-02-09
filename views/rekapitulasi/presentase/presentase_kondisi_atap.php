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
                            <h4 class="mb-lg"><?=$kondisi_atap['title_pie']?></h4>

                           
                                        <?php
               $kecamatan1=$kondisi_atap['kondisi_atap'][0]['beton'];
               $kecamatan2=$kondisi_atap['kondisi_atap'][1]['beton'];
               $kecamatan3=$kondisi_atap['kondisi_atap'][2]['beton'];
               $kecamatan4=$kondisi_atap['kondisi_atap'][3]['beton'];
               $kecamatan5=$kondisi_atap['kondisi_atap'][4]['beton'];
               $kecamatan6=$kondisi_atap['kondisi_atap'][5]['beton'];
               $kecamatan7=$kondisi_atap['kondisi_atap'][6]['beton'];
               $kecamatan8=$kondisi_atap['kondisi_atap'][7]['beton'];
               $kecamatan9=$kondisi_atap['kondisi_atap'][8]['beton'];
               $kecamatan10=$kondisi_atap['kondisi_atap'][9]['beton'];
               $kecamatan11=$kondisi_atap['kondisi_atap'][10]['beton'];
               $kecamatan12=$kondisi_atap['kondisi_atap'][11]['beton'];
               $kecamatan13=$kondisi_atap['kondisi_atap'][12]['beton'];
               $kecamatan14=$kondisi_atap['kondisi_atap'][13]['beton'];
               $kecamatan15=$kondisi_atap['kondisi_atap'][14]['beton'];
               $kecamatan16=$kondisi_atap['kondisi_atap'][15]['beton'];
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
        'title' => ['text' => 'Presentase Kondisi Atap Beton Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
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
                    [$kondisi_atap['kondisi_atap'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_atap['kondisi_atap'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_atap['kondisi_atap'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_atap['kondisi_atap'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_atap['kondisi_atap'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_atap['kondisi_atap'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_atap['kondisi_atap'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_atap['kondisi_atap'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_atap['kondisi_atap'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_atap['kondisi_atap'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_atap['kondisi_atap'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_atap['kondisi_atap'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_atap['kondisi_atap'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_atap['kondisi_atap'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_atap['kondisi_atap'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_atap['kondisi_atap'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_atap['kondisi_atap'][0]['gentengkeramik'];
               $kecamatan2=$kondisi_atap['kondisi_atap'][1]['gentengkeramik'];
               $kecamatan3=$kondisi_atap['kondisi_atap'][2]['gentengkeramik'];
               $kecamatan4=$kondisi_atap['kondisi_atap'][3]['gentengkeramik'];
               $kecamatan5=$kondisi_atap['kondisi_atap'][4]['gentengkeramik'];
               $kecamatan6=$kondisi_atap['kondisi_atap'][5]['gentengkeramik'];
               $kecamatan7=$kondisi_atap['kondisi_atap'][6]['gentengkeramik'];
               $kecamatan8=$kondisi_atap['kondisi_atap'][7]['gentengkeramik'];
               $kecamatan9=$kondisi_atap['kondisi_atap'][8]['gentengkeramik'];
               $kecamatan10=$kondisi_atap['kondisi_atap'][9]['gentengkeramik'];
               $kecamatan11=$kondisi_atap['kondisi_atap'][10]['gentengkeramik'];
               $kecamatan12=$kondisi_atap['kondisi_atap'][11]['gentengkeramik'];
               $kecamatan13=$kondisi_atap['kondisi_atap'][12]['gentengkeramik'];
               $kecamatan14=$kondisi_atap['kondisi_atap'][13]['gentengkeramik'];
               $kecamatan15=$kondisi_atap['kondisi_atap'][14]['gentengkeramik'];
               $kecamatan16=$kondisi_atap['kondisi_atap'][15]['gentengkeramik'];
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
        'title' => ['text' => 'Presentase Kondisi Atap Genteng Keramik Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
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
                    [$kondisi_atap['kondisi_atap'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_atap['kondisi_atap'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_atap['kondisi_atap'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_atap['kondisi_atap'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_atap['kondisi_atap'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_atap['kondisi_atap'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_atap['kondisi_atap'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_atap['kondisi_atap'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_atap['kondisi_atap'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_atap['kondisi_atap'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_atap['kondisi_atap'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_atap['kondisi_atap'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_atap['kondisi_atap'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_atap['kondisi_atap'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_atap['kondisi_atap'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_atap['kondisi_atap'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_atap['kondisi_atap'][0]['gentengmetal'];
               $kecamatan2=$kondisi_atap['kondisi_atap'][1]['gentengmetal'];
               $kecamatan3=$kondisi_atap['kondisi_atap'][2]['gentengmetal'];
               $kecamatan4=$kondisi_atap['kondisi_atap'][3]['gentengmetal'];
               $kecamatan5=$kondisi_atap['kondisi_atap'][4]['gentengmetal'];
               $kecamatan6=$kondisi_atap['kondisi_atap'][5]['gentengmetal'];
               $kecamatan7=$kondisi_atap['kondisi_atap'][6]['gentengmetal'];
               $kecamatan8=$kondisi_atap['kondisi_atap'][7]['gentengmetal'];
               $kecamatan9=$kondisi_atap['kondisi_atap'][8]['gentengmetal'];
               $kecamatan10=$kondisi_atap['kondisi_atap'][9]['gentengmetal'];
               $kecamatan11=$kondisi_atap['kondisi_atap'][10]['gentengmetal'];
               $kecamatan12=$kondisi_atap['kondisi_atap'][11]['gentengmetal'];
               $kecamatan13=$kondisi_atap['kondisi_atap'][12]['gentengmetal'];
               $kecamatan14=$kondisi_atap['kondisi_atap'][13]['gentengmetal'];
               $kecamatan15=$kondisi_atap['kondisi_atap'][14]['gentengmetal'];
               $kecamatan16=$kondisi_atap['kondisi_atap'][15]['gentengmetal'];
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
        'title' => ['text' => 'Presentase Kondisi Atap Genteng Metal Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
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
                    [$kondisi_atap['kondisi_atap'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_atap['kondisi_atap'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_atap['kondisi_atap'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_atap['kondisi_atap'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_atap['kondisi_atap'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_atap['kondisi_atap'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_atap['kondisi_atap'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_atap['kondisi_atap'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_atap['kondisi_atap'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_atap['kondisi_atap'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_atap['kondisi_atap'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_atap['kondisi_atap'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_atap['kondisi_atap'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_atap['kondisi_atap'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_atap['kondisi_atap'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_atap['kondisi_atap'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_atap['kondisi_atap'][0]['gentengtanahliat'];
               $kecamatan2=$kondisi_atap['kondisi_atap'][1]['gentengtanahliat'];
               $kecamatan3=$kondisi_atap['kondisi_atap'][2]['gentengtanahliat'];
               $kecamatan4=$kondisi_atap['kondisi_atap'][3]['gentengtanahliat'];
               $kecamatan5=$kondisi_atap['kondisi_atap'][4]['gentengtanahliat'];
               $kecamatan6=$kondisi_atap['kondisi_atap'][5]['gentengtanahliat'];
               $kecamatan7=$kondisi_atap['kondisi_atap'][6]['gentengtanahliat'];
               $kecamatan8=$kondisi_atap['kondisi_atap'][7]['gentengtanahliat'];
               $kecamatan9=$kondisi_atap['kondisi_atap'][8]['gentengtanahliat'];
               $kecamatan10=$kondisi_atap['kondisi_atap'][9]['gentengtanahliat'];
               $kecamatan11=$kondisi_atap['kondisi_atap'][10]['gentengtanahliat'];
               $kecamatan12=$kondisi_atap['kondisi_atap'][11]['gentengtanahliat'];
               $kecamatan13=$kondisi_atap['kondisi_atap'][12]['gentengtanahliat'];
               $kecamatan14=$kondisi_atap['kondisi_atap'][13]['gentengtanahliat'];
               $kecamatan15=$kondisi_atap['kondisi_atap'][14]['gentengtanahliat'];
               $kecamatan16=$kondisi_atap['kondisi_atap'][15]['gentengtanahliat'];
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
        'title' => ['text' => 'Presentase Kondisi Atap Genteng Tanah Liat Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
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
                    [$kondisi_atap['kondisi_atap'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_atap['kondisi_atap'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_atap['kondisi_atap'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_atap['kondisi_atap'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_atap['kondisi_atap'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_atap['kondisi_atap'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_atap['kondisi_atap'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_atap['kondisi_atap'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_atap['kondisi_atap'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_atap['kondisi_atap'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_atap['kondisi_atap'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_atap['kondisi_atap'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_atap['kondisi_atap'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_atap['kondisi_atap'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_atap['kondisi_atap'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_atap['kondisi_atap'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_atap['kondisi_atap'][0]['asbes'];
               $kecamatan2=$kondisi_atap['kondisi_atap'][1]['asbes'];
               $kecamatan3=$kondisi_atap['kondisi_atap'][2]['asbes'];
               $kecamatan4=$kondisi_atap['kondisi_atap'][3]['asbes'];
               $kecamatan5=$kondisi_atap['kondisi_atap'][4]['asbes'];
               $kecamatan6=$kondisi_atap['kondisi_atap'][5]['asbes'];
               $kecamatan7=$kondisi_atap['kondisi_atap'][6]['asbes'];
               $kecamatan8=$kondisi_atap['kondisi_atap'][7]['asbes'];
               $kecamatan9=$kondisi_atap['kondisi_atap'][8]['asbes'];
               $kecamatan10=$kondisi_atap['kondisi_atap'][9]['asbes'];
               $kecamatan11=$kondisi_atap['kondisi_atap'][10]['asbes'];
               $kecamatan12=$kondisi_atap['kondisi_atap'][11]['asbes'];
               $kecamatan13=$kondisi_atap['kondisi_atap'][12]['asbes'];
               $kecamatan14=$kondisi_atap['kondisi_atap'][13]['asbes'];
               $kecamatan15=$kondisi_atap['kondisi_atap'][14]['asbes'];
               $kecamatan16=$kondisi_atap['kondisi_atap'][15]['asbes'];
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
        'title' => ['text' => 'Presentase Kondisi Atap Asbes Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
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
                    [$kondisi_atap['kondisi_atap'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_atap['kondisi_atap'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_atap['kondisi_atap'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_atap['kondisi_atap'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_atap['kondisi_atap'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_atap['kondisi_atap'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_atap['kondisi_atap'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_atap['kondisi_atap'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_atap['kondisi_atap'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_atap['kondisi_atap'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_atap['kondisi_atap'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_atap['kondisi_atap'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_atap['kondisi_atap'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_atap['kondisi_atap'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_atap['kondisi_atap'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_atap['kondisi_atap'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_atap['kondisi_atap'][0]['seng'];
               $kecamatan2=$kondisi_atap['kondisi_atap'][1]['seng'];
               $kecamatan3=$kondisi_atap['kondisi_atap'][2]['seng'];
               $kecamatan4=$kondisi_atap['kondisi_atap'][3]['seng'];
               $kecamatan5=$kondisi_atap['kondisi_atap'][4]['seng'];
               $kecamatan6=$kondisi_atap['kondisi_atap'][5]['seng'];
               $kecamatan7=$kondisi_atap['kondisi_atap'][6]['seng'];
               $kecamatan8=$kondisi_atap['kondisi_atap'][7]['seng'];
               $kecamatan9=$kondisi_atap['kondisi_atap'][8]['seng'];
               $kecamatan10=$kondisi_atap['kondisi_atap'][9]['seng'];
               $kecamatan11=$kondisi_atap['kondisi_atap'][10]['seng'];
               $kecamatan12=$kondisi_atap['kondisi_atap'][11]['seng'];
               $kecamatan13=$kondisi_atap['kondisi_atap'][12]['seng'];
               $kecamatan14=$kondisi_atap['kondisi_atap'][13]['seng'];
               $kecamatan15=$kondisi_atap['kondisi_atap'][14]['seng'];
               $kecamatan16=$kondisi_atap['kondisi_atap'][15]['seng'];
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
        'title' => ['text' => 'Presentase Kondisi Atap Seng Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
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
                    [$kondisi_atap['kondisi_atap'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_atap['kondisi_atap'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_atap['kondisi_atap'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_atap['kondisi_atap'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_atap['kondisi_atap'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_atap['kondisi_atap'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_atap['kondisi_atap'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_atap['kondisi_atap'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_atap['kondisi_atap'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_atap['kondisi_atap'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_atap['kondisi_atap'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_atap['kondisi_atap'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_atap['kondisi_atap'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_atap['kondisi_atap'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_atap['kondisi_atap'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_atap['kondisi_atap'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_atap['kondisi_atap'][0]['sirap'];
               $kecamatan2=$kondisi_atap['kondisi_atap'][1]['sirap'];
               $kecamatan3=$kondisi_atap['kondisi_atap'][2]['sirap'];
               $kecamatan4=$kondisi_atap['kondisi_atap'][3]['sirap'];
               $kecamatan5=$kondisi_atap['kondisi_atap'][4]['sirap'];
               $kecamatan6=$kondisi_atap['kondisi_atap'][5]['sirap'];
               $kecamatan7=$kondisi_atap['kondisi_atap'][6]['sirap'];
               $kecamatan8=$kondisi_atap['kondisi_atap'][7]['sirap'];
               $kecamatan9=$kondisi_atap['kondisi_atap'][8]['sirap'];
               $kecamatan10=$kondisi_atap['kondisi_atap'][9]['sirap'];
               $kecamatan11=$kondisi_atap['kondisi_atap'][10]['sirap'];
               $kecamatan12=$kondisi_atap['kondisi_atap'][11]['sirap'];
               $kecamatan13=$kondisi_atap['kondisi_atap'][12]['sirap'];
               $kecamatan14=$kondisi_atap['kondisi_atap'][13]['sirap'];
               $kecamatan15=$kondisi_atap['kondisi_atap'][14]['sirap'];
               $kecamatan16=$kondisi_atap['kondisi_atap'][15]['sirap'];
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
        'title' => ['text' => 'Presentase Kondisi Atap Sirap Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
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
                    [$kondisi_atap['kondisi_atap'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_atap['kondisi_atap'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_atap['kondisi_atap'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_atap['kondisi_atap'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_atap['kondisi_atap'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_atap['kondisi_atap'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_atap['kondisi_atap'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_atap['kondisi_atap'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_atap['kondisi_atap'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_atap['kondisi_atap'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_atap['kondisi_atap'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_atap['kondisi_atap'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_atap['kondisi_atap'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_atap['kondisi_atap'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_atap['kondisi_atap'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_atap['kondisi_atap'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_atap['kondisi_atap'][0]['bambu'];
               $kecamatan2=$kondisi_atap['kondisi_atap'][1]['bambu'];
               $kecamatan3=$kondisi_atap['kondisi_atap'][2]['bambu'];
               $kecamatan4=$kondisi_atap['kondisi_atap'][3]['bambu'];
               $kecamatan5=$kondisi_atap['kondisi_atap'][4]['bambu'];
               $kecamatan6=$kondisi_atap['kondisi_atap'][5]['bambu'];
               $kecamatan7=$kondisi_atap['kondisi_atap'][6]['bambu'];
               $kecamatan8=$kondisi_atap['kondisi_atap'][7]['bambu'];
               $kecamatan9=$kondisi_atap['kondisi_atap'][8]['bambu'];
               $kecamatan10=$kondisi_atap['kondisi_atap'][9]['bambu'];
               $kecamatan11=$kondisi_atap['kondisi_atap'][10]['bambu'];
               $kecamatan12=$kondisi_atap['kondisi_atap'][11]['bambu'];
               $kecamatan13=$kondisi_atap['kondisi_atap'][12]['bambu'];
               $kecamatan14=$kondisi_atap['kondisi_atap'][13]['bambu'];
               $kecamatan15=$kondisi_atap['kondisi_atap'][14]['bambu'];
               $kecamatan16=$kondisi_atap['kondisi_atap'][15]['bambu'];
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
        'title' => ['text' => 'Presentase Kondisi Atap Bambu Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
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
                    [$kondisi_atap['kondisi_atap'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_atap['kondisi_atap'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_atap['kondisi_atap'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_atap['kondisi_atap'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_atap['kondisi_atap'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_atap['kondisi_atap'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_atap['kondisi_atap'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_atap['kondisi_atap'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_atap['kondisi_atap'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_atap['kondisi_atap'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_atap['kondisi_atap'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_atap['kondisi_atap'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_atap['kondisi_atap'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_atap['kondisi_atap'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_atap['kondisi_atap'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_atap['kondisi_atap'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_atap['kondisi_atap'][0]['jerami'];
               $kecamatan2=$kondisi_atap['kondisi_atap'][1]['jerami'];
               $kecamatan3=$kondisi_atap['kondisi_atap'][2]['jerami'];
               $kecamatan4=$kondisi_atap['kondisi_atap'][3]['jerami'];
               $kecamatan5=$kondisi_atap['kondisi_atap'][4]['jerami'];
               $kecamatan6=$kondisi_atap['kondisi_atap'][5]['jerami'];
               $kecamatan7=$kondisi_atap['kondisi_atap'][6]['jerami'];
               $kecamatan8=$kondisi_atap['kondisi_atap'][7]['jerami'];
               $kecamatan9=$kondisi_atap['kondisi_atap'][8]['jerami'];
               $kecamatan10=$kondisi_atap['kondisi_atap'][9]['jerami'];
               $kecamatan11=$kondisi_atap['kondisi_atap'][10]['jerami'];
               $kecamatan12=$kondisi_atap['kondisi_atap'][11]['jerami'];
               $kecamatan13=$kondisi_atap['kondisi_atap'][12]['jerami'];
               $kecamatan14=$kondisi_atap['kondisi_atap'][13]['jerami'];
               $kecamatan15=$kondisi_atap['kondisi_atap'][14]['jerami'];
               $kecamatan16=$kondisi_atap['kondisi_atap'][15]['jerami'];
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
        'title' => ['text' => 'Presentase Kondisi Atap Jerami Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
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
                    [$kondisi_atap['kondisi_atap'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_atap['kondisi_atap'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_atap['kondisi_atap'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_atap['kondisi_atap'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_atap['kondisi_atap'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_atap['kondisi_atap'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_atap['kondisi_atap'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_atap['kondisi_atap'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_atap['kondisi_atap'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_atap['kondisi_atap'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_atap['kondisi_atap'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_atap['kondisi_atap'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_atap['kondisi_atap'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_atap['kondisi_atap'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_atap['kondisi_atap'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_atap['kondisi_atap'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_atap['kondisi_atap'][0]['lainnya'];
               $kecamatan2=$kondisi_atap['kondisi_atap'][1]['lainnya'];
               $kecamatan3=$kondisi_atap['kondisi_atap'][2]['lainnya'];
               $kecamatan4=$kondisi_atap['kondisi_atap'][3]['lainnya'];
               $kecamatan5=$kondisi_atap['kondisi_atap'][4]['lainnya'];
               $kecamatan6=$kondisi_atap['kondisi_atap'][5]['lainnya'];
               $kecamatan7=$kondisi_atap['kondisi_atap'][6]['lainnya'];
               $kecamatan8=$kondisi_atap['kondisi_atap'][7]['lainnya'];
               $kecamatan9=$kondisi_atap['kondisi_atap'][8]['lainnya'];
               $kecamatan10=$kondisi_atap['kondisi_atap'][9]['lainnya'];
               $kecamatan11=$kondisi_atap['kondisi_atap'][10]['lainnya'];
               $kecamatan12=$kondisi_atap['kondisi_atap'][11]['lainnya'];
               $kecamatan13=$kondisi_atap['kondisi_atap'][12]['lainnya'];
               $kecamatan14=$kondisi_atap['kondisi_atap'][13]['lainnya'];
               $kecamatan15=$kondisi_atap['kondisi_atap'][14]['lainnya'];
               $kecamatan16=$kondisi_atap['kondisi_atap'][15]['lainnya'];
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
        'title' => ['text' => 'Presentase Kondisi Atap Lainnya Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
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
                    [$kondisi_atap['kondisi_atap'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_atap['kondisi_atap'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_atap['kondisi_atap'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_atap['kondisi_atap'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_atap['kondisi_atap'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_atap['kondisi_atap'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_atap['kondisi_atap'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_atap['kondisi_atap'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_atap['kondisi_atap'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_atap['kondisi_atap'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_atap['kondisi_atap'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_atap['kondisi_atap'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_atap['kondisi_atap'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_atap['kondisi_atap'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_atap['kondisi_atap'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_atap['kondisi_atap'][15]['kecamatan'], round($persen16,1),false],
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
             