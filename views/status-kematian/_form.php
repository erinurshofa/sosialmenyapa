<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StatusKematian */
/* @var $form yii\widgets\ActiveForm */
if (!empty($nik)) {
    $model->nik=$nik;
}

?>

<div class="status-kematian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['readonly' => true]) ?>

    <?php //$form->field($model, 'no_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Hidup' => 'Hidup', 'Meninggal' => 'Meninggal', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'keterangan')->textArea(['maxlength' => true]) ?>

    <?php //$form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'updater')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'created')->textInput() ?>

    <?php //$form->field($model, 'updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
