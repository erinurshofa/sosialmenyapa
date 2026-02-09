<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SantunanKematian $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Santunan Kematians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="santunan-kematian-view">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
            'nik',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'tanggal_kematian',
            'umur',
            'alamat:ntext',
            'rt',
            'rw',
            'kecamatan_id',
            'kecamatan_nama',
            'kelurahan_id',
            'kelurahan_nama',
            'no_dtks',
            'dtks',
            'nik_pemohon',
            'nama_pemohon',
            'no_hp_pemohon',
            'hubungan_pemohon',
            'alamat_pemohon:ntext',
            'rt_pemohon',
            'rw_pemohon',
            'kecamatan_id_pemohon',
            'kecamatan_nama_pemohon',
            'kelurahan_id_pemohon',
            'kelurahan_nama_pemohon',
            'foto_ktp',
            'foto_kk',
            'foto_ktp_pemohon',
            'foto_kk_pemohon',
            'foto_sk_kematian',
            'foto_sk_ahli_waris',
            'foto_id_dtks',
            'created_at',
            'updated_at',
            'deleted_at',
            'verifikasi',
            'tanggal_verifikasi',
            'diverifikasi',
            'status_verifikasi',
            'validasi',
            'tanggal_validasi',
            'divalidasi',
            'status_validasi',
            'status_permohonan',
            'approved',
            'tanggal_approval',
            'approved_by',
            'verifikasi_bag_hukum',
            'tanggal_verifikasi_bag_hukum',
            'diverifikasi_bag_hukum',
            'verifikasi_inspektorat',
            'tanggal_verifikasi_inspektorat',
            'diverifikasi_inspektorat',
            'nama_ahli_waris',
            'jumlah_santunan',
            'isverifikasi_dpkad',
            'tanggal_verifikasi_dpkad',
            'diverifikasi_dpkad',
                ],
            ]) ?>

        </div>
    </div>
</div>
