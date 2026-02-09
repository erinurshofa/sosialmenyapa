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
    foreach($status_kesejahteraan['status_kesejahteraan'] as $key=>$values){
            $status_kesejahteraan1=(int)$values['sangatmiskin'];
            $status_kesejahteraan2=(int)$values['miskin'];
            $status_kesejahteraan3=(int)$values['hampirmiskin'];
            $status_kesejahteraan4=(int)$values['rentanmiskin'];
            $status_kesejahteraan5=(int)$values['menujumiddleclass'];
            $status_kesejahteraan[$key]['total']=$status_kesejahteraan1+$status_kesejahteraan2;

         $highchartstatus_kesejahteraan1[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($status_kesejahteraan1),
            );
        $highchartstatus_kesejahteraan2[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($status_kesejahteraan2),
            );
        $highchartstatus_kesejahteraan3[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($status_kesejahteraan3),
            );
        $highchartstatus_kesejahteraan4[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($status_kesejahteraan4),
            );
        $highchartstatus_kesejahteraan5[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                'data' => array($status_kesejahteraan5),
            );
        $hclinestatus_kesejahteraan1['name']= 'Sangat Miskin';
        // $hclinestatus_kesejahteraan1['type']= 'column';
        $datastatus_kesejahteraan1[]=$status_kesejahteraan1;
        $hclinestatus_kesejahteraan1['data']= $datastatus_kesejahteraan1;

        $hclinestatus_kesejahteraan2['name']= 'Miskin';
        // $hclinestatus_kesejahteraan2['type']= 'column';
        $datastatus_kesejahteraan2[]=$status_kesejahteraan2;
        $hclinestatus_kesejahteraan2['data']= $datastatus_kesejahteraan2;

        $hclinestatus_kesejahteraan3['name']= 'Hampir Miskin';
        // $hclinestatus_kesejahteraan3['type']= 'column';
        $datastatus_kesejahteraan3[]=$status_kesejahteraan3;
        $hclinestatus_kesejahteraan3['data']= $datastatus_kesejahteraan3;

        $hclinestatus_kesejahteraan4['name']= 'Rentan Miskin';
        // $hclinestatus_kesejahteraan4['type']= 'column';
        $datastatus_kesejahteraan4[]=$status_kesejahteraan4;
        $hclinestatus_kesejahteraan4['data']= $datastatus_kesejahteraan4;

        $hclinestatus_kesejahteraan5['name']= 'Menuju Middle Class';
        // $hclinestatus_kesejahteraan4plus['type']= 'column';
        $datastatus_kesejahteraan5[]=$status_kesejahteraan5;
        $hclinestatus_kesejahteraan5['data']= $datastatus_kesejahteraan5;
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
            $status_kesejahteraan['title']],
    'subtitle' => [
            'text' => 
            $status_kesejahteraan['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $status_kesejahteraan['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinestatus_kesejahteraan1,$hclinestatus_kesejahteraan2,$hclinestatus_kesejahteraan3,$hclinestatus_kesejahteraan4,$hclinestatus_kesejahteraan5
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
            <a href="#tabsstatus_kesejahteraan1" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">Sangat Miskin</p>
            </a>
          </li>
          <li>
            <a href="#tabsstatus_kesejahteraan2" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">Miskin</p>
            </a>
          </li> 
          <li>
            <a href="#tabsstatus_kesejahteraan3" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">Hampir Miskin</p>
            </a>
          </li> 
          <li>
            <a href="#tabsstatus_kesejahteraan4" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">Rentan Miskin</p>
            </a>
          </li> 
          <li>
            <a href="#tabsstatus_kesejahteraan4plus" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">Menuju Middle Class</p>
            </a>
          </li>                                                                                                 
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tabsstatus_kesejahteraan1">
            <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $status_kesejahteraan['title_status_kesejahteraan1']],
    'subtitle' => [
            'text' => 
            $status_kesejahteraan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $status_kesejahteraan['yaxis']]

 ],
 'series' => $highchartstatus_kesejahteraan1
 ]
]);
?>
          </div>
        </div>
        <div class="tab-pane" id="tabsstatus_kesejahteraan2">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $status_kesejahteraan['title_status_kesejahteraan2']],
    'subtitle' => [
            'text' => 
            $status_kesejahteraan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $status_kesejahteraan['yaxis']]

 ],
 'series' => $highchartstatus_kesejahteraan2
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsstatus_kesejahteraan3">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $status_kesejahteraan['title_status_kesejahteraan3']],
    'subtitle' => [
            'text' => 
            $status_kesejahteraan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $status_kesejahteraan['yaxis']]

 ],
 'series' => $highchartstatus_kesejahteraan3
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsstatus_kesejahteraan4">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $status_kesejahteraan['title_status_kesejahteraan4']],
    'subtitle' => [
            'text' => 
            $status_kesejahteraan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $status_kesejahteraan['yaxis']]

 ],
 'series' => $highchartstatus_kesejahteraan4
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsstatus_kesejahteraan5">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $status_kesejahteraan['title_status_kesejahteraan5']],
    'subtitle' => [
            'text' => 
            $status_kesejahteraan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $status_kesejahteraan['yaxis']]

 ],
 'series' => $highchartstatus_kesejahteraan5
 ]
]);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


