<?php

use app\models\SantunanKematian;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SantunanKematianSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Santunan Kematians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="santunan-kematian-index">

            <p>
                <?= Html::a('INPUT Santunan Kematian', ['create'], ['class' => 'btn bg-navy']) ?>
            </p>

                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
                    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
            'nik',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            //'tanggal_kematian',
            //'umur',
            //'alamat:ntext',
            //'rt',
            //'rw',
            //'kecamatan_id',
            //'kecamatan_nama',
            //'kelurahan_id',
            //'kelurahan_nama',
            //'no_dtks',
            //'dtks',
            //'nik_pemohon',
            //'nama_pemohon',
            //'no_hp_pemohon',
            //'hubungan_pemohon',
            //'alamat_pemohon:ntext',
            //'rt_pemohon',
            //'rw_pemohon',
            //'kecamatan_id_pemohon',
            //'kecamatan_nama_pemohon',
            //'kelurahan_id_pemohon',
            //'kelurahan_nama_pemohon',
            //'foto_ktp',
            //'foto_kk',
            //'foto_ktp_pemohon',
            //'foto_kk_pemohon',
            //'foto_sk_kematian',
            //'foto_sk_ahli_waris',
            //'foto_id_dtks',
            //'created_at',
            //'updated_at',
            //'deleted_at',
            //'verifikasi',
            //'tanggal_verifikasi',
            //'diverifikasi',
            //'status_verifikasi',
            //'validasi',
            //'tanggal_validasi',
            //'divalidasi',
            //'status_validasi',
            //'status_permohonan',
            //'approved',
            //'tanggal_approval',
            //'approved_by',
            //'verifikasi_bag_hukum',
            //'tanggal_verifikasi_bag_hukum',
            //'diverifikasi_bag_hukum',
            //'verifikasi_inspektorat',
            //'tanggal_verifikasi_inspektorat',
            //'diverifikasi_inspektorat',
            //'nama_ahli_waris',
            //'jumlah_santunan',
            //'isverifikasi_dpkad',
            //'tanggal_verifikasi_dpkad',
            //'diverifikasi_dpkad',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, SantunanKematian $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        
        
        </div>
    </div>
</div>