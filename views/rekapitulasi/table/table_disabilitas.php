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
        'allModels' => $disabilitas['disabilitas'],
    ]);
?>
  <?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
            [
              'label'=>'Kecamatan',
              'attribute'=>'kecamatan',
              'pageSummary'=>'Total',
              'format' => 'html',
              'value' => function ($model) {
                              return $model['kecamatan'];
                         },
            ],

            [
              'label'=>'Tunadaksa',
              'attribute'=>'tunadaksa',
               'pageSummary'=>true,
              'format' => 'html',
              'value' => function ($model) {
                           return $model['tunadaksa'];
                         },
            ],
            [
              'label'=>'Tunanetra',
              'attribute'=>'tunanetra',
               'pageSummary'=>true,
              'format' => 'html',
              'value' => function ($model) {
                              return $model['tunanetra'];
                         },
            ],
            [
              'label'=>'Tunarungu',
              'attribute'=>'tunarungu',
               'pageSummary'=>true,
              'format' => 'html',
              'value' => function ($model) {
                              return $model['tunarungu'];
                         },
            ],
            [
              'label'=>'Tunarungu wicara',
              'attribute'=>'tunarunguwicara',
               'pageSummary'=>true,
              'format' => 'html',
              'value' => function ($model) {
                              return $model['tunarunguwicara'];
                         },
            ],
            [
              'label'=>'Tunanetra dan cacat',
              'attribute'=>'tunarungu',
               'pageSummary'=>true,
              'format' => 'html',
              'value' => function ($model) {
                              return $model['tunarungu'];
                         },
            ],
            // [
            //   'label'=>'Tunanetra tunarungu',
            //   'attribute'=>'tunanetrarungu',
            //    'pageSummary'=>true,
            //   'format' => 'html',
            //   'value' => function ($model) {
            //                   return $model['tunanetrarungu'];
            //              },
            // ],
            [
              'label'=>'Tunarungu, wicara dan cacat',
              'attribute'=>'tunarunguwicaracacat',
               'pageSummary'=>true,
              'format' => 'html',
              'value' => function ($model) {
                              return $model['tunarunguwicaracacat'];
                         },
            ],
            [
              'label'=>'Cacat Mental',
              'attribute'=>'cacatmental',
               'pageSummary'=>true,
              'format' => 'html',
              'value' => function ($model) {
                              return $model['cacatmental'];
                         },
            ],
            [
              'label'=>'Mantan Gangguan Jiwa',
              'attribute'=>'mantangangguanjiwa',
               'pageSummary'=>true,
              'format' => 'html',
              'value' => function ($model) {
                              return $model['mantangangguanjiwa'];
                         },
            ],
            //  [
            //   'label'=>'Cacat Fisik',
            //   'attribute'=>'cacatfisik',
            //    'pageSummary'=>true,
            //   'format' => 'html',
            //   'value' => function ($model) {
            //                   return $model['cacatfisik'];
            //              },
            // ],
    // ['class' => 'yii\grid\ActionColumn'],
];
if (null!==Dokumen::find()->where(['username'=>@Yii::$app->user->identity->username])->andWhere(['status'=>'diterima'])->one()) {
  echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    // 'showPageSummary' => true,

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