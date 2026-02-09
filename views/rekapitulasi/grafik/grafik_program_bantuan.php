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
            $statuskip=(int)$values['statuskip'];
            $statuskis=(int)$values['statuskis'];
            $statusbpjsmandiri=(int)$values['statusbpjsmandiri'];
            $statusjamsostek=(int)$values['statusjamsostek'];
            $statusasuransi=(int)$values['statusasuransi'];
            $statuspkh=(int)$values['statuspkh'];
            $statusrastra=(int)$values['statusrastra'];
            $statuskur=(int)$values['statuskur'];
                        // $program_bantuan['program_bantuan'][$key]['total']=$statuskks+$statuskip;
        $highchartstatuskks[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statuskks),
            );
        $highchartstatuskip[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statuskip),
            );
        $highchartstatuskis[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statuskis),
            );
        $highchartstatusbpjsmandiri[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statusbpjsmandiri),
            );
        $highchartstatusjamsostek[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statusjamsostek),
            );
        $highchartstatusasuransi[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statusasuransi),
            );
        $highchartstatuspkh[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statuspkh),
            );
        $highchartstatusrastra[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statusrastra),
            );
        $highchartstatuskur[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($statuskur),
            );

        $hclinestatuskks['name']= 'statuskks';
        // $hclinestatuskks['type']= 'column';
        $datastatuskks[]=$statuskks;
        $hclinestatuskks['data']= $datastatuskks;

        $hclinestatuskip['name']= 'statuskip';
        // $hclinestatuskip['type']= 'column';
        $datastatuskip[]=$statuskip;
        $hclinestatuskip['data']= $datastatuskip;

        $hclinestatuskis['name']= 'statuskis';
        // $hclinestatuskis['type']= 'column';
        $datastatuskis[]=$statuskis;
        $hclinestatuskis['data']= $datastatuskis;

        $hclinestatusbpjsmandiri['name']= 'statusbpjsmandiri';
        // $hclinestatusbpjsmandiri['type']= 'column';
        $datastatusbpjsmandiri[]=$statusbpjsmandiri;
        $hclinestatusbpjsmandiri['data']= $datastatusbpjsmandiri;

        $hclinestatusjamsostek['name']= 'statusjamsostek';
        // $hclinestatusjamsostek['type']= 'column';
        $datastatusjamsostek[]=$statusjamsostek;
        $hclinestatusjamsostek['data']= $datastatusjamsostek;

        $hclinestatusasuransi['name']= 'statusasuransi';
        // $hclinestatusasuransi['type']= 'column';
        $datastatusasuransi[]=$statusasuransi;
        $hclinestatusasuransi['data']= $datastatusasuransi;

        $hclinestatuspkh['name']= 'statuspkh';
        // $hclinestatuspkh['type']= 'column';
        $datastatuspkh[]=$statuspkh;
        $hclinestatuspkh['data']= $datastatuspkh;

        $hclinestatusrastra['name']= 'statusrastra';
        // $hclinestatusrastra['type']= 'column';
        $datastatusrastra[]=$statusrastra;
        $hclinestatusrastra['data']= $datastatusrastra;

        $hclinestatuskur['name']= 'statuskur';
        // $hclinestatuskur['type']= 'column';
        $datastatuskur[]=$statuskur;
        $hclinestatuskur['data']= $datastatuskur;

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
 $hclinestatuskks,$hclinestatuskip,$hclinestatuskis,$hclinestatusbpjsmandiri,$hclinestatusjamsostek,$hclinestatusasuransi,$hclinestatuspkh, $hclinestatusrastra,$hclinestatuskur
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
                                        <a href="#tabsprogram_bantuan3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Status KIS</p>
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
                                            <p class="mb-none pb-none">Status BPJS Mandiri</p>
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
                                            <p class="mb-none pb-none">Status Jamsostek</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsprogram_bantuan6" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Status Asuransi</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsprogram_bantuan7" data-toggle="tab">
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
                                        <a href="#tabsprogram_bantuan8" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Status Rastra</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsprogram_bantuan9" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Status KUR</p>
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
 <div class="tab-pane" id="tabsprogram_bantuan3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $program_bantuan['title_statuskis']],
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
 'series' => $highchartstatuskis
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
            $program_bantuan['title_statusbpjsmandiri']],
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
 'series' => $highchartstatusbpjsmandiri
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
            $program_bantuan['title_statusjamsostek']],
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
 'series' => $highchartstatusjamsostek
 ]
]);
?>
                                        </div>
                                    </div> 
 <div class="tab-pane" id="tabsprogram_bantuan6">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $program_bantuan['title_statusasuransi']],
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
 'series' => $highchartstatusasuransi
 ]
]);
?>
                                        </div>
                                    </div> 
 <div class="tab-pane" id="tabsprogram_bantuan7">
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
 <div class="tab-pane" id="tabsprogram_bantuan8">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $program_bantuan['title_statusrastra']],
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
 'series' => $highchartstatusrastra
 ]
]);
?>
                                        </div>
                                    </div> 

 <div class="tab-pane" id="tabsprogram_bantuan9">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $program_bantuan['title_statuskur']],
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
 'series' => $highchartstatuskur
 ]
]);
?>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
