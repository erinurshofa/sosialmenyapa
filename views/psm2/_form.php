<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Psm2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="psm2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput() ?>

    <?= $form->field($model, 'jalan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provinsi_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kota_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelurahan_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login_terakhir')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'no_rekening')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pemilik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_sertifikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_sertifikat')->textInput() ?>

    <?= $form->field($model, 'file_sertifikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_sk_walikota')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
