<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BencanaLayanan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bencana-layanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bencana_id')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jenis_layanan_id')->textInput() ?>

    <?= $form->field($model, 'jenis_permakanan_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
