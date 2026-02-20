<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BencanaKorbanVerifikasiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bencana-korban-verifikasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'korban_id') ?>

    <?= $form->field($model, 'tahap') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'processed_by') ?>

    <?php // echo $form->field($model, 'processed_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
