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
                            <h4 class="mb-lg"> <?=$program_bantuan['title_pie']?></h4>
                            
                                        <?php
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statuskks'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statuskks'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statuskks'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statuskks'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statuskks'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statuskks'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statuskks'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statuskks'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statuskks'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statuskks'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statuskks'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statuskks'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statuskks'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statuskks'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statuskks'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statuskks'];
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
        'title' => ['text' => 'Presentase Program Bantuan Status KKS Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
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
                    [$program_bantuan['program_bantuan'][0]['kecamatan'], round($persen1,1),false],
                    [$program_bantuan['program_bantuan'][1]['kecamatan'], round($persen2,1),false],
                    [$program_bantuan['program_bantuan'][2]['kecamatan'], round($persen3,1),false],
                    [$program_bantuan['program_bantuan'][3]['kecamatan'], round($persen4,1),false],
                    [$program_bantuan['program_bantuan'][4]['kecamatan'], round($persen5,1),false],
                    [$program_bantuan['program_bantuan'][5]['kecamatan'], round($persen6,1),false],
                    [$program_bantuan['program_bantuan'][6]['kecamatan'], round($persen7,1),false],
                    [$program_bantuan['program_bantuan'][7]['kecamatan'], round($persen8,1),false],
                    [$program_bantuan['program_bantuan'][8]['kecamatan'], round($persen9,1),false],
                    [$program_bantuan['program_bantuan'][9]['kecamatan'], round($persen10,1),false],
                    [$program_bantuan['program_bantuan'][10]['kecamatan'], round($persen11,1),false],
                    [$program_bantuan['program_bantuan'][11]['kecamatan'], round($persen12,1),false],
                    [$program_bantuan['program_bantuan'][12]['kecamatan'], round($persen13,1),false],
                    [$program_bantuan['program_bantuan'][13]['kecamatan'], round($persen14,1),false],
                    [$program_bantuan['program_bantuan'][14]['kecamatan'], round($persen15,1),false],
                    [$program_bantuan['program_bantuan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statuspbi'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statuspbi'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statuspbi'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statuspbi'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statuspbi'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statuspbi'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statuspbi'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statuspbi'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statuspbi'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statuspbi'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statuspbi'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statuspbi'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statuspbi'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statuspbi'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statuspbi'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statuspbi'];
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
        'title' => ['text' => 'Presentase Program Bantuan Status PBI Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
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
                    [$program_bantuan['program_bantuan'][0]['kecamatan'], round($persen1,1),false],
                    [$program_bantuan['program_bantuan'][1]['kecamatan'], round($persen2,1),false],
                    [$program_bantuan['program_bantuan'][2]['kecamatan'], round($persen3,1),false],
                    [$program_bantuan['program_bantuan'][3]['kecamatan'], round($persen4,1),false],
                    [$program_bantuan['program_bantuan'][4]['kecamatan'], round($persen5,1),false],
                    [$program_bantuan['program_bantuan'][5]['kecamatan'], round($persen6,1),false],
                    [$program_bantuan['program_bantuan'][6]['kecamatan'], round($persen7,1),false],
                    [$program_bantuan['program_bantuan'][7]['kecamatan'], round($persen8,1),false],
                    [$program_bantuan['program_bantuan'][8]['kecamatan'], round($persen9,1),false],
                    [$program_bantuan['program_bantuan'][9]['kecamatan'], round($persen10,1),false],
                    [$program_bantuan['program_bantuan'][10]['kecamatan'], round($persen11,1),false],
                    [$program_bantuan['program_bantuan'][11]['kecamatan'], round($persen12,1),false],
                    [$program_bantuan['program_bantuan'][12]['kecamatan'], round($persen13,1),false],
                    [$program_bantuan['program_bantuan'][13]['kecamatan'], round($persen14,1),false],
                    [$program_bantuan['program_bantuan'][14]['kecamatan'], round($persen15,1),false],
                    [$program_bantuan['program_bantuan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statuskip'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statuskip'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statuskip'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statuskip'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statuskip'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statuskip'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statuskip'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statuskip'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statuskip'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statuskip'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statuskip'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statuskip'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statuskip'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statuskip'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statuskip'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statuskip'];
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
        'title' => ['text' => 'Presentase Program Bantuan Status KIP Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
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
                    [$program_bantuan['program_bantuan'][0]['kecamatan'], round($persen1,1),false],
                    [$program_bantuan['program_bantuan'][1]['kecamatan'], round($persen2,1),false],
                    [$program_bantuan['program_bantuan'][2]['kecamatan'], round($persen3,1),false],
                    [$program_bantuan['program_bantuan'][3]['kecamatan'], round($persen4,1),false],
                    [$program_bantuan['program_bantuan'][4]['kecamatan'], round($persen5,1),false],
                    [$program_bantuan['program_bantuan'][5]['kecamatan'], round($persen6,1),false],
                    [$program_bantuan['program_bantuan'][6]['kecamatan'], round($persen7,1),false],
                    [$program_bantuan['program_bantuan'][7]['kecamatan'], round($persen8,1),false],
                    [$program_bantuan['program_bantuan'][8]['kecamatan'], round($persen9,1),false],
                    [$program_bantuan['program_bantuan'][9]['kecamatan'], round($persen10,1),false],
                    [$program_bantuan['program_bantuan'][10]['kecamatan'], round($persen11,1),false],
                    [$program_bantuan['program_bantuan'][11]['kecamatan'], round($persen12,1),false],
                    [$program_bantuan['program_bantuan'][12]['kecamatan'], round($persen13,1),false],
                    [$program_bantuan['program_bantuan'][13]['kecamatan'], round($persen14,1),false],
                    [$program_bantuan['program_bantuan'][14]['kecamatan'], round($persen15,1),false],
                    [$program_bantuan['program_bantuan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statuspkh'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statuspkh'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statuspkh'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statuspkh'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statuspkh'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statuspkh'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statuspkh'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statuspkh'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statuspkh'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statuspkh'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statuspkh'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statuspkh'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statuspkh'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statuspkh'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statuspkh'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statuspkh'];
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
        'title' => ['text' => 'Presentase Program Keluarga Harapan Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
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
                    [$program_bantuan['program_bantuan'][0]['kecamatan'], round($persen1,1),false],
                    [$program_bantuan['program_bantuan'][1]['kecamatan'], round($persen2,1),false],
                    [$program_bantuan['program_bantuan'][2]['kecamatan'], round($persen3,1),false],
                    [$program_bantuan['program_bantuan'][3]['kecamatan'], round($persen4,1),false],
                    [$program_bantuan['program_bantuan'][4]['kecamatan'], round($persen5,1),false],
                    [$program_bantuan['program_bantuan'][5]['kecamatan'], round($persen6,1),false],
                    [$program_bantuan['program_bantuan'][6]['kecamatan'], round($persen7,1),false],
                    [$program_bantuan['program_bantuan'][7]['kecamatan'], round($persen8,1),false],
                    [$program_bantuan['program_bantuan'][8]['kecamatan'], round($persen9,1),false],
                    [$program_bantuan['program_bantuan'][9]['kecamatan'], round($persen10,1),false],
                    [$program_bantuan['program_bantuan'][10]['kecamatan'], round($persen11,1),false],
                    [$program_bantuan['program_bantuan'][11]['kecamatan'], round($persen12,1),false],
                    [$program_bantuan['program_bantuan'][12]['kecamatan'], round($persen13,1),false],
                    [$program_bantuan['program_bantuan'][13]['kecamatan'], round($persen14,1),false],
                    [$program_bantuan['program_bantuan'][14]['kecamatan'], round($persen15,1),false],
                    [$program_bantuan['program_bantuan'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statusbsp'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statusbsp'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statusbsp'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statusbsp'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statusbsp'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statusbsp'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statusbsp'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statusbsp'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statusbsp'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statusbsp'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statusbsp'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statusbsp'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statusbsp'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statusbsp'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statusbsp'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statusbsp'];
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
        'title' => ['text' => 'Presentase Program Bantuan Sosial Pangan Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
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
                    [$program_bantuan['program_bantuan'][0]['kecamatan'], round($persen1,1),false],
                    [$program_bantuan['program_bantuan'][1]['kecamatan'], round($persen2,1),false],
                    [$program_bantuan['program_bantuan'][2]['kecamatan'], round($persen3,1),false],
                    [$program_bantuan['program_bantuan'][3]['kecamatan'], round($persen4,1),false],
                    [$program_bantuan['program_bantuan'][4]['kecamatan'], round($persen5,1),false],
                    [$program_bantuan['program_bantuan'][5]['kecamatan'], round($persen6,1),false],
                    [$program_bantuan['program_bantuan'][6]['kecamatan'], round($persen7,1),false],
                    [$program_bantuan['program_bantuan'][7]['kecamatan'], round($persen8,1),false],
                    [$program_bantuan['program_bantuan'][8]['kecamatan'], round($persen9,1),false],
                    [$program_bantuan['program_bantuan'][9]['kecamatan'], round($persen10,1),false],
                    [$program_bantuan['program_bantuan'][10]['kecamatan'], round($persen11,1),false],
                    [$program_bantuan['program_bantuan'][11]['kecamatan'], round($persen12,1),false],
                    [$program_bantuan['program_bantuan'][12]['kecamatan'], round($persen13,1),false],
                    [$program_bantuan['program_bantuan'][13]['kecamatan'], round($persen14,1),false],
                    [$program_bantuan['program_bantuan'][14]['kecamatan'], round($persen15,1),false],
                    [$program_bantuan['program_bantuan'][15]['kecamatan'], round($persen16,1),false],
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
         