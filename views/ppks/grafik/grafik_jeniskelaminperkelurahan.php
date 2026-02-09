<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
use miloschuman\highcharts\Highcharts;
// use miloschuman\highcharts\HighchartsAsset;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model app\models\Sop */
/* @var $form yii\widgets\ActiveForm */

$no=1;
    foreach($jeniskelaminperkelurahan['jeniskelaminperkelurahan'] as $key=>$values){
            $pria=(int)$values['pria'];
            $perempuan=(int)$values['perempuan'];
            $jeniskelaminperkelurahan[$key]['total']=$pria+$perempuan;
         $highchartpria[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($pria),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartperempuan[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($perempuan),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $hclinepria['name']= 'Laki-Laki';
        $datapria[]=$pria;
        $hclinepria['data']= $datapria;
        $hclinepria['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclineperempuan['name']= 'Perempuan';
        $dataperempuan[]=$perempuan;
        $hclineperempuan['data']= $dataperempuan;
        $hclineperempuan['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];
        $kelurahan[]= $values['kelurahan'];
         $no++;
    }

?>

<div class="container">
<div class="row">
    <div class="col-md-11">
<?php

echo Highcharts::widget([
    'scripts' => [
            'modules/exporting',
            'themes/grid-light',
    ],
 'options' => [
 'title' => ['text' => 
            $jeniskelaminperkelurahan['title']],
    'subtitle' => [
            'text' => 
            $jeniskelaminperkelurahan['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kelurahan
 ],
 'yAxis' => [
    'title' => ['text' => $jeniskelaminperkelurahan['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinepria,$hclineperempuan
    ],
    'responsive'=> [
        'rules'=> [[
            'condition'=> [
                'maxWidth'=> 500
            ],
            'chartOptions'=> [
                'legend'=> [
                    'layout'=> 'horizontal',
                    'align'=> 'center',
                    'verticalAlign'=> 'bottom'
                ]
            ]
        ]]
    ]
 ]
]);
?>
                       
</div>
                        </div>
    </div>



<div class="row">
                        <div class="col-md-12">

                            <div class="tabs tabs-bottom tabs-center tabs-simple">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tabsJenisKelamin1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Laki-Laki</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsJenisKelamin2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Perempuan</p>
                                        </a>
                                    </li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabsJenisKelamin1">
                                        <div class="center">
                                            <?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $jeniskelaminperkelurahan['title_pria']],
    'subtitle' => [
            'text' => 
            $jeniskelaminperkelurahan['subtitle']
    ],
 'xAxis' => [
    // 'categories' => ['jmldesil1', 'jmldesil2', 'jmldesil3', 'jmldesil4']
    // 'categories' => ['jmldesil1']
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $jeniskelaminperkelurahan['yaxis']]

 ],
 'series' => $highchartpria
 ]
]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabsJenisKelamin2">
                                        <div class="center">
                                             <?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $jeniskelaminperkelurahan['title_perempuan']],
    'subtitle' => [
            'text' => 
            $jeniskelaminperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $jeniskelaminperkelurahan['yaxis']]

 ],
 'series' => $highchartperempuan
 ]
]);
                                            ?>
                                        </div>
                                    </div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
