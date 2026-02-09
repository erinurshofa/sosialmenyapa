<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsulanDtksKemensosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usulan-dtks-kemensos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'program_bansos') ?>

    <?= $form->field($model, 'disabilitas') ?>

    <?= $form->field($model, 'no_kk') ?>

    <?php // echo $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'ibu_kandung') ?>

    <?php // echo $form->field($model, 'hubungan_keluarga') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'jenis_pekerjaan') ?>

    <?php // echo $form->field($model, 'status_kawin') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'rt') ?>

    <?php // echo $form->field($model, 'rw') ?>

    <?php // echo $form->field($model, 'provinsi') ?>

    <?php // echo $form->field($model, 'kabupaten') ?>

    <?php // echo $form->field($model, 'kecamatan') ?>

    <?php // echo $form->field($model, 'kelurahan') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'validasi_kecamatan') ?>

    <?php // echo $form->field($model, 'kode_kecamatan') ?>

    <?php // echo $form->field($model, 'nama_kecamatan') ?>

    <?php // echo $form->field($model, 'finalisasi') ?>

    <?php // echo $form->field($model, 'foto_rumah') ?>

    <?php // echo $form->field($model, 'foto_rumah_size') ?>

    <?php // echo $form->field($model, 'foto_rumah_type') ?>

    <?php // echo $form->field($model, 'foto_rumah_name') ?>

    <?php // echo $form->field($model, 'ktp') ?>

    <?php // echo $form->field($model, 'ktp_size') ?>

    <?php // echo $form->field($model, 'ktp_type') ?>

    <?php // echo $form->field($model, 'ktp_name') ?>

    <?php // echo $form->field($model, 'berita_acara_muskel') ?>

    <?php // echo $form->field($model, 'berita_acara_muskel_size') ?>

    <?php // echo $form->field($model, 'berita_acara_muskel_type') ?>

    <?php // echo $form->field($model, 'berita_acara_muskel_name') ?>

    <?php // echo $form->field($model, 'non_bansos') ?>

    <?php // echo $form->field($model, 'pkh') ?>

    <?php // echo $form->field($model, 'bsp') ?>

    <?php // echo $form->field($model, 'pbi') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
