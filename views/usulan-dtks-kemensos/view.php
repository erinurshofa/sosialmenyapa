<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsulanDtksKemensos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usulan Dtks Kemensos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
    <div class="box box-success box-solid"  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
	    <div class="box-header bg-navy">
			<i class="fa fa-fw fa-book"></i>
	    	<strong><?= Html::encode($this->title) ?></strong>
	    </div>
	    <div class="box-body">

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
            // 'program_bansos',
            'disabilitas',
            'no_kk',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'ibu_kandung',
            'hubungan_keluarga',
            'jenis_kelamin',
            'jenis_pekerjaan',
            'status_kawin',
            'alamat',
            'rt',
            'rw',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'kelurahan',
            'username',
            'validasi_kecamatan',
            'kode_kecamatan',
            'nama_kecamatan',
            'finalisasi',
            // 'foto_rumah',
            // 'foto_rumah_size',
            // 'foto_rumah_type',
            // 'foto_rumah_name',
            // 'ktp',
            // 'ktp_size',
            // 'ktp_type',
            // 'ktp_name',
            // 'berita_acara_muskel',
            // 'berita_acara_muskel_size',
            // 'berita_acara_muskel_type',
            // 'berita_acara_muskel_name',
            'non_bansos',
            'pkh',
            'bsp',
            'pbi',
            'created',
            'updated',
        ],
    ]) ?>
  </div>
</div>
