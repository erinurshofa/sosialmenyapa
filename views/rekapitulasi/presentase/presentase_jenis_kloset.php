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
                            <h4 class="mb-lg"><?=$jenis_kloset['title_pie']?></h4>          
                                        <?php
               $kecamatan1=$jenis_kloset['jenis_kloset'][0]['leherangsa'];
               $kecamatan2=$jenis_kloset['jenis_kloset'][1]['leherangsa'];
               $kecamatan3=$jenis_kloset['jenis_kloset'][2]['leherangsa'];
               $kecamatan4=$jenis_kloset['jenis_kloset'][3]['leherangsa'];
               $kecamatan5=$jenis_kloset['jenis_kloset'][4]['leherangsa'];
               $kecamatan6=$jenis_kloset['jenis_kloset'][5]['leherangsa'];
               $kecamatan7=$jenis_kloset['jenis_kloset'][6]['leherangsa'];
               $kecamatan8=$jenis_kloset['jenis_kloset'][7]['leherangsa'];
               $kecamatan9=$jenis_kloset['jenis_kloset'][8]['leherangsa'];
               $kecamatan10=$jenis_kloset['jenis_kloset'][9]['leherangsa'];
               $kecamatan11=$jenis_kloset['jenis_kloset'][10]['leherangsa'];
               $kecamatan12=$jenis_kloset['jenis_kloset'][11]['leherangsa'];
               $kecamatan13=$jenis_kloset['jenis_kloset'][12]['leherangsa'];
               $kecamatan14=$jenis_kloset['jenis_kloset'][13]['leherangsa'];
               $kecamatan15=$jenis_kloset['jenis_kloset'][14]['leherangsa'];
               $kecamatan16=$jenis_kloset['jenis_kloset'][15]['leherangsa'];
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
        'title' => ['text' => 'Presentase Jenis Kloset leherangsa Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $jenis_kloset['subtitle']
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
                    [$jenis_kloset['jenis_kloset'][0]['kecamatan'], round($persen1,1),false],
                    [$jenis_kloset['jenis_kloset'][1]['kecamatan'], round($persen2,1),false],
                    [$jenis_kloset['jenis_kloset'][2]['kecamatan'], round($persen3,1),false],
                    [$jenis_kloset['jenis_kloset'][3]['kecamatan'], round($persen4,1),false],
                    [$jenis_kloset['jenis_kloset'][4]['kecamatan'], round($persen5,1),false],
                    [$jenis_kloset['jenis_kloset'][5]['kecamatan'], round($persen6,1),false],
                    [$jenis_kloset['jenis_kloset'][6]['kecamatan'], round($persen7,1),false],
                    [$jenis_kloset['jenis_kloset'][7]['kecamatan'], round($persen8,1),false],
                    [$jenis_kloset['jenis_kloset'][8]['kecamatan'], round($persen9,1),false],
                    [$jenis_kloset['jenis_kloset'][9]['kecamatan'], round($persen10,1),false],
                    [$jenis_kloset['jenis_kloset'][10]['kecamatan'], round($persen11,1),false],
                    [$jenis_kloset['jenis_kloset'][11]['kecamatan'], round($persen12,1),false],
                    [$jenis_kloset['jenis_kloset'][12]['kecamatan'], round($persen13,1),false],
                    [$jenis_kloset['jenis_kloset'][13]['kecamatan'], round($persen14,1),false],
                    [$jenis_kloset['jenis_kloset'][14]['kecamatan'], round($persen15,1),false],
                    [$jenis_kloset['jenis_kloset'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$jenis_kloset['jenis_kloset'][0]['plengsengan'];
               $kecamatan2=$jenis_kloset['jenis_kloset'][1]['plengsengan'];
               $kecamatan3=$jenis_kloset['jenis_kloset'][2]['plengsengan'];
               $kecamatan4=$jenis_kloset['jenis_kloset'][3]['plengsengan'];
               $kecamatan5=$jenis_kloset['jenis_kloset'][4]['plengsengan'];
               $kecamatan6=$jenis_kloset['jenis_kloset'][5]['plengsengan'];
               $kecamatan7=$jenis_kloset['jenis_kloset'][6]['plengsengan'];
               $kecamatan8=$jenis_kloset['jenis_kloset'][7]['plengsengan'];
               $kecamatan9=$jenis_kloset['jenis_kloset'][8]['plengsengan'];
               $kecamatan10=$jenis_kloset['jenis_kloset'][9]['plengsengan'];
               $kecamatan11=$jenis_kloset['jenis_kloset'][10]['plengsengan'];
               $kecamatan12=$jenis_kloset['jenis_kloset'][11]['plengsengan'];
               $kecamatan13=$jenis_kloset['jenis_kloset'][12]['plengsengan'];
               $kecamatan14=$jenis_kloset['jenis_kloset'][13]['plengsengan'];
               $kecamatan15=$jenis_kloset['jenis_kloset'][14]['plengsengan'];
               $kecamatan16=$jenis_kloset['jenis_kloset'][15]['plengsengan'];
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
        'title' => ['text' => 'Presentase Jenis Kloset Genteng Keramik Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $jenis_kloset['subtitle']
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
                    [$jenis_kloset['jenis_kloset'][0]['kecamatan'], round($persen1,1),false],
                    [$jenis_kloset['jenis_kloset'][1]['kecamatan'], round($persen2,1),false],
                    [$jenis_kloset['jenis_kloset'][2]['kecamatan'], round($persen3,1),false],
                    [$jenis_kloset['jenis_kloset'][3]['kecamatan'], round($persen4,1),false],
                    [$jenis_kloset['jenis_kloset'][4]['kecamatan'], round($persen5,1),false],
                    [$jenis_kloset['jenis_kloset'][5]['kecamatan'], round($persen6,1),false],
                    [$jenis_kloset['jenis_kloset'][6]['kecamatan'], round($persen7,1),false],
                    [$jenis_kloset['jenis_kloset'][7]['kecamatan'], round($persen8,1),false],
                    [$jenis_kloset['jenis_kloset'][8]['kecamatan'], round($persen9,1),false],
                    [$jenis_kloset['jenis_kloset'][9]['kecamatan'], round($persen10,1),false],
                    [$jenis_kloset['jenis_kloset'][10]['kecamatan'], round($persen11,1),false],
                    [$jenis_kloset['jenis_kloset'][11]['kecamatan'], round($persen12,1),false],
                    [$jenis_kloset['jenis_kloset'][12]['kecamatan'], round($persen13,1),false],
                    [$jenis_kloset['jenis_kloset'][13]['kecamatan'], round($persen14,1),false],
                    [$jenis_kloset['jenis_kloset'][14]['kecamatan'], round($persen15,1),false],
                    [$jenis_kloset['jenis_kloset'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$jenis_kloset['jenis_kloset'][0]['cemplung'];
               $kecamatan2=$jenis_kloset['jenis_kloset'][1]['cemplung'];
               $kecamatan3=$jenis_kloset['jenis_kloset'][2]['cemplung'];
               $kecamatan4=$jenis_kloset['jenis_kloset'][3]['cemplung'];
               $kecamatan5=$jenis_kloset['jenis_kloset'][4]['cemplung'];
               $kecamatan6=$jenis_kloset['jenis_kloset'][5]['cemplung'];
               $kecamatan7=$jenis_kloset['jenis_kloset'][6]['cemplung'];
               $kecamatan8=$jenis_kloset['jenis_kloset'][7]['cemplung'];
               $kecamatan9=$jenis_kloset['jenis_kloset'][8]['cemplung'];
               $kecamatan10=$jenis_kloset['jenis_kloset'][9]['cemplung'];
               $kecamatan11=$jenis_kloset['jenis_kloset'][10]['cemplung'];
               $kecamatan12=$jenis_kloset['jenis_kloset'][11]['cemplung'];
               $kecamatan13=$jenis_kloset['jenis_kloset'][12]['cemplung'];
               $kecamatan14=$jenis_kloset['jenis_kloset'][13]['cemplung'];
               $kecamatan15=$jenis_kloset['jenis_kloset'][14]['cemplung'];
                $kecamatan16=$jenis_kloset['jenis_kloset'][15]['cemplung'];
               $total=$kecamatan1+$kecamatan2+$kecamatan3+$kecamatan4+$kecamatan5+$kecamatan6+$kecamatan7+$kecamatan8+$kecamatan9+$kecamatan10+$kecamatan11+$kecamatan12+$kecamatan13+$kecamatan14+$kecamatan15;
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
        'title' => ['text' => 'Presentase Jenis Kloset Genteng Metal Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $jenis_kloset['subtitle']
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
                    [$jenis_kloset['jenis_kloset'][0]['kecamatan'], round($persen1,1),false],
                    [$jenis_kloset['jenis_kloset'][1]['kecamatan'], round($persen2,1),false],
                    [$jenis_kloset['jenis_kloset'][2]['kecamatan'], round($persen3,1),false],
                    [$jenis_kloset['jenis_kloset'][3]['kecamatan'], round($persen4,1),false],
                    [$jenis_kloset['jenis_kloset'][4]['kecamatan'], round($persen5,1),false],
                    [$jenis_kloset['jenis_kloset'][5]['kecamatan'], round($persen6,1),false],
                    [$jenis_kloset['jenis_kloset'][6]['kecamatan'], round($persen7,1),false],
                    [$jenis_kloset['jenis_kloset'][7]['kecamatan'], round($persen8,1),false],
                    [$jenis_kloset['jenis_kloset'][8]['kecamatan'], round($persen9,1),false],
                    [$jenis_kloset['jenis_kloset'][9]['kecamatan'], round($persen10,1),false],
                    [$jenis_kloset['jenis_kloset'][10]['kecamatan'], round($persen11,1),false],
                    [$jenis_kloset['jenis_kloset'][11]['kecamatan'], round($persen12,1),false],
                    [$jenis_kloset['jenis_kloset'][12]['kecamatan'], round($persen13,1),false],
                    [$jenis_kloset['jenis_kloset'][13]['kecamatan'], round($persen14,1),false],
                    [$jenis_kloset['jenis_kloset'][14]['kecamatan'], round($persen15,1),false],
                    [$jenis_kloset['jenis_kloset'][15]['kecamatan'], round($persen16,1),false],
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
               $kecamatan1=$jenis_kloset['jenis_kloset'][0]['tidakpakai'];
               $kecamatan2=$jenis_kloset['jenis_kloset'][1]['tidakpakai'];
               $kecamatan3=$jenis_kloset['jenis_kloset'][2]['tidakpakai'];
               $kecamatan4=$jenis_kloset['jenis_kloset'][3]['tidakpakai'];
               $kecamatan5=$jenis_kloset['jenis_kloset'][4]['tidakpakai'];
               $kecamatan6=$jenis_kloset['jenis_kloset'][5]['tidakpakai'];
               $kecamatan7=$jenis_kloset['jenis_kloset'][6]['tidakpakai'];
               $kecamatan8=$jenis_kloset['jenis_kloset'][7]['tidakpakai'];
               $kecamatan9=$jenis_kloset['jenis_kloset'][8]['tidakpakai'];
               $kecamatan10=$jenis_kloset['jenis_kloset'][9]['tidakpakai'];
               $kecamatan11=$jenis_kloset['jenis_kloset'][10]['tidakpakai'];
               $kecamatan12=$jenis_kloset['jenis_kloset'][11]['tidakpakai'];
               $kecamatan13=$jenis_kloset['jenis_kloset'][12]['tidakpakai'];
               $kecamatan14=$jenis_kloset['jenis_kloset'][13]['tidakpakai'];
               $kecamatan15=$jenis_kloset['jenis_kloset'][14]['tidakpakai'];
               $kecamatan16=$jenis_kloset['jenis_kloset'][15]['tidakpakai'];
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
        'title' => ['text' => 'Presentase Jenis Kloset Genteng Tanah Liat Per Kecamatan Sekota Semarang'],
        'subtitle' => [
            'text' => 
            $jenis_kloset['subtitle']
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
                    [$jenis_kloset['jenis_kloset'][0]['kecamatan'], round($persen1,1),false],
                    [$jenis_kloset['jenis_kloset'][1]['kecamatan'], round($persen2,1),false],
                    [$jenis_kloset['jenis_kloset'][2]['kecamatan'], round($persen3,1),false],
                    [$jenis_kloset['jenis_kloset'][3]['kecamatan'], round($persen4,1),false],
                    [$jenis_kloset['jenis_kloset'][4]['kecamatan'], round($persen5,1),false],
                    [$jenis_kloset['jenis_kloset'][5]['kecamatan'], round($persen6,1),false],
                    [$jenis_kloset['jenis_kloset'][6]['kecamatan'], round($persen7,1),false],
                    [$jenis_kloset['jenis_kloset'][7]['kecamatan'], round($persen8,1),false],
                    [$jenis_kloset['jenis_kloset'][8]['kecamatan'], round($persen9,1),false],
                    [$jenis_kloset['jenis_kloset'][9]['kecamatan'], round($persen10,1),false],
                    [$jenis_kloset['jenis_kloset'][10]['kecamatan'], round($persen11,1),false],
                    [$jenis_kloset['jenis_kloset'][11]['kecamatan'], round($persen12,1),false],
                    [$jenis_kloset['jenis_kloset'][12]['kecamatan'], round($persen13,1),false],
                    [$jenis_kloset['jenis_kloset'][13]['kecamatan'], round($persen14,1),false],
                    [$jenis_kloset['jenis_kloset'][14]['kecamatan'], round($persen15,1),false],
                    [$jenis_kloset['jenis_kloset'][15]['kecamatan'], round($persen16,1),false],
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
     