<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

    

<!-- <div class="login-box skin-green" style="background-color:orange; box-shadow: 3px 3px 3px #222222;"> -->
<div class="login-box skin-yellow" >
<div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-orange">
              <div class="widget-user-image">
                <img class="img-circle" src="images/user.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><strong>SIDAKSOS V.2</strong></h3>
              <h5 class="widget-user-desc">Silahkan Masukan Username dan Password</h5>
            </div>
            <div class="box-footer no-padding">
<!-- <div class="login-box-body" style='background-color:lightgreen; box-shadow:3px 3px 3px #222222;'> -->
                  <div class="login-box-body">
        <!-- <p class="login-box-msg">Silahkan Masukan Username dan Password</p> -->

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
        
        <?= $form->field($model, 'periode')->dropDownList(
                ['januari2020' => 'Januari 2020','oktober2019' => 'Oktober 2019','juli2019' => 'Juli 2019']
            )->label('Database periode'); ?>


        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>
       

        <?php ActiveForm::end(); ?>

<!--         <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                in using Google+</a>
        </div> -->
        <!-- /.social-auth-links -->

<!--         <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> -->

    </div>
            </div>
            <div class="widget-user-header bg-orange">
            <marquee>Silahkan masukkan username dan password dengan benar!</marquee>
            </div>
          </div>
   <!--  <div class="login-logo" style='background-color:orange;'>
        <a href="#"><b>Sidaksos v.1</b></a>
    </div> -->
    <!-- /.login-logo -->

    <!-- /.login-box-body -->
</div><!-- /.login-box -->
