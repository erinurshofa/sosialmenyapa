<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unitkerja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_unit_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_unit_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_penanggung_jawab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_skpd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
