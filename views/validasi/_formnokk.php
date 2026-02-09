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

<div class="cek-nokk-form">
<?php
if (!empty(Yii::$app->getRequest()->getQueryParam('nokk'))) {
	$model->nokk=Yii::$app->getRequest()->getQueryParam('nokk');
}
?>
    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'nokk')->textInput(['maxlength' => 16,'type'=>'text']) ?>

    <div class="form-group">
        <?php //Html::submitButton('Cek', ['id'=>'oke','class' => 'btn btn-primary']) ?>
        <?php //Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
