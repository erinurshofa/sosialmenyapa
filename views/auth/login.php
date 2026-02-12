<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm; // Ensure bootstrap 5 or compatible
// Fallback to bootstrap if 5 is not available, but usually template has it. 
// If project is old (Yii2 basic), might be yii\bootstrap\ActiveForm.
// Checking original file: "use yii\bootstrap5\ActiveForm;" was present? 
// Original file line 5: use yii\bootstrap5\ActiveForm; -> Yes.

$this->title = 'Sign In - Sosial Menyapa';
$this->registerCssFile('@web/css/login-modern.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
?>

<div class="login-wrapper">
    <!-- Left Side: Visual Storytelling -->
    <div class="login-visual">
        <div class="login-visual-content">
            <h1>Melayani Sepenuh Hati</h1>
            <p>Sistem Pelayanan Kesejahteraan Sosial Terpadu untuk masyarakat yang lebih sejahtera.</p>
            
            <div class="visual-badges">
                <div class="badge-item">Terpercaya</div>
                <div class="badge-item">Efisien</div>
                <div class="badge-item">Transparan</div>
            </div>
        </div>
    </div>

    <!-- Right Side: Form -->
    <div class="login-form-container">
        <div class="login-card">
            <div class="login-header">
                <div class="brand-logo">
                    <!-- Simple SVG Logo Placeholder -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <h2>Selamat Datang</h2>
                <p>Silakan masuk menggunakan akun Anda</p>
            </div>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form', 
                'enableClientValidation' => true,
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'form-label'],
                    'inputOptions' => ['class' => 'form-control'],
                    'errorOptions' => ['class' => 'text-danger mt-1 small'],
                ],
            ]); ?>

            <div class="form-group">
                <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username', 'autofocus' => true])->label('Username') ?>
                <!-- Icon: User -->
                <div class="input-icon" style="top: 2.7rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </div>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label('Password') ?>
                <!-- Icon: Lock -->
                <div class="input-icon" style="top: 2.7rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                </div>
                <!-- Toggle Password Visibility -->
                <div class="password-toggle" id="togglePassword" style="top: 2.7rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </div>
            </div>

            <div class="form-options">
                <div class="remember-me">
                     <?= $form->field($model, 'rememberMe')->checkbox([
                         'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>",
                         'class' => '', // remove default class if needed
                     ])->label('Ingat Saya') ?>
                </div>
                <!-- <a href="#" class="forgot-password">Lupa Password?</a> -->
            </div>

            <div class="form-group">
                <?= Html::submitButton('Masuk Sekarang <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>', ['class' => 'btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="copyright">
                &copy; <?= date('Y') ?> Sosial Menyapa. All rights reserved.
            </div>
        </div>
    </div>
</div>

<?php
$script = <<< JS
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#loginform-password');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // toggle the eye slash icon
        if (type === 'text') {
            this.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
        } else {
            this.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';
        }
    });
JS;
$this->registerJs($script);
?>
