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
    foreach($pendidikan['pendidikan'] as $key=>$values){
            $sd=(int)$values['sd'];
            $sdtidak=(int)$values['sdtidak'];
            $smp=(int)$values['smp'];
            $smptidak=(int)$values['smptidak'];
            $sma=(int)$values['sma'];
            $smatidak=(int)$values['smatidak'];
           
            // $pendidikan['pendidikan'][$key]['total']=$sd+$sdtidak;
        $highchartsd[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($sd),
            );
        $highchartsdtidak[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($sdtidak),
            );
        $highchartsmp[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($smp),
            );
        $highchartsmptidak[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($smptidak),
            );
        $highchartsma[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($sma),
            );
        $highchartsmatidak[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($smatidak),
            );

        $hclinesd['name']= 'sd';
        // $hclinesd['type']= 'column';
        $datasd[]=$sd;
        $hclinesd['data']= $datasd;

        $hclinesdtidak['name']= 'sdtidak';
        // $hclinesdtidak['type']= 'column';
        $datasdtidak[]=$sdtidak;
        $hclinesdtidak['data']= $datasdtidak;

        $hclinesmp['name']= 'smp';
        // $hclinesmp['type']= 'column';
        $datasmp[]=$smp;
        $hclinesmp['data']= $datasmp;

        $hclinesmptidak['name']= 'smptidak';
        // $hclinesmptidak['type']= 'column';
        $datasmptidak[]=$smptidak;
        $hclinesmptidak['data']= $datasmptidak;

        $hclinesma['name']= 'sma';
        // $hclinesma['type']= 'column';
        $datasma[]=$sma;
        $hclinesma['data']= $datasma;

        $hclinesmatidak['name']= 'smatidak';
        // $hclinesmatidak['type']= 'column';
        $datasmatidak[]=$smatidak;
        $hclinesmatidak['data']= $datasmatidak;

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
            $pendidikan['title']],
    'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $pendidikan['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinesd,$hclinesdtidak,$hclinesmp,$hclinesmptidak,$hclinesma,$hclinesmatidak
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
                            <center><h4><?=$pendidikan['title']?></h4></center>
                        </div>
                    </div>
<div class="row">
                        <div class="col-md-12">

                            <div class="tabs tabs-bottom tabs-center tabs-simple">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tabspendidikan1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">SD</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabspendidikan2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">SD Tidak Sekolah</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabspendidikan3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">SMP</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabspendidikan4" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">SMP Tidak Sekolah</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabspendidikan5" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">SMA</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabspendidikan6" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">SMA Tidak Sekolah</p>
                                        </a>
                                    </li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabspendidikan1">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $pendidikan['title_sd']],
    'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $pendidikan['yaxis']]

 ],
 'series' => $highchartsd
 ]
]);
?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabspendidikan2">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $pendidikan['title_sdtidak']],
    'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $pendidikan['yaxis']]
 ],
 'series' => $highchartsdtidak
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabspendidikan3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $pendidikan['title_smp']],
    'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $pendidikan['yaxis']]
 ],
 'series' => $highchartsmp
 ]
]);
?>
                                        </div>
                                    </div>  
<div class="tab-pane" id="tabspendidikan4">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $pendidikan['title_smptidak']],
    'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $pendidikan['yaxis']]
 ],
 'series' => $highchartsmptidak
 ]
]);
?>
                                        </div>
                                    </div>  
                                    <div class="tab-pane" id="tabspendidikan5">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $pendidikan['title_sma']],
    'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $pendidikan['yaxis']]
 ],
 'series' => $highchartsma
 ]
]);
?>
                                        </div>
                                    </div>  
<div class="tab-pane" id="tabspendidikan6">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $pendidikan['title_smatidak']],
    'subtitle' => [
            'text' => 
            $pendidikan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $pendidikan['yaxis']]
 ],
 'series' => $highchartsmatidak
 ]
]);
?>
                                        </div>
                                    </div>  

                                </div>
                            </div>
                        </div>
                    </div>

