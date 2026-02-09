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
                            <h4 class="mb-lg"><?=$lansia['title_pie']?></h4>

                           
                                        <?php
               $kecamatan1=$lansia['lansia'][0]['lansiapria'];
               $kecamatan2=$lansia['lansia'][1]['lansiapria'];
               $kecamatan3=$lansia['lansia'][2]['lansiapria'];
               $kecamatan4=$lansia['lansia'][3]['lansiapria'];
               $kecamatan5=$lansia['lansia'][4]['lansiapria'];
               $kecamatan6=$lansia['lansia'][5]['lansiapria'];
               $kecamatan7=$lansia['lansia'][6]['lansiapria'];
               $kecamatan8=$lansia['lansia'][7]['lansiapria'];
               $kecamatan9=$lansia['lansia'][8]['lansiapria'];
               $kecamatan10=$lansia['lansia'][9]['lansiapria'];
               $kecamatan11=$lansia['lansia'][10]['lansiapria'];
               $kecamatan12=$lansia['lansia'][11]['lansiapria'];
               $kecamatan13=$lansia['lansia'][12]['lansiapria'];
               $kecamatan14=$lansia['lansia'][13]['lansiapria'];
               $kecamatan15=$lansia['lansia'][14]['lansiapria'];
               $kecamatan16=$lansia['lansia'][15]['lansiapria'];
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
        'title' => ['text' => 'Presentase Lansia Miskin Laki-Laki Per Kecamatan Sekota Semarang'],
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
                    [$lansia['lansia'][0]['kecamatan'], round($persen1,1),false],
                    [$lansia['lansia'][1]['kecamatan'], round($persen2,1),false],
                    [$lansia['lansia'][2]['kecamatan'], round($persen3,1),false],
                    [$lansia['lansia'][3]['kecamatan'], round($persen4,1),false],
                    [$lansia['lansia'][4]['kecamatan'], round($persen5,1),false],
                    [$lansia['lansia'][5]['kecamatan'], round($persen6,1),false],
                    [$lansia['lansia'][6]['kecamatan'], round($persen7,1),false],
                    [$lansia['lansia'][7]['kecamatan'], round($persen8,1),false],
                    [$lansia['lansia'][8]['kecamatan'], round($persen9,1),false],
                    [$lansia['lansia'][9]['kecamatan'], round($persen10,1),false],
                    [$lansia['lansia'][10]['kecamatan'], round($persen11,1),false],
                    [$lansia['lansia'][11]['kecamatan'], round($persen12,1),false],
                    [$lansia['lansia'][12]['kecamatan'], round($persen13,1),false],
                    [$lansia['lansia'][13]['kecamatan'], round($persen14,1),false],
                    [$lansia['lansia'][14]['kecamatan'], round($persen15,1),false],
                    [$lansia['lansia'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$lansia['lansia'][0]['lansiaperempuan'];
               $kecamatan2=$lansia['lansia'][1]['lansiaperempuan'];
               $kecamatan3=$lansia['lansia'][2]['lansiaperempuan'];
               $kecamatan4=$lansia['lansia'][3]['lansiaperempuan'];
               $kecamatan5=$lansia['lansia'][4]['lansiaperempuan'];
               $kecamatan6=$lansia['lansia'][5]['lansiaperempuan'];
               $kecamatan7=$lansia['lansia'][6]['lansiaperempuan'];
               $kecamatan8=$lansia['lansia'][7]['lansiaperempuan'];
               $kecamatan9=$lansia['lansia'][8]['lansiaperempuan'];
               $kecamatan10=$lansia['lansia'][9]['lansiaperempuan'];
               $kecamatan11=$lansia['lansia'][10]['lansiaperempuan'];
               $kecamatan12=$lansia['lansia'][11]['lansiaperempuan'];
               $kecamatan13=$lansia['lansia'][12]['lansiaperempuan'];
               $kecamatan14=$lansia['lansia'][13]['lansiaperempuan'];
               $kecamatan15=$lansia['lansia'][14]['lansiaperempuan'];
               $kecamatan16=$lansia['lansia'][15]['lansiaperempuan'];
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
        'title' => ['text' => 'Presentase Lansia Perempuan Miskin Per Kecamatan Sekota Semarang'],
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
                    [$lansia['lansia'][0]['kecamatan'], round($persen1,1),false],
                    [$lansia['lansia'][1]['kecamatan'], round($persen2,1),false],
                    [$lansia['lansia'][2]['kecamatan'], round($persen3,1),false],
                    [$lansia['lansia'][3]['kecamatan'], round($persen4,1),false],
                    [$lansia['lansia'][4]['kecamatan'], round($persen5,1),false],
                    [$lansia['lansia'][5]['kecamatan'], round($persen6,1),false],
                    [$lansia['lansia'][6]['kecamatan'], round($persen7,1),false],
                    [$lansia['lansia'][7]['kecamatan'], round($persen8,1),false],
                    [$lansia['lansia'][8]['kecamatan'], round($persen9,1),false],
                    [$lansia['lansia'][9]['kecamatan'], round($persen10,1),false],
                    [$lansia['lansia'][10]['kecamatan'], round($persen11,1),false],
                    [$lansia['lansia'][11]['kecamatan'], round($persen12,1),false],
                    [$lansia['lansia'][12]['kecamatan'], round($persen13,1),false],
                    [$lansia['lansia'][13]['kecamatan'], round($persen14,1),false],
                    [$lansia['lansia'][14]['kecamatan'], round($persen15,1),false],
                    [$lansia['lansia'][15]['kecamatan'], round($persen16,1),false],
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
      