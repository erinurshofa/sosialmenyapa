<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\Kecamatan;
use app\models\Dokumen;

use miloschuman\highcharts\Highcharts;
$datapria=array();
$dataperempuan=array();
foreach ($jeniskelaminperkelurahan['jeniskelaminperkelurahan'] as $key => $value) {
  $datapria[]=$value['pria'];
  $dataperempuan[]=$value['perempuan'];
}
$totalpria=array_sum($datapria);
$totalperempuan=array_sum($dataperempuan);
$datajpria=array();
$datajperempuan=array();
foreach ($jeniskelaminperkelurahan['jeniskelaminperkelurahan'] as $key => $value) {
  $kelurahan=$value['kelurahan'];
  $persenpria=round(($value['pria']/$totalpria)*100,1);
  $persenperempuan=round(($value['perempuan']/$totalperempuan)*100,1);
  $pria=$value['pria'];
  $perempuan=$value['perempuan'];
  $opsi=false;
  $datajpria[]=array($kelurahan,$persenpria,$pria,$opsi);
  $datajperempuan[]=array($kelurahan,$persenperempuan,$perempuan,$opsi);
}
?>
           <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-lg"><?=$jeniskelaminperkelurahan['title_pie']?></h4>

                                        <?php
               
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Laki-Laki Per Kelurahan'],
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
                'name' => 'Kelurahan',
                'data'=>$datajpria,
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
               
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Perempuan Per Kelurahan'],
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
                'name' => 'Kelurahan',
               'data'=>$datajperempuan,
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
                        