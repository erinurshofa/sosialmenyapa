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
    foreach($program_bantuan['program_bantuan'] as $key=>$values){
            $statuskks=(int)$values['statuskks'];
            $statuspbi=(int)$values['statuspbi'];
            $statuskip=(int)$values['statuskip'];
            $statuspkh=(int)$values['statuspkh'];
            $statusbsp=(int)$values['statusbsp'];
            
                        // $program_bantuan['program_bantuan'][$key]['total']=$statuskks+$statuskip;
        $highchartstatuskks[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statuskks),
            );
        $highchartstatuspbi[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statuspbi),
            );
        $highchartstatuskip[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statuskip),
            );
        $highchartstatuspkh[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statuspkh),
            );
        $highchartstatusbsp[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statusbsp),
            );
        

        $hclinestatuskks['name']= 'statuskks';
        // $hclinestatuskks['type']= 'column';
        $datastatuskks[]=$statuskks;
        $hclinestatuskks['data']= $datastatuskks;

        $hclinestatuskis['name']= 'statuspbi';
        // $hclinestatuspbi['type']= 'column';
        $datastatuspbi[]=$statuspbi;
        $hclinestatuspbi['data']= $datastatuspbi;

         $hclinestatuskip['name']= 'statuskip';
        // $hclinestatuskip['type']= 'column';
        $datastatuskip[]=$statuskip;
        $hclinestatuskip['data']= $datastatuskip;

        $hclinestatuspkh['name']= 'statuspkh';
        // $hclinestatuspkh['type']= 'column';
        $datastatuspkh[]=$statuspkh;
        $hclinestatuspkh['data']= $datastatuspkh;

        $hclinestatusbsp['name']= 'statusbsp';
        // $hclinestatusbsp['type']= 'column';
        $datastatusbsp[]=$statusbsp;
        $hclinestatusbsp['data']= $datastatusbsp;

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
            $program_bantuan['title']],
    'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $program_bantuan['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinestatuskks,$hclinestatuspbi,$hclinestatuskip,$hclinestatuspkh,$hclinestatusbsp
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
                            <hr class="tall">
                            <center><h4><?=$program_bantuan['title']?></h4></center>
                        </div>
                    </div>
<div class="row">
                        <div class="col-md-12">

                            <div class="tabs tabs-bottom tabs-center tabs-simple">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tabsprogram_bantuan1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Status KKS</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsprogram_bantuan3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Status PBI</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsprogram_bantuan2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Status KIP</p>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="#tabsprogram_bantuan4" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Status PKH</p>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="#tabsprogram_bantuan5" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Status BSP</p>
                                        </a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabsprogram_bantuan1">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $program_bantuan['title_statuskks']],
    'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $program_bantuan['yaxis']]
 ],
 'series' => $highchartstatuskks
 ]
]);
?>
                                        </div>
                                    </div>

 <div class="tab-pane" id="tabsprogram_bantuan2">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $program_bantuan['title_statuspbi']],
    'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $program_bantuan['yaxis']]
 ],
 'series' => $highchartstatuspbi
 ]
]);
?>
                                        </div>
                                    </div>   
<div class="tab-pane" id="tabsprogram_bantuan3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $program_bantuan['title_statuskip']],
    'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $program_bantuan['yaxis']]
 ],
 'series' => $highchartstatuskip
 ]
]);
?>
                                        </div>
                                    </div>                               
 <div class="tab-pane" id="tabsprogram_bantuan4">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $program_bantuan['title_statuspkh']],
    'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $program_bantuan['yaxis']]
 ],
 'series' => $highchartstatuspkh
 ]
]);
?>
                                        </div>
                                    </div>   
 <div class="tab-pane" id="tabsprogram_bantuan5">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $program_bantuan['title_statusbsp']],
    'subtitle' => [
            'text' => 
            $program_bantuan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $program_bantuan['yaxis']]
 ],
 'series' => $highchartstatusbsp
 ]
]);
?>
                                        </div>
                                    </div> 
 
                                </div>
                            </div>
                        </div>
                    </div>
