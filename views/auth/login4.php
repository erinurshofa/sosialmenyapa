<?php
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Login';
$this->params['bodyClass'] = 'hold-transition login-page';
?>

<!-- <div class="login-box"> -->
    <div class="card shadow-lg rounded-lg">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            
            <?= $form->field($model, 'username', [
                'template' => "<div class='input-group mb-3'>{input}<div class='input-group-append'><div class='input-group-text'><i class='fas fa-user'></i></div></div>{error}</div>",
                'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Username']
            ])->label(false) ?>
            
            <?= $form->field($model, 'password', [
                'template' => "<div class='input-group mb-3'>{input}<div class='input-group-append'><div class='input-group-text'><i class='fas fa-lock'></i></div></div>{error}</div>",
                'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password']
            ])->label(false) ?>
            
            <div class="row">
                <div class="col-8">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
                <div class="col-4">
                    <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>
            
            <?php ActiveForm::end(); ?>
            
            <!-- <p class="mb-1">
                <?php //Html::a('I forgot my password', ['site/request-password-reset']) ?>
            </p> -->
        </div>
    </div>
<!-- </div> -->

<?php
$customCss = <<< CSS
.login-page {
    background: #f4f6f9;
}
.login-logo a {
    font-size: 26px;
    font-weight: bold;
    color: #343a40;
}
.card {
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.btn-primary {
    background: #007bff;
    border: none;
    border-radius: 8px;
}
.btn-primary:hover {
    background: #0056b3;
}
CSS;
$this->registerCss($customCss);
?>