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
    foreach($kondisi_atap['kondisi_atap'] as $key=>$values){
            $beton=(int)$values['beton'];
            $gentengkeramik=(int)$values['gentengkeramik'];
            $gentengmetal=(int)$values['gentengmetal'];
            $gentengtanahliat=(int)$values['gentengtanahliat'];
            $asbes=(int)$values['asbes'];
            $seng=(int)$values['seng'];
            $sirap=(int)$values['sirap'];
            $bambu=(int)$values['bambu'];
            $jerami=(int)$values['jerami'];
            $lainnya=(int)$values['lainnya'];
          
            // $kondisi_atap['kondisi_atap'][$key]['total']=$beton+$gentengkeramik;
        $highchartbeton[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($beton),
            );
        $highchartgentengkeramik[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($gentengkeramik),
            );
        $highchartgentengmetal[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($gentengmetal),
            );
        $highchartgentengtanahliat[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($gentengtanahliat),
            );
        $highchartasbes[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($asbes),
            );
        $highchartseng[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($seng),
            );
        $highchartsirap[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($sirap),
            );

        $highchartbambu[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($bambu),
            );

        $highchartjerami[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($jerami),
            );
        $highchartlainnya[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($lainnya),
            );

        $hclinebeton['name']= 'beton';
        // $hclinebeton['type']= 'column';
        $databeton[]=$beton;
        $hclinebeton['data']= $databeton;

        $hclinegentengkeramik['name']= 'gentengkeramik';
        // $hclinegentengkeramik['type']= 'column';
        $datagentengkeramik[]=$gentengkeramik;
        $hclinegentengkeramik['data']= $datagentengkeramik;

        $hclinegentengmetal['name']= 'gentengmetal';
        // $hclinegentengmetal['type']= 'column';
        $datagentengmetal[]=$gentengmetal;
        $hclinegentengmetal['data']= $datagentengmetal;

        $hclinegentengtanahliat['name']= 'gentengtanahliat';
        // $hclinegentengtanahliat['type']= 'column';
        $datagentengtanahliat[]=$gentengtanahliat;
        $hclinegentengtanahliat['data']= $datagentengtanahliat;

        $hclineasbes['name']= 'asbes';
        // $hclineasbes['type']= 'column';
        $dataasbes[]=$asbes;
        $hclineasbes['data']= $dataasbes;

        $hclineseng['name']= 'seng';
        // $hclineseng['type']= 'column';
        $dataseng[]=$seng;
        $hclineseng['data']= $dataseng;

        $hclinesirap['name']= 'sirap';
        // $hclinesirap['type']= 'column';
        $datasirap[]=$sirap;
        $hclinesirap['data']= $datasirap;

        $hclinebambu['name']= 'bambu';
        // $hclinebambu['type']= 'column';
        $databambu[]=$bambu;
        $hclinebambu['data']= $databambu;

        $hclinejerami['name']= 'jerami';
        // $hclinejerami['type']= 'column';
        $datajerami[]=$jerami;
        $hclinejerami['data']= $datajerami;

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
                            <div class="panel-group" id="accordionkondisi_atap">
                                <div class="panel panel-default">
                                <!--     <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionkondisi_atap" href="#collapsekondisi_atap">
                                                <i class="fa fa-group"></i> <?php //$kondisi_atap['title']?>
                                            </a>
                                        </h4>
                                    </div> -->
                                    <div id="collapsekondisi_atap" class="accordion-body collapse in">
                                        <div class="panel-body">
                                        <?php

echo Highcharts::widget([
    'scripts' => [
            'modules/exporting',
            'themes/grid-light',
    ],
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinebeton,$hclinegentengkeramik,$hclinegentengmetal,$hclinegentengtanahliat,$hclineasbes,$hclineseng,$hclinesirap,$hclinebambu,$hclinejerami,$hclinelainnya
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
                            <center><h4><?=$kondisi_atap['title']?></h4></center>
                        </div>
                    </div>
<div class="row">
                        <div class="col-md-12">

                            <div class="tabs tabs-bottom tabs-center tabs-simple">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tabskondisi_atap1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Beton</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_atap2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Genteng Keramik</p>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="#tabskondisi_atap3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Genteng Metal</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_atap4" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Genteng Tanah Liat</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_atap5" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Asbes</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_atap6" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Seng</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_atap7" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Sirap</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_atap8" data-toggle="tab">
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
                                        <a href="#tabskondisi_atap9" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Jerami</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskondisi_atap10" data-toggle="tab">
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
                                    <div class="tab-pane active" id="tabskondisi_atap1">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title_beton']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']]

 ],
 'series' => $highchartbeton
 ]
]);
?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabskondisi_atap2">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title_gentengkeramik']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']]
 ],
 'series' => $highchartgentengkeramik
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_atap3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title_gentengmetal']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']]
 ],
 'series' => $highchartgentengmetal
 ]
]);
?>
                                        </div>
                                    </div>   
<div class="tab-pane" id="tabskondisi_atap4">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title_gentengtanahliat']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']]
 ],
 'series' => $highchartgentengtanahliat
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_atap5">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title_asbes']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']]
 ],
 'series' => $highchartasbes
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_atap6">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title_seng']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']]
 ],
 'series' => $highchartseng
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_atap7">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title_sirap']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']]
 ],
 'series' => $highchartsirap
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_atap8">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title_bambu']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']]
 ],
 'series' => $highchartbambu
 ]
]);
?>
                                        </div>
                                    </div>

<div class="tab-pane" id="tabskondisi_atap9">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title_jerami']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']]
 ],
 'series' => $highchartjerami
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskondisi_atap10">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kondisi_atap['title_lainnya']],
    'subtitle' => [
            'text' => 
            $kondisi_atap['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kondisi_atap['yaxis']]
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