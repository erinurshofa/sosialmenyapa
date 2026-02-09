
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\Tidakpadan */
/* @var $this yii\web\View */
?>

<div class="tidakpadan-form">

<?= $form->field($model, 'alasan')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nama_ktp')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    <?php $form = ActiveForm::begin(); ?>
    <?php ActiveForm::end(); ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>
        
    </div>
    


