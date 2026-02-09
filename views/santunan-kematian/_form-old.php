<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SantunanKematian $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="santunan-kematian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'tanggal_kematian')->textInput() ?>

    <?= $form->field($model, 'umur')->textInput() ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan_id')->textInput() ?>

    <?= $form->field($model, 'kecamatan_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelurahan_id')->textInput() ?>

    <?= $form->field($model, 'kelurahan_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_dtks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dtks')->textInput() ?>

    <?= $form->field($model, 'nik_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hubungan_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pemohon')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rt_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan_id_pemohon')->textInput() ?>

    <?= $form->field($model, 'kecamatan_nama_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelurahan_id_pemohon')->textInput() ?>

    <?= $form->field($model, 'kelurahan_nama_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_ktp_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_kk_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_sk_kematian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_sk_ahli_waris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_id_dtks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'verifikasi')->textInput() ?>

    <?= $form->field($model, 'tanggal_verifikasi')->textInput() ?>

    <?= $form->field($model, 'diverifikasi')->textInput() ?>

    <?= $form->field($model, 'status_verifikasi')->dropDownList([ 'Diterima' => 'Diterima', 'Dikembalikan' => 'Dikembalikan', 'Menunggu' => 'Menunggu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'validasi')->textInput() ?>

    <?= $form->field($model, 'tanggal_validasi')->textInput() ?>

    <?= $form->field($model, 'divalidasi')->textInput() ?>

    <?= $form->field($model, 'status_validasi')->dropDownList([ 'Diterima' => 'Diterima', 'Dikembalikan' => 'Dikembalikan', 'Menunggu' => 'Menunggu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status_permohonan')->dropDownList([ 'Menunggu' => 'Menunggu', 'Diterima' => 'Diterima', 'Dikembalikan' => 'Dikembalikan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'approved')->textInput() ?>

    <?= $form->field($model, 'tanggal_approval')->textInput() ?>

    <?= $form->field($model, 'approved_by')->textInput() ?>

    <?= $form->field($model, 'verifikasi_bag_hukum')->textInput() ?>

    <?= $form->field($model, 'tanggal_verifikasi_bag_hukum')->textInput() ?>

    <?= $form->field($model, 'diverifikasi_bag_hukum')->textInput() ?>

    <?= $form->field($model, 'verifikasi_inspektorat')->textInput() ?>

    <?= $form->field($model, 'tanggal_verifikasi_inspektorat')->textInput() ?>

    <?= $form->field($model, 'diverifikasi_inspektorat')->textInput() ?>

    <?= $form->field($model, 'nama_ahli_waris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_santunan')->textInput() ?>

    <?= $form->field($model, 'isverifikasi_dpkad')->textInput() ?>

    <?= $form->field($model, 'tanggal_verifikasi_dpkad')->textInput() ?>

    <?= $form->field($model, 'diverifikasi_dpkad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
