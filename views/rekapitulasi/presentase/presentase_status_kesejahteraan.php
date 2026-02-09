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
                            <h4 class="mb-lg"><?=$status_kesejahteraan['title_pie']?></h4>
                            
                                        <?php
               $kecamatan1=$status_kesejahteraan['status_kesejahteraan'][0]['sangatmiskin'];
               $kecamatan2=$status_kesejahteraan['status_kesejahteraan'][1]['sangatmiskin'];
               $kecamatan3=$status_kesejahteraan['status_kesejahteraan'][2]['sangatmiskin'];
               $kecamatan4=$status_kesejahteraan['status_kesejahteraan'][3]['sangatmiskin'];
               $kecamatan5=$status_kesejahteraan['status_kesejahteraan'][4]['sangatmiskin'];
               $kecamatan6=$status_kesejahteraan['status_kesejahteraan'][5]['sangatmiskin'];
               $kecamatan7=$status_kesejahteraan['status_kesejahteraan'][6]['sangatmiskin'];
               $kecamatan8=$status_kesejahteraan['status_kesejahteraan'][7]['sangatmiskin'];
               $kecamatan9=$status_kesejahteraan['status_kesejahteraan'][8]['sangatmiskin'];
               $kecamatan10=$status_kesejahteraan['status_kesejahteraan'][9]['sangatmiskin'];
               $kecamatan11=$status_kesejahteraan['status_kesejahteraan'][10]['sangatmiskin'];
               $kecamatan12=$status_kesejahteraan['status_kesejahteraan'][11]['sangatmiskin'];
               $kecamatan13=$status_kesejahteraan['status_kesejahteraan'][12]['sangatmiskin'];
               $kecamatan14=$status_kesejahteraan['status_kesejahteraan'][13]['sangatmiskin'];
               $kecamatan15=$status_kesejahteraan['status_kesejahteraan'][14]['sangatmiskin'];
               $kecamatan16=$status_kesejahteraan['status_kesejahteraan'][15]['sangatmiskin'];
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
        'title' => ['text' => 'Presentase Sangat Miskin Per Kecamatan Sekota Semarang'],
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
                    [$status_kesejahteraan['status_kesejahteraan'][0]['kecamatan'], round($persen1,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][1]['kecamatan'], round($persen2,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][2]['kecamatan'], round($persen3,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][3]['kecamatan'], round($persen4,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][4]['kecamatan'], round($persen5,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][5]['kecamatan'], round($persen6,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][6]['kecamatan'], round($persen7,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][7]['kecamatan'], round($persen8,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][8]['kecamatan'], round($persen9,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][9]['kecamatan'], round($persen10,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][10]['kecamatan'], round($persen11,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][11]['kecamatan'], round($persen12,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][12]['kecamatan'], round($persen13,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][13]['kecamatan'], round($persen14,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][14]['kecamatan'], round($persen15,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][15]['kecamatan'], round($persen16,1),false],

                ],
                // 'data'=>$datastatus_kesejahteraan1,
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
               $kecamatan1=$status_kesejahteraan['status_kesejahteraan'][0]['miskin'];
               $kecamatan2=$status_kesejahteraan['status_kesejahteraan'][1]['miskin'];
               $kecamatan3=$status_kesejahteraan['status_kesejahteraan'][2]['miskin'];
               $kecamatan4=$status_kesejahteraan['status_kesejahteraan'][3]['miskin'];
               $kecamatan5=$status_kesejahteraan['status_kesejahteraan'][4]['miskin'];
               $kecamatan6=$status_kesejahteraan['status_kesejahteraan'][5]['miskin'];
               $kecamatan7=$status_kesejahteraan['status_kesejahteraan'][6]['miskin'];
               $kecamatan8=$status_kesejahteraan['status_kesejahteraan'][7]['miskin'];
               $kecamatan9=$status_kesejahteraan['status_kesejahteraan'][8]['miskin'];
               $kecamatan10=$status_kesejahteraan['status_kesejahteraan'][9]['miskin'];
               $kecamatan11=$status_kesejahteraan['status_kesejahteraan'][10]['miskin'];
               $kecamatan12=$status_kesejahteraan['status_kesejahteraan'][11]['miskin'];
               $kecamatan13=$status_kesejahteraan['status_kesejahteraan'][12]['miskin'];
               $kecamatan14=$status_kesejahteraan['status_kesejahteraan'][13]['miskin'];
               $kecamatan15=$status_kesejahteraan['status_kesejahteraan'][14]['miskin'];
               $kecamatan16=$status_kesejahteraan['status_kesejahteraan'][15]['miskin'];
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
        'title' => ['text' => 'Presentase Miskin Per Kecamatan Sekota Semarang'],
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
                    [$status_kesejahteraan['status_kesejahteraan'][0]['kecamatan'], round($persen1,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][1]['kecamatan'], round($persen2,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][2]['kecamatan'], round($persen3,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][3]['kecamatan'], round($persen4,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][4]['kecamatan'], round($persen5,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][5]['kecamatan'], round($persen6,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][6]['kecamatan'], round($persen7,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][7]['kecamatan'], round($persen8,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][8]['kecamatan'], round($persen9,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][9]['kecamatan'], round($persen10,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][10]['kecamatan'], round($persen11,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][11]['kecamatan'], round($persen12,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][12]['kecamatan'], round($persen13,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][13]['kecamatan'], round($persen14,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][14]['kecamatan'], round($persen15,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][15]['kecamatan'], round($persen16,1),false],

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
               $kecamatan1=$status_kesejahteraan['status_kesejahteraan'][0]['hampirmiskin'];
               $kecamatan2=$status_kesejahteraan['status_kesejahteraan'][1]['hampirmiskin'];
               $kecamatan3=$status_kesejahteraan['status_kesejahteraan'][2]['hampirmiskin'];
               $kecamatan4=$status_kesejahteraan['status_kesejahteraan'][3]['hampirmiskin'];
               $kecamatan5=$status_kesejahteraan['status_kesejahteraan'][4]['hampirmiskin'];
               $kecamatan6=$status_kesejahteraan['status_kesejahteraan'][5]['hampirmiskin'];
               $kecamatan7=$status_kesejahteraan['status_kesejahteraan'][6]['hampirmiskin'];
               $kecamatan8=$status_kesejahteraan['status_kesejahteraan'][7]['hampirmiskin'];
               $kecamatan9=$status_kesejahteraan['status_kesejahteraan'][8]['hampirmiskin'];
               $kecamatan10=$status_kesejahteraan['status_kesejahteraan'][9]['hampirmiskin'];
               $kecamatan11=$status_kesejahteraan['status_kesejahteraan'][10]['hampirmiskin'];
               $kecamatan12=$status_kesejahteraan['status_kesejahteraan'][11]['hampirmiskin'];
               $kecamatan13=$status_kesejahteraan['status_kesejahteraan'][12]['hampirmiskin'];
               $kecamatan14=$status_kesejahteraan['status_kesejahteraan'][13]['hampirmiskin'];
               $kecamatan15=$status_kesejahteraan['status_kesejahteraan'][14]['hampirmiskin'];
               $kecamatan16=$status_kesejahteraan['status_kesejahteraan'][15]['hampirmiskin'];
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
        'title' => ['text' => 'Presentase Hampir Miskin Per Kecamatan Sekota Semarang'],
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
                    [$status_kesejahteraan['status_kesejahteraan'][0]['kecamatan'], round($persen1,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][1]['kecamatan'], round($persen2,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][2]['kecamatan'], round($persen3,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][3]['kecamatan'], round($persen4,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][4]['kecamatan'], round($persen5,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][5]['kecamatan'], round($persen6,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][6]['kecamatan'], round($persen7,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][7]['kecamatan'], round($persen8,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][8]['kecamatan'], round($persen9,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][9]['kecamatan'], round($persen10,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][10]['kecamatan'], round($persen11,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][11]['kecamatan'], round($persen12,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][12]['kecamatan'], round($persen13,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][13]['kecamatan'], round($persen14,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][14]['kecamatan'], round($persen15,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][15]['kecamatan'], round($persen16,1),false],

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
               $kecamatan1=$status_kesejahteraan['status_kesejahteraan'][0]['rentanmiskin'];
               $kecamatan2=$status_kesejahteraan['status_kesejahteraan'][1]['rentanmiskin'];
               $kecamatan3=$status_kesejahteraan['status_kesejahteraan'][2]['rentanmiskin'];
               $kecamatan4=$status_kesejahteraan['status_kesejahteraan'][3]['rentanmiskin'];
               $kecamatan5=$status_kesejahteraan['status_kesejahteraan'][4]['rentanmiskin'];
               $kecamatan6=$status_kesejahteraan['status_kesejahteraan'][5]['rentanmiskin'];
               $kecamatan7=$status_kesejahteraan['status_kesejahteraan'][6]['rentanmiskin'];
               $kecamatan8=$status_kesejahteraan['status_kesejahteraan'][7]['rentanmiskin'];
               $kecamatan9=$status_kesejahteraan['status_kesejahteraan'][8]['rentanmiskin'];
               $kecamatan10=$status_kesejahteraan['status_kesejahteraan'][9]['rentanmiskin'];
               $kecamatan11=$status_kesejahteraan['status_kesejahteraan'][10]['rentanmiskin'];
               $kecamatan12=$status_kesejahteraan['status_kesejahteraan'][11]['rentanmiskin'];
               $kecamatan13=$status_kesejahteraan['status_kesejahteraan'][12]['rentanmiskin'];
               $kecamatan14=$status_kesejahteraan['status_kesejahteraan'][13]['rentanmiskin'];
               $kecamatan15=$status_kesejahteraan['status_kesejahteraan'][14]['rentanmiskin'];
               $kecamatan16=$status_kesejahteraan['status_kesejahteraan'][15]['rentanmiskin'];
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
        'title' => ['text' => 'Presentase Rentan Miskin Per Kecamatan Sekota Semarang'],
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
                    [$status_kesejahteraan['status_kesejahteraan'][0]['kecamatan'], round($persen1,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][1]['kecamatan'], round($persen2,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][2]['kecamatan'], round($persen3,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][3]['kecamatan'], round($persen4,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][4]['kecamatan'], round($persen5,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][5]['kecamatan'], round($persen6,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][6]['kecamatan'], round($persen7,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][7]['kecamatan'], round($persen8,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][8]['kecamatan'], round($persen9,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][9]['kecamatan'], round($persen10,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][10]['kecamatan'], round($persen11,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][11]['kecamatan'], round($persen12,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][12]['kecamatan'], round($persen13,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][13]['kecamatan'], round($persen14,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][14]['kecamatan'], round($persen15,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][15]['kecamatan'], round($persen16,1),false],

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
               $kecamatan1=$status_kesejahteraan['status_kesejahteraan'][0]['menujumiddleclass'];
               $kecamatan2=$status_kesejahteraan['status_kesejahteraan'][1]['menujumiddleclass'];
               $kecamatan3=$status_kesejahteraan['status_kesejahteraan'][2]['menujumiddleclass'];
               $kecamatan4=$status_kesejahteraan['status_kesejahteraan'][3]['menujumiddleclass'];
               $kecamatan5=$status_kesejahteraan['status_kesejahteraan'][4]['menujumiddleclass'];
               $kecamatan6=$status_kesejahteraan['status_kesejahteraan'][5]['menujumiddleclass'];
               $kecamatan7=$status_kesejahteraan['status_kesejahteraan'][6]['menujumiddleclass'];
               $kecamatan8=$status_kesejahteraan['status_kesejahteraan'][7]['menujumiddleclass'];
               $kecamatan9=$status_kesejahteraan['status_kesejahteraan'][8]['menujumiddleclass'];
               $kecamatan10=$status_kesejahteraan['status_kesejahteraan'][9]['menujumiddleclass'];
               $kecamatan11=$status_kesejahteraan['status_kesejahteraan'][10]['menujumiddleclass'];
               $kecamatan12=$status_kesejahteraan['status_kesejahteraan'][11]['menujumiddleclass'];
               $kecamatan13=$status_kesejahteraan['status_kesejahteraan'][12]['menujumiddleclass'];
               $kecamatan14=$status_kesejahteraan['status_kesejahteraan'][13]['menujumiddleclass'];
               $kecamatan15=$status_kesejahteraan['status_kesejahteraan'][14]['menujumiddleclass'];
               $kecamatan16=$status_kesejahteraan['status_kesejahteraan'][15]['menujumiddleclass'];
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
        'title' => ['text' => 'Presentase Menuju Middle Class Per Kecamatan Sekota Semarang'],
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
                    [$status_kesejahteraan['status_kesejahteraan'][0]['kecamatan'], round($persen1,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][1]['kecamatan'], round($persen2,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][2]['kecamatan'], round($persen3,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][3]['kecamatan'], round($persen4,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][4]['kecamatan'], round($persen5,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][5]['kecamatan'], round($persen6,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][6]['kecamatan'], round($persen7,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][7]['kecamatan'], round($persen8,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][8]['kecamatan'], round($persen9,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][9]['kecamatan'], round($persen10,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][10]['kecamatan'], round($persen11,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][11]['kecamatan'], round($persen12,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][12]['kecamatan'], round($persen13,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][13]['kecamatan'], round($persen14,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][14]['kecamatan'], round($persen15,1),false],
                    [$status_kesejahteraan['status_kesejahteraan'][15]['kecamatan'], round($persen16,1),false],

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