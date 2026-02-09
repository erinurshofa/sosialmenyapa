<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kajiwaik\grid\GridView;
use kajiwaik\expojiwa\ExpojiwaMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\DtksFebruari2022Dtks;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Dokumen;

use miloschuman\highcharts\Highcharts;
 // $dataProvider = new ArrayDataProvider([
 //        'allModels' => $jiwaperkelurahan['jiwaperkelurahan'],
 //    ]);
// dd($jiwaperkelurahan);
?>

            <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-lg"><?=$jiwaperkelurahan['title_pie']?></h4>        
              <?php
$datajiwa=array();
foreach ($jiwaperkelurahan['jiwaperkelurahan'] as $key => $value) {
  $datajiwa[]=$value['jiwa'];
}
$total=array_sum($datajiwa);
$data=array();
foreach ($jiwaperkelurahan['jiwaperkelurahan'] as $key => $value) {
  $kelurahan=$value['kelurahan'];
  $persen=round(($value['jiwa']/$total)*100,1);
  $jiwa=$value['jiwa'];
  $opsi=false;
  $data[]=array($kelurahan,$persen,$jiwa,$opsi);
}
// dd($data);
//                $kelurahan1=$jiwaperkelurahan['jiwaperkelurahan'][0]['jiwa'];
//                $kelurahan2=$jiwaperkelurahan['jiwaperkelurahan'][1]['jiwa'];
//                $kelurahan3=$jiwaperkelurahan['jiwaperkelurahan'][2]['jiwa'];
//                $kelurahan4=$jiwaperkelurahan['jiwaperkelurahan'][3]['jiwa'];
//                $kelurahan5=$jiwaperkelurahan['jiwaperkelurahan'][4]['jiwa'];
//                $kelurahan6=$jiwaperkelurahan['jiwaperkelurahan'][5]['jiwa'];
//                $kelurahan7=$jiwaperkelurahan['jiwaperkelurahan'][6]['jiwa'];
//                $kelurahan8=$jiwaperkelurahan['jiwaperkelurahan'][7]['jiwa'];
//                $kelurahan9=$jiwaperkelurahan['jiwaperkelurahan'][8]['jiwa'];
//                $kelurahan10=@$jiwaperkelurahan['jiwaperkelurahan'][9]['jiwa'];
//                $kelurahan11=@$jiwaperkelurahan['jiwaperkelurahan'][10]['jiwa'];
//                $kelurahan12=@$jiwaperkelurahan['jiwaperkelurahan'][11]['jiwa'];
//                $kelurahan13=@$jiwaperkelurahan['jiwaperkelurahan'][12]['jiwa'];
//                $kelurahan14=@$jiwaperkelurahan['jiwaperkelurahan'][13]['jiwa'];
//                $kelurahan15=@$jiwaperkelurahan['jiwaperkelurahan'][14]['jiwa'];
//                $kelurahan16=@$jiwaperkelurahan['jiwaperkelurahan'][15]['jiwa'];
//                $kelurahan17=@$jiwaperkelurahan['jiwaperkelurahan'][16]['jiwa'];
//                $total=$kelurahan1+$kelurahan2+$kelurahan3+$kelurahan4+$kelurahan5+$kelurahan6+$kelurahan7+$kelurahan8+$kelurahan9+$kelurahan10+$kelurahan11+$kelurahan12+$kelurahan13+$kelurahan14+$kelurahan15+$kelurahan16+$kelurahan17;
//                $persen1=($kelurahan1/$total)*100;
//                $persen2=($kelurahan2/$total)*100;
//                $persen3=($kelurahan3/$total)*100;
//                $persen4=($kelurahan4/$total)*100;
//                $persen5=($kelurahan5/$total)*100;
//                $persen6=($kelurahan6/$total)*100;
//                $persen7=($kelurahan7/$total)*100;
//                $persen8=($kelurahan8/$total)*100;
//                $persen9=($kelurahan9/$total)*100;
//                $persen10=($kelurahan10/$total)*100;
//                $persen11=($kelurahan11/$total)*100;
//                $persen12=($kelurahan12/$total)*100;
//                $persen13=($kelurahan13/$total)*100;
//                $persen14=($kelurahan14/$total)*100;
//                $persen15=($kelurahan15/$total)*100;
//                $persen16=($kelurahan16/$total)*100;
//                $persen17=($kelurahan17/$total)*100;

               // dd([
               //      [$jiwaperkelurahan['jiwaperkelurahan'][0]['kelurahan'], round($persen1,1),false],
               //      [$jiwaperkelurahan['jiwaperkelurahan'][1]['kelurahan'], round($persen2,1),false],
               //      [$jiwaperkelurahan['jiwaperkelurahan'][2]['kelurahan'], round($persen3,1),false],
               //      [$jiwaperkelurahan['jiwaperkelurahan'][3]['kelurahan'], round($persen4,1),false],
               //      [$jiwaperkelurahan['jiwaperkelurahan'][4]['kelurahan'], round($persen5,1),false],
               //      [$jiwaperkelurahan['jiwaperkelurahan'][5]['kelurahan'], round($persen6,1),false],
               //      [$jiwaperkelurahan['jiwaperkelurahan'][6]['kelurahan'], round($persen7,1),false],
               //      [$jiwaperkelurahan['jiwaperkelurahan'][7]['kelurahan'], round($persen8,1),false],
               //      [$jiwaperkelurahan['jiwaperkelurahan'][8]['kelurahan'], round($persen9,1),false],
               //      [$jiwaperkelurahan['jiwaperkelurahan'][9]['kelurahan'], round($persen10,1),false],
               //      [@$jiwaperkelurahan['jiwaperkelurahan'][10]['kelurahan'], round($persen11,1),false],
               //      [@$jiwaperkelurahan['jiwaperkelurahan'][11]['kelurahan'], round($persen12,1),false],
               //      [@$jiwaperkelurahan['jiwaperkelurahan'][12]['kelurahan'], round($persen13,1),false],
               //      [@$jiwaperkelurahan['jiwaperkelurahan'][13]['kelurahan'], round($persen14,1),false],
               //      [@$jiwaperkelurahan['jiwaperkelurahan'][14]['kelurahan'], round($persen15,1),false],
               //      [@$jiwaperkelurahan['jiwaperkelurahan'][15]['kelurahan'], round($persen16,1),false],
               //      [@$jiwaperkelurahan['jiwaperkelurahan'][16]['kelurahan'], round($persen17,1),false],
               //  ]);
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Jiwa Per Kelurahan'],
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
                'name' => 'KELURAHAN',
                'data'=>$data,
                // 'data' => [
                //     [$jiwaperkelurahan['jiwaperkelurahan'][0]['kelurahan'], round($persen1,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][1]['kelurahan'], round($persen2,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][2]['kelurahan'], round($persen3,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][3]['kelurahan'], round($persen4,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][4]['kelurahan'], round($persen5,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][5]['kelurahan'], round($persen6,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][6]['kelurahan'], round($persen7,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][7]['kelurahan'], round($persen8,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][8]['kelurahan'], round($persen9,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][9]['kelurahan'], round($persen10,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][10]['kelurahan'], round($persen11,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][11]['kelurahan'], round($persen12,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][12]['kelurahan'], round($persen13,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][13]['kelurahan'], round($persen14,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][14]['kelurahan'], round($persen15,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][15]['kelurahan'], round($persen16,1),false],
                //     [$jiwaperkelurahan['jiwaperkelurahan'][16]['kelurahan'], round($persen17,1),false],
                // ],
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
