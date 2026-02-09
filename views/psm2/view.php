<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Psm2 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Psm2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-navy box-solid" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box-header bg-navy">
        <i class="fa fa-fw fa-book"></i>
        <strong><?= Html::encode($this->title) ?></strong>
    </div>
    <div class="box-body">
<div class="psm2-view">

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
            'jalan',
            'rt',
            'rw',
            'provinsi_id',
            'kota_id',
            'kecamatan_id',
            'kelurahan_id',
            'user_id',
            'login_terakhir',
            'created_at',
            'updated_at',
            'no_rekening',
            'nama_pemilik',
            'nama_bank',
            'no_hp',
            'no_sertifikat',
            'tanggal_sertifikat',
            'file_sertifikat',
            'file_sk_walikota',
        ],
    ]) ?>

</div>
    </div>
    </div>