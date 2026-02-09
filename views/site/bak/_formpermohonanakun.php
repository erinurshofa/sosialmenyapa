<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
// use yii\widgets\ActiveForm;

use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- <div class="account-form"> -->
        <div class="box skin-blue">
        <div class="box-header with-border">
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data'],'type'=>ActiveForm::TYPE_HORIZONTAL]); ?>
    <?php //$form = ActiveForm::begin(['options'=>[]]);?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'role')->textInput(['maxlength' => true]) ?>



    <?php
//     if (@Yii::$app->user->identity->role=='Admin'){
//     echo $form->field($model, 'role')->dropDownList(
//         [
//             'Admin'=>'Admin',
//             'Asisten3'=>'Asisten3',
//             'Humas'=>'Humas',
//             'OPD'=>'OPD',
//             'Wartawan'=>'Wartawan',
//             'Walikota'=>'Walikota', 
//             'Staff Walikota'=>'Staff Walikota',
//             'Staff Wakil Walikota'=>'Staff Wakil Walikota',
//             'Staff Sekda'=>'Staff Sekda',  
//             'Protokoler'=>'Protokoler',
//             'Peliputan'=>'Peliputan',
//             'Pemberitaan'=>'Pemberitaan',   
//         ]);
// }

    if (@Yii::$app->user->isGuest){
    echo $form->field($model, 'role')->dropDownList(
        [
            'Masyarakat'=>'Masyarakat',
            'Perusahaan'=>'Perusahaan atau Instansi',
            'OPD'=>'OPD',   
        ]);
}
    ?>


<!--     <?php $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'browser')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'host')->textInput(['maxlength' => true]) ?> 

    <?php $form->field($model, 'lastlogin')->textInput() ?>

    <?php $form->field($model, 'created')->textInput() ?>

    <?php $form->field($model, 'updated')->textInput() ?>

    <?php $form->field($model, 'flag')->textInput() ?> -->

    <!-- <div class="form-group"> -->
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    <!-- </div> -->

    <?php ActiveForm::end(); ?>
<br>
</div>
</div>
<!-- </div> -->