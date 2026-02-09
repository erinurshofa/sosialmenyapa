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
$categories = array_keys($rekap);
$values = array_values($rekap);
// dd($rekap);
    // foreach($rekap as $key=>$values){
    //     // dd($values);
    //         $rekap=(int)$rekap['anak_terlantar'];
    //         // $rekap[$key]['total']=$rt+$rekap;

    //     $highchartanak_terlantar[]= array(
    //             'type'=> 'column', 
    //             'name' =>$values['kecamatan'], 
    //             'data' => array($rekap),
    //             'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
    //         );
    //     // $hclineanak_terlantar[]= array(
    //     //         // 'type'=> 'line', 
    //     //         'name' =>'anak_terlantar', 
    //     //         'data' => array($rekap),
    //     //         'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
    //     //     );


    //     $hclineanak_terlantar['name']= 'anak_terlantar';
    //     $dataanak_terlantar[]=$rekap;
    //     $hclineanak_terlantar['data']= $dataanak_terlantar;
    //     $hclineanak_terlantar['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];


    //     $kecamatan[]= $values['kecamatan'];

    //      $no++;
    // }
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
            'titlenya'],
    'subtitle' => [
            'text' => 
            'subtitlenya'
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$categories
 ],
 'yAxis' => [
    'title' => ['text' => 'yaxisnya'],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => $values,
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
                                    <li class="active">
                                        <a href="#tabsNavigationSimpleIcons1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                               <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">KK</p>
                                        </a>
                                    </li>
        
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabsNavigationSimpleIcons1">
                                        <div class="center">
                                             <?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => 'titlenya lagi'],
    'subtitle' => [
            'text' => 'subtitlenya lagi'
    ],
 'xAxis' => [
    'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => 'yaxisnyalagi']

 ],

 'series' => $values,
 'dataLabels'=>['enabled'=>true],
 ]
]);
                                            ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>


