<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\Bdtart;
use app\models\Kecamatan;
use app\models\Dokumen;
use app\models\Bdtrt;
 $dataProvider = new ArrayDataProvider([
        'allModels' => $ruta['ruta'],
    ]);
?>
  <?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
            [
              'label'=>'Kecamatan',
              'attribute'=>'kode',
              'pageSummary' => 'TOTAL',
              'format' => 'html',
              'value' => function ($model) {
                             return Kecamatan::find()->where(['KodeKecamatan'=>$model['kode']])->one()["Nama"];
                         },
            ],
             [
              'label'=>'Jumlah RT',
              'attribute'=>'rt',
              'hAlign' => 'right',
              'pageSummary' => Html::a('<font color="red"><b>'.Bdtrt::find()->count().'</b></font>', ['bdtrt/index'] , []),
              'pageSummaryOptions' => ['class' =>'text-red'],
              'format' => 'raw',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="red"><b>'.$model['rt'].'</b></font>', ['bdtrt/index','kodekecamatan'=>$model['kode']] , []);
                            return $hasil;
                         },
            ],
            [
              'label'=>'Jumlah Jiwa',
              'attribute'=>'jiwa',
              'hAlign' => 'right',
              'format'=>'decimal',
               'pageSummary' => Html::a('<font color="blue"><b>'.Bdtart::find()->count().'</b></font>', ['bdtrt/index'] , []),
              'format' => 'html',
              'value' => function ($model) {
                          $hasil=Html::a('<font color="blue"><b>'.$model['jiwa'].'</b></font>', ['bdtart/index','kodekecamatan'=>$model['kode']] , []);
                            return $hasil;
                         },
            ],
            [
              'label'=>'Jumlah Keluarga',
              'attribute'=>'keluarga',
              'hAlign' => 'right',
              'pageSummary' => true,
              'format' => 'html',
              'value' => function ($model) {
                            return $model['keluarga'];
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