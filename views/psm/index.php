<?php

use app\models\Psm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PsmSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Psms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="psm-index">

            <p>
                <?= Html::a('INPUT Psm', ['create'], ['class' => 'btn bg-navy']) ?>
            </p>

                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
                    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
            'nama',
            'nik',
            'email:email',
            'hp',
            //'kecamatan',
            //'kelurahan',
            //'keterangan',
            //'tempat_lahir',
            //'tanggal_lahir',
            //'jenis_kelamin',
            //'jalan',
            //'rt',
            //'rw',
            //'provinsi_id',
            //'kota_id',
            //'kecamatan_id',
            //'kelurahan_id',
            //'user_id',
            //'login_terakhir',
            //'no_rekening',
            //'nama_pemilik',
            //'nama_bank',
            //'no_sertifikat',
            //'tanggal_sertifikat',
            //'file_sertifikat',
            //'file_sk_walikota',
            //'created_at',
            //'updated_at',
                    // [
                    //     'class' => ActionColumn::className(),
                    //     'urlCreator' => function ($action, Psm $model, $key, $index, $column) {
                    //         return Url::toRoute([$action, 'id' => $model->id]);
                    //     }
                    // ],
                    [
            'attribute' => 'updated_at',
            'label' => 'Aksi',
            'filter' => '',
            'format' => 'raw',
            'value' => function ($model) {
                $buttons = '<div class="btn-group">
                    ' . Html::a('<i class="fa fa-fw fa-check-square"></i>Detail', ['psm/view', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']) . '
                    ' . Html::a('<i class="fa fa-fw fa-edit"></i>Edit', ['psm/update', 'id' => $model->id], ['class' => 'btn btn-warning btn-xs']) . '
                ';
        
                if (Yii::$app->user->identity->role == 'admin' || Yii::$app->user->identity->role == 'dinsos') {
                    $buttons .= Html::a(
                        '<i class="fa fa-fw fa-trash"></i>Hapus',
                        ['psm/delete', 'id' => $model->id],
                        [
                            'class' => 'btn btn-danger btn-xs',
                            'data-confirm' => 'Apakah Anda yakin ingin menghapus item ini?',
                            'data-method' => 'post', // Menghindari error 405
                        ]
                    );
                }
        
                $buttons .= '</div>';
                return $buttons;
            },
        ],
                ],
            ]); ?>
        
        
        </div>
    </div>
</div>