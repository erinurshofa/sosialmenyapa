<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BencanaKorban $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bencana-korban-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bencana_id')->textInput() ?>

    <?= $form->field($model, 'kategori_korban_id')->textInput() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
