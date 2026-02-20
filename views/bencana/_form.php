<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Bencana $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bencana-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_bencana')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_mulai')->textInput() ?>

    <?= $form->field($model, 'tanggal_selesai')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
