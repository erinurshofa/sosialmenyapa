<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SantunanDisabilitas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="santunan-disabilitas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput() ?>

    <?= $form->field($model, 'umur')->textInput() ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kecamatan_id')->textInput() ?>

    <?= $form->field($model, 'kecamatan_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelurahan_id')->textInput() ?>

    <?= $form->field($model, 'kelurahan_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_dtks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dtks')->textInput() ?>

    <?= $form->field($model, 'jenis_disabilitas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_alat_bantu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hubungan_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pemohon')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kecamatan_id_pemohon')->textInput() ?>

    <?= $form->field($model, 'kecamatan_nama_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelurahan_id_pemohon')->textInput() ?>

    <?= $form->field($model, 'kelurahan_nama_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_permohonan')->textInput() ?>

    <?= $form->field($model, 'foto_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_surat_permohonan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_surat_pengantar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_id_dtks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_tes_bera')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'created_at')->textInput() ?>

    <?php //$form->field($model, 'updated_at')->textInput() ?>

    <?php //$form->field($model, 'deleted_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
