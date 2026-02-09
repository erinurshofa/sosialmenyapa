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
    foreach($kepemilikan_rumah['kepemilikan_rumah'] as $key=>$values){
            $miliksendiri=(int)$values['miliksendiri'];
            $kontrak=(int)$values['kontrak'];
            $bebas=(int)$values['bebas'];
            $dinas=(int)$values['dinas'];
            $lainnya=(int)$values['lainnya'];
          
            // $kepemilikan_rumah['kepemilikan_rumah'][$key]['total']=$miliksendiri+$kontrak;
        $highchartmiliksendiri[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($miliksendiri),
            );
        $highchartkontrak[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($kontrak),
            );
        $highchartbebas[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($bebas),
            );
        $highchartdinas[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($dinas),
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

        $hclinekontrak['name']= 'kontrak';
        // $hclinekontrak['type']= 'column';
        $datakontrak[]=$kontrak;
        $hclinekontrak['data']= $datakontrak;

        $hclinebebas['name']= 'bebas';
        // $hclinebebas['type']= 'column';
        $databebas[]=$bebas;
        $hclinebebas['data']= $databebas;

        $hclinedinas['name']= 'dinas';
        // $hclinedinas['type']= 'column';
        $datadinas[]=$dinas;
        $hclinedinas['data']= $datadinas;

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
            $kepemilikan_rumah['title']],
    'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_rumah['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinemiliksendiri,$hclinekontrak,$hclinebebas,$hclinedinas,$hclinelainnya
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
                                        <a href="#tabskepemilikan_rumah1" data-toggle="tab">
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
                                        <a href="#tabskepemilikan_rumah2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Kontrak</p>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="#tabskepemilikan_rumah3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Bebas</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskepemilikan_rumah4" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Dinas</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabskepemilikan_rumah5" data-toggle="tab">
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
                                    <div class="tab-pane active" id="tabskepemilikan_rumah1">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kepemilikan_rumah['title_miliksendiri']],
    'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_rumah['yaxis']]

 ],
 'series' => $highchartmiliksendiri
 ]
]);
?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabskepemilikan_rumah2">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kepemilikan_rumah['title_kontrak']],
    'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_rumah['yaxis']]
 ],
 'series' => $highchartkontrak
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskepemilikan_rumah3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kepemilikan_rumah['title_bebas']],
    'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_rumah['yaxis']]
 ],
 'series' => $highchartbebas
 ]
]);
?>
                                        </div>
                                    </div>   
<div class="tab-pane" id="tabskepemilikan_rumah4">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kepemilikan_rumah['title_dinas']],
    'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_rumah['yaxis']]
 ],
 'series' => $highchartdinas
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabskepemilikan_rumah5">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $kepemilikan_rumah['title_lainnya']],
    'subtitle' => [
            'text' => 
            $kepemilikan_rumah['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kepemilikan_rumah['yaxis']]
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


