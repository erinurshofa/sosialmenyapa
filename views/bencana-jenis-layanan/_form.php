<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BencanaJenisLayanan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bencana-jenis-layanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_layanan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
