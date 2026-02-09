<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?php //$form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput([
                'id' => 'password-field',
                'placeholder' => 'Enter your password'
            ])->label('Password'); ?>

            <div class="form-group field-user-password">
                <div class="input-group">
                    <input type="checkbox" id="show-password" class="custom-control-input">
                    <label for="show-password" class="custom-control-label">Show Password</label>
                    <span class="input-group-text">
                        <?= Html::tag('i', '', ['class' => 'fa fa-eye-slash']) ?>
                    </span>
                </div>
                <span class="help-block"></span>
            </div>
    </div>
    <div class="col-md-6"><?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'nama_opd')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'alamat')->textArea(['rows' => 4]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?></div>
    <div class="col-md-6"><?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>

   

    

    

    

   

    

    

    

    

    
    <?php
    if (@Yii::$app->user->identity->role=='admin' || @Yii::$app->user->identity->role=='pfm'){ ?>
<div class="col-md-6">
    <?php    
    echo $form->field($model, 'role')->dropDownList(
        [
            'admin'=>'admin',
            'opd'=>'opd',
            'pkh'=>'pkh',
            'bidang'=>'bidang',
            'kelurahan'=>'kelurahan',
            'kecamatan'=>'kecamatan',
        ]);
}
    ?>
    </div>
</div>
    <?php // $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'browser')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'foto')->textInput() ?>

    <?php // $form->field($model, 'host')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'konfirmasi_email')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?php // $form->field($model, 'kode_konfirmasi')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'konfirmasi_admin')->dropDownList([ 'Y' => 'Y', 'N' => 'N', 'Tolak' => 'Tolak', ], ['prompt' => '']) ?>

    <?php // $form->field($model, 'lastlogin')->textInput() ?>

    <?php // $form->field($model, 'created')->textInput() ?>

    <?php // $form->field($model, 'updated')->textInput() ?>

    <?php //$form->field($model, 'flag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs("
$(document).ready(function() {
    $('#show-password').click(function() {
        if ($(this).is(':checked')) {
            $('#password-field').attr('type', 'text');
            $('.fa-eye-slash').removeClass('fa-eye-slash').addClass('fa-eye');
        } else {
            $('#password-field').attr('type', 'password');
            $('.fa-eye').removeClass('fa-eye').addClass('fa-eye-slash');
        }
    });
});
"); // Inline script
?>
