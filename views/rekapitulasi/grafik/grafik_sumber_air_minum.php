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
    foreach($sumber_air_minum['sumber_air_minum'] as $key=>$values){
            $merk=(int)$values['merk'];
            $isiulang=(int)$values['isiulang'];
            $meteran=(int)$values['meteran'];
            $eceran=(int)$values['eceran'];
            $pompa=(int)$values['pompa'];
            $sterlindung=(int)$values['sterlindung'];
            $stakterlindung=(int)$values['stakterlindung'];
            $mtterlindung=(int)$values['mtterlindung'];
            $mttakterlindung=(int)$values['mttakterlindung'];
            $sungai=(int)$values['sungai'];
            $hujan=(int)$values['hujan'];
            $lainnya=(int)$values['lainnya'];
          
            // $sumber_air_minum['sumber_air_minum'][$key]['total']=$merk+$isiulang;
        $highchartmerk[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($merk),
            );
        $highchartisiulang[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($isiulang),
            );
        $highchartmeteran[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($meteran),
            );
        $highcharteceran[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($eceran),
            );
        $highchartpompa[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($pompa),
            );
        $highchartsterlindung[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($sterlindung),
            );
        $highchartstakterlindung[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($stakterlindung),
            );

        $highchartmtterlindung[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($mtterlindung),
            );

        $highchartmttakterlindung[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($mttakterlindung),
            );
        $highchartsungai[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($sungai),
            );
        $highcharthujan[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($hujan),
            );
        $highchartlainnya[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($lainnya),
            );

        $hclinemerk['name']= 'merk';
        // $hclinemerk['type']= 'column';
        $datamerk[]=$merk;
        $hclinemerk['data']= $datamerk;

        $hclineisiulang['name']= 'isiulang';
        // $hclineisiulang['type']= 'column';
        $dataisiulang[]=$isiulang;
        $hclineisiulang['data']= $dataisiulang;

        $hclinemeteran['name']= 'meteran';
        // $hclinemeteran['type']= 'column';
        $datameteran[]=$meteran;
        $hclinemeteran['data']= $datameteran;

        $hclineeceran['name']= 'eceran';
        // $hclineeceran['type']= 'column';
        $dataeceran[]=$eceran;
        $hclineeceran['data']= $dataeceran;

        $hclinepompa['name']= 'pompa';
        // $hclinepompa['type']= 'column';
        $datapompa[]=$pompa;
        $hclinepompa['data']= $datapompa;

        $hclinesterlindung['name']= 'sterlindung';
        // $hclinesterlindung['type']= 'column';
        $datasterlindung[]=$sterlindung;
        $hclinesterlindung['data']= $datasterlindung;

        $hclinestakterlindung['name']= 'stakterlindung';
        // $hclinestakterlindung['type']= 'column';
        $datastakterlindung[]=$stakterlindung;
        $hclinestakterlindung['data']= $datastakterlindung;

        $hclinemtterlindung['name']= 'mtterlindung';
        // $hclinemtterlindung['type']= 'column';
        $datamtterlindung[]=$mtterlindung;
        $hclinemtterlindung['data']= $datamtterlindung;

        $hclinemttakterlindung['name']= 'mttakterlindung';
        // $hclinemttakterlindung['type']= 'column';
        $datamttakterlindung[]=$mttakterlindung;
        $hclinemttakterlindung['data']= $datamttakterlindung;

        $hclinesungai['name']= 'sungai';
        // $hclinesungai['type']= 'column';
        $datasungai[]=$sungai;
        $hclinesungai['data']= $datasungai;

        $hclinehujan['name']= 'hujan';
        // $hclinehujan['type']= 'column';
        $datahujan[]=$hujan;
        $hclinehujan['data']= $datahujan;

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
                            <div class="panel-group" id="accordionsumber_air_minum">
                                <div class="panel panel-default">
                                  <!--   <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionsumber_air_minum" href="#collapsesumber_air_minum">
                                                <i class="fa fa-group"></i> <?php //$sumber_air_minum['title']?>
                                            </a>
                                        </h4>
                                    </div> -->
                                    <div id="collapsesumber_air_minum" class="accordion-body collapse in">
                                        <div class="panel-body">
                                        <?php

echo Highcharts::widget([
    'scripts' => [
            'modules/exporting',
            'themes/grid-light',
    ],
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinemerk,$hclineisiulang,$hclinemeteran,$hclineeceran,$hclinepompa,$hclinesterlindung,$hclinestakterlindung,$hclinemtterlindung,$hclinemttakterlindung,$hclinesungai,$hclinehujan,$hclinelainnya
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
                            <center><h4><?=$sumber_air_minum['title']?></h4></center>
                        </div>
                    </div>
<div class="row">
                        <div class="col-md-12">

                            <div class="tabs tabs-bottom tabs-center tabs-simple">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tabssumber_air_minum1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Merk</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabssumber_air_minum2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Isi Ulang</p>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="#tabssumber_air_minum3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Meteran</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabssumber_air_minum4" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Eceran</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabssumber_air_minum5" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Pompa</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabssumber_air_minum6" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Sungai Terlindung</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabssumber_air_minum7" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Sungai Tak Terlindung</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabssumber_air_minum8" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Mata Air Terlindung</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabssumber_air_minum9" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Mata Air Tak Terlindung</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabssumber_air_minum10" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Sungai</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabssumber_air_minum11" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Hujan</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabssumber_air_minum12" data-toggle="tab">
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
                                    <div class="tab-pane active" id="tabssumber_air_minum1">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_merk']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]

 ],
 'series' => $highchartmerk
 ]
]);
?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabssumber_air_minum2">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_isiulang']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
 ],
 'series' => $highchartisiulang
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabssumber_air_minum3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_meteran']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
 ],
 'series' => $highchartmeteran
 ]
]);
?>
                                        </div>
                                    </div>   
<div class="tab-pane" id="tabssumber_air_minum4">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_eceran']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
 ],
 'series' => $highcharteceran
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabssumber_air_minum5">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_pompa']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
 ],
 'series' => $highchartpompa
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabssumber_air_minum6">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_sterlindung']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
 ],
 'series' => $highchartsterlindung
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabssumber_air_minum7">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_stakterlindung']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
 ],
 'series' => $highchartstakterlindung
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabssumber_air_minum8">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_mtterlindung']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
 ],
 'series' => $highchartmtterlindung
 ]
]);
?>
                                        </div>
                                    </div>

<div class="tab-pane" id="tabssumber_air_minum9">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_mttakterlindung']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
 ],
 'series' => $highchartmttakterlindung
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabssumber_air_minum10">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_sungai']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
 ],
 'series' => $highchartsungai
 ]
]);
?>
                                        </div>
                                    </div>

<div class="tab-pane" id="tabssumber_air_minum11">
<div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_hujan']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
 ],
 'series' => $highcharthujan
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabssumber_air_minum12">
<div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $sumber_air_minum['title_lainnya']],
    'subtitle' => [
            'text' => 
            $sumber_air_minum['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $sumber_air_minum['yaxis']]
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