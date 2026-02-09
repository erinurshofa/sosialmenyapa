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



<div class="login-box">
<div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <?php
    $gambar="background-image:url(\"http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/theme1/img/hero-bg2.svg\");opacity:1;";
    $gambar2="background-image:url(\"http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/theme1/img/valley.svg\");opacity:1;";
    ?>
            <div class="widget-user-header" style=<?=$gambar?>>
              <div class="widget-user-image">
                <img class="img-circle" src="theme1/img/index.svg" alt="User Avatar" style="margin-top:10px;">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">
              <img class="img-responsive" src="theme1/img/sidaksos.png" alt="User Avatar" style="margin-top:-8px;">
              <strong class="pull-right" style="color:white;">V.2</strong>
              <!-- <strong style="color">SIDAKSOS V.2</strong> -->
              </h3>
              <!-- <h5 class="widget-user-desc">Silahkan Masukan Username dan Password</h5> -->
            </div>
            <div class="box-header no-padding">
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
            <div class="col-xs-8 text-green">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('<i class="fa fa-sign-in"></i> Masuk', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>
       

        <?php ActiveForm::end(); ?>



    </div>
            </div>
            <div style="padding: 20px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;background-image:url('theme1/img/hero-bg2.svg');opacity:1;">
            <marquee><strong style="color:white;">Silahkan masukkan username dan password dengan benar</strong></marquee>
                
            </div>
          </div>

    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
