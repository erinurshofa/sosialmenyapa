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
    foreach($jiwaperkelurahan['jiwaperkelurahan'] as $key=>$values){
            $jiwa=(int)$values['jiwa'];
            // $jiwa[$key]['total']=$jiwa;

         $highchartjiwa[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                // 'data' => array((int)$jiwa[$key]['total'])
                'data' => array($jiwa),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );

        $hclinejiwa['name']= 'Jiwa';
        $datajiwa[]=$jiwa;
        $hclinejiwa['data']= $datajiwa;
        $hclinejiwa['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];
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
            $jiwaperkelurahan['title']],
    'subtitle' => [
            'text' => 
            $jiwaperkelurahan['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kelurahan
 ],
 'yAxis' => [
    'title' => ['text' => $jiwaperkelurahan['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinejiwa
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

            ]
            ]
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
                                    <li>
                                        <a href="#tabsNavigationSimpleIcons2" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Jiwa</p>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabsNavigationSimpleIcons1">
                                        <div class="center">
                                             <?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => $jiwaperkelurahan['title_jiwa']],
    'subtitle' => [
            'text' => $jiwaperkelurahan['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $jiwaperkelurahan['yaxis']]

 ],
 'series' => $highchartjiwa
 ]
]);
                                            ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>


