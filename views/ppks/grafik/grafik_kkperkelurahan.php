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
    foreach($kkperkelurahan['kkperkelurahan'] as $key=>$values){
            $kk=(int)$values['kk'];
            // $kkperkelurahan[$key]['total']=$rt+$kk;

        $highchartkk[]= array(
                'type'=> 'column', 
                'name' =>$values['kelurahan'], 
                'data' => array($kk),
                'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
            );
        // $hclinekk[]= array(
        //         // 'type'=> 'line', 
        //         'name' =>'kk', 
        //         'data' => array($kk),
        //         'dataLabels'=>['enabled'=>true,'animation'=>['defer'=>8000]],
        //     );


        $hclinekk['name']= 'kk';
        $datakk[]=$kk;
        $hclinekk['data']= $datakk;
        $hclinekk['dataLabels']= ['enabled'=>true,'animation'=>['defer'=>8000]];


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
            $kkperkelurahan['title']],
    'subtitle' => [
            'text' => 
            $kkperkelurahan['subtitle']
    ],
   'plotOptions' => [
            'series'=> [
        ]
        ],
 'xAxis' => [
 'categories'=>$kelurahan
 ],
 'yAxis' => [
    'title' => ['text' => $kkperkelurahan['yaxis']],
 ],
 'legend'=> [
        'layout'=> 'vertical',
        'align'=>'right',
        'verticalAlign'=> 'middle'
    ],
 'series' => [
 $hclinekk
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
 'title' => ['text' => $kkperkelurahan['title_kk']],
    'subtitle' => [
            'text' => $kkperkelurahan['subtitle']
    ],
 'xAxis' => [
    'categories'=>['']
 ],
 'yAxis' => [
    'title' => ['text' => $kkperkelurahan['yaxis']]

 ],

 'series' => $highchartkk,
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


