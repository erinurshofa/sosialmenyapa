<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use app\models\Kecamatan;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\SantunanKematian $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title mb-0">Formulir Santunan Kematian</h3>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <!-- Data Almarhum -->
            <div class="col-md-6">
                <h5 class="text-muted">Data Almarhum</h5>
                 <?= $form->field($model, 'nik')->textInput([
                    'type'=>'number',
                    'pattern' => '\d{16}',
                    'maxlength' => 16,
                    'minlength' => 16,
                    "onkeydown"=>"return event.keyCode !== 69",
                    'title' => 'Harus terdiri dari 16 digit angka',
                    'placeholder' => 'Masukkan NIK']) ?>
                <?php //$form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan NIK']) ?>
                <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Nama Lengkap']) ?>
                <?= $form->field($model, 'jenis_kelamin')->dropDownList([
                    'LAKI-LAKI' => 'LAKI-LAKI',
                    'PEREMPUAN' => 'PEREMPUAN'
                ], ['prompt' => 'Pilih Jenis Kelamin']) ?>
                <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Tempat Lahir']) ?>
                <?= $form->field($model, 'tanggal_lahir')->input('date') ?>
                <?= $form->field($model, 'tanggal_kematian')->input('date') ?>
                <?= $form->field($model, 'umur')->input('number') ?>
                <?= $form->field($model, 'alamat')->textarea(['rows' => 3, 'placeholder' => 'Masukkan Alamat Lengkap']) ?>
                <?= $form->field($model, 'rt')->input('number') ?>
                <?= $form->field($model, 'rw')->input('number') ?>
                <?= $form->field($model, 'kecamatan_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Kecamatan::find()->all(), 'id_lama', 'nama'),
                    'options' => ['placeholder' => 'Pilih Kecamatan'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
                <?= $form->field($model, 'kelurahan_id')->widget(DepDrop::classname(), [
                    'options' => ['placeholder' => 'Pilih Kelurahan'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'pluginOptions' => [
                        'depends' => ['santunankematian-kecamatan_id'],
                        'url' => Url::to(['/site/get-kelurahan']),
                        'allowClear' => true,
                    ],
                ]) ?>
                <?= $form->field($model, 'nama_ahli_waris')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Nama Lengkap']) ?>
            </div>

            <!-- Data Pemohon -->
            <div class="col-md-6">
                <h5 class="text-muted">Data Pemohon</h5>
                <?= $form->field($model, 'nik_pemohon')->textInput([
                    'type'=>'number',
                    'pattern' => '\d{16}',
                    'maxlength' => 16,
                    'minlength' => 16,
                    "onkeydown"=>"return event.keyCode !== 69",
                    'title' => 'Harus terdiri dari 16 digit angka',
                    'placeholder' => 'Masukkan NIK']) ?>
                <?php //$form->field($model, 'nik_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan NIK Pemohon']) ?>
                <?= $form->field($model, 'nama_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Nama Pemohon']) ?>
                <?= $form->field($model, 'jenis_kelamin_pemohon')->dropDownList([
                    'LAKI-LAKI' => 'LAKI-LAKI',
                    'PEREMPUAN' => 'PEREMPUAN'
                ], ['prompt' => 'Pilih Jenis Kelamin Pemohon']) ?>
                <?= $form->field($model, 'no_hp_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Nomor HP']) ?>
                <?= $form->field($model, 'hubungan_pemohon')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Hubungan']) ?>
                <?= $form->field($model, 'alamat_pemohon')->textarea(['rows' => 3, 'placeholder' => 'Masukkan Alamat Pemohon']) ?>
                
                <?= $form->field($model, 'rt_pemohon')->input('number') ?>
                <?= $form->field($model, 'rw_pemohon')->input('number') ?>
                <?= $form->field($model, 'kecamatan_id_pemohon')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Kecamatan::find()->all(), 'id_lama', 'nama'),
                    'options' => ['placeholder' => 'Pilih Kecamatan Pemohon'],
                    'pluginOptions' => ['allowClear' => true],
                ]) ?>
                <?= $form->field($model, 'kelurahan_id_pemohon')->widget(DepDrop::classname(), [
                    'options' => ['placeholder' => 'Pilih Kelurahan Pemohon'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'pluginOptions' => [
                        'depends' => ['santunankematian-kecamatan_id_pemohon'],
                        'url' => Url::to(['/site/get-kelurahan']),
                        'allowClear' => true,
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Upload Dokumen -->
<h5 class="text-muted">Upload Dokumen hanya boleh dalam bentuk gambar/pdf.</h5>
<div class="row mt-3">
    <div class="col-md-6">
        <?= $form->field($model, 'foto_ktp')->fileInput(['accept' => 'image/*,.pdf']) ?>
        <?= $form->field($model, 'foto_kk')->fileInput(['accept' => 'image/*,.pdf']) ?>
        <?= $form->field($model, 'foto_sk_kematian')->fileInput(['accept' => 'image/*,.pdf']) ?>
        <?= $form->field($model, 'foto_id_dtks')->fileInput(['accept' => 'image/*,.pdf']) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'foto_ktp_pemohon')->fileInput(['accept' => 'image/*,.pdf']) ?>
        <?= $form->field($model, 'foto_kk_pemohon')->fileInput(['accept' => 'image/*,.pdf']) ?>
        <?= $form->field($model, 'foto_sk_ahli_waris')->fileInput(['accept' => 'image/*,.pdf']) ?>
    </div>
</div>


        <!-- Hanya untuk admin/dinsos -->
        <?php if (in_array(Yii::$app->user->identity->role, ['dinsos', 'admin'])): ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <h5 class="text-muted">Status Permohonan</h5>
                <?= $form->field($model, 'status_permohonan')->dropDownList([
                    'Menunggu' => 'Menunggu',
                    'Diterima' => 'Diterima',
                    'Dikembalikan' => 'Dikembalikan',
                ], ['prompt' => 'Pilih Status']) ?>
                <?= $form->field($model, 'status_verifikasi')->dropDownList([
                    'Menunggu' => 'Menunggu',
                    'Diterima' => 'Diterima',
                    'Dikembalikan' => 'Dikembalikan',
                ], ['prompt' => 'Pilih Status']) ?>
                <?= $form->field($model, 'status_validasi')->dropDownList([
                    'Menunggu' => 'Menunggu',
                    'Diterima' => 'Diterima',
                    'Dikembalikan' => 'Dikembalikan',
                ], ['prompt' => 'Pilih Status']) ?>
            </div>
            <div class="col-md-6">
                <h5 class="text-muted">Tanggal & Jumlah</h5>
                <?= $form->field($model, 'tanggal_verifikasi')->input('date') ?>
                <?= $form->field($model, 'tanggal_validasi')->input('date') ?>
                <?= $form->field($model, 'tanggal_approval')->input('date') ?>
                <?= $form->field($model, 'jumlah_santunan')->input('number') ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Tombol Simpan -->
        <div class="form-group text-center mt-4">
            <?= Html::submitButton('<i class="fas fa-save"></i> Simpan', ['class' => 'btn btn-success btn-lg px-5']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
