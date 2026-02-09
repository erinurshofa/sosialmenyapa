<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SantunanDisabilitasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="santunan-disabilitas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tempat_lahir') ?>

    <?= $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'umur') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'kecamatan_id') ?>

    <?php // echo $form->field($model, 'kecamatan_nama') ?>

    <?php // echo $form->field($model, 'kelurahan_id') ?>

    <?php // echo $form->field($model, 'kelurahan_nama') ?>

    <?php // echo $form->field($model, 'no_dtks') ?>

    <?php // echo $form->field($model, 'dtks') ?>

    <?php // echo $form->field($model, 'jenis_disabilitas') ?>

    <?php // echo $form->field($model, 'jenis_alat_bantu') ?>

    <?php // echo $form->field($model, 'no_kk') ?>

    <?php // echo $form->field($model, 'nik_pemohon') ?>

    <?php // echo $form->field($model, 'nama_pemohon') ?>

    <?php // echo $form->field($model, 'no_hp_pemohon') ?>

    <?php // echo $form->field($model, 'hubungan_pemohon') ?>

    <?php // echo $form->field($model, 'alamat_pemohon') ?>

    <?php // echo $form->field($model, 'kecamatan_id_pemohon') ?>

    <?php // echo $form->field($model, 'kecamatan_nama_pemohon') ?>

    <?php // echo $form->field($model, 'kelurahan_id_pemohon') ?>

    <?php // echo $form->field($model, 'kelurahan_nama_pemohon') ?>

    <?php // echo $form->field($model, 'tanggal_permohonan') ?>

    <?php // echo $form->field($model, 'foto_ktp') ?>

    <?php // echo $form->field($model, 'foto_kk') ?>

    <?php // echo $form->field($model, 'foto_surat_permohonan') ?>

    <?php // echo $form->field($model, 'foto_surat_pengantar') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'foto_id_dtks') ?>

    <?php // echo $form->field($model, 'foto_tes_bera') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
