<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use miloschuman\highcharts\HighchartsAsset;
// use app\models\DtksMaret2022Dtks;
// use app\models\Kecamatan;
// use app\models\Account;
// use app\models\Actions;
// use app\models\Dokumen;

$dataProvider = new ArrayDataProvider([
        'allModels' => $data,
]);
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
            [
              'label'=>'USERNAME',
              'attribute'=>'username',
            //   'pageSummary'=>'Total',
              'format' => 'html',
              'value' => function ($model) { 
                            return $model['username'];
                         },
            ],
            [
                'label'=>'login_time',
                'attribute'=>'login_time',
              //   'pageSummary'=>'Total',
                'format' => 'html',
                'value' => function ($model) { 
                              return $model['login_time'];
                           },
              ],
              [
                'label'=>'IP ADDRESS',
                'attribute'=>'ip_address',
              //   'pageSummary'=>'Total',
                'format' => 'html',
                'value' => function ($model) { 
                              return $model['ip_address'];
                           },
              ],
            
];
?>


<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy">
        <i class="fa fa-fw fa-book"></i>
        <strong>Data Log Login</strong>
    </div>
    <div class="box-body">
<?php
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'showPageSummary' => true,
]);
echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'columns' => $gridColumns,
    'responsive'=>true,
    'hover'=>true,
    'showPageSummary' => true,
]);
?>
</div>
</div>