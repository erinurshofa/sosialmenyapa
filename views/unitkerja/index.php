<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitkerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Unit Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unitkerja-index">

<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
    <div class="box-header bg-green">
    <i class="fa fa-fw fa-book"></i>
    <strong><?= Html::encode($this->title) ?></strong>
    </div>
      <div class="box-body">
    <p>
        <?= Html::a('<i class="fa fa-fw fa-plus-square"></i>Tambah Unitkerja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_unitkerja',
            'kd_unit_kerja',
            'nm_unit_kerja',
            'nama_penanggung_jawab',
            'no_telp',
            //'kd_skpd',
            //'flag',
            // ['class' => 'yii\grid\ActionColumn'],
            [
                'attribute'=>'flag',
                'label'=>'Opsi',
                'filter'=>'',
                'format' => 'raw',
                'value' => function ($model) {
                                return '<div class="btn-group">
                                  '.Html::a('<i class="fa fa-fw fa-search"></i>Detail', ['unitkerja/view', 'id' => $model->id_unitkerja], ['class' => 'btn btn-info btn-xs']).'
                                  '.Html::a('<i class="fa fa-fw fa-cog"></i>Edit', ['unitkerja/update', 'id' => $model->id_unitkerja], ['class' => 'btn btn-warning btn-xs']).'
                                  '.Html::a('<i class="fa fa-fw fa-trash"></i>Hapus', ['unitkerja/delete', 'id' => $model->id_unitkerja], [
                                              'class' => 'btn btn-danger btn-xs',
                                              'data-confirm' => 'Anda yakin ingin menghapus item ini?',
                                              'data-method'=>'post',
                                      ]).'
                          </div>';
                          },
              ],
        ],
    ]); ?>
    </div>
    </div>
      </div>
    </div>
  </div>




</div>
