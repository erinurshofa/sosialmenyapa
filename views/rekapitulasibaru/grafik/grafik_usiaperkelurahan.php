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
    foreach($usiaperkelurahan['usiaperkelurahan'] as $key=>$values){
            $usia0_5=(int)$values['usia0_5'];
            $usia6_12=(int)$values['usia6_12'];
            $usia13_15=(int)$values['usia13_15'];
            $usia16_18=(int)$values['usia16_18'];
            $usia19_25=(int)$values['usia19_25'];
            $usia26_30=(int)$values['usia26_30'];
            $usia31_40=(int)$values['usia31_40'];
            $usia41_50=(int)$values['usia41_50'];
            $usia51_60=(int)$values['usia51_60'];
            $usia61_110=(int)$values['usia61_110'];
            $usialebih_110=(int)$values['usialebih_110'];
            $usiaperkelurahan[$key]['total']=$usia0_5+$usia6_12+$usia13_15+$usia16_18+$usia19_25+$usia26_30+$usia31_40+$usia41_50+$usia51_60+$usia61_110+$usia61_110;

        $highchartusia0_5[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usia0_5),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartusia6_12[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usia6_12),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartusia13_15[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usia13_15),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartusia16_18[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usia16_18),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartusia19_25[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usia19_25),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartusia26_30[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usia26_30),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartusia31_40[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usia31_40),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartusia41_50[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usia41_50),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartusia51_60[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usia51_60),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartusia61_110[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usia61_110),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        $highchartusialebih_110[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($usialebih_110),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );

        $hclineusia0_5['name']= 'USIA 0 - 5';
        $datausia0_5[]=$usia0_5;
        $hclineusia0_5['data']= $datausia0_5;
        $hclineusia0_5['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclineusia6_12['name']= 'USIA 6 - 12';
        $datausia6_12[]=$usia6_12;
        $hclineusia6_12['data']= $datausia6_12;
        $hclineusia6_12['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];        

        $hclineusia13_15['name']= 'USIA 13 - 15';
        $datausia13_15[]=$usia13_15;
        $hclineusia13_15['data']= $datausia13_15;
        $hclineusia13_15['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclineusia16_18['name']= 'USIA 16 - 18';
        $datausia16_18[]=$usia16_18;
        $hclineusia16_18['data']= $datausia16_18;
        $hclineusia16_18['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclineusia19_25['name']= 'USIA 19 - 25';
        $datausia19_25[]=$usia19_25;
        $hclineusia19_25['data']= $datausia19_25;
        $hclineusia19_25['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclineusia26_30['name']= 'USIA 26 - 30';
        $datausia26_30[]=$usia26_30;
        $hclineusia26_30['data']= $datausia26_30;
        $hclineusia26_30['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclineusia31_40['name']= 'USIA 31 - 40';
        $datausia31_40[]=$usia31_40;
        $hclineusia31_40['data']= $datausia31_40;
        $hclineusia31_40['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclineusia41_50['name']= 'USIA 41 - 50';
        $datausia41_50[]=$usia41_50;
        $hclineusia41_50['data']= $datausia41_50;
        $hclineusia41_50['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclineusia51_60['name']= 'USIA 51 - 60';
        $datausia51_60[]=$usia51_60;
        $hclineusia51_60['data']= $datausia51_60;
        $hclineusia51_60['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclineusia61_110['name']= 'USIA 61 - 110';
        $datausia61_110[]=$usia61_110;
        $hclineusia61_110['data']= $datausia61_110;
        $hclineusia61_110['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $hclineusialebih_110['name']= 'USIA LEBIH DARI 110';
        $datausialebih_110[]=$usialebih_110;
        $hclineusialebih_110['data']= $datausialebih_110;
        $hclineusialebih_110['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];

        $kelurahan[]= $values['kelurahan'];

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
            $usiaperkelurahan['title']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kelurahan
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclineusia0_5,$hclineusia6_12,$hclineusia13_15,$hclineusia16_18,$hclineusia19_25,$hclineusia26_30,$hclineusia31_40,$hclineusia41_50,$hclineusia51_60,$hclineusia61_110,$hclineusialebih_110
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
            <a href="#tabsusia0_5" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA 0 - 5</p>
            </a>
          </li>
          <li>
            <a href="#tabsusia6_12" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA 6 - 12</p>
            </a>
          </li> 
          <li>
            <a href="#tabsusia13_15" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA 13 - 15</p>
            </a>
          </li> 
          <li>
            <a href="#tabsusia16_18" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA 16 - 18</p>
            </a>
          </li> 
          <li>
            <a href="#tabsusia19_25" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA 19 - 25</p>
            </a>
          </li>
          <li>
            <a href="#tabsusia26_30" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA 26 - 30</p>
            </a>
          </li>                                      
          <li>
            <a href="#tabsusia31_40" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA 31 - 40</p>
            </a>
          </li>
          <li>
            <a href="#tabsusia41_50" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA 41 - 50</p>
            </a>
          </li>
          <li>
            <a href="#tabsusia51_60" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA 51 - 60</p>
            </a>
          </li>                                      
          <li>
            <a href="#tabsusia61_110" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA 61 - 110</p>
            </a>
          </li>                
          <li>
            <a href="#tabsusialebih_110" data-toggle="tab">
              <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                  <span class="box-content p-none m-none">
                    <i class="icon-featured fa fa-group"></i>
                  </span>
                </span>
              </span>                                 
              <p class="mb-none pb-none">USIA LEBIH DARI 110</p>
            </a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tabsusia0_5">
            <div class="center">
<?php
echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usia0_5']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusia0_5
 ]
]);
?>
          </div>
        </div>
        <div class="tab-pane" id="tabsusia6_12">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usia6_12']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusia6_12
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsusia13_15">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usia13_15']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusia13_15
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsusia16_18">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usia16_18']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusia16_18
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsusia19_25">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usia19_25']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusia19_25
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsusia26_30">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usia26_30']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusia26_30
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsusia31_40">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usia31_40']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusia31_40
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsusia41_50">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usia41_50']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusia41_50
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsusia51_60">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usia51_60']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusia51_60
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsusia61_110">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usia61_110']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusia61_110
 ]
]);
                                            ?>
                                        </div>
                                    </div>
<div class="tab-pane" id="tabsusialebih_110">
          <div class="center">
<?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 
            $usiaperkelurahan['title_usialebih_110']],
    'subtitle' => [
            'text' => 
            $usiaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $usiaperkelurahan['yaxis']]

 ],
 'series' => $highchartusialebih_110
 ]
]);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


