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
    foreach($jenis_kloset['jenis_kloset'] as $key=>$values){
            $leherangsa=(int)$values['leherangsa'];
            $plengsengan=(int)$values['plengsengan'];
            $cemplung=(int)$values['cemplung'];
            $tidakpakai=(int)$values['tidakpakai'];
           
          
            // $jenis_kloset['jenis_kloset'][$key]['total']=$leherangsa+$plengsengan;
        $highchartleherangsa[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($leherangsa),
            );
        $highchartplengsengan[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($plengsengan),
            );
        $highchartcemplung[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($cemplung),
            );
        $highcharttidakpakai[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($tidakpakai),
            );
     

        $hclineleherangsa['name']= 'leherangsa';
        // $hclineleherangsa['type']= 'column';
        $dataleherangsa[]=$leherangsa;
        $hclineleherangsa['data']= $dataleherangsa;

        $hclineplengsengan['name']= 'plengsengan';
        // $hclineplengsengan['type']= 'column';
        $dataplengsengan[]=$plengsengan;
        $hclineplengsengan['data']= $dataplengsengan;

        $hclinecemplung['name']= 'cemplung';
        // $hclinecemplung['type']= 'column';
        $datacemplung[]=$cemplung;
        $hclinecemplung['data']= $datacemplung;

        $hclinetidakpakai['name']= 'tidakpakai';
        // $hclinetidakpakai['type']= 'column';
        $datatidakpakai[]=$tidakpakai;
        $hclinetidakpakai['data']= $datatidakpakai;

        

        $kecamatan[]= $values['kecamatan'];
         $no++;
    }
?>

<div class="row container">
    <div class="col-md-11">
                            <div class="panel-group" id="accordionjenis_kloset">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionjenis_kloset" href="#collapsejenis_kloset">
                                                <i class="fa fa-group"></i> <?php //$jenis_kloset['title']?>
                                            </a>
                                        </h4>
                                    </div> -->
                                    <div id="collapsejenis_kloset" class="accordion-body collapse in">
                                        <div class="panel-body">
                                        <?php

echo Highcharts::widget([
    'scripts' => [
            'modules/exporting',
            'themes/grid-light',
    ],
 'options' => [
 'title' => ['text' => 
            $jenis_kloset['title']],
    'subtitle' => [
            'text' => 
            $jenis_kloset['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $jenis_kloset['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclineleherangsa,$hclineplengsengan,$hclinecemplung,$hclinetidakpakai
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
                            <center><h4><?=$jenis_kloset['title']?></h4></center>
                        </div>
                    </div>
<div class="row">
                        <div class="col-md-12">

                            <div class="tabs tabs-bottom tabs-center tabs-simple">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tabsjenis_kloset1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Leher Angsa</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsjenis_kloset2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Plengsengan</p>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="#tabsjenis_kloset3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Cemplung</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabsjenis_kloset4" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Tidak Pakai</p>
                                        </a>
                                    </li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabsjenis_kloset1">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $jenis_kloset['title_leherangsa']],
    'subtitle' => [
            'text' => 
            $jenis_kloset['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $jenis_kloset['yaxis']]

 ],
 'series' => $highchartleherangsa
 ]
]);
?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabsjenis_kloset2">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $jenis_kloset['title_plengsengan']],
    'subtitle' => [
            'text' => 
            $jenis_kloset['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $jenis_kloset['yaxis']]
 ],
 'series' => $highchartplengsengan
 ]
]);
?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsjenis_kloset3">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $jenis_kloset['title_cemplung']],
    'subtitle' => [
            'text' => 
            $jenis_kloset['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $jenis_kloset['yaxis']]
 ],
 'series' => $highchartcemplung
 ]
]);
?>
                                        </div>
                                    </div>   
<div class="tab-pane" id="tabsjenis_kloset4">
                                        <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $jenis_kloset['title_tidakpakai']],
    'subtitle' => [
            'text' => 
            $jenis_kloset['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $jenis_kloset['yaxis']]
 ],
 'series' => $highcharttidakpakai
 ]
]);
?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
