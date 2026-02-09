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
    foreach($lansiaperkelurahan['lansiaperkelurahan'] as $key=>$values){
            $lansiasemua=(int)$values['semua'];
            $lansiapria=(int)$values['lansiapria'];
            $lansiaperempuan=(int)$values['lansiaperempuan'];
            // $lansiaperkelurahan[$key]['total']=$lansiapria+$lansiaperempuan;

        $highchartlansiasemua[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($lansiasemua),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartlansiapria[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($lansiapria),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartlansiaperempuan[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($lansiaperempuan),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );

        $hclinelansiasemua['name']= 'Semua Lansia';
        $datalansiasemua[]=$lansiasemua;
        $hclinelansiasemua['data']= $datalansiasemua;
        $hclinelansiasemua['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclinelansiapria['name']= 'Lansia Laki-Laki';
        $datalansiapria[]=$lansiapria;
        $hclinelansiapria['data']= $datalansiapria;
        $hclinelansiapria['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclinelansiaperempuan['name']= 'Lansia Perempuan';
        $datalansiaperempuan[]=$lansiaperempuan;
        $hclinelansiaperempuan['data']= $datalansiaperempuan;
        $hclinelansiaperempuan['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

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
            $lansiaperkelurahan['title']],
    'subtitle' => [
            'text' => 
            $lansiaperkelurahan['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kelurahan
 ],
 'yAxis' => [
    'title' => ['text' => $lansiaperkelurahan['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinelansiasemua,$hclinelansiapria,$hclinelansiaperempuan
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
                                        <a href="#tabsLansia1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Lansia Miskin Laki-Laki</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsLansia2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Lansia Miskin Perempuan</p>
                                        </a>
                                    </li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabsLansia1">
                                        <div class="center">
                                            <?php
                                                echo Highcharts::widget([
                                                 'options' => [
                                                 'title' => ['text' => 
                                                            $lansiaperkelurahan['title_lansiapria']],
                                                    'subtitle' => [
                                                            'text' => 
                                                            $lansiaperkelurahan['subtitle']
                                                    ],
                                                 'xAxis' => [
                                                 'categories'=>['']
                                                 ],
                                                 'yAxis' => [
                                                    'title' => ['text' => $lansiaperkelurahan['yaxis']]
                                                 ],
                                                 'series' => $highchartlansiapria
                                                 ]
                                                ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabsLansia2">
                                        <div class="center">
                                             <?php
                                                echo Highcharts::widget([
                                                 'options' => [
                                                 'title' => ['text' => 
                                                            $lansiaperkelurahan['title_lansiaperempuan']],
                                                    'subtitle' => [
                                                            'text' => 
                                                            $lansiaperkelurahan['subtitle']
                                                    ],
                                                 'xAxis' => [
                                                 'categories'=>['']
                                                 ],
                                                 'yAxis' => [
                                                    'title' => ['text' => $lansiaperkelurahan['yaxis']]
                                                 ],
                                                 'series' => $highchartlansiaperempuan
                                                 ]
                                                ]);
                                            ?>
                                        </div>
                                    </div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>

