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
    foreach($jiwa['jiwa'] as $key=>$values){
            $jiwa=(int)$values['jiwa'];
            // $jiwa[$key]['total']=$jiwa;

         $highchartjiwa[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                // 'data' => array((int)$jiwa[$key]['total'])
                'data' => array($jiwa),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );

        $hclinejiwa['name']= 'Jiwa';
        $datajiwa[]=$jiwa;
        $hclinejiwa['data']= $datajiwa;
        $hclinejiwa['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];
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
            $jiwa['title']],
    'subtitle' => [
            'text' => 
            $jiwa['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $jiwa['yaxis']],
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
 'title' => ['text' => $jiwa['title_jiwa']],
    'subtitle' => [
            'text' => $jiwa['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $jiwa['yaxis']]

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


