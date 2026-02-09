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
    foreach($ruta['ruta'] as $key=>$values){
            $rt=(int)$values['rt'];
            $jiwa=(int)$values['jiwa'];
            $keluarga=(int)$values['keluarga'];
            $ruta[$key]['total']=$rt+$jiwa;

         $highchartjiwa[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                // 'data' => array((int)$ruta[$key]['total'])
                'data' => array($jiwa),
            );
        $highchartruta[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                // 'data' => array((int)$ruta[$key]['total'])
                'data' => array($rt),
            );
        $highchartkeluarga[]= array(
                'type'=> 'column', 
                'name' =>$values['kecamatan'], 
                // 'data' => array((int)$ruta[$key]['total'])
                'data' => array($keluarga),
            );
        $hclineruta['name']= 'Rumah Tangga';
        // $hclineruta['type']= 'column';
        $dataruta[]=$rt;
        $hclineruta['data']= $dataruta;

        $hclinejiwa['name']= 'Jiwa';
        // $hclinejiwa['type']= 'column';
        $datajiwa[]=$jiwa;
        $hclinejiwa['data']= $datajiwa;

        $hclinekeluarga['name']= 'Keluarga';
        // $hclinekeluarga['type']= 'column';
        $datakeluarga[]=$keluarga;
        $hclinekeluarga['data']= $datakeluarga;

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
            $ruta['title']],
    'subtitle' => [
            'text' => 
            $ruta['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kecamatan
 ],
 'yAxis' => [
    'title' => ['text' => $ruta['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclineruta,$hclinejiwa,$hclinekeluarga
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
                                    <li class="active">
                                        <a href="#tabsNavigationSimpleIcons1" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                               <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Rumah Tangga</p>
                                        </a>
                                    </li>
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
                                    <li>
                                        <a href="#tabsNavigationSimpleIcons3" data-toggle="tab">
                                            <span class="featured-boxes featured-boxes-style-6 p-none m-none">
                                                <span class="featured-box featured-box-primary featured-box-effect-6 p-none m-none">
                                                    <span class="box-content p-none m-none">
                                                        <i class="icon-featured fa fa-group"></i>
                                                    </span>
                                                </span>
                                            </span>                                 
                                            <p class="mb-none pb-none">Keluarga</p>
                                        </a>
                                    </li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabsNavigationSimpleIcons1">
                                        <div class="center">
                                            <?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => $ruta['title_rt']],
    'subtitle' => [
            'text' => $ruta['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $ruta['yaxis']]

 ],
 'series' => $highchartruta
 ]
]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabsNavigationSimpleIcons2">
                                        <div class="center">
                                             <?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => $ruta['title_jiwa']],
    'subtitle' => [
            'text' => $ruta['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $ruta['yaxis']]

 ],
 'series' => $highchartjiwa
 ]
]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabsNavigationSimpleIcons3">
                                        <div class="center">
                                             <?php

echo Highcharts::widget([
 'options' => [
 'title' => ['text' => $ruta['title_keluarga']],
    'subtitle' => [
            'text' => $ruta['subtitle']
    ],
 'xAxis' => [
 'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' =>  $ruta['yaxis']]
 ],
 'series' => $highchartkeluarga
 ]
]);
                                            ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>


