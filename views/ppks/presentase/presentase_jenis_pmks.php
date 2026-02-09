<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\DtksFebruari2022Dtks;
use app\models\Kecamatan;
use app\models\Dokumen;
use app\models\Bdtrt;
use miloschuman\highcharts\Highcharts;
 // $dataProvider = new ArrayDataProvider([
 //        'allModels' => $kk['kk'],
 //    ]);
?>
            <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-lg"><?=$kk['title_pie']?></h4>
           <?php
               $kecamatan1=$kk['kk'][0]['kk'];
               $kecamatan2=$kk['kk'][1]['kk'];
               $kecamatan3=$kk['kk'][2]['kk'];
               $kecamatan4=$kk['kk'][3]['kk'];
               $kecamatan5=$kk['kk'][4]['kk'];
               $kecamatan6=$kk['kk'][5]['kk'];
               $kecamatan7=$kk['kk'][6]['kk'];
               $kecamatan8=$kk['kk'][7]['kk'];
               $kecamatan9=$kk['kk'][8]['kk'];
               $kecamatan10=$kk['kk'][9]['kk'];
               $kecamatan11=$kk['kk'][10]['kk'];
               $kecamatan12=$kk['kk'][11]['kk'];
               $kecamatan13=$kk['kk'][12]['kk'];
               $kecamatan14=$kk['kk'][13]['kk'];
               $kecamatan15=$kk['kk'][14]['kk'];
               $kecamatan16=$kk['kk'][15]['kk'];
               $kecamatan17=$kk['kk'][16]['kk'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15+$kecamatan16+$kecamatan17;
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
               $persen17=($kecamatan17/$total)*100;
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Keluarga Per Kecamatan Sekota Semarang'],
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
                    [$kk['kk'][0]['kecamatan'], round($persen1,1),false],
                    [$kk['kk'][1]['kecamatan'], round($persen2,1),false],
                    [$kk['kk'][2]['kecamatan'], round($persen3,1),false],
                    [$kk['kk'][3]['kecamatan'], round($persen4,1),false],
                    [$kk['kk'][4]['kecamatan'], round($persen5,1),false],
                    [$kk['kk'][5]['kecamatan'], round($persen6,1),false],
                    [$kk['kk'][6]['kecamatan'], round($persen7,1),false],
                    [$kk['kk'][7]['kecamatan'], round($persen8,1),false],
                    [$kk['kk'][8]['kecamatan'], round($persen9,1),false],
                    [$kk['kk'][9]['kecamatan'], round($persen10,1),false],
                    [$kk['kk'][10]['kecamatan'], round($persen11,1),false],
                    [$kk['kk'][11]['kecamatan'], round($persen12,1),false],
                    [$kk['kk'][12]['kecamatan'], round($persen13,1),false],
                    [$kk['kk'][13]['kecamatan'], round($persen14,1),false],
                    [$kk['kk'][14]['kecamatan'], round($persen15,1),false],
                    [$kk['kk'][15]['kecamatan'], round($persen16,1),false],
                    [$kk['kk'][16]['kecamatan'], round($persen17,1),false],
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
