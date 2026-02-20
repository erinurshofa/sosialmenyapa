<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BencanaLayananSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bencana-layanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bencana_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?= $form->field($model, 'nik') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'jenis_layanan_id') ?>

    <?php // echo $form->field($model, 'jenis_permakanan_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
