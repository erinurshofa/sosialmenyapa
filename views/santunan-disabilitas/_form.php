<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use app\models\Kecamatan;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\SantunanDisabilitas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="santunan-disabilitas-form card shadow-lg p-4">
    <h3 class="text-center text-primary mb-4">Form Santunan Disabilitas</h3>

    <?php $form = ActiveForm::begin(['options' => ['class' => 'needs-validation', 'novalidate' => true]]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nik')->textInput([
                    'type'=>'number',
                    'pattern' => '\d{16}',
                    'maxlength' => 16,
                    'minlength' => 16,
                    "onkeydown"=>"return event.keyCode !== 69",
                    'title' => 'Harus terdiri dari 16 digit angka',
                    'placeholder' => 'Masukkan NIK']) ?>

            <?= $form->field($model, 'nama', [
                'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Lengkap']
            ])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Tempat Lahir']) ?>

            <?= $form->field($model, 'tanggal_lahir')->textInput(['type' => 'date', 'class' => 'form-control']) ?>

            

            <?= $form->field($model, 'umur')->textInput(['type' => 'number', 'min' => 0, 'placeholder' => 'Masukkan Umur']) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'jenis_kelamin')->dropDownList([
                'LAKI-LAKI' => 'LAKI-LAKI',
                'PEREMPUAN' => 'PEREMPUAN'
            ], ['prompt' => 'Pilih Jenis Kelamin']) ?>
            <?= $form->field($model, 'alamat')->textarea(['rows' => 3, 'placeholder' => 'Masukkan Alamat Lengkap']) ?>
            <div class="row">
                <div class="col-6">
                    <?= $form->field($model, 'kecamatan_id')->label('Kecamatan')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Kecamatan::find()->all(), 'id_lama', 'nama'),
                        'options' => ['placeholder' => 'Pilih Kecamatan'],
                        'pluginOptions' => ['allowClear' => true],
                    ]) ?>
                    <?= $form->field($model, 'rt')->input('number') ?>
                </div>
                <div class="col-6">
                    <?= $form->field($model, 'kelurahan_id')->label('Kelurahan')->widget(DepDrop::classname(), [
                        'options' => ['placeholder' => 'Pilih Kelurahan'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'pluginOptions' => [
                            'depends' => ['santunandisabilitas-kecamatan_id'],
                            'url' => Url::to(['/site/get-kelurahan']),
                            'allowClear' => true,
                        ],
                    ]) ?>
                    <?= $form->field($model, 'rw')->input('number') ?>
                    
                </div>
            </div>
            
            
                
        </div>
    </div>

    <hr>
    <h5 class="text-primary">Informasi Pemohon</h5>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nik_pemohon')->textInput([
                    'type'=>'number',
                    'pattern' => '\d{16}',
                    'maxlength' => 16,
                    'minlength' => 16,
                    "onkeydown"=>"return event.keyCode !== 69",
                    'title' => 'Harus terdiri dari 16 digit angka',
                    'placeholder' => 'Masukkan NIK Pemohon']) ?>
           
             <?= $form->field($model, 'alamat_pemohon')->textarea(['rows' => 3, 'placeholder' => 'Masukkan Alamat Lengkap Pemohon']) ?>
             <div class="row">
                <div class="col-6">
                    <?= $form->field($model, 'kecamatan_id_pemohon')->label('Kecamatan Pemohon')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Kecamatan::find()->all(), 'id_lama', 'nama'),
                    'options' => ['placeholder' => 'Pilih Kecamatan Pemohon'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
                </div>
                <div class="col-6">
                    <?= $form->field($model, 'kelurahan_id_pemohon')->label('Kelurahan Pemohon')->widget(DepDrop::classname(), [
                    'options' => ['placeholder' => 'Pilih Kelurahan Pemohon'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'pluginOptions' => [
                        'depends' => ['santunandisabilitas-kecamatan_id_pemohon'],
                        'url' => Url::to(['/site/get-kelurahan']),
                        'allowClear' => true,
                    ],
                ]) ?>
                </div>
             </div>
             
                
            
        </div>
        <div class="col-md-6">
             <?= $form->field($model, 'nama_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Nama Pemohon']) ?>
            <?= $form->field($model, 'jenis_kelamin_pemohon')->dropDownList([
                'LAKI-LAKI' => 'LAKI-LAKI',
                'PEREMPUAN' => 'PEREMPUAN'
            ], ['prompt' => 'Pilih Jenis Kelamin Pemohon']) ?>
             <?= $form->field($model, 'no_hp_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan No HP Pemohon']) ?>
            <?= $form->field($model, 'hubungan_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Hubungan Pemohon']) ?>
        </div>
    </div>

    <hr>
<h5 class="text-muted">Upload Dokumen hanya boleh dalam bentuk gambar/pdf.</h5>
<div class="row mt-3">
    <div class="col-md-6">
        <?= $form->field($model, 'foto_ktp')->fileInput(['accept' => 'image/*,.pdf']) ?>
        <?= $form->field($model, 'foto_kk')->fileInput(['accept' => 'image/*,.pdf']) ?>
        <?= $form->field($model, 'foto')->fileInput(['accept' => 'image/*,.pdf']) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'foto_id_dtks')->fileInput(['accept' => 'image/*,.pdf']) ?>
        <?= $form->field($model, 'foto_surat_pengantar')->fileInput(['accept' => 'image/*,.pdf']) ?>
        <?= $form->field($model, 'foto_surat_permohonan')->fileInput(['accept' => 'image/*,.pdf']) ?>
    </div>
</div>

    <div class="form-group text-center">
        <?= Html::submitButton('<i class="fas fa-save"></i> Simpan', ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
