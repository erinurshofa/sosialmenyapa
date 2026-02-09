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
                            <h4 class="mb-lg"><?=$jenis_kelamin['title_pie']?></h4>

                                        <?php
               $kecamatan1=$jenis_kelamin['jenis_kelamin'][0]['pria'];
               $kecamatan2=$jenis_kelamin['jenis_kelamin'][1]['pria'];
               $kecamatan3=$jenis_kelamin['jenis_kelamin'][2]['pria'];
               $kecamatan4=$jenis_kelamin['jenis_kelamin'][3]['pria'];
               $kecamatan5=$jenis_kelamin['jenis_kelamin'][4]['pria'];
               $kecamatan6=$jenis_kelamin['jenis_kelamin'][5]['pria'];
               $kecamatan7=$jenis_kelamin['jenis_kelamin'][6]['pria'];
               $kecamatan8=$jenis_kelamin['jenis_kelamin'][7]['pria'];
               $kecamatan9=$jenis_kelamin['jenis_kelamin'][8]['pria'];
               $kecamatan10=$jenis_kelamin['jenis_kelamin'][9]['pria'];
               $kecamatan11=$jenis_kelamin['jenis_kelamin'][10]['pria'];
               $kecamatan12=$jenis_kelamin['jenis_kelamin'][11]['pria'];
               $kecamatan13=$jenis_kelamin['jenis_kelamin'][12]['pria'];
               $kecamatan14=$jenis_kelamin['jenis_kelamin'][13]['pria'];
               $kecamatan15=$jenis_kelamin['jenis_kelamin'][14]['pria'];
               $kecamatan16=$jenis_kelamin['jenis_kelamin'][15]['pria'];
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
        'title' => ['text' => 'Presentase Laki-Laki Miskin Per Kecamatan Sekota Semarang'],
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
                    [$jenis_kelamin['jenis_kelamin'][0]['kecamatan'], round($persen1,1),false],
                    [$jenis_kelamin['jenis_kelamin'][1]['kecamatan'], round($persen2,1),false],
                    [$jenis_kelamin['jenis_kelamin'][2]['kecamatan'], round($persen3,1),false],
                    [$jenis_kelamin['jenis_kelamin'][3]['kecamatan'], round($persen4,1),false],
                    [$jenis_kelamin['jenis_kelamin'][4]['kecamatan'], round($persen5,1),false],
                    [$jenis_kelamin['jenis_kelamin'][5]['kecamatan'], round($persen6,1),false],
                    [$jenis_kelamin['jenis_kelamin'][6]['kecamatan'], round($persen7,1),false],
                    [$jenis_kelamin['jenis_kelamin'][7]['kecamatan'], round($persen8,1),false],
                    [$jenis_kelamin['jenis_kelamin'][8]['kecamatan'], round($persen9,1),false],
                    [$jenis_kelamin['jenis_kelamin'][9]['kecamatan'], round($persen10,1),false],
                    [$jenis_kelamin['jenis_kelamin'][10]['kecamatan'], round($persen11,1),false],
                    [$jenis_kelamin['jenis_kelamin'][11]['kecamatan'], round($persen12,1),false],
                    [$jenis_kelamin['jenis_kelamin'][12]['kecamatan'], round($persen13,1),false],
                    [$jenis_kelamin['jenis_kelamin'][13]['kecamatan'], round($persen14,1),false],
                    [$jenis_kelamin['jenis_kelamin'][14]['kecamatan'], round($persen15,1),false],
                    [$jenis_kelamin['jenis_kelamin'][15]['kecamatan'], round($persen16,1),false],

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
               $kecamatan1=$jenis_kelamin['jenis_kelamin'][0]['perempuan'];
               $kecamatan2=$jenis_kelamin['jenis_kelamin'][1]['perempuan'];
               $kecamatan3=$jenis_kelamin['jenis_kelamin'][2]['perempuan'];
               $kecamatan4=$jenis_kelamin['jenis_kelamin'][3]['perempuan'];
               $kecamatan5=$jenis_kelamin['jenis_kelamin'][4]['perempuan'];
               $kecamatan6=$jenis_kelamin['jenis_kelamin'][5]['perempuan'];
               $kecamatan7=$jenis_kelamin['jenis_kelamin'][6]['perempuan'];
               $kecamatan8=$jenis_kelamin['jenis_kelamin'][7]['perempuan'];
               $kecamatan9=$jenis_kelamin['jenis_kelamin'][8]['perempuan'];
               $kecamatan10=$jenis_kelamin['jenis_kelamin'][9]['perempuan'];
               $kecamatan11=$jenis_kelamin['jenis_kelamin'][10]['perempuan'];
               $kecamatan12=$jenis_kelamin['jenis_kelamin'][11]['perempuan'];
               $kecamatan13=$jenis_kelamin['jenis_kelamin'][12]['perempuan'];
               $kecamatan14=$jenis_kelamin['jenis_kelamin'][13]['perempuan'];
               $kecamatan15=$jenis_kelamin['jenis_kelamin'][14]['perempuan'];
               $kecamatan16=$jenis_kelamin['jenis_kelamin'][15]['perempuan'];
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
        'title' => ['text' => 'Presentase Perempuan Miskin Per Kecamatan Sekota Semarang'],
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
                    [$jenis_kelamin['jenis_kelamin'][0]['kecamatan'], round($persen1,1),false],
                    [$jenis_kelamin['jenis_kelamin'][1]['kecamatan'], round($persen2,1),false],
                    [$jenis_kelamin['jenis_kelamin'][2]['kecamatan'], round($persen3,1),false],
                    [$jenis_kelamin['jenis_kelamin'][3]['kecamatan'], round($persen4,1),false],
                    [$jenis_kelamin['jenis_kelamin'][4]['kecamatan'], round($persen5,1),false],
                    [$jenis_kelamin['jenis_kelamin'][5]['kecamatan'], round($persen6,1),false],
                    [$jenis_kelamin['jenis_kelamin'][6]['kecamatan'], round($persen7,1),false],
                    [$jenis_kelamin['jenis_kelamin'][7]['kecamatan'], round($persen8,1),false],
                    [$jenis_kelamin['jenis_kelamin'][8]['kecamatan'], round($persen9,1),false],
                    [$jenis_kelamin['jenis_kelamin'][9]['kecamatan'], round($persen10,1),false],
                    [$jenis_kelamin['jenis_kelamin'][10]['kecamatan'], round($persen11,1),false],
                    [$jenis_kelamin['jenis_kelamin'][11]['kecamatan'], round($persen12,1),false],
                    [$jenis_kelamin['jenis_kelamin'][12]['kecamatan'], round($persen13,1),false],
                    [$jenis_kelamin['jenis_kelamin'][13]['kecamatan'], round($persen14,1),false],
                    [$jenis_kelamin['jenis_kelamin'][14]['kecamatan'], round($persen15,1),false],
                    [$jenis_kelamin['jenis_kelamin'][15]['kecamatan'], round($persen16,1),false],
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
                        