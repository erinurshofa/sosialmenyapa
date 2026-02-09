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
    foreach($lansia['lansia'] as $key=>$values){
            $lansiasemua=(int)$values['semua'];
            $lansiapria=(int)$values['lansiapria'];
            $lansiaperempuan=(int)$values['lansiaperempuan'];
            // $lansia[$key]['total']=$lansiapria+$lansiaperempuan;

        $highchartlansiasemua[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($lansiasemua),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartlansiapria[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($lansiapria),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartlansiaperempuan[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
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

        $kecamatan[]= $values['kecamatan'];

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
            $lansia['title']],
    'subtitle' => [
            'text' => 
            $lansia['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $lansia['yaxis']],
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
                                                            $lansia['title_lansiapria']],
                                                    'subtitle' => [
                                                            'text' => 
                                                            $lansia['subtitle']
                                                    ],
                                                 'xAxis' => [
                                                 'categories'=>['']
                                                 ],
                                                 'yAxis' => [
                                                    'title' => ['text' => $lansia['yaxis']]
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
                                                            $lansia['title_lansiaperempuan']],
                                                    'subtitle' => [
                                                            'text' => 
                                                            $lansia['subtitle']
                                                    ],
                                                 'xAxis' => [
                                                 'categories'=>['']
                                                 ],
                                                 'yAxis' => [
                                                    'title' => ['text' => $lansia['yaxis']]
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

