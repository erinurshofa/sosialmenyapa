<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SantunanKematianSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="santunan-kematian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tempat_lahir') ?>

    <?= $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_kematian') ?>

    <?php // echo $form->field($model, 'umur') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'rt') ?>

    <?php // echo $form->field($model, 'rw') ?>

    <?php // echo $form->field($model, 'kecamatan_id') ?>

    <?php // echo $form->field($model, 'kecamatan_nama') ?>

    <?php // echo $form->field($model, 'kelurahan_id') ?>

    <?php // echo $form->field($model, 'kelurahan_nama') ?>

    <?php // echo $form->field($model, 'no_dtks') ?>

    <?php // echo $form->field($model, 'dtks') ?>

    <?php // echo $form->field($model, 'nik_pemohon') ?>

    <?php // echo $form->field($model, 'nama_pemohon') ?>

    <?php // echo $form->field($model, 'no_hp_pemohon') ?>

    <?php // echo $form->field($model, 'hubungan_pemohon') ?>

    <?php // echo $form->field($model, 'alamat_pemohon') ?>

    <?php // echo $form->field($model, 'rt_pemohon') ?>

    <?php // echo $form->field($model, 'rw_pemohon') ?>

    <?php // echo $form->field($model, 'kecamatan_id_pemohon') ?>

    <?php // echo $form->field($model, 'kecamatan_nama_pemohon') ?>

    <?php // echo $form->field($model, 'kelurahan_id_pemohon') ?>

    <?php // echo $form->field($model, 'kelurahan_nama_pemohon') ?>

    <?php // echo $form->field($model, 'foto_ktp') ?>

    <?php // echo $form->field($model, 'foto_kk') ?>

    <?php // echo $form->field($model, 'foto_ktp_pemohon') ?>

    <?php // echo $form->field($model, 'foto_kk_pemohon') ?>

    <?php // echo $form->field($model, 'foto_sk_kematian') ?>

    <?php // echo $form->field($model, 'foto_sk_ahli_waris') ?>

    <?php // echo $form->field($model, 'foto_id_dtks') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <?php // echo $form->field($model, 'verifikasi') ?>

    <?php // echo $form->field($model, 'tanggal_verifikasi') ?>

    <?php // echo $form->field($model, 'diverifikasi') ?>

    <?php // echo $form->field($model, 'status_verifikasi') ?>

    <?php // echo $form->field($model, 'validasi') ?>

    <?php // echo $form->field($model, 'tanggal_validasi') ?>

    <?php // echo $form->field($model, 'divalidasi') ?>

    <?php // echo $form->field($model, 'status_validasi') ?>

    <?php // echo $form->field($model, 'status_permohonan') ?>

    <?php // echo $form->field($model, 'approved') ?>

    <?php // echo $form->field($model, 'tanggal_approval') ?>

    <?php // echo $form->field($model, 'approved_by') ?>

    <?php // echo $form->field($model, 'verifikasi_bag_hukum') ?>

    <?php // echo $form->field($model, 'tanggal_verifikasi_bag_hukum') ?>

    <?php // echo $form->field($model, 'diverifikasi_bag_hukum') ?>

    <?php // echo $form->field($model, 'verifikasi_inspektorat') ?>

    <?php // echo $form->field($model, 'tanggal_verifikasi_inspektorat') ?>

    <?php // echo $form->field($model, 'diverifikasi_inspektorat') ?>

    <?php // echo $form->field($model, 'nama_ahli_waris') ?>

    <?php // echo $form->field($model, 'jumlah_santunan') ?>

    <?php // echo $form->field($model, 'isverifikasi_dpkad') ?>

    <?php // echo $form->field($model, 'tanggal_verifikasi_dpkad') ?>

    <?php // echo $form->field($model, 'diverifikasi_dpkad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
