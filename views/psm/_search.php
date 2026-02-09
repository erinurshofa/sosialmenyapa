<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PsmSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="psm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'hp') ?>

    <?php // echo $form->field($model, 'kecamatan') ?>

    <?php // echo $form->field($model, 'kelurahan') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'jalan') ?>

    <?php // echo $form->field($model, 'rt') ?>

    <?php // echo $form->field($model, 'rw') ?>

    <?php // echo $form->field($model, 'provinsi_id') ?>

    <?php // echo $form->field($model, 'kota_id') ?>

    <?php // echo $form->field($model, 'kecamatan_id') ?>

    <?php // echo $form->field($model, 'kelurahan_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'login_terakhir') ?>

    <?php // echo $form->field($model, 'no_rekening') ?>

    <?php // echo $form->field($model, 'nama_pemilik') ?>

    <?php // echo $form->field($model, 'nama_bank') ?>

    <?php // echo $form->field($model, 'no_sertifikat') ?>

    <?php // echo $form->field($model, 'tanggal_sertifikat') ?>

    <?php // echo $form->field($model, 'file_sertifikat') ?>

    <?php // echo $form->field($model, 'file_sk_walikota') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
