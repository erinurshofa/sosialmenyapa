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

<div class="cek-iddtks-form">
<?php
if (!empty(Yii::$app->getRequest()->getQueryParam('iddtks'))) {
	$model->iddtks=Yii::$app->getRequest()->getQueryParam('iddtks');
}
?>
    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'iddtks')->textInput(['maxlength' => 36,'type'=>'text']) ?>

    <div class="form-group">
        <?php //Html::submitButton('Cek', ['id'=>'oke','class' => 'btn btn-primary']) ?>
        <?php //Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
