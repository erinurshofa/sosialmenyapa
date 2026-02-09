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
    foreach($kondisi_lantai['kondisi_lantai'] as $key=>$values){
            $marmer=(int)$values['marmer'];
            $keramik=(int)$values['keramik'];
            $parket=(int)$values['parket'];
            $ubin=(int)$values['ubin'];
            $kayutinggi=(int)$values['kayutinggi'];
            $sementara=(int)$values['sementara'];
            $bambu=(int)$values['bambu'];
            $kayurendah=(int)$values['kayurendah'];
            $tanah=(int)$values['tanah'];
            $lainnya=(int)$values['lainnya'];
          
            // $kondisi_lantai['kondisi_lantai'][$key]['total']=$marmer+$keramik;
        $highchartmarmer[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($marmer),
            );
        $highchartkeramik[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($keramik),
            );
        $highchartparket[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($parket),
            );
        $highchartubin[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($ubin),
            );
        $highchartkayutinggi[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($kayutinggi),
            );
        $highchartsementara[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($sementara),
            );
        $highchartbambu[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($bambu),
            );

        $highchartkayurendah[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($kayurendah),
            );

        $highcharttanah[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tanah),
            );
        $highchartlainnya[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($lainnya),
            );

        $hclinemarmer['name']= 'marmer';
        // $hclinemarmer['type']= 'column';
        $datamarmer[]=$marmer;
        $hclinemarmer['data']= $datamarmer;

        $hclinekeramik['name']= 'keramik';
        // $hclinekeramik['type']= 'column';
        $datakeramik[]=$keramik;
        $hclinekeramik['data']= $datakeramik;

        $hclineparket['name']= 'parket';
        // $hclineparket['type']= 'column';
        $dataparket[]=$parket;
        $hclineparket['data']= $dataparket;

        $hclineubin['name']= 'ubin';
        // $hclineubin['type']= 'column';
        $dataubin[]=$ubin;
        $hclineubin['data']= $dataubin;

        $hclinekayutinggi['name']= 'kayutinggi';
        // $hclinekayutinggi['type']= 'column';
        $datakayutinggi[]=$kayutinggi;
        $hclinekayutinggi['data']= $datakayutinggi;

        $hclinesementara['name']= 'sementara';
        // $hclinesementara['type']= 'column';
        $datasementara[]=$sementara;
        $hclinesementara['data']= $datasementara;

        $hclinebambu['name']= 'bambu';
        // $hclinebambu['type']= 'column';
        $databambu[]=$bambu;
        $hclinebambu['data']= $databambu;

        $hclinekayurendah['name']= 'kayurendah';
        // $hclinekayurendah['type']= 'column';
        $datakayurendah[]=$kayurendah;
        $hclinekayurendah['data']= $datakayurendah;

        $hclinetanah['name']= 'tanah';
        // $hclinetanah['type']= 'column';
        $datatanah[]=$tanah;
        $hclinetanah['data']= $datatanah;

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
                            <div class="panel-group" id="accordionkondisi_lantai">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionkondisi_lantai" href="#collapsekondisi_lantai">
                                                <i class="fa fa-group"></i> <?php //$kondisi_lantai['title']?>
                                            </a>
                                        </h4>
                                    </div> -->
                                    <div id="collapsekondisi_lantai" class="accordion-body collapse in">
                                        <div class="panel-body">
                                        <?php

echo Highcharts::widget([
    'scripts' => [
            'modules/exporting',
            'themes/grid-light',
    ],
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinemarmer,$hclinekeramik,$hclineparket,$hclineubin,$hclinekayutinggi,$hclinesementara,$hclinebambu,$hclinekayurendah,$hclinetanah,$hclinelainnya
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
                            <center><h4><?=$kondisi_lantai['title']?></h4></center>
                        </div>
                    </div>
<div class="row">
                        <div class="col-md-12">

                            <div class="tabs tabs-bottom tabs-center tabs-simple">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tabskondisi_lantai1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Marmer</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_lantai2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Keramik</p>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="#tabskondisi_lantai3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Parket</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_lantai4" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Ubin</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_lantai5" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Kayu Tinggi</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_lantai6" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Sementara</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_lantai7" data-toggle="tab">
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
                                        <a href="#tabskondisi_lantai8" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Kayu Rendah</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_lantai9" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Tanah</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_lantai10" data-toggle="tab">
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
                                    <div class="tab-pane active" id="tabskondisi_lantai1">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title_marmer']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']]

 ],
 'series' => $highchartmarmer
 ]
]);
?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabskondisi_lantai2">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title_keramik']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']]
 ],
 'series' => $highchartkeramik
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_lantai3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title_parket']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']]
 ],
 'series' => $highchartparket
 ]
]);
?>
                                        </div>
                                    </div>   
<div class="tab-pane" id="tabskondisi_lantai4">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title_ubin']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']]
 ],
 'series' => $highchartubin
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_lantai5">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title_kayutinggi']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']]
 ],
 'series' => $highchartkayutinggi
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_lantai6">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title_sementara']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']]
 ],
 'series' => $highchartsementara
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_lantai7">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title_bambu']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']]
 ],
 'series' => $highchartbambu
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_lantai8">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title_kayurendah']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']]
 ],
 'series' => $highchartkayurendah
 ]
]);
?>
                                        </div>
                                    </div>

<div class="tab-pane" id="tabskondisi_lantai9">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title_tanah']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']]
 ],
 'series' => $highcharttanah
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_lantai10">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_lantai['title_lainnya']],
    'subtitle' => [
            'text' => 
            $kondisi_lantai['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_lantai['yaxis']]
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