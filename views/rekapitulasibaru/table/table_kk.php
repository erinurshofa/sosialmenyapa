<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\DtksFebruari2022Dtks;
use app\models\Kecamatan;
use app\models\Dokumen;
use app\models\Bdtrt;
 $dataProvider = new ArrayDataProvider([
        'allModels' => $kk['kk'],
    ]);
?>
  <?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
            [
              'label'=>'Kecamatan',
              'attribute'=>'kecamatan',
              'pageSummary' => 'TOTAL',
              'format' => 'html',
              'value' => function ($model) {
                             return $model["kecamatan"];
                         },
            ],
            [
              'label'=>'Jumlah KK',
              'attribute'=>'kk',
              'hAlign' => 'right',
              'format'=>'decimal',
               'pageSummary' => Html::a('<font color="blue"><b>'.DtksFebruari2022Dtks::find()->count().'</b></font>', ['dtks-februari2022-dtks/index'] , []),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="blue"><b>'.$model['kk'].'</b></font>', ['dtks-februari2022-dtks/index','kecamatan'=>$model['kecamatan']] , []);
                            return $hasil;
                         },
            ],
           
           
];
if (null!==Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'diterima'])->one()) {
  echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'showPageSummary' => true,

]);
}
if (null==Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'diterima'])->one()) {
    echo 'Download CSV Belum diperbolehkan karena belum upload permohonan yang terkonfirmasi';
  }
echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'columns' => $gridColumns,
    'responsive'=>true,
    'hover'=>true,
    'showPageSummary' => true,
]);
?>