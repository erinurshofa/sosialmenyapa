<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kajiwaik\grid\GridView;
use kajiwaik\expojiwa\ExpojiwaMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\DtksFebruari2022Dtks;
use app\models\Kecamatan;
use app\models\Dokumen;

use miloschuman\highcharts\Highcharts;
 // $dataProvider = new ArrayDataProvider([
 //        'allModels' => $jiwa['jiwa'],
 //    ]);
?>
            <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-lg"><?=$jiwa['title_pie']?></h4>

                                   
                                                                               <?php
               $kecamatan1=$jiwa['jiwa'][0]['jiwa'];
               $kecamatan2=$jiwa['jiwa'][1]['jiwa'];
               $kecamatan3=$jiwa['jiwa'][2]['jiwa'];
               $kecamatan4=$jiwa['jiwa'][3]['jiwa'];
               $kecamatan5=$jiwa['jiwa'][4]['jiwa'];
               $kecamatan6=$jiwa['jiwa'][5]['jiwa'];
               $kecamatan7=$jiwa['jiwa'][6]['jiwa'];
               $kecamatan8=$jiwa['jiwa'][7]['jiwa'];
               $kecamatan9=$jiwa['jiwa'][8]['jiwa'];
               $kecamatan10=$jiwa['jiwa'][9]['jiwa'];
               $kecamatan11=$jiwa['jiwa'][10]['jiwa'];
               $kecamatan12=$jiwa['jiwa'][11]['jiwa'];
               $kecamatan13=$jiwa['jiwa'][12]['jiwa'];
               $kecamatan14=$jiwa['jiwa'][13]['jiwa'];
               $kecamatan15=$jiwa['jiwa'][14]['jiwa'];
               $kecamatan16=$jiwa['jiwa'][15]['jiwa'];
               $kecamatan17=$jiwa['jiwa'][16]['jiwa'];
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
        'title' => ['text' => 'Presentase Jiwa Per Kecamatan Sekota Semarang'],
        'tooltip'=>[ 
          'pointFormat'=> '
                          Presentase : <b>{point.percentage:.1f} % </b></br>
                          Jumlah : <b>{point.a}</b>
                          '
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
                'keys'=> ['name', 'y','a', 'selected', 'sliced'],
                'name' => 'Kecamatan',
                'data' => [
                    [$jiwa['jiwa'][0]['kecamatan'], round($persen1,1),$kecamatan1,false],
                    [$jiwa['jiwa'][1]['kecamatan'], round($persen2,1),$kecamatan2,false],
                    [$jiwa['jiwa'][2]['kecamatan'], round($persen3,1),$kecamatan3,false],
                    [$jiwa['jiwa'][3]['kecamatan'], round($persen4,1),$kecamatan4,false],
                    [$jiwa['jiwa'][4]['kecamatan'], round($persen5,1),$kecamatan5,false],
                    [$jiwa['jiwa'][5]['kecamatan'], round($persen6,1),$kecamatan6,false],
                    [$jiwa['jiwa'][6]['kecamatan'], round($persen7,1),$kecamatan7,false],
                    [$jiwa['jiwa'][7]['kecamatan'], round($persen8,1),$kecamatan8,false],
                    [$jiwa['jiwa'][8]['kecamatan'], round($persen9,1),$kecamatan9,false],
                    [$jiwa['jiwa'][9]['kecamatan'], round($persen10,1),$kecamatan10,false],
                    [$jiwa['jiwa'][10]['kecamatan'], round($persen11,1),$kecamatan11,false],
                    [$jiwa['jiwa'][11]['kecamatan'], round($persen12,1),$kecamatan12,false],
                    [$jiwa['jiwa'][12]['kecamatan'], round($persen13,1),$kecamatan13,false],
                    [$jiwa['jiwa'][13]['kecamatan'], round($persen14,1),$kecamatan14,false],
                    [$jiwa['jiwa'][14]['kecamatan'], round($persen15,1),$kecamatan15,false],
                    [$jiwa['jiwa'][15]['kecamatan'], round($persen16,1),$kecamatan16,false],
                    [$jiwa['jiwa'][16]['kecamatan'], round($persen17,1),$kecamatan17,false],
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
