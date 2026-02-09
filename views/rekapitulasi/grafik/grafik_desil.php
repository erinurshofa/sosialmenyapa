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
    foreach($desil['desil'] as $key=>$values){
            $desil1=(int)$values['desil1'];
            $desil2=(int)$values['desil2'];
            $desil3=(int)$values['desil3'];
            $desil4=(int)$values['desil4'];
            $desil4plus=(int)$values['desil4plus'];
            $desil[$key]['total']=$desil1+$desil2;

         $highchartdesil1[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($desil1),
            );
        $highchartdesil2[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($desil2),
            );
        $highchartdesil3[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($desil3),
            );
        $highchartdesil4[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($desil4),
            );
        $highchartdesil4plus[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($desil4plus),
            );
        $hclinedesil1['name']= 'Desil I';
        // $hclinedesil1['type']= 'column';
        $datadesil1[]=$desil1;
        $hclinedesil1['data']= $datadesil1;

        $hclinedesil2['name']= 'Desil II';
        // $hclinedesil2['type']= 'column';
        $datadesil2[]=$desil2;
        $hclinedesil2['data']= $datadesil2;

        $hclinedesil3['name']= 'Desil III';
        // $hclinedesil3['type']= 'column';
        $datadesil3[]=$desil3;
        $hclinedesil3['data']= $datadesil3;

        $hclinedesil4['name']= 'Desil IV';
        // $hclinedesil4['type']= 'column';
        $datadesil4[]=$desil4;
        $hclinedesil4['data']= $datadesil4;

        $hclinedesil4plus['name']= 'Desil IV Plus';
        // $hclinedesil4plus['type']= 'column';
        $datadesil4plus[]=$desil4plus;
        $hclinedesil4plus['data']= $datadesil4plus;
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
            $desil['title']],
    'subtitle' => [
            'text' => 
            $desil['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $desil['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinedesil1,$hclinedesil2,$hclinedesil3,$hclinedesil4,$hclinedesil4plus
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
            <a href="#tabsDesil1" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">Desil 1</p>
            </a>
          </li>
          <li>
            <a href="#tabsDesil2" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">Desil 2</p>
            </a>
          </li> 
          <li>
            <a href="#tabsDesil3" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">Desil 3</p>
            </a>
          </li> 
          <li>
            <a href="#tabsDesil4" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">Desil 4</p>
            </a>
          </li> 
          <li>
            <a href="#tabsDesil4plus" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">Desil 4 Plus</p>
            </a>
          </li>                                                                                                 
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tabsDesil1">
            <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $desil['title_desil1']],
    'subtitle' => [
            'text' => 
            $desil['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $desil['yaxis']]

 ],
 'series' => $highchartdesil1
 ]
]);
?>
          </div>
        </div>
        <div class="tab-pane" id="tabsDesil2">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $desil['title_desil2']],
    'subtitle' => [
            'text' => 
            $desil['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $desil['yaxis']]

 ],
 'series' => $highchartdesil2
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsDesil3">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $desil['title_desil3']],
    'subtitle' => [
            'text' => 
            $desil['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $desil['yaxis']]

 ],
 'series' => $highchartdesil3
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsDesil4">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $desil['title_desil4']],
    'subtitle' => [
            'text' => 
            $desil['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $desil['yaxis']]

 ],
 'series' => $highchartdesil4
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsDesil4plus">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $desil['title_desil4plus']],
    'subtitle' => [
            'text' => 
            $desil['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $desil['yaxis']]

 ],
 'series' => $highchartdesil4plus
 ]
]);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


