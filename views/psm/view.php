<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Psm $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Psms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-navy box-solid mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy p-2">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body p-2">
        <div class="psm-view">

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
                    'nama',
                    'nik',
                    'email:email',
                    'hp',
                    'kecamatan',
                    'kelurahan',
                    'keterangan',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'jenis_kelamin',
                    'jalan',
                    'rt',
                    'rw',
                    'provinsi_id',
                    'kota_id',
                    'kecamatan_id',
                    'kelurahan_id',
                    'user_id',
                    'login_terakhir',
                    'no_rekening',
                    'nama_pemilik',
                    'nama_bank',
                    'no_sertifikat',
                    'tanggal_sertifikat',
                    'file_sertifikat',
                    'file_sk_walikota',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>

        </div>
    </div>
</div>
