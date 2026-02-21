<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kecamatan;
use app\models\Kelurahan;
use app\models\Bencana;
use app\models\BencanaKategoriKorban;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\BencanaKorbanIndividu $model */
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

<div class="bencana-korban-individu-form">
    <?php $form = ActiveForm::begin(['options' => ['class' => 'needs-validation']]); ?>

    <div class="row">
        <!-- Kolom Kiri: Informasi Bencana & Data Diri -->
        <div class="col-md-6">
            <div class="premium-card">
                <div class="premium-card-header">
                    <i class="fas fa-user-injured"></i> Informasi Korban & Bencana
                </div>
                <div class="premium-card-body">
                    
                    <?= $form->field($model, 'bencana_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\app\models\Bencana::find()->all(), 'id', 'nama_bencana'),
                        'options' => ['placeholder' => 'Pilih Jenis Bencana...'],
                        'pluginOptions' => ['allowClear' => true],
                    ])->label('Kejadian Bencana') ?>

                    <?= $form->field($model, 'kategori_korban_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(BencanaKategoriKorban::find()->all(), 'id', 'nama_kategori'),
                        'options' => ['placeholder' => 'Pilih Kategori Korban...'],
                        'pluginOptions' => ['allowClear' => true],
                    ]) ?>

                    <div class="form-group field-bencanakorbanindividu-nama required">
                        <label class="control-label" for="bencanakorbanindividu-nama">Nama Lengkap</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <?= Html::activeTextInput($model, 'nama', ['class' => 'form-control', 'maxlength' => true, 'placeholder' => 'Masukkan nama lengkap sesuai KTP']) ?>
                        </div>
                        <div class="help-block"></div>
                    </div>

                    <div class="form-group field-bencanakorbanindividu-nik">
                        <label class="control-label" for="bencanakorbanindividu-nik">Nomor Induk Kependudukan (NIK)</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-id-card"></i>
                            <?= Html::activeTextInput($model, 'nik', ['class' => 'form-control', 'maxlength' => true, 'placeholder' => 'Masukkan 16 digit NIK']) ?>
                        </div>
                        <div class="help-block"></div>
                    </div>

                    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'L' => 'Laki-Laki', 'P' => 'Perempuan', ], ['prompt' => 'Pilih Jenis Kelamin...']) ?>

                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Data Lokasi & Status -->
        <div class="col-md-6">
            <div class="premium-card">
                <div class="premium-card-header">
                    <i class="fas fa-map-marked-alt"></i> Detail Lokasi Kejadian (Kota Semarang)
                </div>
                <div class="premium-card-body">
                    
                    <!-- Hardcoded Provinsi and Kota -->
                    <?= $form->field($model, 'provinsi_id')->hiddenInput(['value' => '33'])->label(false) ?> 
                    <?= $form->field($model, 'kota_id')->hiddenInput(['value' => '3374'])->label(false) ?>

                    <!-- Load current Semarang Kecamatan data bypassing limits since it's hardcoded for this feature -->
                    <?= $form->field($model, 'kecamatan_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Kecamatan::find()->all(), 'id_lama', 'nama'), // Assuming id_lama is the foreign key reference generally used in this app based on Psm model logic
                        'options' => ['id' => 'kecamatan-id', 'placeholder' => 'Pilih Kecamatan...'],
                        'pluginOptions' => ['allowClear' => true],
                    ])->label('Kecamatan (Kota Semarang)') ?>

                    <?= $form->field($model, 'kelurahan_id')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'kelurahan-id'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'pluginOptions' => [
                            'depends' => ['kecamatan-id'],
                            'placeholder' => 'Pilih Kelurahan...',
                            'url' => Url::to(['ppks/get-kelurahan']), // Points to the existing endpoint returning Kelurahan records
                            'params' => ['kecamatan-id'],
                        ],
                    ]) ?>

                    <?= $form->field($model, 'alamat')->textarea(['rows' => 4, 'placeholder' => 'Tuliskan detail alamat kejadian... (Jalan/Gang/RT/RW)', 'class' => 'form-control']) ?>
                    
                </div>
            </div>
            
            <div class="premium-card">
                 <div class="premium-card-header" style="background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);">
                    <i class="fas fa-tasks"></i> Status Pemrosesan
                </div>
                <div class="premium-card-body">
                      <?= $form->field($model, 'status_akhir')->dropDownList([ 'Input' => 'Input Baru', 'proses' => 'Prosedur', 'disetujui' => 'Disetujui', 'ditolak' => 'Ditolak', ], ['prompt' => 'Status...', 'options' => ['Input' => ['Selected' => true]]]) ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Button Area -->
    <div class="row">
        <div class="col-12 text-center my-4">
            <hr style="border-top: 1px solid rgba(0,0,0,0.05); margin-bottom: 30px;">
            <?= Html::submitButton('<i class="fas fa-save"></i> Simpan Data Korban', ['class' => 'btn-premium-save btn-lg w-50']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
