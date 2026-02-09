<?php

// use app\assets\AppAsset3;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
// AppAsset3::register($this);
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

// $fieldOptions1 = [
//     'options' => ['class' => 'form-group has-feedback'],
//     'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
// ];
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

?>
<style>
    .dropdown-container {
      width: 100%;
      margin: 0px auto;
      position: relative;
    }

    .select {
      width: 100%;
      height: 50px;
      font-size: 100%;
      font-weight: bold;
      cursor: pointer;
      border-radius: 10px;
      background-color: #FF7B00;
      border: none;
      border-bottom: 2px solid #C76F1C;
      color: white;
      font-size: 14px;
      appearance: none;
      padding: 0 26px;
      padding-right: 38px;
      -webkit-appearance: none;
      -moz-appearance: none;
      transition: color 0.3s ease, background-color 0.3s ease, border-bottom-color 0.3s ease;
    }

    /* For IE <= 11 */
    select::-ms-expand {
      display: none; 
    }

    .select-icon {
      position: absolute;
      top: 4px;
      right: 4px;
      width: 30px;
      height: 36px;
      pointer-events: none;
      border: 2px solid #962d22;
      padding-left: 5px;
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .select-icon svg.icon {
      transition: fill 0.3s ease;
      fill: white;
    }

    select:hover,
    select:focus {
      color: #c0392b;
      background-color: white;
      border-bottom-color: #DCDCDC;
    }
    select:hover ~ .select-icon,
    select:focus ~ .select-icon {
      background-color: white;
      border-color: #DCDCDC;
    }
    select:hover ~ .select-icon svg.icon,
    select:focus ~ .select-icon svg.icon {
      fill: #c0392b;
    }
    .form-control:focus {
            border-color: red;
            box-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
        }

</style>    
<body style="background-color:#666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
         

<div class="login100-form">
  <div class="login-box" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="box box-widget widget-user-2">
      <?php
        $gambar="background-image:url(\"http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/theme1/img/ball-wed.svg\");opacity:1;";
        $gambar2="background-image:url(\"http://".$_SERVER['HTTP_HOST'].Yii::$app->urlManager->baseUrl."/theme1/img/valley.svg\");opacity:1;";
      ?>
            <div class="widget-user-header" style=<?php //$gambar?>>
              <!-- <div class="widget-user-image">
                <img class="img-circle" src="theme1/img/coba.svg" alt="User Avatar" style="margin-top:10px;">
              </div> -->
              
              <div class="brand-logo" style="font-size:20px;">
               <center> <span class="glyphicon glyphicon-lock"></span> <strong >ADMIN LOGIN </strong></center>
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">
              <!--  -->
              <!-- <strong>SOSIAL MENYAPA</strong> -->
              </h3>
              <!-- <img class="img-responsive" src="images/SIDAKSOS.svg" alt="logo sidaksos" style="margin-top:-8px;"> -->
            </div>
            <div class="box-header">

                  <div class="login-box-body">
             
                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username'),'style'=>'border-radius: 25px;']) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password'),'style'=>'border-radius: 25px;']) ?>
        <div class="dropdown-container">
        <?php 
        // $form->field($model, 'periode')->dropDownList(
        //         ['oktober2020' => 'Oktober 2020','januari2020' => 'Januari 2020','oktober2019' => 'Oktober 2019','juli2019' => 'Juli 2019']
        //     )->label('Database periode'); 
            ?>
</div>
      <div class="row">
        <div class="col-xs-12 text-green">
            <div class="contact100-form-checkbox">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="container-login100-form-btn">
                  <?= Html::submitButton('<i class="fa fa-sign-in"></i> Masuk', ['class' => 'login100-form-btn', 'name' => 'login-button']) ?>
              </div>
            </div>
        </div>
         <?php ActiveForm::end(); ?>
    </div>
            </div>
          </div>

    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

                   
                </div>


                <div class="login100-more" style="background-image: url('images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>

<?php
$js = <<< JS
$("#klik").click(function() {
var x = $("#loginform-username").val();
var y = $("#loginform-password").val();
if(x == ""){
    var user = "maaf username harus diisi!";
    document.getElementById("username").innerHTML = user;
    }else{
    document.getElementById("username").innerHTML = "";     
    }
if(y == ""){
    var pass = "maaf password harus diisi";
    document.getElementById("password").innerHTML = pass;
    }else{
    document.getElementById("password").innerHTML = "";     
    }});
JS;
$this->registerJs($js);
?>
