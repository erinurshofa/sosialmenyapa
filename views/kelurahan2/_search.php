<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Kelurahan2Search $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kelurahan2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kecamatan_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'id_benar') ?>

    <?= $form->field($model, 'id_lama') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
