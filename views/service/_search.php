<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnitkerjaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unitkerja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_unitkerja') ?>

    <?= $form->field($model, 'kd_unit_kerja') ?>

    <?= $form->field($model, 'nm_unit_kerja') ?>

    <?= $form->field($model, 'nama_penanggung_jawab') ?>

    <?= $form->field($model, 'no_telp') ?>

    <?php // echo $form->field($model, 'kd_skpd') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
