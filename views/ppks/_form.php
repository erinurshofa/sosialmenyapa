<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ppks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cek_double')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt')->textInput() ?>

    <?= $form->field($model, 'rw')->textInput() ?>

    <?= $form->field($model, 'kelurahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_ppks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jenis_ppks_fix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_disabilitas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sumber_data')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'punya_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masuk_dtks')->textInput() ?>

    <?= $form->field($model, 'anak_balita_terlantar')->textInput() ?>

    <?= $form->field($model, 'anak_terlantar')->textInput() ?>

    <?= $form->field($model, 'anak_yang_berhadapan_dengan_hukum')->textInput() ?>

    <?= $form->field($model, 'anak_jalanan')->textInput() ?>

    <?= $form->field($model, 'anak_dengan_kedisabilitasan')->textInput() ?>

    <?= $form->field($model, 'anak_dengan_kedisabilitasan_fisik')->textInput() ?>

    <?= $form->field($model, 'anak_dengan_kedisabilitasan_intelektual')->textInput() ?>

    <?= $form->field($model, 'anak_dengan_kedisabilitasan_mental')->textInput() ?>

    <?= $form->field($model, 'anak_dengan_kedisabilitasan_sensorik')->textInput() ?>

    <?= $form->field($model, 'anak_korban_tindak_kekerasan')->textInput() ?>

    <?= $form->field($model, 'anak_yang_memerlukan_perlindungan_khusus')->textInput() ?>

    <?= $form->field($model, 'lanjut_usia_terlantar')->textInput() ?>

    <?= $form->field($model, 'penyandang_disabilitas')->textInput() ?>

    <?= $form->field($model, 'penyandang_disabilitas_fisik')->textInput() ?>

    <?= $form->field($model, 'penyandang_disabilitas_intelektual')->textInput() ?>

    <?= $form->field($model, 'penyandang_disabilitas_mental')->textInput() ?>

    <?= $form->field($model, 'penyandang_disabilitas_sensorik')->textInput() ?>

    <?= $form->field($model, 'tuna_susila')->textInput() ?>

    <?= $form->field($model, 'gelandangan')->textInput() ?>

    <?= $form->field($model, 'pengemis')->textInput() ?>

    <?= $form->field($model, 'pemulung')->textInput() ?>

    <?= $form->field($model, 'kelompok_minoritas')->textInput() ?>

    <?= $form->field($model, 'bekas_warga_binaan_lembaga_pemasyarakatan')->textInput() ?>

    <?= $form->field($model, 'orang_dengan_hivaids')->textInput() ?>

    <?= $form->field($model, 'korban_penyalahgunaan_napza')->textInput() ?>

    <?= $form->field($model, 'korban_trafficking')->textInput() ?>

    <?= $form->field($model, 'korban_tindak_kekerasan')->textInput() ?>

    <?= $form->field($model, 'pekerja_migran_bermasalah_sosial')->textInput() ?>

    <?= $form->field($model, 'korban_bencana_alam')->textInput() ?>

    <?= $form->field($model, 'korban_bencana_sosial')->textInput() ?>

    <?= $form->field($model, 'perempuan_rawan_sosial_ekonomi')->textInput() ?>

    <?= $form->field($model, 'fakir_miskin')->textInput() ?>

    <?= $form->field($model, 'keluarga_bermasalah_sosial_psikologis')->textInput() ?>

    <?= $form->field($model, 'komunitas_adat_terpencil')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
