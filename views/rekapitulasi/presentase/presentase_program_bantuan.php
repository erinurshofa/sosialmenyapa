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
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statuskis'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statuskis'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statuskis'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statuskis'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statuskis'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statuskis'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statuskis'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statuskis'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statuskis'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statuskis'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statuskis'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statuskis'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statuskis'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statuskis'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statuskis'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statuskis'];
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
        'title' => ['text' => 'Presentase Program Bantuan Status KIS Per Kecamatan Sekota Semarang'],
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
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statusbpjsmandiri'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statusbpjsmandiri'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statusbpjsmandiri'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statusbpjsmandiri'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statusbpjsmandiri'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statusbpjsmandiri'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statusbpjsmandiri'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statusbpjsmandiri'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statusbpjsmandiri'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statusbpjsmandiri'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statusbpjsmandiri'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statusbpjsmandiri'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statusbpjsmandiri'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statusbpjsmandiri'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statusbpjsmandiri'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statusbpjsmandiri'];
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
        'title' => ['text' => 'Presentase Program Bantuan Status BPJS Mandiri Per Kecamatan Sekota Semarang'],
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
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statusjamsostek'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statusjamsostek'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statusjamsostek'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statusjamsostek'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statusjamsostek'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statusjamsostek'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statusjamsostek'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statusjamsostek'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statusjamsostek'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statusjamsostek'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statusjamsostek'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statusjamsostek'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statusjamsostek'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statusjamsostek'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statusjamsostek'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statusjamsostek'];
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
        'title' => ['text' => 'Presentase Program Bantuan Status Jamsostek Per Kecamatan Sekota Semarang'],
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
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statusasuransi'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statusasuransi'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statusasuransi'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statusasuransi'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statusasuransi'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statusasuransi'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statusasuransi'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statusasuransi'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statusasuransi'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statusasuransi'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statusasuransi'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statusasuransi'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statusasuransi'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statusasuransi'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statusasuransi'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statusasuransi'];
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
        'title' => ['text' => 'Presentase Program Bantuan Status Asuransi Per Kecamatan Sekota Semarang'],
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
        'title' => ['text' => 'Presentase Program Bantuan Status PKH Per Kecamatan Sekota Semarang'],
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
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statusrastra'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statusrastra'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statusrastra'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statusrastra'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statusrastra'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statusrastra'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statusrastra'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statusrastra'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statusrastra'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statusrastra'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statusrastra'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statusrastra'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statusrastra'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statusrastra'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statusrastra'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statusrastra'];
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
        'title' => ['text' => 'Presentase Program Bantuan Status Rastra Per Kecamatan Sekota Semarang'],
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
               $kecamatan1=$program_bantuan['program_bantuan'][0]['statuskur'];
               $kecamatan2=$program_bantuan['program_bantuan'][1]['statuskur'];
               $kecamatan3=$program_bantuan['program_bantuan'][2]['statuskur'];
               $kecamatan4=$program_bantuan['program_bantuan'][3]['statuskur'];
               $kecamatan5=$program_bantuan['program_bantuan'][4]['statuskur'];
               $kecamatan6=$program_bantuan['program_bantuan'][5]['statuskur'];
               $kecamatan7=$program_bantuan['program_bantuan'][6]['statuskur'];
               $kecamatan8=$program_bantuan['program_bantuan'][7]['statuskur'];
               $kecamatan9=$program_bantuan['program_bantuan'][8]['statuskur'];
               $kecamatan10=$program_bantuan['program_bantuan'][9]['statuskur'];
               $kecamatan11=$program_bantuan['program_bantuan'][10]['statuskur'];
               $kecamatan12=$program_bantuan['program_bantuan'][11]['statuskur'];
               $kecamatan13=$program_bantuan['program_bantuan'][12]['statuskur'];
               $kecamatan14=$program_bantuan['program_bantuan'][13]['statuskur'];
               $kecamatan15=$program_bantuan['program_bantuan'][14]['statuskur'];
               $kecamatan16=$program_bantuan['program_bantuan'][15]['statuskur'];
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
        'title' => ['text' => 'Presentase Program Bantuan Status KUR Per Kecamatan Sekota Semarang'],
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
         