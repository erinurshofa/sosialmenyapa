<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Kecamatan;
use app\models\Kelurahan;
use kartik\select2\Select2;
use app\models\Users;
use yii\helpers\ArrayHelper;

/** @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar PSM Belum Aktif';
$this->params['breadcrumbs'][] = $this->title;

$filterkecamatan = ArrayHelper::map(Kecamatan::find()->all(), 'id_lama', 'nama');
$filterkelurahan = ArrayHelper::map(Kelurahan::find()->all(), 'kelurahan_id', 'nama');
?>

<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?=$this->title?></strong>
    </div>
    <div class="box-body p-2">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => false, // tidak pakai SearchModel
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            [
                'attribute' => 'nama_lengkap',
                'label' => 'Nama',
                'filter' => Html::activeTextInput($searchModel, 'nama_lengkap', [
                    'class' => 'form-control',
                    'placeholder' => 'Cari Nama'
                ]),
            ],
            [
                'attribute' => 'email',
                'format' => 'email',
                'filter' => Html::activeTextInput($searchModel, 'email', [
                    'class' => 'form-control',
                    'placeholder' => 'Cari Email'
                ]),
            ],
        // Tambahkan filter Select2 untuk kecamatan
        [
            'attribute' => 'kecamatan_id',
            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'kecamatan_id',
                'data' => $filterkecamatan,
                'options' => ['placeholder' => 'Pilih Kecamatan'],
                'pluginOptions' => ['allowClear' => true],
            ]),
            'value' => function ($model) {
                return @Kecamatan::find()->where(['id_lama'=>$model->kecamatan_id])->one()->nama;
            }
        ],

        // Tambahkan filter Select2 untuk kelurahan
        [
            'attribute' => 'kelurahan_id',
            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'kelurahan_id',
                'data' => $filterkelurahan,
                'options' => ['placeholder' => 'Pilih Kelurahan'],
                'pluginOptions' => ['allowClear' => true],
            ]),
            'value' => function ($model) {
                return @Kelurahan::find()->where(['kelurahan_id'=>$model->kelurahan_id])->one()->nama;
            }
        ],
            // [
            //     'attribute' => 'created_at',
            //     'label' => 'Tanggal Daftar',
            //     'format' => ['date', 'php:d-m-Y'],
            // ],
            [
                'attribute' => 'created_at',
                'label' => 'Tanggal Daftar',
                'format' => ['date', 'php:d-m-Y'],
                'filter' => Html::activeInput('date', $searchModel, 'created_at', [
                    'class' => 'form-control',
                    'placeholder' => 'Tanggal Daftar'
                ]),
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {activate}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->psm_id], [
                            'title' => 'Lihat',
                            'class' => 'btn btn-sm btn-info',
                        ]);
                    },
                    'activate' => function ($url, $model) {
                        return Html::a('<i class="fas fa-check"></i>', ['users/activate', 'id' => $model->id], [
                            'title' => 'Aktifkan',
                            'class' => 'btn btn-sm btn-success',
                            'data' => [
                                'confirm' => 'Yakin ingin mengaktifkan akun ini?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
                'header' => 'Aksi',
            ],
        ],
    ]); ?>
    </div>
</div>
