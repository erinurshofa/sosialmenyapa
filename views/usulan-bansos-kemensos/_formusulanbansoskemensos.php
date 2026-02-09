<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\JenisPekerjaan;
use app\models\ProgramBansos;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\UsulanBansosKemensos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usulan_bansos_kemensos-form">
<?php
if (!empty(Yii::$app->getRequest()->getQueryParam('nik'))) {
    $model->nik=Yii::$app->getRequest()->getQueryParam('nik');
    $model->jenis_pekerjaan=Yii::$app->getRequest()->getQueryParam('jenis_pekerjaan');
    $model->program_bansos=Yii::$app->getRequest()->getQueryParam('program_bansos');
}
?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => 16,'type'=>'text']) ?>
    <?= $form->field($model, 'program_bansos')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(ProgramBansos::find()->select(['id','nama_bansos'])->all(), 'nama_bansos', 'nama_bansos'),
        'id' => 'program_bansos',
        'class' => 'form-control inline-block',
        'options' => ['placeholder' => '- Pilih Program Bansos -'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>
    <?= $form->field($model, 'jenis_pekerjaan')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(JenisPekerjaan::find()->select(['id','nama'])->all(), 'nama', 'nama'),
        'id' => 'jenis_pekerjaan',
        'class' => 'form-control inline-block',
        'options' => ['placeholder' => '- Pilih Jenis Pekerjaan -'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
