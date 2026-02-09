<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StatusKematianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-kematian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'no_kk') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'nilai_bantuan') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'updater') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
