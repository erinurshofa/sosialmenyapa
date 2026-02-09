<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use app\models\Account;
use app\models\BansosUsulSanggah;
use app\models\ActionsHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pengguna';
$this->params['breadcrumbs'][] = $this->title;
$filterkecamatan=ArrayHelper::map(BansosUsulSanggah::find()->select('kecamatan')->distinct()->asArray()->all(), 'kecamatan', 'kecamatan');
?>
<div class="account-index">

    <!-- <h1><?php //Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Pengguna', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
    <div class="box-header bg-green">
    <strong><?= Html::encode($this->title) ?></strong>
    </div>
      <div class="box-body">

<?php if (Yii::$app->user->identity->role=='admin'): ?>
    <div class="table-responsive">
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_account',
            [
              'attribute' => 'username',
              'format' => 'raw', // Menggunakan 'raw' untuk bisa mengelola HTML secara langsung
              'value' => function ($model) {
                 return ActionsHelper::maskString($model->username);
              },
              'contentOptions' => function($model) {
                  // needs to be closure because of title
                  return [
                      'class' => 'cell-with-tooltip',
                      'data-toggle' => 'tooltip',
                      'data-placement' => 'bottom', // top, bottom, left, right
                      'data-container' => 'body', // to prevent breaking table on hover
                      'title' => $model->username,
                  ];
              }
          ],
          [
            'attribute' => 'password',
            'format' => 'raw', // Menggunakan 'raw' untuk bisa mengelola HTML secara langsung
            'value' => function ($model) {
               return ActionsHelper::maskString($model->password);
            },
            'contentOptions' => function($model) {
                // needs to be closure because of title
                return [
                    'class' => 'cell-with-tooltip',
                    'data-toggle' => 'tooltip',
                    'data-placement' => 'bottom', // top, bottom, left, right
                    'data-container' => 'body', // to prevent breaking table on hover
                    'title' => ActionsHelper::decryptPassword($model->password),
                ];
            }
        ],
        [
          'attribute' => 'nama_lengkap',
          'format' => 'raw', // Menggunakan 'raw' untuk bisa mengelola HTML secara langsung
          'value' => function ($model) {
             return ActionsHelper::maskString($model->nama_lengkap);
          },
          'contentOptions' => function($model) {
              // needs to be closure because of title
              return [
                  'class' => 'cell-with-tooltip',
                  'data-toggle' => 'tooltip',
                  'data-placement' => 'bottom', // top, bottom, left, right
                  'data-container' => 'body', // to prevent breaking table on hover
                  'title' => $model->nama_lengkap,
              ];
          }
      ],
            'nama_lengkap',
            'nama_opd',
            'jabatan',
            //'telp',
            // 'email:email',
            'role',
            //'ip',
            //'browser',
            //'foto',
            //'host',
            //'konfirmasi_email:email',
            //'kode_konfirmasi',
            //'konfirmasi_admin',
            //'lastlogin',
            //'created',
            //'updated',
            //'flag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
<?php endif ?>

    </div>
      </div>
    </div>
  </div>


</div>
<?php
$script = <<< JS
$( document ).ready(function() {
   console.log( "ready!" );
   $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
});
JS;
$this->registerJs($script);
?>