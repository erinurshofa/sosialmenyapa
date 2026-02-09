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

$datalansiapria=array();
$datalansiaperempuan=array();
$datalansiasemua=array();
foreach ($lansiaperkelurahan['lansiaperkelurahan'] as $key => $value) {
  $datalansiapria[]=$value['lansiapria'];
  $datalansiaperempuan[]=$value['lansiaperempuan'];
  $datalansiasemua[]=$value['semua'];
}
$totallansiapria=array_sum($datalansiapria);
$totallansiaperempuan=array_sum($datalansiaperempuan);
$totallansiasemua=array_sum($datalansiasemua);
$datajlansiapria=array();
$datajlansiaperempuan=array();
$datajlansiasemua=array();
foreach ($lansiaperkelurahan['lansiaperkelurahan'] as $key => $value) {
  $kelurahan=$value['kelurahan'];
  $persenlansiapria=round(($value['lansiapria']/$totallansiapria)*100,1);
  $persenlansiaperempuan=round(($value['lansiaperempuan']/$totallansiaperempuan)*100,1);
  $persenlansiasemua=round(($value['semua']/$totallansiasemua)*100,1);
  $lansiapria=$value['lansiapria'];
  $lansiaperempuan=$value['lansiaperempuan'];
  $lansiasemua=$value['semua'];
  $opsi=false;
  $datajlansiapria[]=array($kelurahan,$persenlansiapria,$lansiapria,$opsi);
  $datajlansiaperempuan[]=array($kelurahan,$persenlansiaperempuan,$lansiaperempuan,$opsi);
  $datajlansiasemua[]=array($kelurahan,$persenlansiasemua,$lansiasemua,$opsi);
}
?>
              <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-lg"><?=$lansiaperkelurahan['title_pie']?></h4>
                                        <?php
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Presentase Lansia Per Kecamatan Sekota Semarang'],
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
                'data'=>$datajlansiasemua,
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
        'title' => ['text' => 'Presentase Lansia Laki-Laki Per Kelurahan'],
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
                'data'=>$datajlansiapria,
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
        'title' => ['text' => 'Presentase Lansia Perempuan Per Kelurahan'],
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
                'data'=>$datajlansiaperempuan,
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
      