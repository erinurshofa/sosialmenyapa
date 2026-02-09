<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Account;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DokumenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Dokumen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokumen-index">

    <!-- <h1><?php //Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dokumen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
    <div class="box-header bg-green">
    <strong><?= Html::encode($this->title) ?></strong>
    </div>
      <div class="box-body">
        <div class="table-responsive">
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_dokumen',
               [
              'attribute'=>'judul',
              'format' => 'html',
              'value' => function ($model) {
                           return Html::a($model->filename, ['dokumen/downloadform','id'=>$model->id_dokumen], ['class'=>'']);
                         },
            ],
            // 'judul',
            'deskripsi',
            'kategori_dokumen',
            'status',
            [
              'label'=>'Di Konfirmasi Oleh',
              'attribute'=>'username_konfirmasi',
              'format' => 'html',
              'value' => function ($model) {
                           return Account::find(['username_konfirmasi'=>$model->username_konfirmasi])->one()->nama_lengkap;
                         },
            ],
            //'filename',
            //'filetype',
            //'filesize',
            //'filecontent',
            //'created',
            //'updated',
            //'username',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
    </div>
      </div>
    </div>
  </div>
</div>
    
</div>
