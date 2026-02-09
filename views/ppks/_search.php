<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PpksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'cek_double') ?>

    <?= $form->field($model, 'no_kk') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'rt') ?>

    <?php // echo $form->field($model, 'rw') ?>

    <?php // echo $form->field($model, 'kelurahan') ?>

    <?php // echo $form->field($model, 'kecamatan') ?>

    <?php // echo $form->field($model, 'jenis_ppks') ?>

    <?php // echo $form->field($model, 'jenis_ppks_fix') ?>

    <?php // echo $form->field($model, 'jenis_disabilitas') ?>

    <?php // echo $form->field($model, 'sumber_data') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'punya_ktp') ?>

    <?php // echo $form->field($model, 'masuk_dtks') ?>

    <?php // echo $form->field($model, 'anak_balita_terlantar') ?>

    <?php // echo $form->field($model, 'anak_terlantar') ?>

    <?php // echo $form->field($model, 'anak_yang_berhadapan_dengan_hukum') ?>

    <?php // echo $form->field($model, 'anak_jalanan') ?>

    <?php // echo $form->field($model, 'anak_dengan_kedisabilitasan') ?>

    <?php // echo $form->field($model, 'anak_dengan_kedisabilitasan_fisik') ?>

    <?php // echo $form->field($model, 'anak_dengan_kedisabilitasan_intelektual') ?>

    <?php // echo $form->field($model, 'anak_dengan_kedisabilitasan_mental') ?>

    <?php // echo $form->field($model, 'anak_dengan_kedisabilitasan_sensorik') ?>

    <?php // echo $form->field($model, 'anak_korban_tindak_kekerasan') ?>

    <?php // echo $form->field($model, 'anak_yang_memerlukan_perlindungan_khusus') ?>

    <?php // echo $form->field($model, 'lanjut_usia_terlantar') ?>

    <?php // echo $form->field($model, 'penyandang_disabilitas') ?>

    <?php // echo $form->field($model, 'penyandang_disabilitas_fisik') ?>

    <?php // echo $form->field($model, 'penyandang_disabilitas_intelektual') ?>

    <?php // echo $form->field($model, 'penyandang_disabilitas_mental') ?>

    <?php // echo $form->field($model, 'penyandang_disabilitas_sensorik') ?>

    <?php // echo $form->field($model, 'tuna_susila') ?>

    <?php // echo $form->field($model, 'gelandangan') ?>

    <?php // echo $form->field($model, 'pengemis') ?>

    <?php // echo $form->field($model, 'pemulung') ?>

    <?php // echo $form->field($model, 'kelompok_minoritas') ?>

    <?php // echo $form->field($model, 'bekas_warga_binaan_lembaga_pemasyarakatan') ?>

    <?php // echo $form->field($model, 'orang_dengan_hivaids') ?>

    <?php // echo $form->field($model, 'korban_penyalahgunaan_napza') ?>

    <?php // echo $form->field($model, 'korban_trafficking') ?>

    <?php // echo $form->field($model, 'korban_tindak_kekerasan') ?>

    <?php // echo $form->field($model, 'pekerja_migran_bermasalah_sosial') ?>

    <?php // echo $form->field($model, 'korban_bencana_alam') ?>

    <?php // echo $form->field($model, 'korban_bencana_sosial') ?>

    <?php // echo $form->field($model, 'perempuan_rawan_sosial_ekonomi') ?>

    <?php // echo $form->field($model, 'fakir_miskin') ?>

    <?php // echo $form->field($model, 'keluarga_bermasalah_sosial_psikologis') ?>

    <?php // echo $form->field($model, 'komunitas_adat_terpencil') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
