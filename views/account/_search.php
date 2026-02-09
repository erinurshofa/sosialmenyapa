<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_account') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'nama_lengkap') ?>

    <?= $form->field($model, 'nip') ?>

    <?= $form->field($model, 'jabatan') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'telp') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'browser') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'host') ?>

    <?php // echo $form->field($model, 'konfirmasi_email') ?>

    <?php // echo $form->field($model, 'kode_konfirmasi') ?>

    <?php // echo $form->field($model, 'konfirmasi_admin') ?>

    <?php // echo $form->field($model, 'lastlogin') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
