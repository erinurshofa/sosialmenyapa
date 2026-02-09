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
                            <h4 class="mb-lg"><?=$sumber_air_minum['title_pie']?></h4>

                            
                                        <?php
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['merk'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['merk'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['merk'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['merk'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['merk'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['merk'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['merk'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['merk'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['merk'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['merk'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['merk'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['merk'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['merk'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['merk'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['merk'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['merk'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Merk Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['isiulang'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['isiulang'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['isiulang'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['isiulang'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['isiulang'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['isiulang'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['isiulang'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['isiulang'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['isiulang'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['isiulang'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['isiulang'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['isiulang'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['isiulang'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['isiulang'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['isiulang'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['isiulang'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Isi Ulang Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['meteran'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['meteran'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['meteran'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['meteran'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['meteran'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['meteran'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['meteran'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['meteran'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['meteran'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['meteran'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['meteran'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['meteran'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['meteran'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['meteran'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['meteran'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['meteran'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Meteran Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['eceran'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['eceran'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['eceran'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['eceran'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['eceran'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['eceran'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['eceran'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['eceran'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['eceran'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['eceran'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['eceran'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['eceran'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['eceran'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['eceran'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['eceran'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['eceran'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Eceran Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['pompa'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['pompa'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['pompa'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['pompa'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['pompa'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['pompa'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['pompa'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['pompa'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['pompa'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['pompa'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['pompa'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['pompa'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['pompa'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['pompa'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['pompa'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['pompa'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Pompa Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['sterlindung'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['sterlindung'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['sterlindung'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['sterlindung'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['sterlindung'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['sterlindung'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['sterlindung'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['sterlindung'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['sterlindung'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['sterlindung'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['sterlindung'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['sterlindung'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['sterlindung'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['sterlindung'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['sterlindung'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['sterlindung'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Sungai Terlindung Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['stakterlindung'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['stakterlindung'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['stakterlindung'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['stakterlindung'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['stakterlindung'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['stakterlindung'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['stakterlindung'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['stakterlindung'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['stakterlindung'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['stakterlindung'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['stakterlindung'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['stakterlindung'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['stakterlindung'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['stakterlindung'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['stakterlindung'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['stakterlindung'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Sungai Tak Terlindung Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['mtterlindung'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['mtterlindung'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['mtterlindung'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['mtterlindung'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['mtterlindung'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['mtterlindung'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['mtterlindung'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['mtterlindung'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['mtterlindung'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['mtterlindung'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['mtterlindung'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['mtterlindung'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['mtterlindung'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['mtterlindung'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['mtterlindung'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['mtterlindung'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Mata Air Terlindung Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['mttakterlindung'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['mttakterlindung'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['mttakterlindung'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['mttakterlindung'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['mttakterlindung'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['mttakterlindung'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['mttakterlindung'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['mttakterlindung'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['mttakterlindung'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['mttakterlindung'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['mttakterlindung'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['mttakterlindung'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['mttakterlindung'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['mttakterlindung'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['mttakterlindung'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['mttakterlindung'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Mata Air Tak Terlindung Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['sungai'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['sungai'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['sungai'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['sungai'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['sungai'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['sungai'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['sungai'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['sungai'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['sungai'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['sungai'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['sungai'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['sungai'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['sungai'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['sungai'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['sungai'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['sungai'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Sungai Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['hujan'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['hujan'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['hujan'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['hujan'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['hujan'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['hujan'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['hujan'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['hujan'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['hujan'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['hujan'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['hujan'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['hujan'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['hujan'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['hujan'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['hujan'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['hujan'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Hujan Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$sumber_air_minum['sumber_air_minum'][0]['lainnya'];
               $kecamatan2=$sumber_air_minum['sumber_air_minum'][1]['lainnya'];
               $kecamatan3=$sumber_air_minum['sumber_air_minum'][2]['lainnya'];
               $kecamatan4=$sumber_air_minum['sumber_air_minum'][3]['lainnya'];
               $kecamatan5=$sumber_air_minum['sumber_air_minum'][4]['lainnya'];
               $kecamatan6=$sumber_air_minum['sumber_air_minum'][5]['lainnya'];
               $kecamatan7=$sumber_air_minum['sumber_air_minum'][6]['lainnya'];
               $kecamatan8=$sumber_air_minum['sumber_air_minum'][7]['lainnya'];
               $kecamatan9=$sumber_air_minum['sumber_air_minum'][8]['lainnya'];
               $kecamatan10=$sumber_air_minum['sumber_air_minum'][9]['lainnya'];
               $kecamatan11=$sumber_air_minum['sumber_air_minum'][10]['lainnya'];
               $kecamatan12=$sumber_air_minum['sumber_air_minum'][11]['lainnya'];
               $kecamatan13=$sumber_air_minum['sumber_air_minum'][12]['lainnya'];
               $kecamatan14=$sumber_air_minum['sumber_air_minum'][13]['lainnya'];
               $kecamatan15=$sumber_air_minum['sumber_air_minum'][14]['lainnya'];
               $kecamatan16=$sumber_air_minum['sumber_air_minum'][15]['lainnya'];
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
        'title' => ['text' => 'Presentase Sumber Air Minum Lainnya Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
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
                    [$sumber_air_minum['sumber_air_minum'][0]['kecamatan'], round($persen1,1),false],
                    [$sumber_air_minum['sumber_air_minum'][1]['kecamatan'], round($persen2,1),false],
                    [$sumber_air_minum['sumber_air_minum'][2]['kecamatan'], round($persen3,1),false],
                    [$sumber_air_minum['sumber_air_minum'][3]['kecamatan'], round($persen4,1),false],
                    [$sumber_air_minum['sumber_air_minum'][4]['kecamatan'], round($persen5,1),false],
                    [$sumber_air_minum['sumber_air_minum'][5]['kecamatan'], round($persen6,1),false],
                    [$sumber_air_minum['sumber_air_minum'][6]['kecamatan'], round($persen7,1),false],
                    [$sumber_air_minum['sumber_air_minum'][7]['kecamatan'], round($persen8,1),false],
                    [$sumber_air_minum['sumber_air_minum'][8]['kecamatan'], round($persen9,1),false],
                    [$sumber_air_minum['sumber_air_minum'][9]['kecamatan'], round($persen10,1),false],
                    [$sumber_air_minum['sumber_air_minum'][10]['kecamatan'], round($persen11,1),false],
                    [$sumber_air_minum['sumber_air_minum'][11]['kecamatan'], round($persen12,1),false],
                    [$sumber_air_minum['sumber_air_minum'][12]['kecamatan'], round($persen13,1),false],
                    [$sumber_air_minum['sumber_air_minum'][13]['kecamatan'], round($persen14,1),false],
                    [$sumber_air_minum['sumber_air_minum'][14]['kecamatan'], round($persen15,1),false],
                    [$sumber_air_minum['sumber_air_minum'][15]['kecamatan'], round($persen16,1),false],
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
                  