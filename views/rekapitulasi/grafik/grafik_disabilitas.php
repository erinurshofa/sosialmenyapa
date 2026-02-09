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
    foreach($disabilitas['disabilitas'] as $key=>$values){
            $tunadaksa=(int)$values['tunadaksa'];
            $tunanetra=(int)$values['tunanetra'];
            $tunarungu=(int)$values['tunarungu'];
            $tunawicara=(int)$values['tunawicara'];
            $tunarunguwicara=(int)$values['tunarunguwicara'];
            $tunanetracacat=(int)$values['tunanetracacat'];
            $tunanetrarunguwicara=(int)$values['tunanetrarunguwicara'];
            $tunarunguwicaracacat=(int)$values['tunarunguwicaracacat'];
            $tunarunguwicaranetracacat=(int)$values['tunarunguwicaranetracacat'];
            $cacatmental=(int)$values['cacatmental'];
            $mantangangguanjiwa=(int)$values['mantangangguanjiwa'];
            $cacatfisikmental=(int)$values['cacatfisikmental'];
            $totalcacat=(int)$values['totalcacat'];
            // $disabilitas['disabilitas'][$key]['total']=$tunadaksa+$tunanetra;
        $highcharttunadaksa[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tunadaksa),
            );
        $highcharttunanetra[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tunanetra),
            );
        $highcharttunarungu[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tunarungu),
            );
        $highcharttunawicara[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tunawicara),
            );
        $highcharttunarunguwicara[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tunarunguwicara),
            );
        $highcharttunanetracacat[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tunanetracacat),
            );
        $highcharttunanetrarunguwicara[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tunanetrarunguwicara),
            );
        $highcharttunarunguwicaracacat[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tunarunguwicaracacat),
            );
        $highcharttunarunguwicaranetracacat[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tunarunguwicaranetracacat),
            );
        $highchartcacatmental[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($cacatmental),
            );
        $highchartmantangangguanjiwa[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($mantangangguanjiwa),
            );
        $highchartcacatfisikmental[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($cacatfisikmental),
            );
        $highcharttotalcacat[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($totalcacat),
            );

        $hclinetunadaksa['name']= 'Tunadaksa';
        // $hclinetunadaksa['type']= 'column';
        $datatunadaksa[]=$tunadaksa;
        $hclinetunadaksa['data']= $datatunadaksa;

        $hclinetunanetra['name']= 'Tunanetra';
        // $hclinetunanetra['type']= 'column';
        $datatunanetra[]=$tunanetra;
        $hclinetunanetra['data']= $datatunanetra;

        $hclinetunarungu['name']= 'Tunarungu';
        // $hclinetunarungu['type']= 'column';
        $datatunarungu[]=$tunarungu;
        $hclinetunarungu['data']= $datatunarungu;

        $hclinetunawicara['name']= 'Tunawicara';
        // $hclinetunawicara['type']= 'column';
        $datatunawicara[]=$tunawicara;
        $hclinetunawicara['data']= $datatunawicara;

        $hclinetunarunguwicara['name']= 'Tunarunguwicara';
        // $hclinetunarunguwicara['type']= 'column';
        $datatunarunguwicara[]=$tunarunguwicara;
        $hclinetunarunguwicara['data']= $datatunarunguwicara;

        $hclinetunanetracacat['name']= 'Tunanetracacat';
        // $hclinetunanetracacat['type']= 'column';
        $datatunanetracacat[]=$tunanetracacat;
        $hclinetunanetracacat['data']= $datatunanetracacat;

        $hclinetunanetrarunguwicara['name']= 'Tunanetrarunguwicara';
        // $hclinetunanetrarunguwicara['type']= 'column';
        $datatunanetrarunguwicara[]=$tunanetrarunguwicara;
        $hclinetunanetrarunguwicara['data']= $datatunanetrarunguwicara;

        $hclinetunarunguwicaracacat['name']= 'Tunarunguwicaracacat';
        // $hclinetunarunguwicaracacat['type']= 'column';
        $datatunarunguwicaracacat[]=$tunarunguwicaracacat;
        $hclinetunarunguwicaracacat['data']= $datatunarunguwicaracacat;

        $hclinetunarunguwicaranetracacat['name']= 'Tunarunguwicaranetracacat';
        // $hclinetunarunguwicaranetracacat['type']= 'column';
        $datatunarunguwicaranetracacat[]=$tunarunguwicaranetracacat;
        $hclinetunarunguwicaranetracacat['data']= $datatunarunguwicaranetracacat;

        $hclinecacatmental['name']= 'Cacat Mental';
        // $hclinecacatmental['type']= 'column';
        $datacacatmental[]=$cacatmental;
        $hclinecacatmental['data']= $datacacatmental;

        $hclinemantangangguanjiwa['name']= 'Mantan Gangguan Jiwa';
        // $hclinemantangangguanjiwa['type']= 'column';
        $datamantangangguanjiwa[]=$mantangangguanjiwa;
        $hclinemantangangguanjiwa['data']= $datamantangangguanjiwa;

        $hclinecacatfisikmental['name']= 'Cacat Fisik dan Mental';
        // $hclinecacatfisikmental['type']= 'column';
        $datacacatfisikmental[]=$cacatfisikmental;
        $hclinecacatfisikmental['data']= $datacacatfisikmental;

        $hclinetotalcacat['name']= 'Total Cacat';
        // $hclinetotalcacat['type']= 'column';
        $datatotalcacat[]=$totalcacat;
        $hclinetotalcacat['data']= $datatotalcacat;

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
            $disabilitas['title']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinetunadaksa,$hclinetunanetra,$hclinetunarungu,$hclinetunawicara,$hclinetunarunguwicara,$hclinetunanetracacat,$hclinetunanetrarunguwicara, $hclinetunarunguwicaracacat,$hclinetunarunguwicaranetracacat, $hclinecacatmental, $hclinemantangangguanjiwa,$hclinecacatfisikmental,$hclinetotalcacat
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
                                        <a href="#tabsdisabilitas1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Tunadaksa</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Tunanetra</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Tunarungu</p>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="#tabsdisabilitas4" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Tunawicara</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas5" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Tunarunguwicara</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas6" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Tunanetracacat</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas7" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Tunanetrarunguwicara</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas8" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Tunarunguwicaracacat</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas9" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Tunarunguwicaranetracacat</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas10" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Cacatmental</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas11" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Mantangangguanjiwa</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas12" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Cacatfisikmental</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsdisabilitas13" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Disabilitas Totalcacat</p>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabsdisabilitas1">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_tunadaksa']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]

 ],
 'series' => $highcharttunadaksa
 ]
]);
?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabsdisabilitas2">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_tunanetra']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highcharttunanetra
 ]
]);
?>
                                        </div>
                                    </div>
                                   
 <div class="tab-pane" id="tabsdisabilitas3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_tunarungu']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highcharttunarungu
 ]
]);
?>
                                        </div>
                                    </div>
 
 <div class="tab-pane" id="tabsdisabilitas4">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_tunawicara']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highcharttunawicara
 ]
]);
?>
                                        </div>
                                    </div>
 <div class="tab-pane" id="tabsdisabilitas5">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_tunarunguwicara']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highcharttunarunguwicara
 ]
]);
?>
                                        </div>
                                    </div>
 <div class="tab-pane" id="tabsdisabilitas6">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_tunanetracacat']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highcharttunanetracacat
 ]
]);
?>
                                        </div>
                                    </div>
 <div class="tab-pane" id="tabsdisabilitas7">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_tunanetrarunguwicara']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highcharttunanetrarunguwicara
 ]
]);
?>
                                        </div>
                                    </div>
 <div class="tab-pane" id="tabsdisabilitas8">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_tunarunguwicaracacat']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highcharttunarunguwicaracacat
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsdisabilitas9">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_tunarunguwicaranetracacat']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highcharttunarunguwicaranetracacat
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsdisabilitas10">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_cacatmental']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highchartcacatmental
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsdisabilitas11">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_mantangangguanjiwa']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highchartmantangangguanjiwa
 ]
]);
?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabsdisabilitas12">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_cacatfisikmental']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highchartcacatfisikmental
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsdisabilitas13">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $disabilitas['title_totalcacat']],
    'subtitle' => [
            'text' => 
            $disabilitas['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $disabilitas['yaxis']]
 ],
 'series' => $highcharttotalcacat
 ]
]);
?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


