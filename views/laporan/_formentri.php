<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Bantuan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bantuan-form">

     <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data'],'type'=>ActiveForm::TYPE_HORIZONTAL]); ?>
    <?php
if (isset($bdtart)) {
$model->nik=$bdtart->NIK;
$model->no_kk=$bdtart->NoKK;
}
?>
    <?= $form->field($model, 'no_kk')->textInput(['readonly'=> 'readonly','enableClientValidation' => false,]) ?>

    <?= $form->field($model, 'nik')->textInput(['readonly'=> 'readonly','enableClientValidation' => false,]) ?>
<?= $form->field($model, 'tanggal')->widget(DatePicker::className(),[
'name' => 'tanggal',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,//agar dikanan
    'value' => $model->tanggal,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
]);?>
    <?php //$form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'jenis_bantuan')->dropDownList([ 'PBI/JKN/KIS' => 'PBI/JKN/KIS', 'PKH' => 'PKH', 'BSP' => 'BSP', 'KIP' => 'KIP', 'KJS' => 'KJS', 'ATM BERAS' => 'ATM BERAS', 'LAIN LAIN' => 'LAIN LAIN', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'keterangan')->textArea(['maxlength' => true]) ?>

    <?php //$form->field($model, 'id_dinas')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'timestamp')->textInput() ?>

    <?php //$form->field($model, 'update_timestamp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
