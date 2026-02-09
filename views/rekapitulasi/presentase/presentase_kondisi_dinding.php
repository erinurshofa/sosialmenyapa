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
                            <h4 class="mb-lg"><?=$kondisi_dinding['title_pie']?></h4>

      
                                        <?php
               $kecamatan1=$kondisi_dinding['kondisi_dinding'][0]['tembok'];
               $kecamatan2=$kondisi_dinding['kondisi_dinding'][1]['tembok'];
               $kecamatan3=$kondisi_dinding['kondisi_dinding'][2]['tembok'];
               $kecamatan4=$kondisi_dinding['kondisi_dinding'][3]['tembok'];
               $kecamatan5=$kondisi_dinding['kondisi_dinding'][4]['tembok'];
               $kecamatan6=$kondisi_dinding['kondisi_dinding'][5]['tembok'];
               $kecamatan7=$kondisi_dinding['kondisi_dinding'][6]['tembok'];
               $kecamatan8=$kondisi_dinding['kondisi_dinding'][7]['tembok'];
               $kecamatan9=$kondisi_dinding['kondisi_dinding'][8]['tembok'];
               $kecamatan10=$kondisi_dinding['kondisi_dinding'][9]['tembok'];
               $kecamatan11=$kondisi_dinding['kondisi_dinding'][10]['tembok'];
               $kecamatan12=$kondisi_dinding['kondisi_dinding'][11]['tembok'];
               $kecamatan13=$kondisi_dinding['kondisi_dinding'][12]['tembok'];
               $kecamatan14=$kondisi_dinding['kondisi_dinding'][13]['tembok'];
               $kecamatan15=$kondisi_dinding['kondisi_dinding'][14]['tembok'];
               $kecamatan16=$kondisi_dinding['kondisi_dinding'][15]['tembok'];
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
        'title' => ['text' => 'Presentase Kondisi Dinding Tembok Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
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
                    [$kondisi_dinding['kondisi_dinding'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_dinding['kondisi_dinding'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_dinding['kondisi_dinding'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_dinding['kondisi_dinding'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_dinding['kondisi_dinding'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_dinding['kondisi_dinding'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_dinding['kondisi_dinding'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_dinding['kondisi_dinding'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_dinding['kondisi_dinding'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_dinding['kondisi_dinding'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_dinding['kondisi_dinding'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_dinding['kondisi_dinding'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_dinding['kondisi_dinding'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_dinding['kondisi_dinding'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_dinding['kondisi_dinding'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_dinding['kondisi_dinding'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_dinding['kondisi_dinding'][0]['plesteran'];
               $kecamatan2=$kondisi_dinding['kondisi_dinding'][1]['plesteran'];
               $kecamatan3=$kondisi_dinding['kondisi_dinding'][2]['plesteran'];
               $kecamatan4=$kondisi_dinding['kondisi_dinding'][3]['plesteran'];
               $kecamatan5=$kondisi_dinding['kondisi_dinding'][4]['plesteran'];
               $kecamatan6=$kondisi_dinding['kondisi_dinding'][5]['plesteran'];
               $kecamatan7=$kondisi_dinding['kondisi_dinding'][6]['plesteran'];
               $kecamatan8=$kondisi_dinding['kondisi_dinding'][7]['plesteran'];
               $kecamatan9=$kondisi_dinding['kondisi_dinding'][8]['plesteran'];
               $kecamatan10=$kondisi_dinding['kondisi_dinding'][9]['plesteran'];
               $kecamatan11=$kondisi_dinding['kondisi_dinding'][10]['plesteran'];
               $kecamatan12=$kondisi_dinding['kondisi_dinding'][11]['plesteran'];
               $kecamatan13=$kondisi_dinding['kondisi_dinding'][12]['plesteran'];
               $kecamatan14=$kondisi_dinding['kondisi_dinding'][13]['plesteran'];
               $kecamatan15=$kondisi_dinding['kondisi_dinding'][14]['plesteran'];
               $kecamatan16=$kondisi_dinding['kondisi_dinding'][15]['plesteran'];
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
        'title' => ['text' => 'Presentase Kondisi Dinding Plesteran Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
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
                    [$kondisi_dinding['kondisi_dinding'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_dinding['kondisi_dinding'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_dinding['kondisi_dinding'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_dinding['kondisi_dinding'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_dinding['kondisi_dinding'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_dinding['kondisi_dinding'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_dinding['kondisi_dinding'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_dinding['kondisi_dinding'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_dinding['kondisi_dinding'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_dinding['kondisi_dinding'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_dinding['kondisi_dinding'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_dinding['kondisi_dinding'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_dinding['kondisi_dinding'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_dinding['kondisi_dinding'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_dinding['kondisi_dinding'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_dinding['kondisi_dinding'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_dinding['kondisi_dinding'][0]['kayu'];
               $kecamatan2=$kondisi_dinding['kondisi_dinding'][1]['kayu'];
               $kecamatan3=$kondisi_dinding['kondisi_dinding'][2]['kayu'];
               $kecamatan4=$kondisi_dinding['kondisi_dinding'][3]['kayu'];
               $kecamatan5=$kondisi_dinding['kondisi_dinding'][4]['kayu'];
               $kecamatan6=$kondisi_dinding['kondisi_dinding'][5]['kayu'];
               $kecamatan7=$kondisi_dinding['kondisi_dinding'][6]['kayu'];
               $kecamatan8=$kondisi_dinding['kondisi_dinding'][7]['kayu'];
               $kecamatan9=$kondisi_dinding['kondisi_dinding'][8]['kayu'];
               $kecamatan10=$kondisi_dinding['kondisi_dinding'][9]['kayu'];
               $kecamatan11=$kondisi_dinding['kondisi_dinding'][10]['kayu'];
               $kecamatan12=$kondisi_dinding['kondisi_dinding'][11]['kayu'];
               $kecamatan13=$kondisi_dinding['kondisi_dinding'][12]['kayu'];
               $kecamatan14=$kondisi_dinding['kondisi_dinding'][13]['kayu'];
               $kecamatan15=$kondisi_dinding['kondisi_dinding'][14]['kayu'];
               $kecamatan16=$kondisi_dinding['kondisi_dinding'][15]['kayu'];
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
        'title' => ['text' => 'Presentase Kondisi Dinding Kayu Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
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
                    [$kondisi_dinding['kondisi_dinding'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_dinding['kondisi_dinding'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_dinding['kondisi_dinding'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_dinding['kondisi_dinding'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_dinding['kondisi_dinding'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_dinding['kondisi_dinding'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_dinding['kondisi_dinding'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_dinding['kondisi_dinding'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_dinding['kondisi_dinding'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_dinding['kondisi_dinding'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_dinding['kondisi_dinding'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_dinding['kondisi_dinding'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_dinding['kondisi_dinding'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_dinding['kondisi_dinding'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_dinding['kondisi_dinding'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_dinding['kondisi_dinding'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_dinding['kondisi_dinding'][0]['anyamanbambu'];
               $kecamatan2=$kondisi_dinding['kondisi_dinding'][1]['anyamanbambu'];
               $kecamatan3=$kondisi_dinding['kondisi_dinding'][2]['anyamanbambu'];
               $kecamatan4=$kondisi_dinding['kondisi_dinding'][3]['anyamanbambu'];
               $kecamatan5=$kondisi_dinding['kondisi_dinding'][4]['anyamanbambu'];
               $kecamatan6=$kondisi_dinding['kondisi_dinding'][5]['anyamanbambu'];
               $kecamatan7=$kondisi_dinding['kondisi_dinding'][6]['anyamanbambu'];
               $kecamatan8=$kondisi_dinding['kondisi_dinding'][7]['anyamanbambu'];
               $kecamatan9=$kondisi_dinding['kondisi_dinding'][8]['anyamanbambu'];
               $kecamatan10=$kondisi_dinding['kondisi_dinding'][9]['anyamanbambu'];
               $kecamatan11=$kondisi_dinding['kondisi_dinding'][10]['anyamanbambu'];
               $kecamatan12=$kondisi_dinding['kondisi_dinding'][11]['anyamanbambu'];
               $kecamatan13=$kondisi_dinding['kondisi_dinding'][12]['anyamanbambu'];
               $kecamatan14=$kondisi_dinding['kondisi_dinding'][13]['anyamanbambu'];
               $kecamatan15=$kondisi_dinding['kondisi_dinding'][14]['anyamanbambu'];
               $kecamatan16=$kondisi_dinding['kondisi_dinding'][15]['anyamanbambu'];
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
        'title' => ['text' => 'Presentase Kondisi Dinding Anyaman Bambu Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
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
                    [$kondisi_dinding['kondisi_dinding'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_dinding['kondisi_dinding'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_dinding['kondisi_dinding'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_dinding['kondisi_dinding'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_dinding['kondisi_dinding'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_dinding['kondisi_dinding'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_dinding['kondisi_dinding'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_dinding['kondisi_dinding'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_dinding['kondisi_dinding'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_dinding['kondisi_dinding'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_dinding['kondisi_dinding'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_dinding['kondisi_dinding'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_dinding['kondisi_dinding'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_dinding['kondisi_dinding'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_dinding['kondisi_dinding'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_dinding['kondisi_dinding'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_dinding['kondisi_dinding'][0]['batangkayu'];
               $kecamatan2=$kondisi_dinding['kondisi_dinding'][1]['batangkayu'];
               $kecamatan3=$kondisi_dinding['kondisi_dinding'][2]['batangkayu'];
               $kecamatan4=$kondisi_dinding['kondisi_dinding'][3]['batangkayu'];
               $kecamatan5=$kondisi_dinding['kondisi_dinding'][4]['batangkayu'];
               $kecamatan6=$kondisi_dinding['kondisi_dinding'][5]['batangkayu'];
               $kecamatan7=$kondisi_dinding['kondisi_dinding'][6]['batangkayu'];
               $kecamatan8=$kondisi_dinding['kondisi_dinding'][7]['batangkayu'];
               $kecamatan9=$kondisi_dinding['kondisi_dinding'][8]['batangkayu'];
               $kecamatan10=$kondisi_dinding['kondisi_dinding'][9]['batangkayu'];
               $kecamatan11=$kondisi_dinding['kondisi_dinding'][10]['batangkayu'];
               $kecamatan12=$kondisi_dinding['kondisi_dinding'][11]['batangkayu'];
               $kecamatan13=$kondisi_dinding['kondisi_dinding'][12]['batangkayu'];
               $kecamatan14=$kondisi_dinding['kondisi_dinding'][13]['batangkayu'];
               $kecamatan15=$kondisi_dinding['kondisi_dinding'][14]['batangkayu'];
               $kecamatan16=$kondisi_dinding['kondisi_dinding'][15]['batangkayu'];
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
        'title' => ['text' => 'Presentase Kondisi Dinding Batang Kayu Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
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
                    [$kondisi_dinding['kondisi_dinding'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_dinding['kondisi_dinding'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_dinding['kondisi_dinding'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_dinding['kondisi_dinding'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_dinding['kondisi_dinding'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_dinding['kondisi_dinding'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_dinding['kondisi_dinding'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_dinding['kondisi_dinding'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_dinding['kondisi_dinding'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_dinding['kondisi_dinding'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_dinding['kondisi_dinding'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_dinding['kondisi_dinding'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_dinding['kondisi_dinding'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_dinding['kondisi_dinding'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_dinding['kondisi_dinding'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_dinding['kondisi_dinding'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_dinding['kondisi_dinding'][0]['bambu'];
               $kecamatan2=$kondisi_dinding['kondisi_dinding'][1]['bambu'];
               $kecamatan3=$kondisi_dinding['kondisi_dinding'][2]['bambu'];
               $kecamatan4=$kondisi_dinding['kondisi_dinding'][3]['bambu'];
               $kecamatan5=$kondisi_dinding['kondisi_dinding'][4]['bambu'];
               $kecamatan6=$kondisi_dinding['kondisi_dinding'][5]['bambu'];
               $kecamatan7=$kondisi_dinding['kondisi_dinding'][6]['bambu'];
               $kecamatan8=$kondisi_dinding['kondisi_dinding'][7]['bambu'];
               $kecamatan9=$kondisi_dinding['kondisi_dinding'][8]['bambu'];
               $kecamatan10=$kondisi_dinding['kondisi_dinding'][9]['bambu'];
               $kecamatan11=$kondisi_dinding['kondisi_dinding'][10]['bambu'];
               $kecamatan12=$kondisi_dinding['kondisi_dinding'][11]['bambu'];
               $kecamatan13=$kondisi_dinding['kondisi_dinding'][12]['bambu'];
               $kecamatan14=$kondisi_dinding['kondisi_dinding'][13]['bambu'];
               $kecamatan15=$kondisi_dinding['kondisi_dinding'][14]['bambu'];
               $kecamatan16=$kondisi_dinding['kondisi_dinding'][15]['bambu'];
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
        'title' => ['text' => 'Presentase Kondisi Dinding Bambu Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
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
                    [$kondisi_dinding['kondisi_dinding'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_dinding['kondisi_dinding'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_dinding['kondisi_dinding'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_dinding['kondisi_dinding'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_dinding['kondisi_dinding'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_dinding['kondisi_dinding'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_dinding['kondisi_dinding'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_dinding['kondisi_dinding'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_dinding['kondisi_dinding'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_dinding['kondisi_dinding'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_dinding['kondisi_dinding'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_dinding['kondisi_dinding'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_dinding['kondisi_dinding'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_dinding['kondisi_dinding'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_dinding['kondisi_dinding'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_dinding['kondisi_dinding'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$kondisi_dinding['kondisi_dinding'][0]['lainnya'];
               $kecamatan2=$kondisi_dinding['kondisi_dinding'][1]['lainnya'];
               $kecamatan3=$kondisi_dinding['kondisi_dinding'][2]['lainnya'];
               $kecamatan4=$kondisi_dinding['kondisi_dinding'][3]['lainnya'];
               $kecamatan5=$kondisi_dinding['kondisi_dinding'][4]['lainnya'];
               $kecamatan6=$kondisi_dinding['kondisi_dinding'][5]['lainnya'];
               $kecamatan7=$kondisi_dinding['kondisi_dinding'][6]['lainnya'];
               $kecamatan8=$kondisi_dinding['kondisi_dinding'][7]['lainnya'];
               $kecamatan9=$kondisi_dinding['kondisi_dinding'][8]['lainnya'];
               $kecamatan10=$kondisi_dinding['kondisi_dinding'][9]['lainnya'];
               $kecamatan11=$kondisi_dinding['kondisi_dinding'][10]['lainnya'];
               $kecamatan12=$kondisi_dinding['kondisi_dinding'][11]['lainnya'];
               $kecamatan13=$kondisi_dinding['kondisi_dinding'][12]['lainnya'];
               $kecamatan14=$kondisi_dinding['kondisi_dinding'][13]['lainnya'];
               $kecamatan15=$kondisi_dinding['kondisi_dinding'][14]['lainnya'];
               $kecamatan16=$kondisi_dinding['kondisi_dinding'][15]['lainnya'];
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
        'title' => ['text' => 'Presentase Kondisi Dinding Lainnya Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
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
                    [$kondisi_dinding['kondisi_dinding'][0]['kecamatan'], round($persen1,1),false],
                    [$kondisi_dinding['kondisi_dinding'][1]['kecamatan'], round($persen2,1),false],
                    [$kondisi_dinding['kondisi_dinding'][2]['kecamatan'], round($persen3,1),false],
                    [$kondisi_dinding['kondisi_dinding'][3]['kecamatan'], round($persen4,1),false],
                    [$kondisi_dinding['kondisi_dinding'][4]['kecamatan'], round($persen5,1),false],
                    [$kondisi_dinding['kondisi_dinding'][5]['kecamatan'], round($persen6,1),false],
                    [$kondisi_dinding['kondisi_dinding'][6]['kecamatan'], round($persen7,1),false],
                    [$kondisi_dinding['kondisi_dinding'][7]['kecamatan'], round($persen8,1),false],
                    [$kondisi_dinding['kondisi_dinding'][8]['kecamatan'], round($persen9,1),false],
                    [$kondisi_dinding['kondisi_dinding'][9]['kecamatan'], round($persen10,1),false],
                    [$kondisi_dinding['kondisi_dinding'][10]['kecamatan'], round($persen11,1),false],
                    [$kondisi_dinding['kondisi_dinding'][11]['kecamatan'], round($persen12,1),false],
                    [$kondisi_dinding['kondisi_dinding'][12]['kecamatan'], round($persen13,1),false],
                    [$kondisi_dinding['kondisi_dinding'][13]['kecamatan'], round($persen14,1),false],
                    [$kondisi_dinding['kondisi_dinding'][14]['kecamatan'], round($persen15,1),false],
                    [$kondisi_dinding['kondisi_dinding'][15]['kecamatan'], round($persen16,1),false],
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
                     