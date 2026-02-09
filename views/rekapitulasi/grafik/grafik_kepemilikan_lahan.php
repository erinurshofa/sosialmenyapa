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
    foreach($kepemilikan_lahan['kepemilikan_lahan'] as $key=>$values){
            $miliksendiri=(int)$values['miliksendiri'];
            $milikorang=(int)$values['milikorang'];
            $tanahnegara=(int)$values['tanahnegara'];
            $lainnya=(int)$values['lainnya'];

          
            // $kepemilikan_lahan['kepemilikan_lahan'][$key]['total']=$miliksendiri+$milikorang;
        $highchartmiliksendiri[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($miliksendiri),
            );
        $highchartmilikorang[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($milikorang),
            );
        $highcharttanahnegara[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tanahnegara),
            );
        $highchartlainnya[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($lainnya),
            );


        $hclinemiliksendiri['name']= 'miliksendiri';
        // $hclinemiliksendiri['type']= 'column';
        $datamiliksendiri[]=$miliksendiri;
        $hclinemiliksendiri['data']= $datamiliksendiri;

        $hclinemilikorang['name']= 'milikorang';
        // $hclinemilikorang['type']= 'column';
        $datamilikorang[]=$milikorang;
        $hclinemilikorang['data']= $datamilikorang;

        $hclinetanahnegara['name']= 'tanahnegara';
        // $hclinetanahnegara['type']= 'column';
        $datatanahnegara[]=$tanahnegara;
        $hclinetanahnegara['data']= $datatanahnegara;

        $hclinelainnya['name']= 'lainnya';
        // $hclinelainnya['type']= 'column';
        $datalainnya[]=$lainnya;
        $hclinelainnya['data']= $datalainnya;


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
            $kepemilikan_lahan['title']],
    'subtitle' => [
            'text' => 
            $kepemilikan_lahan['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_lahan['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinemiliksendiri,$hclinemilikorang,$hclinetanahnegara,$hclinelainnya,$hclinelainnya
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
                                        <a href="#tabskepemilikan_lahan1" data-toggle="tab">
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
                                        <a href="#tabskepemilikan_lahan2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Milik Orang</p>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="#tabskepemilikan_lahan3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Tanah Negara</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskepemilikan_lahan4" data-toggle="tab">
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
                                    <div class="tab-pane active" id="tabskepemilikan_lahan1">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kepemilikan_lahan['title_miliksendiri']],
    'subtitle' => [
            'text' => 
            $kepemilikan_lahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_lahan['yaxis']]

 ],
 'series' => $highchartmiliksendiri
 ]
]);
?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabskepemilikan_lahan2">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kepemilikan_lahan['title_milikorang']],
    'subtitle' => [
            'text' => 
            $kepemilikan_lahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_lahan['yaxis']]
 ],
 'series' => $highchartmilikorang
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskepemilikan_lahan3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kepemilikan_lahan['title_tanahnegara']],
    'subtitle' => [
            'text' => 
            $kepemilikan_lahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_lahan['yaxis']]
 ],
 'series' => $highcharttanahnegara
 ]
]);
?>
                                        </div>
                                    </div>   
<div class="tab-pane" id="tabskepemilikan_lahan4">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kepemilikan_lahan['title_lainnya']],
    'subtitle' => [
            'text' => 
            $kepemilikan_lahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_lahan['yaxis']]
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