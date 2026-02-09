<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_opd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    
    <?php
    if (@Yii::$app->user->identity->role=='admin'){
    echo $form->field($model, 'role')->dropDownList(
        [
            'admin'=>'admin',
            'opd'=>'opd',
            'pkh'=>'pkh',
            'bidang'=>'bidang',
            'kelurahan'=>'kelurahan',
            'kecamatan'=>'kecamatan',
        ]);
}
    ?>

    <?php // $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'browser')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'foto')->textInput() ?>

    <?php // $form->field($model, 'host')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'konfirmasi_email')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?php // $form->field($model, 'kode_konfirmasi')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'konfirmasi_admin')->dropDownList([ 'Y' => 'Y', 'N' => 'N', 'Tolak' => 'Tolak', ], ['prompt' => '']) ?>

    <?php // $form->field($model, 'lastlogin')->textInput() ?>

    <?php // $form->field($model, 'created')->textInput() ?>

    <?php // $form->field($model, 'updated')->textInput() ?>

    <?php //$form->field($model, 'flag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
