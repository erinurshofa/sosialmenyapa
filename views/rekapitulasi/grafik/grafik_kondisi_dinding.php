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
    foreach($kondisi_dinding['kondisi_dinding'] as $key=>$values){
            $tembok=(int)$values['tembok'];
            $plesteran=(int)$values['plesteran'];
            $kayu=(int)$values['kayu'];
            $anyamanbambu=(int)$values['anyamanbambu'];
            $batangkayu=(int)$values['batangkayu'];
            $bambu=(int)$values['bambu'];
            $lainnya=(int)$values['lainnya'];
          
            // $kondisi_dinding['kondisi_dinding'][$key]['total']=$tembok+$plesteran;
        $highcharttembok[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tembok),
            );
        $highchartplesteran[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($plesteran),
            );
        $highchartkayu[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($kayu),
            );
        $highchartanyamanbambu[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($anyamanbambu),
            );
        $highchartbatangkayu[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($batangkayu),
            );
        $highchartbambu[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($bambu),
            );
        $highchartlainnya[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($lainnya),
            );

        $hclinetembok['name']= 'tembok';
        // $hclinetembok['type']= 'column';
        $datatembok[]=$tembok;
        $hclinetembok['data']= $datatembok;

        $hclineplesteran['name']= 'plesteran';
        // $hclineplesteran['type']= 'column';
        $dataplesteran[]=$plesteran;
        $hclineplesteran['data']= $dataplesteran;

        $hclinekayu['name']= 'kayu';
        // $hclinekayu['type']= 'column';
        $datakayu[]=$kayu;
        $hclinekayu['data']= $datakayu;

        $hclineanyamanbambu['name']= 'anyamanbambu';
        // $hclineanyamanbambu['type']= 'column';
        $dataanyamanbambu[]=$anyamanbambu;
        $hclineanyamanbambu['data']= $dataanyamanbambu;

        $hclinebatangkayu['name']= 'batangkayu';
        // $hclinebatangkayu['type']= 'column';
        $databatangkayu[]=$batangkayu;
        $hclinebatangkayu['data']= $databatangkayu;

        $hclinebambu['name']= 'bambu';
        // $hclinebambu['type']= 'column';
        $databambu[]=$bambu;
        $hclinebambu['data']= $databambu;

        $hclinelainnya['name']= 'lainnya';
        // $hclinelainnya['type']= 'column';
        $datalainnya[]=$lainnya;
        $hclinelainnya['data']= $datalainnya;
        $kecamatan[]= $values['kecamatan'];
         $no++;
    }
?>

<div class="row container">
    <div class="col-md-11">
                            <div class="panel-group" id="accordionkondisi_dinding">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                       <!--  <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionkondisi_dinding" href="#collapsekondisi_dinding">
                                                <i class="fa fa-group"></i> <?=$kondisi_dinding['title']?>
                                            </a>
                                        </h4> -->
                                    </div>
                                    <div id="collapsekondisi_dinding" class="accordion-body collapse in">
                                        <div class="panel-body">
                                        <?php

echo Highcharts::widget([
    'scripts' => [
            'modules/exporting',
            'themes/grid-light',
    ],
 'options' => [
 'title' => ['text' => 
            $kondisi_dinding['title']],
    'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_dinding['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinetembok,$hclineplesteran,$hclinekayu,$hclineanyamanbambu,$hclinebatangkayu,$hclinebambu,$hclinelainnya
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
                   
                            </div>
                        </div>
    </div>

<div class="row">
                        <div class="col-md-12">
                            <hr class="tall">
                            <center><h4><?=$kondisi_dinding['title']?></h4></center>
                        </div>
                    </div>
<div class="row">
                        <div class="col-md-12">

                            <div class="tabs tabs-bottom tabs-center tabs-simple">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tabskondisi_dinding1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Milik Sendiri</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_dinding2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Plesteran</p>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="#tabskondisi_dinding3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Kayu</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_dinding4" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Anyaman Bambu</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_dinding5" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Batang Kayu</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_dinding6" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Bambu</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_dinding7" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Lainnya</p>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabskondisi_dinding1">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_dinding['title_tembok']],
    'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_dinding['yaxis']]

 ],
 'series' => $highcharttembok
 ]
]);
?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabskondisi_dinding2">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_dinding['title_plesteran']],
    'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_dinding['yaxis']]
 ],
 'series' => $highchartplesteran
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_dinding3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_dinding['title_kayu']],
    'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_dinding['yaxis']]
 ],
 'series' => $highchartkayu
 ]
]);
?>
                                        </div>
                                    </div>   
<div class="tab-pane" id="tabskondisi_dinding4">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_dinding['title_anyamanbambu']],
    'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_dinding['yaxis']]
 ],
 'series' => $highchartanyamanbambu
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_dinding5">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_dinding['title_batangkayu']],
    'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_dinding['yaxis']]
 ],
 'series' => $highchartbatangkayu
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_dinding6">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_dinding['title_bambu']],
    'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_dinding['yaxis']]
 ],
 'series' => $highchartbambu
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_dinding7">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_dinding['title_lainnya']],
    'subtitle' => [
            'text' => 
            $kondisi_dinding['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_dinding['yaxis']]
 ],
 'series' => $highchartlainnya
 ]
]);
?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
