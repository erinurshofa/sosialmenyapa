<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SantunanDisabilitas $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Santunan Disabilitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="santunan-disabilitas-view">

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
            'jenis_kelamin',
            'umur',
            'alamat:ntext',
            'kecamatan_id',
            'kecamatan_nama',
            'kelurahan_id',
            'kelurahan_nama',
            'no_dtks',
            'dtks',
            'jenis_disabilitas',
            'jenis_alat_bantu',
            'no_kk',
            'nik_pemohon',
            'nama_pemohon',
            'no_hp_pemohon',
            'hubungan_pemohon',
            'alamat_pemohon:ntext',
            'kecamatan_id_pemohon',
            'kecamatan_nama_pemohon',
            'kelurahan_id_pemohon',
            'kelurahan_nama_pemohon',
            'tanggal_permohonan',
            'foto_ktp',
            'foto_kk',
            'foto_surat_permohonan',
            'foto_surat_pengantar',
            'foto',
            'foto_id_dtks',
            'foto_tes_bera',
            'created_at',
            'updated_at',
            'deleted_at',
                ],
            ]) ?>

        </div>
    </div>
</div>
