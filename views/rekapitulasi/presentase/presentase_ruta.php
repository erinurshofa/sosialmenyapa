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
                            <h4 class="mb-lg"><?=$ruta['title_pie']?></h4>

                                        <?php
               $kecamatan1=$ruta['ruta'][0]['rt'];
               $kecamatan2=$ruta['ruta'][1]['rt'];
               $kecamatan3=$ruta['ruta'][2]['rt'];
               $kecamatan4=$ruta['ruta'][3]['rt'];
               $kecamatan5=$ruta['ruta'][4]['rt'];
               $kecamatan6=$ruta['ruta'][5]['rt'];
               $kecamatan7=$ruta['ruta'][6]['rt'];
               $kecamatan8=$ruta['ruta'][7]['rt'];
               $kecamatan9=$ruta['ruta'][8]['rt'];
               $kecamatan10=$ruta['ruta'][9]['rt'];
               $kecamatan11=$ruta['ruta'][10]['rt'];
               $kecamatan12=$ruta['ruta'][11]['rt'];
               $kecamatan13=$ruta['ruta'][12]['rt'];
               $kecamatan14=$ruta['ruta'][13]['rt'];
               $kecamatan15=$ruta['ruta'][14]['rt'];
               $kecamatan16=$ruta['ruta'][15]['rt'];
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
        'title' => ['text' => 'Presentase Rumah Tangga Miskin Per Kecamatan Sekota Semarang'],
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
                    [$ruta['ruta'][0]['kecamatan'], round($persen1,1),false],
                    [$ruta['ruta'][1]['kecamatan'], round($persen2,1),false],
                    [$ruta['ruta'][2]['kecamatan'], round($persen3,1),false],
                    [$ruta['ruta'][3]['kecamatan'], round($persen4,1),false],
                    [$ruta['ruta'][4]['kecamatan'], round($persen5,1),false],
                    [$ruta['ruta'][5]['kecamatan'], round($persen6,1),false],
                    [$ruta['ruta'][6]['kecamatan'], round($persen7,1),false],
                    [$ruta['ruta'][7]['kecamatan'], round($persen8,1),false],
                    [$ruta['ruta'][8]['kecamatan'], round($persen9,1),false],
                    [$ruta['ruta'][9]['kecamatan'], round($persen10,1),false],
                    [$ruta['ruta'][10]['kecamatan'], round($persen11,1),false],
                    [$ruta['ruta'][11]['kecamatan'], round($persen12,1),false],
                    [$ruta['ruta'][12]['kecamatan'], round($persen13,1),false],
                    [$ruta['ruta'][13]['kecamatan'], round($persen14,1),false],
                    [$ruta['ruta'][14]['kecamatan'], round($persen15,1),false],
                    [$ruta['ruta'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$ruta['ruta'][0]['jiwa'];
               $kecamatan2=$ruta['ruta'][1]['jiwa'];
               $kecamatan3=$ruta['ruta'][2]['jiwa'];
               $kecamatan4=$ruta['ruta'][3]['jiwa'];
               $kecamatan5=$ruta['ruta'][4]['jiwa'];
               $kecamatan6=$ruta['ruta'][5]['jiwa'];
               $kecamatan7=$ruta['ruta'][6]['jiwa'];
               $kecamatan8=$ruta['ruta'][7]['jiwa'];
               $kecamatan9=$ruta['ruta'][8]['jiwa'];
               $kecamatan10=$ruta['ruta'][9]['jiwa'];
               $kecamatan11=$ruta['ruta'][10]['jiwa'];
               $kecamatan12=$ruta['ruta'][11]['jiwa'];
               $kecamatan13=$ruta['ruta'][12]['jiwa'];
               $kecamatan14=$ruta['ruta'][13]['jiwa'];
               $kecamatan15=$ruta['ruta'][14]['jiwa'];
               $kecamatan16=$ruta['ruta'][15]['jiwa'];
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
        'title' => ['text' => 'Presentase Jiwa Miskin Per Kecamatan Sekota Semarang'],
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
                    [$ruta['ruta'][0]['kecamatan'], round($persen1,1),false],
                    [$ruta['ruta'][1]['kecamatan'], round($persen2,1),false],
                    [$ruta['ruta'][2]['kecamatan'], round($persen3,1),false],
                    [$ruta['ruta'][3]['kecamatan'], round($persen4,1),false],
                    [$ruta['ruta'][4]['kecamatan'], round($persen5,1),false],
                    [$ruta['ruta'][5]['kecamatan'], round($persen6,1),false],
                    [$ruta['ruta'][6]['kecamatan'], round($persen7,1),false],
                    [$ruta['ruta'][7]['kecamatan'], round($persen8,1),false],
                    [$ruta['ruta'][8]['kecamatan'], round($persen9,1),false],
                    [$ruta['ruta'][9]['kecamatan'], round($persen10,1),false],
                    [$ruta['ruta'][10]['kecamatan'], round($persen11,1),false],
                    [$ruta['ruta'][11]['kecamatan'], round($persen12,1),false],
                    [$ruta['ruta'][12]['kecamatan'], round($persen13,1),false],
                    [$ruta['ruta'][13]['kecamatan'], round($persen14,1),false],
                    [$ruta['ruta'][14]['kecamatan'], round($persen15,1),false],
                    [$ruta['ruta'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$ruta['ruta'][0]['keluarga'];
               $kecamatan2=$ruta['ruta'][1]['keluarga'];
               $kecamatan3=$ruta['ruta'][2]['keluarga'];
               $kecamatan4=$ruta['ruta'][3]['keluarga'];
               $kecamatan5=$ruta['ruta'][4]['keluarga'];
               $kecamatan6=$ruta['ruta'][5]['keluarga'];
               $kecamatan7=$ruta['ruta'][6]['keluarga'];
               $kecamatan8=$ruta['ruta'][7]['keluarga'];
               $kecamatan9=$ruta['ruta'][8]['keluarga'];
               $kecamatan10=$ruta['ruta'][9]['keluarga'];
               $kecamatan11=$ruta['ruta'][10]['keluarga'];
               $kecamatan12=$ruta['ruta'][11]['keluarga'];
               $kecamatan13=$ruta['ruta'][12]['keluarga'];
               $kecamatan14=$ruta['ruta'][13]['keluarga'];
               $kecamatan15=$ruta['ruta'][14]['keluarga'];
               $kecamatan16=$ruta['ruta'][15]['keluarga'];
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
        'title' => ['text' => 'Presentase Keluarga Miskin Per Kecamatan Sekota Semarang'],
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
                    [$ruta['ruta'][0]['kecamatan'], round($persen1,1),false],
                    [$ruta['ruta'][1]['kecamatan'], round($persen2,1),false],
                    [$ruta['ruta'][2]['kecamatan'], round($persen3,1),false],
                    [$ruta['ruta'][3]['kecamatan'], round($persen4,1),false],
                    [$ruta['ruta'][4]['kecamatan'], round($persen5,1),false],
                    [$ruta['ruta'][5]['kecamatan'], round($persen6,1),false],
                    [$ruta['ruta'][6]['kecamatan'], round($persen7,1),false],
                    [$ruta['ruta'][7]['kecamatan'], round($persen8,1),false],
                    [$ruta['ruta'][8]['kecamatan'], round($persen9,1),false],
                    [$ruta['ruta'][9]['kecamatan'], round($persen10,1),false],
                    [$ruta['ruta'][10]['kecamatan'], round($persen11,1),false],
                    [$ruta['ruta'][11]['kecamatan'], round($persen12,1),false],
                    [$ruta['ruta'][12]['kecamatan'], round($persen13,1),false],
                    [$ruta['ruta'][13]['kecamatan'], round($persen14,1),false],
                    [$ruta['ruta'][14]['kecamatan'], round($persen15,1),false],
                    [$ruta['ruta'][15]['kecamatan'], round($persen16,1),false],
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
