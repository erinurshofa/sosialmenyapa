<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsulanDtksKemensos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usulan-dtks-kemensos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'program_bansos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disabilitas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ibu_kandung')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hubungan_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_pekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_kawin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kabupaten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelurahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'validasi_kecamatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_kecamatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kecamatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'finalisasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_rumah')->fileInput() ?>

    <?php //$form->field($model, 'foto_rumah_size')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'foto_rumah_type')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'foto_rumah_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ktp')->fileInput() ?>

    <?php //$form->field($model, 'ktp_size')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'ktp_type')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'ktp_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'berita_acara_muskel')->fileInput() ?>

    <?php //$form->field($model, 'berita_acara_muskel_size')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'berita_acara_muskel_type')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'berita_acara_muskel_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'non_bansos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pkh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bsp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pbi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_non_bansos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_pkh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_bsp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_pbi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alasan_non_bansos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alasan_pkh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alasan_bsp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alasan_pbi')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'created')->textInput() ?>

    <?php //$form->field($model, 'updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
