<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Unitkerja */
/* @var $form yii\widgets\ActiveForm */
// use yii\helpers\Url;
// $url = \yii\helpers\Url::to(['mitem/list']);
// $url ='http://103.101.52.190:56788/ws/biodata.php?NIK=';
?>

<div class="cek-idbdt-form">
<?php
if (!empty(Yii::$app->getRequest()->getQueryParam('idbdt'))) {
	$model->idbdt=Yii::$app->getRequest()->getQueryParam('idbdt');
	$model->nik=@$bdtart->NIK;
	$model->nokk=@$bdtart->NoKK;
}
?>
<!-- <p><string>Silahkan masukkan NIK</string></p> -->
    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'idbdt')->textInput(['maxlength' => 16,'type'=>'text']) ?>


    <div class="form-group">
        <?php //Html::submitButton('Cek', ['id'=>'oke','class' => 'btn btn-primary']) ?>
        <?php //Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
