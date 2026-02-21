<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\JenisBencana;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Bencana $model */
/** @var yii\widgets\ActiveForm $form */
?>

<style>
    .premium-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0,0,0,0.05);
        overflow: hidden;
        margin-bottom: 25px;
        transition: all 0.3s ease;
    }
    .premium-card:hover {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
    }
    .premium-card-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        padding: 18px 25px;
        font-weight: 600;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: none;
    }
    .premium-card-body {
        padding: 30px;
    }
    .form-group label {
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        padding: 12px 15px;
        height: auto;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        background-color: #f8fafc;
    }
    .form-control:focus {
        border-color: #3182ce;
        box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.15);
        background-color: #ffffff;
    }
    .select2-container--krajee .select2-selection {
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        min-height: 48px;
        background-color: #f8fafc;
    }
    .select2-container--krajee .select2-selection--single .select2-selection__rendered {
        line-height: 46px;
        padding-left: 15px;
    }
    .select2-container--krajee .select2-selection--single .select2-selection__arrow {
        height: 46px;
    }
    .btn-premium-save {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        border: none;
        border-radius: 8px;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 1rem;
        letter-spacing: 0.5px;
        color: white;
        box-shadow: 0 4px 15px rgba(17, 153, 142, 0.3);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-premium-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(17, 153, 142, 0.4);
        color: white;
    }
    .input-icon-wrapper {
        position: relative;
    }
    .input-icon-wrapper i {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #a0aec0;
        font-size: 1.1rem;
    }
    .input-icon-wrapper .form-control {
        padding-left: 45px;
    }
</style>

<div class="bencana-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'needs-validation']]); ?>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="premium-card">
                <div class="premium-card-header">
                    <i class="fas fa-bullhorn text-warning"></i> Detail Registrasi Bencana
                </div>
                <div class="premium-card-body">

                    <?= $form->field($model, 'nama_bencana')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(JenisBencana::find()->all(), 'nama', 'nama'), // Value is nama since db field is string
                        'options' => ['placeholder' => 'Pilih Jenis Bencana...'],
                        'pluginOptions' => ['allowClear' => true],
                    ])->label('Jenis Bencana') ?>

                    <div class="form-group field-bencana-lokasi">
                        <label class="control-label" for="bencana-lokasi">Lokasi Kejadian</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-map-marker-alt text-danger"></i>
                            <?= Html::activeTextInput($model, 'lokasi', ['class' => 'form-control', 'maxlength' => true, 'placeholder' => 'Contoh: Kec. Mijen, Kel. Wonolopo']) ?>
                        </div>
                        <div class="help-block"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'tanggal_mulai')->textInput(['type' => 'date', 'class' => 'form-control', 'placeholder' => 'Pilih Tanggal Mulai...']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'tanggal_selesai')->textInput(['type' => 'date', 'class' => 'form-control', 'placeholder' => 'Pilih Tanggal Selesai (Opsional)...']) ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 5, 'placeholder' => 'Masukkan detail kronologi bencana (Opsional) ...', 'class' => 'form-control']) ?>

                    <div class="text-center my-4">
                        <hr style="border-top: 1px solid rgba(0,0,0,0.05); margin-bottom: 30px;">
                        <?= Html::submitButton('<i class="fas fa-save"></i> Simpan Register Bencana', ['class' => 'btn-premium-save btn-lg']) ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
